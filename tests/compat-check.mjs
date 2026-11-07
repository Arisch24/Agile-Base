// Compatibility contract for sites updating from 1.x (roadmap spec §3). Saved
// content, Site Editor customizations and pages built from 1.x patterns refer
// to these names, so they must keep working through the 2.0 redesign. Values
// and looks may change; the names may not disappear.
import assert from 'node:assert/strict';
import { existsSync, readFileSync } from 'node:fs';
import { fileURLToPath } from 'node:url';

const ROOT = fileURLToPath(new URL('..', import.meta.url));
const read = (file) => readFileSync(`${ROOT}${file}`, 'utf8');
const exists = (file) => existsSync(`${ROOT}${file}`);
const themeJson = JSON.parse(read('theme.json'));
const legacy = exists('assets/styles/legacy-presets.css') ? read('assets/styles/legacy-presets.css') : '';
const kebab = (slug) => slug.replace(/([a-z])([0-9])/g, '$1-$2').replace(/([0-9])([a-z])/g, '$1-$2');
const functions = read('functions.php').replace(/\/\*[\s\S]*?\*\/|^[ \t]*\/\/.*$/gm, '');
const legacyFrontend = /wp_enqueue_style\(\s*'[^']+'\s*,\s*get_theme_file_uri\(\s*'assets\/styles\/legacy-presets\.css'\s*\)/.test(functions);
const legacyEditor = /add_editor_style\(\s*array\([^)]*'assets\/styles\/legacy-presets\.css'/.test(functions);
const legacyDelivered = legacyFrontend && legacyEditor;

// Only style.css and a legacy stylesheet loaded in both contexts can style
// arbitrary saved content. Block-specific stylesheets are not global.
const css = [read('style.css'), ...(legacy && legacyDelivered ? [legacy] : [])]
  .join('\n').replace(/\/\*[\s\S]*?\*\//g, '');
const rules = [...css.matchAll(/([^{}]+)\{([^{}]*)\}/g)].map(([, selector, body]) => ({ selector, body }));
const legacyRules = [...legacy.replace(/\/\*[\s\S]*?\*\//g, '').matchAll(/([^{}]+)\{([^{}]*)\}/g)]
  .map(([, selector, body]) => ({ selector, body }));
const hasDeclaration = (body, property) => body.split(';').some((entry) => {
  const colon = entry.indexOf(':');
  return colon !== -1 && entry.slice(0, colon).trim() === property &&
    Boolean(entry.slice(colon + 1).trim().replace(/\s*!important\s*$/, '').trim());
});
const hasRule = (source, selector, property) => source.some((rule) =>
  selector.test(rule.selector) && (property ? hasDeclaration(rule.body, property) : /[\w-]+\s*:\s*\S/.test(rule.body)));
const fallback = (slug, kind, selector, property) => {
  assert.ok(legacyDelivered, `${kind} ${slug} left theme.json, so legacy-presets.css must load on the front end and in the editor`);
  assert.ok(hasRule(legacyRules, selector, property), `${kind} ${slug} left theme.json, so legacy-presets.css needs a nonempty ${property} declaration`);
};

// §3.1 Pattern slugs.
const PATTERNS = [
  'call-to-action', 'comments', 'faq', 'features', 'hero', 'hidden-404', 'hidden-blog-heading',
  'hidden-footer-columns', 'hidden-footer-credit', 'hidden-no-results', 'hidden-post-header', 'logos',
  'page-about', 'page-contact', 'page-home', 'page-pricing', 'page-services', 'page-team', 'posts-list',
  'pricing', 'stats', 'style-guide', 'team', 'template-404-search', 'template-archive-list', 'testimonial',
];
for (const slug of PATTERNS) {
  assert.ok(exists(`patterns/${slug}.php`), `pattern agile-base/${slug} must stay registered`);
  assert.match(read(`patterns/${slug}.php`), new RegExp(`^ \\* Slug: agile-base/${slug}$`, 'm'));
}

// §3.2 Templates, template parts and custom templates.
const TEMPLATES = ['404', 'archive', 'author', 'front-page', 'home', 'index', 'page-blank', 'page-full-width', 'page-no-title', 'page', 'search', 'single-wide', 'single'];
const PARTS = ['header', 'header-centered', 'header-minimal', 'footer', 'footer-columns'];
const CUSTOM_TEMPLATES = ['page-no-title', 'page-full-width', 'single-wide', 'page-blank'];
for (const slug of TEMPLATES) assert.ok(exists(`templates/${slug}.html`), `template ${slug} must stay`);
for (const slug of PARTS) {
  assert.ok(exists(`parts/${slug}.html`), `template part ${slug} must stay`);
  assert.ok(themeJson.templateParts.some((p) => p.name === slug), `theme.json must keep templatePart ${slug}`);
}
for (const name of CUSTOM_TEMPLATES) {
  assert.ok(themeJson.customTemplates.some((t) => t.name === name), `theme.json must keep customTemplate ${name}`);
}

// §3.3 Classes that 1.x patterns put into saved content keep a CSS rule.
const CLASSES = [
  'post-card', 'agile-base-author', 'agile-base-author__bio', 'agile-base-author__text', 'agile-base-avatar',
  'agile-base-band', 'agile-base-eyebrow', 'agile-base-faq', 'agile-base-feature-icon', 'agile-base-list-item',
  'agile-base-mark', 'agile-base-marquee', 'agile-base-marquee__track', 'agile-base-meta', 'agile-base-postnav',
  'agile-base-quote', 'agile-base-scale-bar', 'agile-base-stat-number', 'agile-base-swatch',
  'agile-base-swatch-item', 'agile-base-swatch-label', 'agile-base-testimonial', 'agile-base-type-row',
  'agile-base-type-scale',
];
for (const name of CLASSES) {
  assert.ok(hasRule(rules, new RegExp(`\\.${name}(?![\\w-])`)), `.${name} must keep a CSS rule (1.x content uses it)`);
}

// §3.4 Preset slugs still resolve, from theme.json or from legacy-presets.css.
const COLORS = [
  'black', 'black-light', 'black-ultra-light', 'black-dark', 'black-ultra-dark', 'white',
  'primary', 'primary-light', 'primary-ultra-light', 'primary-dark', 'primary-ultra-dark',
  'secondary', 'secondary-light', 'secondary-ultra-light', 'secondary-dark', 'secondary-ultra-dark',
  'accent', 'accent-light', 'accent-ultra-light', 'accent-dark', 'accent-ultra-dark', 'paper', 'ink', 'surface',
];
const FONT_SIZES = ['x-small', 'small', 'medium', 'large', 'x-large', '2x-large', '3x-large', '4x-large', '5x-large'];
const SPACING = ['x-small', 'small', 'medium', 'large', 'x-large', '2x-large', '3x-large'];
const palette = new Set(themeJson.settings.color.palette.map((c) => c.slug));
const fontSizes = new Set(themeJson.settings.typography.fontSizes.map((f) => f.slug));
const spacing = new Set(themeJson.settings.spacing.spacingSizes.map((s) => s.slug));
for (const slug of COLORS) {
  if (palette.has(slug)) continue;
  fallback(slug, 'color', /(?:^|,)\s*:root\s*(?:,|$)/, `--wp--preset--color--${slug}`);
  for (const [suffix, property] of [['color', 'color'], ['background-color', 'background-color'], ['border-color', 'border-color']])
    fallback(slug, 'color', new RegExp(`\\.has-${slug}-${suffix}(?![\\w-])`), property);
}
for (const slug of FONT_SIZES) {
  if (fontSizes.has(slug)) continue;
  fallback(slug, 'font size', /(?:^|,)\s*:root\s*(?:,|$)/, `--wp--preset--font-size--${kebab(slug)}`);
  fallback(slug, 'font size', new RegExp(`\\.has-${kebab(slug)}-font-size(?![\\w-])`), 'font-size');
}
for (const slug of SPACING) {
  if (spacing.has(slug)) continue;
  fallback(slug, 'spacing', /(?:^|,)\s*:root\s*(?:,|$)/, `--wp--preset--spacing--${kebab(slug)}`);
}

// §3.5 Block style names and the pattern category.
const tagsStyleCalls = [...functions.matchAll(/register_block_style\(\s*'core\/post-terms'\s*,\s*array\(([\s\S]*?)\)\s*\);/g)]
  .map(([, options]) => options);
for (const name of ['pill', 'plain'])
  assert.ok(tagsStyleCalls.some((options) => new RegExp(`'name'\\s*=>\\s*'${name}'`).test(options)), `Tags block style "${name}" must stay`);
assert.match(functions, /register_block_pattern_category\(\s*'agile-base'/, 'pattern category agile-base must stay');

console.log('compat checks passed');
