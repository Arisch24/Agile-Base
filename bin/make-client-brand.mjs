#!/usr/bin/env node
/**
 * Write tests/fixtures/client-brand.json: a stand-in for a client's brand, used by
 * `check-frontend --style client-brand` to prove the design survives a rebrand.
 * Every palette color keeps its perceived lightness (OKLCH L) but turns 150 degrees
 * round the color wheel, so contrast pairs hold while every hue changes; greys get a
 * faint tint. The three role fonts become system fonts (nothing to download), and
 * every radius token becomes 0.
 *
 * Reads the palette as the live site resolves it, so run it after changing theme.json.
 * Usage: node bin/make-client-brand.mjs
 */
import { mkdirSync, readFileSync, writeFileSync } from 'node:fs';
import { fileURLToPath } from 'node:url';
import { chromium } from 'playwright';

const base = process.env.WP_URL || 'https://theme-dev-wp.ddev.site';
const root = fileURLToPath(new URL('..', import.meta.url));
const themeJson = JSON.parse(readFileSync(`${root}theme.json`, 'utf8'));
const palette = themeJson.settings.color.palette;

const browser = await chromium.launch();
let rgba;
try {
  const page = await (await browser.newContext({ ignoreHTTPSErrors: true })).newPage();
  await page.goto(`${base}/`, { waitUntil: 'domcontentloaded' });
  // Paint each resolved palette color on a canvas to read it as sRGB bytes, whatever
  // format theme.json uses (hex, hsl, oklch, or a var() chain).
  rgba = await page.evaluate((slugs) => {
    const context = Object.assign(document.createElement('canvas'), { width: 1, height: 1 }).getContext('2d');
    const probe = document.body.appendChild(document.createElement('i'));
    return slugs.map((slug) => {
      probe.style.color = `var(--wp--preset--color--${slug})`;
      context.clearRect(0, 0, 1, 1);
      context.fillStyle = getComputedStyle(probe).color;
      context.fillRect(0, 0, 1, 1);
      return [...context.getImageData(0, 0, 1, 1).data];
    });
  }, palette.map((c) => c.slug));
} finally {
  await browser.close();
}

const toLinear = (c) => (c <= 0.04045 ? c / 12.92 : ((c + 0.055) / 1.055) ** 2.4);
const toGamma = (c) => (c <= 0.0031308 ? 12.92 * c : 1.055 * c ** (1 / 2.4) - 0.055);
const toOklab = ([r, g, b]) => {
  const [lr, lg, lb] = [r, g, b].map((c) => toLinear(c / 255));
  const l = Math.cbrt(0.4122214708 * lr + 0.5363325363 * lg + 0.0514459929 * lb);
  const m = Math.cbrt(0.2119034982 * lr + 0.6806995451 * lg + 0.1073969566 * lb);
  const s = Math.cbrt(0.0883024619 * lr + 0.2817188376 * lg + 0.6299787005 * lb);
  return [0.2104542553 * l + 0.793617785 * m - 0.0040720468 * s, 1.9779984951 * l - 2.428592205 * m + 0.4505937099 * s, 0.0259040371 * l + 0.7827717662 * m - 0.808675766 * s];
};
const toRgb = ([L, a, b]) => {
  const l = (L + 0.3963377774 * a + 0.2158037573 * b) ** 3;
  const m = (L - 0.1055613458 * a - 0.0638541728 * b) ** 3;
  const s = (L - 0.0894841775 * a - 1.291485548 * b) ** 3;
  return [4.0767416621 * l - 3.3077115913 * m + 0.2309699292 * s, -1.2684380046 * l + 2.6097574011 * m - 0.3413193965 * s, -0.0041960863 * l - 0.7034186147 * m + 1.707614701 * s].map(toGamma);
};
const hex = (channels) => `#${channels.map((c) => Math.round(Math.min(1, Math.max(0, c)) * 255).toString(16).padStart(2, '0')).join('')}`;
const rebrand = ([r, g, b, alpha]) => {
  const [L, a, bb] = toOklab([r, g, b]);
  let chroma = Math.hypot(a, bb);
  let hue = Math.atan2(bb, a) + (150 * Math.PI) / 180;
  if (chroma < 0.02) { chroma = 0.015; hue = (200 * Math.PI) / 180; } // greys: a faint cool tint
  // Pull chroma in until the color fits sRGB, so lightness (and contrast) is kept.
  let rgb = toRgb([L, chroma * Math.cos(hue), chroma * Math.sin(hue)]);
  while (rgb.some((c) => c < -0.001 || c > 1.001) && chroma > 0.001) {
    chroma *= 0.95;
    rgb = toRgb([L, chroma * Math.cos(hue), chroma * Math.sin(hue)]);
  }
  return alpha < 255 ? `${hex(rgb)}${Math.round(alpha).toString(16).padStart(2, '0')}` : hex(rgb);
};

const fixture = {
  $schema: 'https://schemas.wp.org/trunk/theme.json',
  version: 3,
  title: 'Client brand (test fixture)',
  settings: {
    color: { palette: palette.map(({ name, slug }, i) => ({ name, slug, color: rebrand(rgba[i]) })) },
    typography: {
      fontFamilies: [
        { name: 'Client Sans', slug: 'body', fontFamily: "'Trebuchet MS', Verdana, sans-serif" },
        { name: 'Client Serif', slug: 'display', fontFamily: "Georgia, 'Times New Roman', serif" },
        { name: 'Client Mono', slug: 'mono', fontFamily: "'Courier New', monospace" },
      ],
    },
    custom: { radius: Object.fromEntries(Object.keys(themeJson.settings.custom.radius).map((key) => [key, '0'])) },
  },
};
mkdirSync(`${root}tests/fixtures`, { recursive: true });
writeFileSync(`${root}tests/fixtures/client-brand.json`, `${JSON.stringify(fixture, null, '\t')}\n`);
const changed = fixture.settings.color.palette.filter((c, i) => c.color !== hex(rgba[i].slice(0, 3).map((v) => v / 255))).length;
console.log(`Wrote tests/fixtures/client-brand.json: ${changed} of ${palette.length} palette colors changed (pure black and white stay).`);
