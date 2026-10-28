#!/usr/bin/env node
/**
 * Tab through each page with the keyboard and check what accessibility-ready asks of
 * focus: the first Tab reaches the skip link, every focused control shows an outline
 * of at least 2px whose color has 3:1 contrast with the background behind it, and
 * focus never gets stuck. Runs at 1440px; pass --width 375 for phones.
 *
 * Usage: node bin/check-focus.mjs [--width <px>] <url> [url ...]
 */
import { chromium } from 'playwright';

const args = process.argv.slice(2);
const widthAt = args.indexOf('--width');
const width = widthAt >= 0 ? Number(args.splice(widthAt, 2)[1]) : 1440;
const urls = args;
if (!urls.length || !Number.isInteger(width) || width <= 0) {
  console.error('usage: node bin/check-focus.mjs [--width <px>] <url> [url ...]');
  process.exit(2);
}
const MAX_TABS = 80;

let failed = 0;
const browser = await chromium.launch();
try {
  const page = await (await browser.newContext({ viewport: { width, height: 900 }, ignoreHTTPSErrors: true })).newPage();
  for (const url of urls) {
    await page.goto(url, { waitUntil: 'networkidle' });
    const problems = [];
    const seen = [];
    let finished = false;
    for (let i = 0; i < MAX_TABS; i++) {
      await page.keyboard.press('Tab');
      const focus = await page.evaluate(() => {
        const el = document.activeElement;
        if (!el || el === document.body) return null;
        // Paint a color on a canvas to read it as sRGB bytes, whatever its CSS format.
        const context = Object.assign(document.createElement('canvas'), { width: 1, height: 1 }).getContext('2d');
        const rgba = (color) => {
          context.clearRect(0, 0, 1, 1);
          context.fillStyle = color;
          context.fillRect(0, 0, 1, 1);
          return [...context.getImageData(0, 0, 1, 1).data];
        };
        const luminance = ([r, g, b]) => [r, g, b].map((c) => { c /= 255; return c <= 0.03928 ? c / 12.92 : ((c + 0.055) / 1.055) ** 2.4; })
          .reduce((sum, c, k) => sum + c * [0.2126, 0.7152, 0.0722][k], 0);
        let background = [255, 255, 255, 255];
        for (let node = el.parentElement; node; node = node.parentElement) {
          const color = rgba(getComputedStyle(node).backgroundColor);
          if (color[3] > 200) { background = color; break; }
        }
        const style = getComputedStyle(el);
        const width = style.outlineStyle === 'none' ? 0 : parseFloat(style.outlineWidth);
        const outline = rgba(style.outlineColor);
        const [l1, l2] = [luminance(outline), luminance(background)].sort((a, b) => b - a);
        const name = `${el.tagName.toLowerCase()}${el.id ? `#${el.id}` : ''}${el.classList.length ? `.${[...el.classList].slice(0, 2).join('.')}` : ''}`;
        return {
          name,
          key: [...document.querySelectorAll('*')].indexOf(el),
          href: el.getAttribute('href') || '',
          text: el.textContent.trim().slice(0, 40),
          width,
          contrast: (l1 + 0.05) / (l2 + 0.05),
          visible: el.getClientRects().length > 0,
        };
      });
      if (!focus) { finished = true; break; } // focus left the page content
      if (i === 0 && !/#wp--skip-link--target$|skip/i.test(`${focus.href} ${focus.text}`)) problems.push(`first Tab reached ${focus.name}, not the skip link`);
      if (seen.includes(focus.key)) {
        if (focus.key !== seen[0]) problems.push(`focus trapped at ${focus.name}`);
        finished = true;
        break;
      }
      seen.push(focus.key);
      if (!focus.visible) problems.push(`${focus.name} takes focus while hidden`);
      else if (focus.width < 2) problems.push(`${focus.name} has a ${focus.width}px focus outline`);
      else if (focus.contrast < 3) problems.push(`${focus.name} focus outline contrast ${focus.contrast.toFixed(2)}:1`);
    }
    if (!seen.length) problems.push('no keyboard focus stops (missing skip link)');
    if (!finished) problems.push(`tab traversal exceeded ${MAX_TABS} stops; incomplete check`);
    const unique = [...new Set(problems)];
    if (unique.length) failed++;
    console.log(`${unique.length ? 'FAIL' : 'ok  '} ${url} (${seen.length} stops @${width}) ${unique.slice(0, 6).join(' | ')}${unique.length > 6 ? ` | +${unique.length - 6} more` : ''}`);
  }
} finally {
  await browser.close();
}
console.log(failed ? `${failed} failed` : 'focus checks passed');
process.exitCode = failed ? 1 : 0;
