#!/usr/bin/env node
/**
 * Check representative frontend URLs at three widths and capture screenshots.
 *
 * Usage: node bin/check-frontend.mjs [--style <name>] [--axe] [--fold] [--only <pages>]
 *          [--expect-font <family>] [--no-webfonts] [--rtl] [label]
 *   --style        apply a style for this run, then restore the saved global styles:
 *                  styles/<name>.json (dark, velocity, colors/<x>, typography/<x>) or
 *                  tests/fixtures/<name>.json (client-brand).
 *   --axe          also run axe (WCAG 2.2 A/AA) at 1440px; fail on serious or critical issues.
 *   --fold         check homepage header and hero fit at phone and laptop sizes (spec D17).
 *   --only         comma-separated page names (home, single, page, author, category,
 *                  search, 404, blog); default all.
 *   --expect-font  fail unless the <h1> is set in this family and its font file loaded.
 *   --no-webfonts  fail if the page downloads any font file.
 *   --rtl          render the site right to left (as for Arabic or Hebrew) for this run.
 */
import { execFileSync } from 'node:child_process';
import { existsSync, mkdirSync, readdirSync, rmSync, unlinkSync, writeFileSync } from 'node:fs';
import { fileURLToPath } from 'node:url';
import AxeBuilder from '@axe-core/playwright';
import { chromium } from 'playwright';

const base = process.env.WP_URL || 'https://theme-dev-wp.ddev.site';
const root = fileURLToPath(new URL('..', import.meta.url));
const args = process.argv.slice(2);
const flag = (name) => {
  const at = args.indexOf(name);
  return at >= 0 && args.splice(at, 1).length > 0;
};
const option = (name) => {
  const at = args.indexOf(name);
  if (at < 0) return null;
  const [, value] = args.splice(at, 2);
  return value ?? '';
};
const axe = flag('--axe');
const fold = flag('--fold');
const noWebfonts = flag('--no-webfonts');
const rtl = flag('--rtl');
const style = option('--style');
const only = option('--only');
const expectFont = option('--expect-font');
const label = args.shift() || (style ? style.replace('/', '-') : 'default');
const wanted = only === null ? null : only.split(',').filter(Boolean);
if (args.length || style === '' || expectFont === '' || !/^[a-zA-Z0-9_-]+$/.test(label) ||
    (style && !/^[a-z0-9-]+(\/[a-z0-9-]+)?$/.test(style)) || (wanted && !wanted.length)) {
  console.error('usage: node bin/check-frontend.mjs [--style <name>] [--axe] [--fold] [--only <pages>] [--expect-font <family>] [--no-webfonts] [--rtl] [label]');
  process.exit(2);
}
const styleFile = style && [`styles/${style}.json`, `tests/fixtures/${style}.json`].find((file) => existsSync(`${root}${file}`));
if (style && !styleFile) {
  console.error(`unknown style: ${style} (looked in styles/ and tests/fixtures/)`);
  process.exit(2);
}
const out = `${root}build/checks/${label}`;
const siteHost = new URL(base).host;
// WordPress core loads avatars from Gravatar; every other asset must come from the site.
const ALLOWED_HOSTS = [/(^|\.)gravatar\.com$/];
const FOLD = { header: 124, next: 0.85, button: 0.8 };
const wp = (...args) => execFileSync('ddev', ['wp', ...args], { cwd: root, encoding: 'utf8' }).trim();
const globalStylesId = 'WP_Theme_JSON_Resolver::get_user_global_styles_post_id()';
// Swapping styles must not add entries to the owner's Styles > Revisions history.
const setGlobalStyles = (expression) => wp('eval', `
  kses_remove_filters();
  add_filter( 'wp_revisions_to_keep', '__return_zero' );
  $result = wp_update_post( array( 'ID' => ${globalStylesId}, 'post_content' => wp_slash( ${expression} ) ), true );
  if ( is_wp_error( $result ) ) { WP_CLI::error( $result->get_error_message() ); }`);

