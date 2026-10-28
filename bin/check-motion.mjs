#!/usr/bin/env node
/**
 * With "reduce motion" switched on, nothing on the page may move: no running
 * animation, and no transition of a property that moves or resizes things
 * (transform, size, position, or "all"). Color and opacity fades are allowed,
 * because they are not motion.
 *
 * Usage: node bin/check-motion.mjs <url> [url ...]
 */
import { chromium } from 'playwright';

const urls = process.argv.slice(2);
if (!urls.length) {
  console.error('usage: node bin/check-motion.mjs <url> [url ...]');
  process.exit(2);
}
const browser = await chromium.launch();
const page = await (await browser.newContext({ viewport: { width: 1440, height: 900 }, ignoreHTTPSErrors: true, reducedMotion: 'reduce' })).newPage();
let failed = 0;
for (const url of urls) {
  await page.goto(url, { waitUntil: 'networkidle' });
  const moving = await page.evaluate(() => {
    const MOTION = /^(all|transform|translate|scale|rotate|width|height|inset|top|right|bottom|left|margin.*|padding.*)$/;
    const seconds = (list) => list.split(',').map((v) => parseFloat(v) * (v.trim().endsWith('ms') ? 0.001 : 1));
    return [...document.querySelectorAll('body *')].filter((el) => {
      const s = getComputedStyle(el);
      const durations = seconds(s.transitionDuration);
      const moves = s.transitionProperty.split(',').some((p, i) => MOTION.test(p.trim()) && (durations[i % durations.length] || 0) > 0);
      const animates = s.animationName !== 'none' && Math.max(...seconds(s.animationDuration)) > 0;
      return moves || animates;
    }).map((el) => `${el.tagName.toLowerCase()}${el.classList.length ? '.' + [...el.classList].slice(0, 2).join('.') : ''}`);
  });
  if (moving.length) failed++;
  console.log(`${moving.length ? 'FAIL' : 'ok  '} ${url} ${[...new Set(moving)].slice(0, 6).join(', ')}`);
}
await browser.close();
console.log(failed ? `${failed} failed` : 'reduced-motion checks passed');
process.exit(failed ? 1 : 0);
