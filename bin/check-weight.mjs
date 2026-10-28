#!/usr/bin/env node
/**
 * Measure what a first visit downloads at phone width, and fail if the theme's
 * fonts or stylesheets go over budget or the theme loads any JavaScript of its
 * own. WordPress core's own scripts and styles are reported but not budgeted.
 *
 * Usage: node bin/check-weight.mjs <url> [url ...]
 */
import { chromium } from 'playwright';

const BUDGET_KB = { font: 120, themeCss: 30 };
const THEME_PATH = '/wp-content/themes/agile-base/';
const kb = (bytes) => Math.round(bytes / 1024);
const urls = process.argv.slice(2);
if (!urls.length) {
  console.error('usage: node bin/check-weight.mjs <url> [url ...]');
  process.exit(2);
}
const browser = await chromium.launch();
let failed = 0;
for (const url of urls) {
  const context = await browser.newContext({ viewport: { width: 375, height: 800 }, ignoreHTTPSErrors: true });
  const page = await context.newPage();
  const byType = {};
  const theme = { css: 0, js: [] };
  const pending = [];
  page.on('response', (response) => pending.push((async () => {
    const body = await response.body().catch(() => Buffer.alloc(0));
    const type = response.request().resourceType();
    byType[type] = (byType[type] || 0) + body.length;
    if (response.url().includes(THEME_PATH) && type === 'stylesheet') theme.css += body.length;
    if (response.url().includes(THEME_PATH) && type === 'script') theme.js.push(response.url().split(THEME_PATH)[1]);
  })()));
  await page.goto(url, { waitUntil: 'networkidle' });
  await Promise.all(pending);
  const problems = [];
  if ((byType.font || 0) > BUDGET_KB.font * 1024) problems.push(`fonts ${(byType.font / 1024).toFixed(3)} KB > ${BUDGET_KB.font} KB`);
  if (theme.css > BUDGET_KB.themeCss * 1024) problems.push(`theme CSS ${(theme.css / 1024).toFixed(3)} KB > ${BUDGET_KB.themeCss} KB`);
  if (theme.js.length) problems.push(`theme JavaScript: ${theme.js.join(', ')}`);
  const summary = Object.entries(byType).map(([type, bytes]) => `${type} ${kb(bytes)} KB`).join(', ');
  if (problems.length) failed++;
  console.log(`${problems.length ? 'FAIL' : 'ok  '} ${url} | ${summary} | theme CSS ${kb(theme.css)} KB ${problems.join(' | ')}`);
  await context.close();
}
await browser.close();
console.log(failed ? `${failed} failed` : 'weight checks passed');
process.exit(failed ? 1 : 0);
