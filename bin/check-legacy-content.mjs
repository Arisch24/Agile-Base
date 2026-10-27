#!/usr/bin/env node
/**
 * Render content that sites built with Agile Base 1.x already have: every
 * inserter pattern exactly as 1.4.1 shipped it, saved into a page. Each page is
 * checked at phone and desktop widths for sideways scrolling and console
 * errors, and screenshotted for review, so the 2.0 styles can be seen to keep
 * 1.x content looking intentional. The pages are deleted when it finishes.
 *
 * Needs the ddev site running, `npm install`, and the 1.4.1 git tag.
 *
 * Usage: node bin/check-legacy-content.mjs [--axe] [label]
 */
import { execFileSync } from 'node:child_process';
import { mkdirSync, rmSync, writeFileSync } from 'node:fs';
import { fileURLToPath } from 'node:url';
import AxeBuilder from '@axe-core/playwright';
import { chromium } from 'playwright';

const BASE = process.env.WP_URL || 'https://theme-dev-wp.ddev.site';
const ROOT = fileURLToPath(new URL('..', import.meta.url));
const TAG = '1.4.1';
const args = process.argv.slice(2);
const axeAt = args.indexOf('--axe');
const axe = axeAt >= 0 && args.splice(axeAt, 1).length > 0;
const label = args[0] || 'legacy';
const OUT = `${ROOT}build/checks/${label}`;
const STAGE = `${ROOT}build/legacy-${TAG}`;
const git = (...a) => execFileSync('git', a, { cwd: ROOT, encoding: 'utf8' });
const wp = (...a) => execFileSync('ddev', ['wp', ...a], { cwd: ROOT, encoding: 'utf8' }).trim();

// The 1.4.1 pattern files that were in the inserter, i.e. could be in saved content.
const files = git('ls-tree', '--name-only', `${TAG}:patterns`).split('\n').filter((f) => f.endsWith('.php'));
mkdirSync(STAGE, { recursive: true });
const slugs = [];
for (const file of files) {
  const source = git('show', `${TAG}:patterns/${file}`);
  if (/^ \* Inserter: no$/m.test(source)) continue;
  writeFileSync(`${STAGE}/${file}`, source);
  slugs.push(file.slice(0, -4));
}

let pages = {};
let failed = 0;
mkdirSync(OUT, { recursive: true });
const browser = await chromium.launch();
try {
  // Run each 1.x pattern file the way WordPress does and save its output as a page.
  pages = JSON.parse(wp('eval', `
	kses_remove_filters();
	$out = array();
	foreach ( ${JSON.stringify(slugs).replace(/"/g, "'").replace(/^\[/, 'array(').replace(/\]$/, ')')} as $slug ) {
		ob_start();
		include get_theme_file_path( 'build/legacy-${TAG}/' . $slug . '.php' );
		$out[ $slug ] = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => 'zz legacy ' . $slug, 'post_content' => ob_get_clean() ) );
	}
	echo wp_json_encode( $out );`));

  for (const width of [375, 1440]) {
    const page = await (await browser.newContext({ viewport: { width, height: 900 }, ignoreHTTPSErrors: true })).newPage();
    const errors = [];
    page.on('console', (m) => { if (m.type() === 'error') errors.push(m.text()); });
    for (const [slug, id] of Object.entries(pages)) {
      errors.length = 0;
      await page.goto(`${BASE}/?page_id=${id}`, { waitUntil: 'networkidle' });
      const overflow = await page.evaluate(() => document.documentElement.scrollWidth - document.documentElement.clientWidth);
      const problems = [];
      if (overflow > 0) problems.push(`scrolls sideways by ${overflow}px`);
      if (errors.length) problems.push(`console error: ${errors[0].slice(0, 160)}`);
      if (axe && width === 1440) {
        const { violations } = await new AxeBuilder({ page }).include('main').withTags(['wcag2a', 'wcag2aa', 'wcag21aa', 'wcag22aa']).analyze();
        for (const v of violations.filter((v) => ['serious', 'critical'].includes(v.impact))) problems.push(`axe ${v.id} (${v.nodes.length}): ${v.nodes[0].target.join(' ')}`);
      }
      await page.screenshot({ path: `${OUT}/${slug}-${width}.png`, fullPage: true });
      if (problems.length) failed++;
      console.log(`${problems.length ? 'FAIL' : 'ok  '} ${slug} @${width} ${problems.join(' | ')}`);
    }
  }
} finally {
  await browser.close();
  const ids = Object.values(pages).map(String);
  if (ids.length) wp('post', 'delete', ...ids, '--force');
  rmSync(STAGE, { recursive: true, force: true });
}
console.log(failed ? `${failed} failed` : `1.x content checks passed (${Object.keys(pages).length} patterns); screenshots in build/checks/${label}/`);
process.exit(failed ? 1 : 0);
