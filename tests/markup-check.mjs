// Structural checks on every block template, template part and pattern: the
// markup traps that make the Site Editor report "Block contains unexpected or
// invalid content", broken references, unknown presets, classes without CSS,
// and text that can't be translated. Runs without WordPress, so CI runs it.
import { existsSync, readFileSync, readdirSync } from 'node:fs';
import { basename } from 'node:path';
import { fileURLToPath } from 'node:url';

const ROOT = fileURLToPath(new URL('..', import.meta.url));
const read = (file) => readFileSync(`${ROOT}${file}`, 'utf8');
const list = (dir, ext) =>
  existsSync(`${ROOT}${dir}`)
    ? readdirSync(`${ROOT}${dir}`).filter((f) => f.endsWith(ext)).sort().map((f) => `${dir}/${f}`)
    : [];

// Folders holding pattern files. 2.1 adds inc/woocommerce-patterns.
const PATTERN_DIRS = ['patterns'];
const patterns = PATTERN_DIRS.flatMap((dir) => list(dir, '.php'));
const templates = list('templates', '.html');
const parts = list('parts', '.html');
const markupFiles = [...patterns, ...templates, ...parts];
const withoutPhp = (source) => source.replace(/<\?php[\s\S]*?\?>/g, 'PHP');

const themeJson = JSON.parse(read('theme.json'));
const css = ['style.css', ...list('assets/styles', '.css')].map(read).join('\n');
const failures = [];
const fail = (file, message) => failures.push(`${file}: ${message}`);

// 1. Block comments are balanced and their attributes are valid JSON.
const BLOCK = /<!--\s+(\/)?wp:([a-z0-9-]+(?:\/[a-z0-9-]+)?)(?:\s+(\{[\s\S]*?\}))?\s+(\/)?-->/g;
for (const file of markupFiles) {
  const open = [];
  for (const [, closing, name, json, selfClosing] of withoutPhp(read(file)).matchAll(BLOCK)) {
    if (json) {
      try {
        JSON.parse(json);
      } catch {
        fail(file, `invalid JSON in wp:${name}`);
      }
    }
    if (selfClosing) continue;
    if (!closing) open.push(name);
    else if (open.pop() !== name) fail(file, `/wp:${name} closes the wrong block`);
  }
  if (open.length) fail(file, `unclosed blocks: ${open.join(', ')}`);
}

