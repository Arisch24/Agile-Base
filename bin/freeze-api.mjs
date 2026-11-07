#!/usr/bin/env node
/**
 * Write tests/api-check.mjs: the 2.x public API (spec §3.2) frozen as literal lists
 * from the current tree. Site builders build client sites and child themes on these
 * names, so within a major version they may be added to, never renamed or removed.
 * Run it once at 2.0.0, and again at each 2.x release to add that release's names.
 * Before replacing the file, run the previous one against the new tree: it must pass.
 *
 * Usage: node bin/freeze-api.mjs [output path]   (default tests/api-check.mjs)
 */
import { existsSync, readFileSync, readdirSync, writeFileSync } from 'node:fs';
import { basename } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = fileURLToPath(new URL('..', import.meta.url));
const out = process.argv[2] || `${root}tests/api-check.mjs`;
const read = (file) => readFileSync(`${root}${file}`, 'utf8');
const list = (dir, ext) => (existsSync(`${root}${dir}`) ? readdirSync(`${root}${dir}`).filter((f) => f.endsWith(ext)).sort() : []);
const theme = JSON.parse(read('theme.json'));
const flatten = (object, prefix = '') => Object.entries(object).flatMap(([key, value]) =>
  value && typeof value === 'object' && !Array.isArray(value) ? flatten(value, `${prefix}${key}.`) : [`${prefix}${key}`]);
const markup = [...list('patterns', '.php').map((f) => `patterns/${f}`), ...list('templates', '.html').map((f) => `templates/${f}`), ...list('parts', '.html').map((f) => `parts/${f}`)];

const api = {
  patterns: list('patterns', '.php').map((f) => read(`patterns/${f}`).match(/^ \* Slug: agile-base\/(.+)$/m)[1]),
  templates: list('templates', '.html').map((f) => basename(f, '.html')),
  parts: list('parts', '.html').map((f) => basename(f, '.html')),
  templateParts: theme.templateParts.map((p) => p.name).sort(),
  customTemplates: theme.customTemplates.map((t) => t.name).sort(),
  palette: theme.settings.color.palette.map((c) => c.slug).sort(),
  fontSizes: theme.settings.typography.fontSizes.map((f) => f.slug).sort(),
  spacing: theme.settings.spacing.spacingSizes.map((s) => s.slug).sort(),
  shadows: (theme.settings.shadow?.presets ?? []).map((s) => s.slug).sort(),
  fontFamilies: theme.settings.typography.fontFamilies.map((f) => f.slug).sort(),
  customTokens: flatten(theme.settings.custom).sort(),
  styleFiles: ['styles', 'styles/colors', 'styles/typography'].flatMap((dir) => list(dir, '.json').map((f) => `${dir}/${f}`)),
  sectionStyles: list('styles/sections', '.json').map((f) => JSON.parse(read(`styles/sections/${f}`)).slug).sort(),
  blockStyles: list('styles/blocks', '.json').map((f) => JSON.parse(read(`styles/blocks/${f}`)).slug).sort(),
  phpBlockStyles: [...read('functions.php').matchAll(/'name'\s*=>\s*'([a-z0-9-]+)'/g)].map((m) => m[1]).sort(),
  classes: [...new Set(markup.flatMap((file) => [...read(file).matchAll(/class="([^"]*)"/g)]
    .flatMap(([, classes]) => classes.split(/\s+/).filter((c) => /^agile-base-[a-z0-9_-]+$/.test(c)))))].sort(),
};

const lists = Object.entries(api).map(([name, values]) => `  ${name}: ${JSON.stringify(values)},`).join('\n');
writeFileSync(out, `// The 2.x public API (spec §3.2), frozen by bin/freeze-api.mjs from the 2.0.0 tree.
// Site builders build client sites and child themes on these names: within 2.x they may
// be added to and restyled, never renamed or removed. Regenerate only to add names.
import assert from 'node:assert/strict';
import { existsSync, readFileSync, readdirSync } from 'node:fs';
import { fileURLToPath } from 'node:url';

const API = {
${lists}
};

const root = fileURLToPath(new URL('..', import.meta.url));
const read = (file) => readFileSync(\`\${root}\${file}\`, 'utf8');
const list = (dir, ext) => (existsSync(\`\${root}\${dir}\`) ? readdirSync(\`\${root}\${dir}\`).filter((f) => f.endsWith(ext)) : []);
const theme = JSON.parse(read('theme.json'));
const has = (kind, present, names) => {
  for (const name of names) assert.ok(present.includes(name), \`\${kind} "\${name}" is public API (spec §3.2): restyle it, never rename or remove it\`);
};
const flatten = (object, prefix = '') => Object.entries(object).flatMap(([key, value]) =>
  value && typeof value === 'object' && !Array.isArray(value) ? flatten(value, \`\${prefix}\${key}.\`) : [\`\${prefix}\${key}\`]);

has('pattern', list('patterns', '.php').map((f) => (read(\`patterns/\${f}\`).match(/^ \\* Slug: agile-base\\/(.+)$/m) || [])[1]), API.patterns);
has('template', list('templates', '.html').map((f) => f.slice(0, -5)), API.templates);
has('template part file', list('parts', '.html').map((f) => f.slice(0, -5)), API.parts);
has('template part', theme.templateParts.map((p) => p.name), API.templateParts);
has('custom template', theme.customTemplates.map((t) => t.name), API.customTemplates);
has('palette color', theme.settings.color.palette.map((c) => c.slug), API.palette);
has('font size', theme.settings.typography.fontSizes.map((f) => f.slug), API.fontSizes);
has('spacing size', theme.settings.spacing.spacingSizes.map((s) => s.slug), API.spacing);
has('shadow', (theme.settings.shadow?.presets ?? []).map((s) => s.slug), API.shadows);
has('font family', theme.settings.typography.fontFamilies.map((f) => f.slug), API.fontFamilies);
has('custom token', flatten(theme.settings.custom), API.customTokens);
has('style file', API.styleFiles.filter((file) => existsSync(\`\${root}\${file}\`)), API.styleFiles);
has('section style', list('styles/sections', '.json').map((f) => JSON.parse(read(\`styles/sections/\${f}\`)).slug), API.sectionStyles);
has('block style variation', list('styles/blocks', '.json').map((f) => JSON.parse(read(\`styles/blocks/\${f}\`)).slug), API.blockStyles);
has('block style', [...read('functions.php').matchAll(/'name'\\s*=>\\s*'([a-z0-9-]+)'/g)].map((m) => m[1]), API.phpBlockStyles);
const css = ['style.css', ...list('assets/styles', '.css').map((f) => \`assets/styles/\${f}\`)].map(read).join('\\n');
has('CSS class with a rule', API.classes.filter((name) => new RegExp(\`\\\\.\${name}(?![\\\\w-])\`).test(css)), API.classes);

console.log('api checks passed');
`);
console.log(`Wrote ${out}: ${Object.entries(api).map(([name, values]) => `${values.length} ${name}`).join(', ')}.`);
