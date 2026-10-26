#!/usr/bin/env node
/** Check representative frontend URLs at three widths and capture screenshots. */
import { execFileSync } from 'node:child_process';
import { existsSync, mkdirSync, readdirSync, unlinkSync } from 'node:fs';
import { fileURLToPath } from 'node:url';
import { chromium } from 'playwright';

const base = process.env.WP_URL || 'https://theme-dev-wp.ddev.site';
const root = fileURLToPath(new URL('..', import.meta.url));
const args = process.argv.slice(2);
const styleAt = args.indexOf('--style');
const style = styleAt >= 0 ? args.splice(styleAt, 2)[1] : null;
const label = args.shift() || style || 'default';
if (args.length || (styleAt >= 0 && !style) ||
    !/^[a-zA-Z0-9_-]+$/.test(label) || (style && !/^[a-z0-9-]+$/.test(style))) {
  console.error('usage: node bin/check-frontend.mjs [--style <variation>] [label]');
  process.exit(2);
}
if (style && !existsSync(`${root}styles/${style}.json`)) {
  console.error(`unknown style variation: ${style}`);
  process.exit(2);
}
const out = `${root}build/checks/${label}`;
const wp = (...args) => execFileSync('ddev', ['wp', ...args], { cwd: root, encoding: 'utf8' }).trim();
const globalStylesId = 'WP_Theme_JSON_Resolver::get_user_global_styles_post_id()';
// Swapping styles must not add entries to the owner's Styles > Revisions history.
const setGlobalStyles = (expression) => wp('eval', `
  kses_remove_filters();
  add_filter( 'wp_revisions_to_keep', '__return_zero' );
  $result = wp_update_post( array( 'ID' => ${globalStylesId}, 'post_content' => wp_slash( ${expression} ) ), true );
  if ( is_wp_error( $result ) ) { WP_CLI::error( $result->get_error_message() ); }`);

const revisions = () => Number(wp('eval', `echo count( wp_get_post_revisions( ${globalStylesId} ) );`));

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
    try { if (browser) await browser.close(); } finally { restore(); }
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
  for (const name of ['home', 'single', 'page', 'author', 'category', 'search', '404']) {
    if (!urls[name]) throw new Error(`no URL for ${name}`);
  }
  if (style) {
    revisionsBefore = revisions();
    saved = wp('eval', `echo base64_encode( get_post_field( 'post_content', ${globalStylesId} ) );`);
    setGlobalStyles(`wp_json_encode( array_merge(
      array( 'version' => 3, 'isGlobalStylesUserThemeJSON' => true ),
      array_intersect_key( json_decode( file_get_contents( get_theme_file_path( 'styles/${style}.json' ) ), true ), array( 'settings' => 1, 'styles' => 1 ) )
    ) )`);
  }
  mkdirSync(out, { recursive: true });
  for (const name of readdirSync(out)) {
    if (name.endsWith('.png')) unlinkSync(`${out}/${name}`);
  }
  browser = await chromium.launch();
  for (const width of [375, 768, 1440]) {
    const context = await browser.newContext({ viewport: { width, height: 900 }, ignoreHTTPSErrors: true });
    const page = await context.newPage();
    const errors = [];
    page.on('console', (message) => {
      if (message.type() !== 'error') return;
      const expected404Document = /status of 404/.test(message.text()) &&
        message.location().url === urls['404'];
      if (!expected404Document) errors.push(message.text());
    });
    for (const [name, url] of Object.entries(urls)) {
      errors.length = 0;
      const response = await page.goto(url, { waitUntil: 'networkidle' });
      const facts = await page.evaluate(() => ({
        mains: document.querySelectorAll('main').length,
        h1s: document.querySelectorAll('h1').length,
        notices: /<b>(Warning|Notice|Deprecated|Fatal error)<\/b>:/.test(document.documentElement.outerHTML),
        overflow: document.documentElement.scrollWidth - document.documentElement.clientWidth,
        noAlt: [...document.images].filter((img) => !img.hasAttribute('alt')).length,
        empty: ['header', 'footer'].filter((tag) => !document.querySelector(tag)?.innerText.trim()),
      }));
      const problems = [];
      if (response.status() !== (name === '404' ? 404 : 200)) problems.push(`status ${response.status()}`);
      if (facts.mains !== 1) problems.push(`${facts.mains} <main>`);
      if (facts.h1s !== 1) problems.push(`${facts.h1s} <h1>`);
      if (facts.notices) problems.push('PHP notice');
      if (facts.overflow > 0) problems.push(`scrolls sideways by ${facts.overflow}px`);
      if (facts.noAlt) problems.push(`${facts.noAlt} images without alt`);
      if (facts.empty.length) problems.push(`empty or missing ${facts.empty.join(' and ')}`);
      if (errors.length) problems.push(`console error: ${errors[0].slice(0, 160)}`);
      await page.screenshot({ path: `${out}/${name}-${width}.png`, fullPage: true });
      if (problems.length) failed++;
      console.log(`${problems.length ? 'FAIL' : 'ok  '} ${name} @${width} ${problems.join(' | ')}`);
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
