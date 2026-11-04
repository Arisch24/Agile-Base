#!/usr/bin/env node
/**
 * Open and close the mobile navigation overlay with the keyboard on each URL:
 * the toggle opens it, focus moves into it, its links keep clear of the screen
 * edges, it uses the page's colors, Escape closes it, and focus returns to the
 * toggle. Fails on the first URL where any of that does not happen.
 *
 * Usage: node bin/check-menu.mjs <url> [url ...]   (default: the homepage)
 */
import { chromium } from 'playwright';

const BASE = process.env.WP_URL || 'https://theme-dev-wp.ddev.site';
const urls = process.argv.slice(2).length ? process.argv.slice(2) : [`${BASE}/`];
let failed = 0;
const browser = await chromium.launch();
try {
  const page = await (await browser.newContext({ viewport: { width: 375, height: 800 }, ignoreHTTPSErrors: true })).newPage();
  for (const url of urls) {
    await page.goto(url, { waitUntil: 'networkidle' });
    const problems = [];
    const toggle = page.locator('.wp-block-navigation__responsive-container-open').first();
    if (!(await toggle.isVisible())) {
      problems.push('no visible menu button at 375px');
    } else {
      await toggle.focus();
      await page.keyboard.press('Enter');
      const overlay = page.locator('.wp-block-navigation__responsive-container.is-menu-open').first();
      await overlay.waitFor({ state: 'visible', timeout: 5000 }).catch(() => problems.push('menu did not open'));
      await page.waitForTimeout(300); // WordPress moves focus into the menu just after it opens.
      const focusInside = await page.evaluate(() => Boolean(document.activeElement?.closest('.wp-block-navigation__responsive-container.is-menu-open')));
      if (!focusInside) problems.push('focus did not move into the open menu');
      // WordPress keeps at least 1rem between the menu's links and the screen edges.
      const offEdge = await page.evaluate(() => [...document.querySelectorAll('.is-menu-open .wp-block-navigation-item__content')]
        .filter((link) => link.getClientRects().length)
        .filter((link) => { const box = link.getBoundingClientRect(); return box.left < 15.5 || box.right > innerWidth - 15.5; })
        .map((link) => link.textContent.trim().slice(0, 30)));
      if (offEdge.length) problems.push(`links within 1rem of the screen edge: ${offEdge.slice(0, 3).join(', ')}`);
      // Unless the menu sets its own overlay colors, the open menu uses the page's colors.
      const colors = await page.evaluate(() => {
        const menu = document.querySelector('.wp-block-navigation__responsive-container.is-menu-open');
        if (menu.matches('.has-background, .has-text-color')) return null;
        const [own, body] = [getComputedStyle(menu), getComputedStyle(document.body)];
        return own.backgroundColor === body.backgroundColor && own.color === body.color ? null
          : `menu ${own.color} on ${own.backgroundColor}, page ${body.color} on ${body.backgroundColor}`;
      });
      if (colors) problems.push(`open menu colors differ from the page: ${colors}`);
      await page.keyboard.press('Escape');
      await page.waitForTimeout(400);
      if (await overlay.isVisible()) problems.push('Escape did not close the menu');
      const focusBack = await page.evaluate(() => document.activeElement?.classList.contains('wp-block-navigation__responsive-container-open'));
      if (!focusBack) problems.push('focus did not return to the menu button');
    }
    if (problems.length) failed++;
    console.log(`${problems.length ? 'FAIL' : 'ok  '} ${url} ${problems.join(' | ')}`);
  }
} finally {
  await browser.close();
}
console.log(failed ? `${failed} failed` : 'menu checks passed');
process.exit(failed ? 1 : 0);
