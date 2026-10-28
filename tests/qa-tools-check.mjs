/** Regression fixtures for the browser QA tools; needs Playwright Chromium. */
import assert from 'node:assert/strict';
import { execFile } from 'node:child_process';
import { readFileSync } from 'node:fs';
import { createServer } from 'node:http';
import { promisify } from 'node:util';
import { fileURLToPath } from 'node:url';

const root = fileURLToPath(new URL('..', import.meta.url));
const exec = promisify(execFile);
const check = async (tool, args, expected) => {
  let status = 0;
  let output;
  try {
    output = await exec(process.execPath, [`${root}bin/check-${tool}.mjs`, ...args], { cwd: root });
  } catch (error) {
    status = error.code;
    output = error;
  }
  assert.equal(status, expected, `${tool}: ${output.stdout}\n${output.stderr}`);
};
const fixture = (html) => ['data:text/html,' + encodeURIComponent(html)];
const page = (color = '#111') => `<style>:focus-visible{outline:2px solid ${color}}</style><a href="#main">Skip to content</a><main id="main"><button>Continue</button></main>`;

await check('focus', fixture(page()), 0);
await check('focus', fixture(page('#eee')), 1);
// Distinct DOM nodes may have identical labels, classes and destinations.
await check('focus', fixture('<style>:focus-visible{outline:2px solid #111}main a:last-child:focus-visible{outline-color:#eee}</style><a href="#main">Skip to content</a><main id="main"><a href="#x">Repeated</a><a href="#x">Repeated</a></main>'), 1);
await check('focus', fixture('<style>:focus-visible{outline:2px solid #111}</style><a href="#main">Skip to content</a><main id="main">' + Array.from({ length: 81 }, (_, i) => `<button>Control ${i}</button>`).join('') + '</main>'), 1);
await check('focus', fixture('<main>No keyboard controls</main>'), 1);
await check('focus', fixture('<style>:focus-visible{outline:2px solid #111}</style><a href="#main">Skip to content</a><main id="main"><button id="middle">Middle</button><button id="last">Last</button></main><script>document.addEventListener("keydown",e=>{if(e.key==="Tab"&&document.activeElement.id==="last"){e.preventDefault();document.getElementById("middle").focus()}})</script>'), 1);
// A button's own dark brand fill must not set a white ring on surrounding white.
const css = readFileSync(`${root}style.css`, 'utf8');
await check('focus', fixture(`<style>${css}:root{--wp--preset--color--paper:#fff;--wp--preset--color--ink:#16213e;--wp--preset--color--primary:#003366;--wp--preset--color--on-primary:#fff}.has-primary-background-color{background:#003366;color:#fff}</style><a href="#main">Skip to content</a><main id="main"><button class="has-primary-background-color">Continue</button></main>`), 0);
await check('motion', fixture('<style>div{animation:move 1s infinite}@keyframes move{to{transform:translateX(10px)}}</style><div>Motion</div>'), 1);
await check('motion', fixture('<style>div{transition:color 1s}</style><div>Color fade</div>'), 0);
await check('motion', [], 2);
await check('weight', [], 2);

const server = createServer((request, response) => {
  if (request.url.includes('.css')) {
    const size = 30 * 1024 + (request.url.includes('over') ? 1 : 0);
    response.setHeader('Content-Type', 'text/css');
    response.end('/*' + ' '.repeat(size - 4) + '*/');
  } else {
    response.setHeader('Content-Type', 'text/html');
    response.end(`<link rel="stylesheet" href="/wp-content/themes/agile-base/style.css${request.url.includes('over') ? '?over' : ''}"><p>Budget fixture</p>`);
  }
});
await new Promise((resolve) => server.listen(0, '127.0.0.1', resolve));
try {
  const base = `http://127.0.0.1:${server.address().port}`;
  await check('weight', [base], 0);
  await check('weight', [`${base}/over`], 1);
} finally {
  await new Promise((resolve) => server.close(resolve));
}
console.log('QA tool regression checks passed');