const revisions = () => Number(wp('eval', `echo count( wp_get_post_revisions( ${globalStylesId} ) );`));
// --rtl drops a must-use plugin into the site for the run, the way the RTL Tester plugin
// does it, and removes it afterwards (also at the start, after an interrupted run).
const muPlugins = fileURLToPath(new URL('../../../mu-plugins/', import.meta.url));
const rtlPlugin = `${muPlugins}test-agile-base-check-rtl.php`;
let createdMuPlugins = false;
const removeRtlPlugin = () => {
  rmSync(rtlPlugin, { force: true });
  if (createdMuPlugins && !readdirSync(muPlugins).length) rmSync(muPlugins, { recursive: true });
  createdMuPlugins = false;
};

let browser;
let saved = null;
let revisionsBefore = null;
let restoring;
const restore = () => {
  if (saved === null) return;
  const original = saved;
  saved = null;
  setGlobalStyles(`base64_decode( '${original}' )`);
};
const cleanup = () => {
  if (!restoring) restoring = (async () => {
    try { if (browser) await browser.close(); } finally { removeRtlPlugin(); restore(); }
  })();
  return restoring;
};
process.on('SIGTERM', () => { void cleanup().then(() => process.exit(143), (error) => { console.error(error); process.exit(143); }); });
process.on('SIGINT', () => { void cleanup().then(() => process.exit(130), (error) => { console.error(error); process.exit(130); }); });