// 2. Markup the editor would save differently, so it shows "invalid content".
for (const file of markupFiles) {
  const source = read(file);
  for (const [, style] of source.matchAll(/style="([^"]*)"/g)) {
    if (/(^|;)\s*(padding|margin):/.test(style)) fail(file, `shorthand in style="${style}" (the editor saves padding-top/-right/-bottom/-left)`);
  }
  if (/wp-block-button__link[^"]*has-[a-z0-9-]+-border-color/.test(source)) fail(file, 'button border color as a class (the editor saves it inline)');
  if (/wp:post-author(?![-\w])/.test(source)) fail(file, 'core/post-author is deprecated; use Avatar + Post Author Name');
}

// 3. Each template has exactly one <main>.
for (const file of templates) {
  const mains = (read(file).match(/"tagName":"main"/g) || []).length;
  if (mains !== 1) fail(file, `${mains} <main> groups (expected 1)`);
}

// 4. Pattern headers are complete, and every referenced pattern exists.
const slugs = new Set();
for (const file of patterns) {
  const source = read(file);
  const slug = (source.match(/^ \* Slug: (.+)$/m) || [])[1];
  if (!/^ \* Title: .+$/m.test(source)) fail(file, 'no Title header');
  if (slug !== `agile-base/${basename(file, '.php')}`) fail(file, `Slug "${slug}" does not match the file name`);
  if (!/if \( ! defined\( 'ABSPATH' \) \) \{\s*exit;\s*\}/.test(source)) fail(file, 'no ABSPATH guard');
  slugs.add(slug);
}
for (const file of markupFiles) {
  for (const [, slug] of read(file).matchAll(/wp:pattern \{"slug":"([^"]+)"\}/g)) {
    if (!slugs.has(slug)) fail(file, `references missing pattern ${slug}`);
  }
}

// 5. Preset slugs used in markup exist in theme.json. Markup spells "2x-large" as "2-x-large".
const kebab = (slug) => slug.replace(/([a-z])([0-9])/g, '$1-$2').replace(/([0-9])([a-z])/g, '$1-$2');
// 1.x shades that left the picker still resolve through assets/styles/legacy-presets.css.
const legacyColors = [...read('assets/styles/legacy-presets.css').matchAll(/^\s*--wp--preset--color--([a-z0-9-]+):/gm)].map((m) => m[1]);
const colors = new Set([...themeJson.settings.color.palette.map((c) => c.slug), ...legacyColors]);
const fontSizes = new Set(themeJson.settings.typography.fontSizes.map((f) => kebab(f.slug)));
const spacing = new Set(themeJson.settings.spacing.spacingSizes.map((s) => kebab(s.slug)));
for (const file of markupFiles) {
  const source = read(file);
  for (const [, slug] of source.matchAll(/"(?:textColor|backgroundColor|borderColor)":"([a-z0-9-]+)"/g)) {
    if (!colors.has(slug)) fail(file, `unknown color "${slug}"`);
  }
  for (const [, a, b] of source.matchAll(/var:preset\|color\|([a-z0-9-]+)|--wp--preset--color--([a-z0-9-]+)/g)) {
    if (!colors.has(a || b)) fail(file, `unknown color "${a || b}"`);
  }
  for (const [, slug] of source.matchAll(/"fontSize":"([a-z0-9-]+)"/g)) {
    if (!fontSizes.has(slug)) fail(file, `unknown font size "${slug}"`);
  }
  for (const [, a, b] of source.matchAll(/var:preset\|spacing\|([a-z0-9-]+)|--wp--preset--spacing--([a-z0-9-]+)/g)) {
    if (!spacing.has(a || b)) fail(file, `unknown spacing "${a || b}"`);
  }
}

// 6. Every theme class used in markup has a CSS rule.
for (const file of markupFiles) {
  for (const [, classes] of read(file).matchAll(/class="([^"]*)"/g)) {
    for (const name of classes.split(/\s+/).filter((c) => /^agile-base-|^post-card$/.test(c))) {
      if (!new RegExp(`\\.${name}(?![\\w-])`).test(css)) fail(file, `.${name} has no CSS rule`);
    }
  }
}

// 7. Visible text is translatable: patterns print it with esc_html_e() and
//    friends. Templates and parts can't run PHP, so text they need lives in a
//    hidden pattern. Covers text between tags, and the block and HTML attributes
//    that visitors or screen readers get.
const TEXT_ATTRIBUTE = /"(?:label|buttonText|placeholder|ariaLabel|content|moreText)":"([^"]*)"|\s(?:alt|placeholder|aria-label|title)="([^"]*)"/g;
const hasWords = (text) => /[A-Za-z]{2}/.test(text.replace(/&[a-zA-Z]+;|&#\d+;/g, ' '));
for (const file of markupFiles) {
  const plain = read(file).replace(/<\?php[\s\S]*?\?>/g, '');
  const texts = [
    ...[...plain.replace(/<!--[\s\S]*?-->/g, '').matchAll(/>([^<]+)</g)].map(([, text]) => text.trim()),
    ...[...plain.matchAll(TEXT_ATTRIBUTE)].map(([, a, b]) => a ?? b),
  ];
  for (const text of texts.filter(hasWords)) {
    fail(file, file.startsWith('patterns/')
      ? `"${text}" is not translatable (print it with esc_html_e() or esc_attr_x())`
      : `"${text}" can't be translated in a template or part (move it into a hidden pattern)`);
  }
}

// 8. Style variations and section styles are valid theme.json version 3.
for (const file of [...list('styles', '.json'), ...list('styles/sections', '.json'), ...list('styles/colors', '.json'), ...list('styles/typography', '.json'), ...list('styles/blocks', '.json')]) {
  try {
    if (JSON.parse(read(file)).version !== 3) fail(file, 'not theme.json version 3');
  } catch {
    fail(file, 'invalid JSON');
  }
}

if (failures.length) {
  console.error(failures.join('\n'));
  console.error(`${failures.length} markup check failure(s)`);
  process.exit(1);
}
console.log('markup checks passed');
