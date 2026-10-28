#!/usr/bin/env node
/** Open theme templates, parts, and rendered patterns in the WordPress editors. */
import { execFileSync } from 'node:child_process';
import { randomBytes } from 'node:crypto';
import { readdirSync } from 'node:fs';
import { fileURLToPath } from 'node:url';
import { chromium } from 'playwright';

const base = process.env.WP_URL || 'https://theme-dev-wp.ddev.site';
const root = fileURLToPath(new URL('..', import.meta.url));
const theme = 'agile-base';
const user = 'test-editor-check';
const filters = process.argv.slice(2);
const wanted = (name) => !filters.length || filters.some((filter) => name.includes(filter));
const wp = (...args) => execFileSync('ddev', ['wp', ...args], { cwd: root, encoding: 'utf8' }).trim();
const slugs = (dir, ext) => readdirSync(`${root}${dir}`).filter((file) => file.endsWith(ext)).map((file) => file.slice(0, -ext.length)).sort();
const quiet = (...args) => execFileSync('ddev', ['wp', ...args], { cwd: root, encoding: 'utf8', stdio: ['ignore', 'pipe', 'ignore'] }).trim();

// Only posts owned by this reserved temporary user are eligible for deletion.
// This includes its auto-drafts and Trash, leaving other users' content intact.
const purge = () => {
  let id;
  try { id = quiet('user', 'get', user, '--field=ID'); } catch { return; }
  wp('eval', `
    $ids = get_posts( array(
      'post_type' => get_post_types(), 'post_status' => get_post_stati(),
      'author' => ${Number(id)}, 'numberposts' => -1, 'fields' => 'ids',
    ) );
    foreach ( $ids as $id ) { wp_delete_post( $id, true ); }`);
  quiet('user', 'delete', user, '--yes');
};

const footprint = () => JSON.parse(wp('eval', `
  global $wpdb;
  echo wp_json_encode( array(
    'templates' => $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE post_type IN ('wp_template','wp_template_part') ORDER BY ID" ),
    'trash' => $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE post_type IN ('post','page') AND post_status='trash' ORDER BY ID" ),
    'auto_drafts' => $wpdb->get_col( "SELECT ID FROM $wpdb->posts WHERE post_type IN ('post','page') AND post_status='auto-draft' ORDER BY ID" ),
  ) );`));

let browser;
let ownsUser = false;
let cleaning;
const cleanup = () => {
  if (!cleaning) cleaning = (async () => {
    try { if (browser) await browser.close(); } finally { if (ownsUser) { purge(); ownsUser = false; } }
  })();
  return cleaning;
};
process.on('SIGTERM', () => { void cleanup().then(() => process.exit(143), (error) => { console.error(error); process.exit(143); }); });
process.on('SIGINT', () => { void cleanup().then(() => process.exit(130), (error) => { console.error(error); process.exit(130); }); });