let failed = 0;
try {
  // WordPress caches the list of theme pattern files while the theme version stays
  // the same. Refresh it so pattern files added or removed since are rendered.
  wp('eval', 'wp_get_theme()->delete_pattern_cache();');
  removeRtlPlugin();
  const urls = JSON.parse(wp('eval', `
    $post = get_posts( array( 'numberposts' => 1 ) );
    $page = get_posts( array( 'post_type' => 'page', 'numberposts' => 1, 'post__not_in' => array( (int) get_option( 'page_on_front' ), (int) get_option( 'page_for_posts' ) ) ) );
    $cat = get_terms( array( 'taxonomy' => 'category', 'number' => 1, 'hide_empty' => true ) );
    $urls = array(
      'home' => home_url( '/' ),
      'single' => $post ? get_permalink( $post[0] ) : null,
      'page' => $page ? get_permalink( $page[0] ) : null,
      'author' => $post ? get_author_posts_url( $post[0]->post_author ) : null,
      'category' => $cat ? get_term_link( $cat[0] ) : null,
      'search' => home_url( '/?s=a' ),
      '404' => home_url( '/agile-base-404-check/' ),
    );
    if ( get_option( 'page_for_posts' ) ) { $urls['blog'] = get_permalink( get_option( 'page_for_posts' ) ); }
    echo wp_json_encode( array_filter( $urls ) );`));
  for (const name of wanted || ['home', 'single', 'page', 'author', 'category', 'search', '404']) {
    if (!urls[name]) throw new Error(`no URL for ${name}`);
  }
  if (wanted) for (const name of Object.keys(urls)) if (!wanted.includes(name)) delete urls[name];
  if (style) {
    revisionsBefore = revisions();
    saved = wp('eval', `echo base64_encode( get_post_field( 'post_content', ${globalStylesId} ) );`);
    setGlobalStyles(`wp_json_encode( array_merge(
      array( 'version' => 3, 'isGlobalStylesUserThemeJSON' => true ),
      array_intersect_key( json_decode( file_get_contents( get_theme_file_path( '${styleFile}' ) ), true ), array( 'settings' => 1, 'styles' => 1 ) )
    ) )`);
  }
  if (rtl) {
    createdMuPlugins = !existsSync(muPlugins);
    mkdirSync(muPlugins, { recursive: true });
    writeFileSync(rtlPlugin, "<?php\n// Temporary: written and removed by agile-base bin/check-frontend.mjs --rtl.\nadd_action( 'init', function () { $GLOBALS['wp_locale']->text_direction = 'rtl'; } );\n");
  }
  mkdirSync(out, { recursive: true });
  for (const name of readdirSync(out)) {
    if (name.endsWith('.png')) unlinkSync(`${out}/${name}`);
  }
  browser = await chromium.launch();
  for (const [width, height] of fold ? [[375, 812], [1366, 768], [1440, 900]] : [[375, 900], [768, 900], [1440, 900]]) {
    const context = await browser.newContext({ viewport: { width, height }, ignoreHTTPSErrors: true });
    const page = await context.newPage();
    const errors = [];
    const external = new Set();
    const fontFiles = new Set();
    page.on('console', (message) => {
      if (message.type() !== 'error') return;
      const expected404Document = /status of 404/.test(message.text()) &&
        message.location().url === urls['404'];
      if (!expected404Document) errors.push(message.text());
    });
    page.on('request', (request) => {
      const { protocol, host, pathname } = new URL(request.url());
      if (/^https?:$/.test(protocol) && host !== siteHost && !ALLOWED_HOSTS.some((allowed) => allowed.test(host))) external.add(host);
      if (request.resourceType() === 'font' || /\.(woff2?|ttf|otf)$/i.test(pathname)) fontFiles.add(pathname.split('/').pop());
    });
    for (const [name, url] of Object.entries(urls)) {
      errors.length = 0;
      external.clear();
      fontFiles.clear();
      const response = await page.goto(url, { waitUntil: 'networkidle' });
      const facts = await page.evaluate(() => ({
        mains: document.querySelectorAll('main').length,
        h1s: document.querySelectorAll('h1').length,
        notices: /<b>(Warning|Notice|Deprecated|Fatal error)<\/b>:/.test(document.documentElement.outerHTML),
        overflow: document.documentElement.scrollWidth - document.documentElement.clientWidth,
        noAlt: [...document.images].filter((img) => !img.hasAttribute('alt')).length,
        empty: ['header', 'footer'].filter((tag) => !document.querySelector(tag)?.innerText.trim()),
        dir: document.documentElement.dir,
        h1Font: getComputedStyle(document.querySelector('h1') || document.body).fontFamily,
        loadedFonts: [...document.fonts].filter((font) => font.status === 'loaded').map((font) => font.family.replace(/["']/g, '')),
        // Full-width sections touch each other, the header meets one that opens the page and
        // the footer one that ends it: no block gap beside a color field. A post content
        // wrapper is full width too, so look inside it.
        sectionGaps: (() => {
          const section = (el) => (el?.classList.contains('wp-block-post-content') ? null : el?.classList.contains('alignfull') ? el : null);
          const mains = [...document.querySelectorAll('.wp-site-blocks > main')];
          const opening = mains.filter((main) => {
            const first = [...main.children].find((el) => el.offsetHeight > 0 && getComputedStyle(el).position !== 'absolute');
            const full = section(first?.classList.contains('wp-block-post-content') ? first.firstElementChild : first);
            return full && main.previousElementSibling && full.getBoundingClientRect().top - main.previousElementSibling.getBoundingClientRect().bottom > 0.5;
          });
          const closing = mains.filter((main) => {
            const last = main.lastElementChild;
            return main.nextElementSibling && section(last?.classList.contains('wp-block-post-content') ? last.lastElementChild : last);
          }).map((main) => main.nextElementSibling);
          return [...document.querySelectorAll('.alignfull')]
            .filter((el) => el.previousElementSibling?.classList.contains('alignfull'))
            .concat(closing)
            .filter((el) => parseFloat(getComputedStyle(el).marginBlockStart) !== 0).length + opening.length;
        })(),
        top: (() => {
          const box = (el) => (el ? el.getBoundingClientRect() : null);
          const hero = document.querySelector('main')?.firstElementChild;
          return {
            header: Math.round(box(document.querySelector('header'))?.height ?? 0),
            next: Math.round(box(hero?.nextElementSibling)?.top ?? 1e6),
            button: Math.round(box(hero?.querySelector('.wp-block-button__link'))?.bottom ?? 1e6),
          };
        })(),
      }));
      const problems = [];
      if (response.status() !== (name === '404' ? 404 : 200)) problems.push(`status ${response.status()}`);
      if (facts.mains !== 1) problems.push(`${facts.mains} <main>`);
      if (facts.h1s !== 1) problems.push(`${facts.h1s} <h1>`);
      if (facts.notices) problems.push('PHP notice');
      if (facts.overflow > 0) problems.push(`scrolls sideways by ${facts.overflow}px`);
      if (facts.noAlt) problems.push(`${facts.noAlt} images without alt`);
      if (facts.empty.length) problems.push(`empty or missing ${facts.empty.join(' and ')}`);
      if (rtl && facts.dir !== 'rtl') problems.push(`page is not right to left (dir="${facts.dir}")`);
      if (errors.length) problems.push(`console error: ${errors[0].slice(0, 160)}`);
      if (external.size) problems.push(`requests to ${[...external].join(', ')}`);
      if (noWebfonts && fontFiles.size) problems.push(`downloads fonts: ${[...fontFiles].join(', ')}`);
      if (expectFont && !(facts.h1Font.includes(expectFont) && facts.loadedFonts.includes(expectFont))) {
        problems.push(`<h1> font is ${facts.h1Font} (loaded: ${facts.loadedFonts.join(', ') || 'none'}), expected ${expectFont}`);
      }
      if (facts.sectionGaps) problems.push(`${facts.sectionGaps} full-width sections leave a gap to the next section, the header or the footer`);
      if (fold && name === 'home') {
        const { header, next, button } = facts.top;
        if (width >= 1366 && header > FOLD.header) problems.push(`header is ${header}px tall (at most ${FOLD.header})`);
        if (width >= 1366 && next > FOLD.next * height) problems.push(`the section after the hero starts at ${next}px of ${height} (by ${Math.round(FOLD.next * height)})`);
        if (width < 768 && button > FOLD.button * height) problems.push(`the hero's first button ends at ${button}px of ${height} (by ${Math.round(FOLD.button * height)})`);
      }
      if (axe && width === 1440) {
        const { violations } = await new AxeBuilder({ page }).withTags(['wcag2a', 'wcag2aa', 'wcag21aa', 'wcag22aa']).analyze();
        // WordPress core nests the Page List block's <ul> straight inside the navigation's
        // <ul> (the fallback menu on a site without one). That is core markup, not the theme's.
        const pageListMenu = (await page.locator('.wp-block-navigation__container > .wp-block-page-list').count()) > 0;
        const coreIssue = (violation) => pageListMenu && violation.id === 'list' &&
          violation.nodes.every((node) => node.target.join(' ').includes('wp-block-navigation__container'));
        for (const violation of violations.filter((v) => ['serious', 'critical'].includes(v.impact) && !coreIssue(v))) {
          problems.push(`axe ${violation.id} (${violation.nodes.length}): ${violation.nodes[0].target.join(' ')}`);
        }
      }
      await page.screenshot({ path: `${out}/${name}-${width}.png`, fullPage: true });
      if (problems.length) failed++;
      const measured = fold && name === 'home' ? ` [header ${facts.top.header}, next ${facts.top.next}, button ${facts.top.button}]` : '';
      console.log(`${problems.length ? 'FAIL' : 'ok  '} ${name} @${width}${measured} ${problems.join(' | ')}`);
    }
    await context.close();
  }
} catch (error) {
  failed++;
  console.error(error);
} finally {
  try { await cleanup(); } catch (error) { failed++; console.error('cleanup failed:', error); }
}
if (revisionsBefore !== null) {
  const revisionsAfter = revisions();
  if (revisionsAfter !== revisionsBefore) {
    failed++;
    console.log(`FAIL the run changed the global styles revisions: ${revisionsBefore} before, ${revisionsAfter} after`);
  }
}
console.log(failed ? `${failed} failed` : `front-end checks passed; screenshots in build/checks/${label}/`);
process.exitCode = failed ? 1 : 0;
