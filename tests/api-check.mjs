// The 2.x public API (spec §3.2), frozen by bin/freeze-api.mjs from the 2.0.0 tree.
// Site builders build client sites and child themes on these names: within 2.x they may
// be added to and restyled, never renamed or removed. Regenerate only to add names.
import assert from 'node:assert/strict';
import { existsSync, readFileSync, readdirSync } from 'node:fs';
import { fileURLToPath } from 'node:url';

const API = {
  patterns: ["about-founder","author-bio","call-to-action","case-studies","comments","contact-details","cta-banner","faq","features","guarantees","hero-cover","hero-split","hero","hidden-404","hidden-blog-heading","hidden-footer-business","hidden-footer-columns","hidden-footer-credit","hidden-header-centered","hidden-header-cta","hidden-header-minimal","hidden-header","hidden-home-freelancer","hidden-home-hero","hidden-home-local-business","hidden-landing-cta","hidden-landing-offer","hidden-no-results","hidden-post-header","hidden-post-navigation","logos","page-about","page-case-study","page-contact","page-home","page-landing-content","page-legal","page-portfolio","page-pricing","page-service","page-services","page-team","page-thank-you","posts-compact","posts-grid","posts-list","pricing","services-grid","services-list","stats","steps","style-guide","subscribe","team","template-404-search","template-archive-list","template-front-page-agency","template-front-page-freelancer","template-front-page-local-business","testimonial","testimonials-grid","text-image"],
  templates: ["404","archive","author","front-page","home","index","page-blank","page-full-width","page-landing","page-no-title","page","search","single-wide","single"],
  parts: ["footer-business","footer-columns","footer","header-centered","header-cta","header-minimal","header"],
  templateParts: ["footer","footer-business","footer-columns","header","header-centered","header-cta","header-minimal"],
  customTemplates: ["page-blank","page-full-width","page-landing","page-no-title","single-wide"],
  palette: ["accent","black","ink","on-primary","paper","primary","secondary","surface","white"],
  fontSizes: ["2x-large","3x-large","4x-large","5x-large","large","medium","small","x-large","x-small"],
  spacing: ["2x-large","3x-large","large","medium","small","x-large","x-small"],
  shadows: ["card","large","medium","small"],
  fontFamilies: ["body","display","mono","system-sans-serif"],
  customTokens: ["font.body","font.display","font.mono","fontWeight.black","fontWeight.bold","fontWeight.extraBold","fontWeight.extraLight","fontWeight.light","fontWeight.medium","fontWeight.regular","fontWeight.semiBold","fontWeight.thin","gap.2-x-large","gap.3-x-large","gap.large","gap.medium","gap.small","gap.x-large","gap.x-small","lineHeight.body","lineHeight.heading","lineHeight.one","motion.base","motion.fast","motion.slow","motion.slower","radius.bar","radius.card","radius.icon","radius.panel","radius.pill","radius.round"],
  styleFiles: ["styles/dark.json","styles/velocity.json","styles/colors/contrast.json","styles/colors/harbour.json","styles/colors/terracotta.json","styles/typography/classic.json","styles/typography/friendly.json","styles/typography/system.json"],
  sectionStyles: ["section-field","section-ink","section-ruled"],
  blockStyles: ["boxed","double-rule","ruled"],
  phpBlockStyles: ["pill","plain"],
  classes: ["agile-base-author","agile-base-author-bio","agile-base-author__text","agile-base-avatar","agile-base-faq","agile-base-field","agile-base-header-actions","agile-base-header-cta","agile-base-list-item","agile-base-media","agile-base-meta","agile-base-postmeta","agile-base-postnav","agile-base-posts-grid","agile-base-quote","agile-base-reason","agile-base-ruled","agile-base-scale-bar","agile-base-service","agile-base-stat-number","agile-base-step","agile-base-swatch","agile-base-swatch-item","agile-base-swatch-label","agile-base-testimonial","agile-base-type-row","agile-base-type-scale"],
};

const root = fileURLToPath(new URL('..', import.meta.url));
const read = (file) => readFileSync(`${root}${file}`, 'utf8');
const list = (dir, ext) => (existsSync(`${root}${dir}`) ? readdirSync(`${root}${dir}`).filter((f) => f.endsWith(ext)) : []);
const theme = JSON.parse(read('theme.json'));
const has = (kind, present, names) => {
  for (const name of names) assert.ok(present.includes(name), `${kind} "${name}" is public API (spec §3.2): restyle it, never rename or remove it`);
};
const flatten = (object, prefix = '') => Object.entries(object).flatMap(([key, value]) =>
  value && typeof value === 'object' && !Array.isArray(value) ? flatten(value, `${prefix}${key}.`) : [`${prefix}${key}`]);

has('pattern', list('patterns', '.php').map((f) => (read(`patterns/${f}`).match(/^ \* Slug: agile-base\/(.+)$/m) || [])[1]), API.patterns);
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
has('style file', API.styleFiles.filter((file) => existsSync(`${root}${file}`)), API.styleFiles);
has('section style', list('styles/sections', '.json').map((f) => JSON.parse(read(`styles/sections/${f}`)).slug), API.sectionStyles);
has('block style variation', list('styles/blocks', '.json').map((f) => JSON.parse(read(`styles/blocks/${f}`)).slug), API.blockStyles);
has('block style', [...read('functions.php').matchAll(/'name'\s*=>\s*'([a-z0-9-]+)'/g)].map((m) => m[1]), API.phpBlockStyles);
const css = ['style.css', ...list('assets/styles', '.css').map((f) => `assets/styles/${f}`)].map(read).join('\n');
has('CSS class with a rule', API.classes.filter((name) => new RegExp(`\\.${name}(?![\\w-])`).test(css)), API.classes);

console.log('api checks passed');