let failed = 0;
let before;
try {
  purge(); // Recover a temporary user left by an uncatchable previous crash.
  before = footprint();
  const password = randomBytes(18).toString('hex');
  const userId = wp('user', 'create', user, `${user}@example.invalid`, '--role=administrator', `--user_pass=${password}`, '--porcelain');
  ownsUser = true;
  // WordPress caches the list of theme pattern files across requests. Refresh it
  // so newly added or removed pattern files are included in this run.
  wp('eval', 'wp_get_theme()->delete_pattern_cache();');
  const drafts = JSON.parse(wp('eval', `
    kses_remove_filters();
    $out = array();
    foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $p ) {
      if ( 0 !== strpos( $p['name'], '${theme}/' ) ) { continue; }
      $type = in_array( 'page', $p['postTypes'] ?? array(), true ) ? 'page' : 'post';
      $id = wp_insert_post( array(
        'post_type' => $type, 'post_status' => 'draft',
        'post_title' => 'Test: editor check ' . $p['name'],
        'post_author' => ${Number(userId)}, 'post_content' => $p['content'],
      ), true );
      if ( is_wp_error( $id ) ) { WP_CLI::error( $id->get_error_message() ); }
      $out[ substr( $p['name'], ${theme.length + 1} ) ] = $id;
    }
    echo wp_json_encode( $out );`));
  const targets = [
    ...slugs('templates', '.html').map((slug) => ({ name: `template ${slug}`, url: `/wp-admin/site-editor.php?p=${encodeURIComponent(`/wp_template/${theme}//${slug}`)}&canvas=edit` })),
    ...slugs('parts', '.html').map((slug) => ({ name: `part ${slug}`, url: `/wp-admin/site-editor.php?p=${encodeURIComponent(`/wp_template_part/${theme}//${slug}`)}&canvas=edit` })),
    ...Object.entries(drafts).map(([slug, id]) => ({ name: `pattern ${slug}`, url: `/wp-admin/post.php?post=${id}&action=edit` })),
  ].filter((target) => wanted(target.name));
  browser = await chromium.launch();
  const context = await browser.newContext({ viewport: { width: 1440, height: 1000 }, ignoreHTTPSErrors: true });
  const page = await context.newPage();
  const errors = [];
  page.on('console', (message) => { if (message.type() === 'error') errors.push(message.text()); });
  await page.goto(`${base}/wp-login.php?redirect_to=${encodeURIComponent(`${base}/wp-admin/site-editor.php`)}`);
  await page.fill('#user_login', user);
  await page.fill('#user_pass', password);
  await Promise.all([page.waitForNavigation(), page.click('#wp-submit')]);
  await page.evaluate(() => {
    const prefs = window.wp?.data?.dispatch('core/preferences');
    prefs?.set('core/edit-site', 'welcomeGuide', false);
    prefs?.set('core/edit-post', 'welcomeGuide', false);
    prefs?.set('core', 'enableChoosePatternModal', false);
  });
  for (const target of targets) {
    errors.length = 0;
    try {
      await page.goto(base + target.url);
      const canvas = page.frameLocator('iframe[name="editor-canvas"]');
      await canvas.locator('.is-root-container').first().waitFor({ timeout: 60000 });
      await page.waitForFunction(() => window.wp?.data?.select('core/block-editor')?.getBlocks().length > 0, undefined, { timeout: 60000 });
      await page.waitForTimeout(5000);
      const warnings = await canvas.locator('.block-editor-warning', { hasText: /unexpected or invalid content/i }).count();
      const invalid = await page.evaluate(() => {
        const walk = (blocks) => blocks.flatMap((block) => [block, ...walk(block.innerBlocks)]);
        return walk(window.wp.data.select('core/block-editor').getBlocks()).filter((block) => !block.isValid).map((block) => block.name);
      });
      const ok = !warnings && !invalid.length && !errors.length;
      if (!ok) failed++;
      console.log(`${ok ? 'ok  ' : 'FAIL'} ${target.name}${ok ? '' : ` | warnings ${warnings} | invalid ${JSON.stringify(invalid)} | console errors ${errors.length}${errors.length ? `: ${errors[0].slice(0, 200)}` : ''}`}`);
    } catch (error) {
      failed++;
      console.log(`FAIL ${target.name} | ${error.message.slice(0, 300)}`);
    }
  }
  console.log(`${targets.length} checked`);
} catch (error) {
  failed++;
  console.error(error);
} finally {
  try { await cleanup(); } catch (error) { failed++; console.error('cleanup failed:', error); }
}
if (before) {
  const after = footprint();
  if (JSON.stringify(after) !== JSON.stringify(before)) {
    failed++;
    console.log(`FAIL the run changed the site: ${JSON.stringify(before)} before, ${JSON.stringify(after)} after`);
  }
}
console.log(failed ? `${failed} failed` : 'editor checks passed');
process.exitCode = failed ? 1 : 0;
