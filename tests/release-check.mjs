import assert from 'node:assert/strict';
import { readFileSync, existsSync, readdirSync } from 'node:fs';

const read = (file) => readFileSync(new URL(`../${file}`, import.meta.url), 'utf8');

const style = read('style.css');
const readme = read('readme.txt');
const functions = read('functions.php');
const frontPage = read('templates/front-page.html');
const noTitle = read('templates/page-no-title.html');
const notFound = read('templates/404.html');
const hero = read('patterns/hero.php');
const callToAction = read('patterns/call-to-action.php');
const styleGuide = read('patterns/style-guide.php');
const stylesheet = read('style.css');
const attributes = read('.gitattributes');
const homeTemplate = read('templates/home.html');
const archiveTemplate = read('templates/archive.html');
const searchTemplate = read('templates/search.html');
const footer = read('parts/footer.html');

assert.match(style, /^Requires at least: 6\.6$/m);
assert.match(style, /^Tested up to: 7\.1$/m);
assert.match(readme, /^Requires at least: 6\.6$/m);
assert.match(readme, /^Tested up to: 7\.1$/m);

assert.match(frontPage, /agile-base\/page-home/);
assert.doesNotMatch(frontPage, /wp:post-content/);
assert.match(noTitle, /wp:post-title[^\n]+"level":1[^\n]+screen-reader-text/);
assert.match(notFound, /agile-base\/hidden-404/);
assert.doesNotMatch(notFound, /href="\/"/);

assert.doesNotMatch(hero, /<a(?![^>]*href=)/);
assert.doesNotMatch(callToAction, /<a(?![^>]*href=)/);
assert.doesNotMatch(styleGuide, /<a(?![^>]*href=)/);
assert.doesNotMatch(hero, /11 block patterns/);
assert.doesNotMatch(stylesheet, /animation:\s*agile-base-marquee/);
assert.doesNotMatch(stylesheet, /will-change:\s*transform/);

assert.doesNotMatch(functions, /agile_base_disable_emojis/);
assert.doesNotMatch(functions, /render_block_core\/post-featured-image/);

for (const [source, authoredText] of [
  [homeTemplate, /The blog|Latest posts/],
  [archiveTemplate, />Archive</],
  [searchTemplate, />Search</],
  [footer, /Proudly powered by/],
]) {
  assert.doesNotMatch(source, authoredText);
}

for (const file of [
  'assets/fonts/OFL-Figtree.txt',
  'assets/fonts/OFL-Space-Grotesk.txt',
  'assets/fonts/OFL-Space-Mono.txt',
]) {
  assert.equal(existsSync(new URL(`../${file}`, import.meta.url)), true, `${file} must exist`);
}

for (const resource of ['Figtree', 'Space Grotesk', 'Space Mono', 'logo mark', 'screenshot']) {
  assert.match(readme, new RegExp(resource, 'i'));
}

for (const excluded of [
  '/.agents export-ignore',
  '/.claude export-ignore',
  '/.codex export-ignore',
  '/bin export-ignore',
  '/composer.json export-ignore',
  '/composer.lock export-ignore',
  '/docs export-ignore',
  '/phpcs.xml.dist export-ignore',
  '/tests export-ignore',
  '/todo.txt export-ignore',
]) {
  assert.match(attributes, new RegExp(excluded.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')));
}

// Phase 1: shared post header.
const postHeader = read('patterns/hidden-post-header.php');
const singleTemplate = read('templates/single.html');
assert.match(postHeader, /^ \* Slug: agile-base\/hidden-post-header$/m);
assert.match(postHeader, /^ \* Inserter: no$/m);
assert.match(postHeader, /wp:avatar/);
assert.match(postHeader, /wp:post-author-name/);
assert.match(postHeader, /wp:post-title \{[^\n]*"level":1/);
assert.doesNotMatch(postHeader, /wp:post-author(?![-\w])/);
assert.match(singleTemplate, /"slug":"agile-base\/hidden-post-header"/);
assert.match(singleTemplate, /"slug":"agile-base\/hidden-post-navigation"/);
assert.match(read('templates/single-wide.html'), /"slug":"agile-base\/hidden-post-navigation"/);
assert.match(read('patterns/hidden-post-navigation.php'), /"className":"agile-base-postnav"/);
assert.doesNotMatch(singleTemplate, /wp:post-author(?![-\w])/);
assert.doesNotMatch(singleTemplate, /wp:post-title/);

// Phase 1: Post (Wide).
const themeJson = JSON.parse(read('theme.json'));
const customTemplate = (name) => themeJson.customTemplates.find((t) => t.name === name);
const singleWide = read('templates/single-wide.html');
assert.match(singleWide, /"slug":"agile-base\/hidden-post-header"/);
assert.match(singleWide, /"tagName":"main"[^\n]*"contentSize":"var\(--wp--style--global--wide-size\)"/);
assert.match(singleWide, /wp:post-content \{[^\n]*"contentSize":"var\(--wp--style--global--wide-size\)"/);
assert.match(singleWide, /"slug":"agile-base\/comments"/);
assert.match(singleWide, /<!-- wp:post-terms \{"term":"post_tag","style":\{"spacing":\{"margin":\{"top":"var:preset\|spacing\|medium"\}\}\}\} \/-->/);
assert.doesNotMatch(singleWide, /agile-base-tags/);
assert.deepEqual(customTemplate('single-wide'), { name: 'single-wide', title: 'Post (Wide)', postTypes: ['post'] });

// Phase 1: Blank Canvas.
const blankTemplate = read('templates/page-blank.html');
assert.match(blankTemplate, /<main class="wp-block-group/);
assert.equal(blankTemplate.match(/<main\b/g).length, 1);
assert.doesNotMatch(blankTemplate, /wp:template-part/);
assert.match(blankTemplate, /wp:post-content \{[^\n]*"align":"full"/);
assert.deepEqual(customTemplate('page-blank'), { name: 'page-blank', title: 'Blank Canvas', postTypes: ['page'] });

// Phase 1: author archive.
const authorTemplate = read('templates/author.html');
assert.equal(authorTemplate.match(/<main\b/g).length, 1);
assert.match(authorTemplate, /wp:avatar/);
assert.match(authorTemplate, /wp:query-title \{[^\n]*"type":"archive"[^\n]*"showPrefix":false/);
assert.match(authorTemplate, /wp:post-author-biography/);
assert.doesNotMatch(authorTemplate, /wp:post-author(?![-\w])/);
// The header wraps so long names and phones stack instead of overflowing.
assert.match(authorTemplate, /"className":"agile-base-author"[^\n]*"flexWrap":"wrap"/);
assert.match(style, /\.agile-base-author__text \{[^}]*flex: 1 1 20rem;/);
// Every post is by this author, so the cards show the date, not a byline.
const authorLoop = authorTemplate.slice(authorTemplate.indexOf('<!-- wp:post-template'), authorTemplate.indexOf('<!-- /wp:post-template'));
assert.match(authorLoop, /wp:post-date \{[^\n]*"className":"agile-base-meta"/);
assert.doesNotMatch(authorLoop, /wp:avatar|wp:post-author/);
assert.match(authorTemplate, /wp:query \{[^\n]*"inherit":true/);

// Release 1.4.0 ships phases 1-4 together; 1.1.0-1.3.0 were never released.
assert.match(readme, /^= 1\.4\.0 =$/m);
assert.doesNotMatch(readme, /^= 1\.[123]\.0 =$/m);

// Phase 2: no deprecated Post Author block in the posts list.
const RAW_ENGLISH = />\s*[A-Z][a-z]+\s+[a-z]+/;
const postsList = read('patterns/posts-list.php');
assert.doesNotMatch(postsList, /wp:post-author(?![-\w])/);
assert.match(postsList, /wp:avatar \{"size":32/);
assert.match(postsList, /wp:post-author-name/);

// Phase 2: Header (Centered).
const themeJsonParts = JSON.parse(read('theme.json')).templateParts;
const templatePart = (name) => themeJsonParts.find((p) => p.name === name);
// Header markup lives in hidden patterns so the navigation label can be translated.
const PRIMARY_NAV = String.raw`wp:navigation \{"ariaLabel":"<\?php echo esc_attr_x\( 'Primary', 'navigation landmark label', 'agile-base' \); \?>"`;
for (const part of ['header', 'header-centered', 'header-minimal']) {
  assert.equal(read(`parts/${part}.html`).trim(), `<!-- wp:pattern {"slug":"agile-base/hidden-${part}"} /-->`);
  assert.match(read(`patterns/hidden-${part}.php`), /^ \* Inserter: no$/m);
}
const headerCentered = read('patterns/hidden-header-centered.php');
assert.match(headerCentered, /wp:site-logo/);
assert.match(headerCentered, /wp:site-title/);
assert.match(headerCentered, new RegExp(`${PRIMARY_NAV},"overlayMenu":"mobile"[^\\n]*"justifyContent":"center"`));
assert.match(headerCentered, /"orientation":"vertical","justifyContent":"center"/);
assert.deepEqual(templatePart('header-centered'), { name: 'header-centered', title: 'Header (Centered)', area: 'header' });

// Phase 2: Header (Minimal).
const headerMinimal = read('patterns/hidden-header-minimal.php');
assert.doesNotMatch(headerMinimal, /wp:site-logo/);
assert.match(headerMinimal, /wp:site-title/);
assert.match(headerMinimal, new RegExp(`${PRIMARY_NAV},"overlayMenu":"always"`));
assert.match(headerMinimal, /var:preset\|spacing\|x-small/);
assert.deepEqual(templatePart('header-minimal'), { name: 'header-minimal', title: 'Header (Minimal)', area: 'header' });

// Phase 2: Footer (Columns).
const footerColumnsPart = read('parts/footer-columns.html');
const footerColumns = read('patterns/hidden-footer-columns.php');
assert.equal(footerColumnsPart.trim(), '<!-- wp:pattern {"slug":"agile-base/hidden-footer-columns"} /-->');
assert.match(footerColumns, /^ \* Slug: agile-base\/hidden-footer-columns$/m);
assert.match(footerColumns, /^ \* Inserter: no$/m);
assert.match(footerColumns, /wp:navigation \{"ariaLabel":"<\?php echo esc_attr_x\( 'Footer', 'navigation landmark label', 'agile-base' \); \?>"/);
assert.match(footerColumns, /wp:search/);
assert.match(footerColumns, /"slug":"agile-base\/hidden-footer-credit"/);
assert.doesNotMatch(footerColumns, RAW_ENGLISH);
assert.deepEqual(templatePart('footer-columns'), { name: 'footer-columns', title: 'Footer (Columns)', area: 'footer' });

// Phase 3: Team section.
const teamSection = read('patterns/team.php');
assert.match(teamSection, /^ \* Slug: agile-base\/team$/m);
assert.match(teamSection, /^ \* Categories: agile-base, team$/m);
assert.doesNotMatch(teamSection, /^ \* Inserter: no$/m);
assert.equal((teamSection.match(/class="agile-base-avatar"/g) || []).length, 4);
assert.match(teamSection, /"layout":\{"type":"grid","minimumColumnWidth":"14rem"\}/);
assert.doesNotMatch(teamSection, /<h1|"level":1/);
assert.doesNotMatch(teamSection, RAW_ENGLISH);

// Phase 3: Pricing section.
const pricingSection = read('patterns/pricing.php');
assert.match(pricingSection, /^ \* Slug: agile-base\/pricing$/m);
assert.match(pricingSection, /^ \* Categories: agile-base, call-to-action$/m);
assert.equal((pricingSection.match(/<!-- wp:column \{/g) || []).length, 3);
assert.equal((pricingSection.match(/<!-- wp:list -->/g) || []).length, 3);
assert.doesNotMatch(pricingSection, /<a\b/);
assert.doesNotMatch(pricingSection, /<h1|"level":1/);
assert.doesNotMatch(pricingSection, RAW_ENGLISH);

// Phase 3: page starter patterns.
const assertPagePattern = (slug, category) => {
  const source = read(`patterns/${slug}.php`);
  assert.match(source, new RegExp(`^ \\* Slug: agile-base/${slug}$`, 'm'));
  assert.match(source, new RegExp(`^ \\* Categories: agile-base, ${category}$`, 'm'));
  assert.match(source, /^ \* Block Types: core\/post-content$/m);
  assert.match(source, /^ \* Post Types: page$/m);
  assert.match(source, /Page \(Full Width\)/);
  assert.doesNotMatch(source, /<h1|"level":1/);
  assert.doesNotMatch(source, /agile-base\/hero/);
  assert.doesNotMatch(source, /<a(?![^>]*href=)/);
  assert.doesNotMatch(source, RAW_ENGLISH);
  return source;
};
const pageSlugs = (source) => [...source.matchAll(/wp:pattern \{"slug":"agile-base\/([a-z-]+)"\}/g)].map((m) => m[1]);

assert.deepEqual(pageSlugs(assertPagePattern('page-about', 'about')), ['stats', 'team', 'testimonial', 'call-to-action']);
assert.deepEqual(pageSlugs(assertPagePattern('page-team', 'team')), ['team', 'call-to-action']);

assert.deepEqual(pageSlugs(assertPagePattern('page-services', 'services')), ['features', 'testimonial', 'faq', 'call-to-action']);
assert.deepEqual(pageSlugs(assertPagePattern('page-pricing', 'call-to-action')), ['pricing', 'faq', 'call-to-action']);

const pageContact = assertPagePattern('page-contact', 'contact');
assert.deepEqual(pageSlugs(pageContact), ['faq']);
assert.match(pageContact, /href="mailto:hello@example\.com"/);
assert.doesNotMatch(pageContact, /<form|wp:jetpack|contact-form/);

// Phase 4: Archive (List) design.
const archiveList = read('patterns/template-archive-list.php');
assert.match(archiveList, /^ \* Slug: agile-base\/template-archive-list$/m);
assert.match(archiveList, /^ \* Template Types: archive, category, tag, author, date$/m);
assert.match(archiveList, /^ \* Inserter: no$/m);
assert.match(archiveList, /wp:template-part \{"slug":"header","tagName":"header","area":"header"\}/);
assert.match(archiveList, /wp:template-part \{"slug":"footer","tagName":"footer","area":"footer"\}/);
assert.equal(archiveList.match(/<main\b/g).length, 1);
assert.match(archiveList, /wp:query \{[^\n]*"inherit":true/);
assert.match(archiveList, /wp:query-pagination /);
assert.match(archiveList, /"slug":"agile-base\/hidden-no-results"/);
assert.match(archiveList, /className":"agile-base-list-item"/);
assert.doesNotMatch(archiveList, /wp:post-featured-image|wp:post-author(?![-\w])/);
assert.doesNotMatch(archiveList, RAW_ENGLISH);
assert.match(stylesheet, /\.agile-base-list-item \{/);

// Phase 4: 404 (Search First) design.
const notFoundSearch = read('patterns/template-404-search.php');
assert.match(notFoundSearch, /^ \* Slug: agile-base\/template-404-search$/m);
assert.match(notFoundSearch, /^ \* Template Types: 404$/m);
assert.match(notFoundSearch, /^ \* Inserter: no$/m);
assert.match(notFoundSearch, /wp:template-part \{"slug":"header","tagName":"header","area":"header"\}/);
assert.match(notFoundSearch, /wp:template-part \{"slug":"footer","tagName":"footer","area":"footer"\}/);
assert.equal(notFoundSearch.match(/<main\b/g).length, 1);
assert.equal(notFoundSearch.match(/<h1\b/g).length, 1);
assert.match(notFoundSearch, /wp:search /);
assert.match(notFoundSearch, /wp:query \{[^\n]*"perPage":3[^\n]*"inherit":false/);
assert.match(notFoundSearch, /wp:query-no-results/);
assert.match(notFoundSearch, /home_url\( '\/' \)/);
assert.doesNotMatch(notFoundSearch, /href="\/"/);
assert.doesNotMatch(notFoundSearch, RAW_ENGLISH);

// Tag pills: the default look of every tag list (no class needed).
const postTermsCss = read('assets/styles/core-post-terms.css');
const singleTagsTemplate = read('templates/single.html');
const PILL = ':where(.wp-block-post-terms.taxonomy-post_tag:not(.is-style-plain))';
for (const part of ['', ' .wp-block-post-terms__separator', ' a', ' a::before', ' a:hover', ' a:focus-visible']) {
  assert.ok(postTermsCss.includes(PILL + part), `pill selector missing for "${part || 'container'}"`);
}
assert.match(postTermsCss, /:where\(\.wp-block-post-terms\.taxonomy-post_tag:not\(\.is-style-plain\)\) \{[^}]*font-family: var\(--wp--custom--font--mono\);[^}]*font-size: var\(--wp--preset--font-size--small\);/);
assert.match(postTermsCss, /content: "#" \/ "";/);
assert.doesNotMatch(postTermsCss, /agile-base-tags|taxonomy-category|\.single /);
for (const line of postTermsCss.split('\n').filter((l) => /\{\s*$/.test(l) && !l.startsWith('@media'))) {
  assert.match(line.trim(), /^:where\(/, `unwrapped selector: ${line.trim()}`);
}
assert.doesNotMatch(stylesheet, /agile-base-tags/);
assert.match(functions, /wp_enqueue_block_style\(/);
assert.match(functions, /add_editor_style\( array\( 'style\.css', 'assets\/styles\/core-post-terms\.css', 'assets\/styles\/legacy-presets\.css' \) \)/);
assert.match(singleTagsTemplate, /<!-- wp:post-terms \{"term":"post_tag","style":\{"spacing":\{"margin":\{"top":"var:preset\|spacing\|medium"\}\}\}\} \/-->/);
assert.doesNotMatch(singleTagsTemplate, /agile-base-tags/);

// Tag pills: Styles panel options (Pill is the default, Plain opts out).
assert.match(functions, /function agile_base_register_block_styles\(\): void \{/);
assert.match(functions, /'name'\s*=>\s*'pill',\s*'label'\s*=>\s*__\( 'Pill', 'agile-base' \),\s*'is_default'\s*=>\s*true,/);
assert.match(functions, /'name'\s*=>\s*'plain',\s*'label'\s*=>\s*__\( 'Plain', 'agile-base' \),/);
assert.ok(postTermsCss.includes(':not(.is-style-plain)'), 'Plain must switch the pills off');

// Hotfix 1.0.2.
assert.match(readme, /^= 1\.0\.2 =$/m);

// Hotfix 1.0.3: post cards fill the width instead of a fixed two-column grid.
assert.match(postsList, /<!-- wp:post-template [^\n]*"layout":\{"type":"default"\}/);
assert.doesNotMatch(postsList, /"columnCount"/);
assert.match(readme, /^= 1\.0\.3 =$/m);

// Hotfix 1.4.1: a screenshot of the homepage as it ships.
assert.match(style, /^Version: 1\.4\.1$/m);
assert.match(readme, /^Stable tag: 1\.4\.1$/m);
assert.match(readme, /^= 1\.4\.1 =$/m);

// 2.0 Part 1: role tokens. CSS reaches fonts, radii, shadows and motion through
// theme.json tokens, so a style variation (Velocity) or the 2.0 design can change them.
for (const [file, source] of [['style.css', stylesheet], ['assets/styles/core-post-terms.css', read('assets/styles/core-post-terms.css')]]) {
  assert.doesNotMatch(source, /--wp--preset--font-family--/, `${file}: use --wp--custom--font--*`);
  assert.doesNotMatch(source, /border-radius:[^;]*\d+px/, `${file}: use --wp--custom--radius--*`);
  assert.doesNotMatch(source, /box-shadow:\s*\d/, `${file}: use --wp--preset--shadow--*`);
  assert.doesNotMatch(source, /transition:[^;]*\d*\.\d+s/, `${file}: use --wp--custom--motion--*`);
}
assert.deepEqual(Object.keys(themeJson.settings.custom.font), ['body', 'display', 'mono']);
assert.deepEqual(Object.keys(themeJson.settings.custom.radius), ['bar', 'card', 'icon', 'panel', 'pill', 'round']);
assert.deepEqual(Object.keys(themeJson.settings.custom.motion), ['fast', 'base', 'slow', 'slower']);
assert.ok(themeJson.settings.shadow.presets.some((p) => p.slug === 'card'), 'shadow preset "card"');
assert.equal(themeJson.styles.typography.fontFamily, 'var(--wp--custom--font--body)');
assert.equal(themeJson.styles.elements.heading.typography.fontFamily, 'var(--wp--custom--font--display)');

// 2.0 Part 1: Velocity freezes the 1.x look. It carries its own font faces, so it
// still works after 2.0 replaces the fonts in theme.json.
const velocity = JSON.parse(read('styles/velocity.json'));
assert.equal(velocity.title, 'Velocity');
assert.equal(velocity.settings.custom.color.primary, '262 100% 62%');
assert.equal(velocity.settings.custom.color.paper, '40 30% 98%');
assert.equal(velocity.settings.custom.font.display, 'var(--wp--preset--font-family--space-grotesk)');
assert.equal(velocity.settings.custom.radius.card, '8px');
assert.deepEqual(velocity.settings.layout, { contentSize: '960px', wideSize: '1280px' });
assert.equal(velocity.settings.typography.fluid, true);
assert.equal(velocity.settings.useRootPaddingAwareAlignments, true);
assert.equal(velocity.styles.elements.heading.typography.fontFamily, 'var(--wp--custom--font--display)');
for (const slug of ['figtree', 'space-grotesk', 'space-mono']) {
  const family = velocity.settings.typography.fontFamilies.find((f) => f.slug === slug);
  assert.ok(family && family.fontFace.length, `Velocity must define the ${slug} font faces`);
  for (const face of family.fontFace) {
    for (const src of face.src.filter((s) => s.startsWith('file:./'))) {
      assert.equal(existsSync(new URL(`../${src.slice('file:./'.length)}`, import.meta.url)), true, `${src} must exist`);
    }
  }
}
assert.equal(velocity.settings.color.palette.length, 24);

// 2.0 Part 2: fonts (spec §4). Role presets body/display/mono, which the tokens point at,
// so font presets and a client's brand can swap them; every bundled face is a local file
// with its OFL file and readme credit; preloads follow the role tokens.
const fontFamilies = (json) => json.settings?.typography?.fontFamilies ?? [];
const styleFiles = (dir) => (existsSync(new URL(`../${dir}`, import.meta.url))
  ? readdirSync(new URL(`../${dir}`, import.meta.url)).filter((f) => f.endsWith('.json')).map((f) => JSON.parse(read(`${dir}/${f}`)))
  : []);
for (const family of [themeJson, ...styleFiles('styles'), ...styleFiles('styles/typography')].flatMap(fontFamilies).filter((f) => f.fontFace?.length)) {
  for (const src of family.fontFace.flatMap((face) => face.src)) {
    assert.ok(src.startsWith('file:./') || src.startsWith('local('), `${family.name}: ${src} must be self-hosted`);
    if (src.startsWith('file:./')) assert.equal(existsSync(new URL(`../${src.slice(7)}`, import.meta.url)), true, `${src} must exist`);
  }
  if (family.fontFace.some((face) => face.src.some((s) => s.startsWith('file:./')))) {
    assert.equal(existsSync(new URL(`../assets/fonts/OFL-${family.name.replace(/\s+/g, '-')}.txt`, import.meta.url)), true, `OFL file for ${family.name}`);
    assert.match(readme, new RegExp(`^${family.name} font, Copyright`, 'm'), `readme credit for ${family.name}`);
  }
}
const roleFamilies = Object.fromEntries(fontFamilies(themeJson).map((f) => [f.slug, f]));
for (const role of ['body', 'display', 'mono']) {
  assert.ok(roleFamilies[role], `theme.json has the "${role}" role font preset (spec §4)`);
  assert.equal(themeJson.settings.custom.font[role], `var(--wp--preset--font-family--${role})`, `custom.font.${role} points at the ${role} preset`);
}
assert.doesNotMatch(roleFamilies.display.fontFamily, /Space Grotesk/, '2.0 replaces the 1.x display face');
const preloadCode = functions.slice(functions.indexOf('function agile_base_preload_resources'), functions.indexOf("add_filter( 'wp_preload_resources'"));
const preloadFiles = [...preloadCode.matchAll(/'file'\s*=>\s*'([a-z0-9-]+\/[a-z0-9-]+)'/g)].map((m) => m[1]);
assert.ok(preloadFiles.length >= 1, 'the preload list is found');
for (const file of preloadFiles) {
  assert.equal(existsSync(new URL(`../assets/fonts/${file}.woff2`, import.meta.url)), true, `preloaded assets/fonts/${file}.woff2 must exist`);
}
assert.match(preloadCode, /wp_get_global_settings\( array\( 'custom', 'font' \) \)/, 'preloads follow the role tokens');

// 2.0 Part 2: tokens and global styles (spec §4, §7.5). Theme CSS takes colors only from
// palette presets (which color presets can change), uses logical properties so right-to-left
// works, and styles form fields; links in text are underlined and every control gets a
// 2px focus outline; headings no longer force margin: 0 !important; Dark only recolors.
const SR_FOCUS = /\.screen-reader-text:focus \{[^}]*\}/; // WordPress's standard snippet
const themeCssFiles = ['style.css', ...readdirSync(new URL('../assets/styles/', import.meta.url)).filter((f) => f.endsWith('.css')).map((f) => `assets/styles/${f}`)];
for (const file of themeCssFiles) {
  const source = read(file).replace(SR_FOCUS, '').replace(/\/\*[\s\S]*?\*\//g, '');
  assert.doesNotMatch(source, /#[0-9a-f]{3,8}\b|\brgba?\(|\bhsla?\(/i, `${file}: colors come from palette presets, not literals`);
  assert.doesNotMatch(source, /--wp--custom--color--/, `${file}: read colors as --wp--preset--color--*, which color presets can change`);
  assert.doesNotMatch(source, /\b(margin|padding|border)-(left|right)\b|(^|[\s;{])(left|right)\s*:|text-align:\s*(left|right)|float:\s*(left|right)/m, `${file}: logical properties (inline-start/end), so right-to-left works`);
}
const css = read('style.css').replace(/\/\*[\s\S]*?\*\//g, '');
for (const field of ['input', 'select', 'textarea']) assert.match(css, new RegExp(`(^|[\\s,(])${field}\\b[^{]*\\{`, 'm'), `style.css styles ${field} fields (spec D14)`);
assert.match(css, /(input|select|textarea)[^{]*:focus-visible[^{]*\{/, 'form fields have a focus style');
assert.ok(themeJson.settings.color.palette.every((c) => !/var\(/.test(c.color)), 'palette colors are plain values (spec §4)');
const link = themeJson.styles.elements.link;
assert.equal(link.typography?.textDecoration, 'underline', 'links in text are underlined (accessibility-ready)');
assert.ok(link[':hover']?.typography?.textDecoration && link[':hover'].typography.textDecoration !== 'underline', 'the underline changes on hover, not only the color');
for (const element of ['link', 'button']) {
  const focus = themeJson.styles.elements[element][':focus-visible'];
  assert.ok(focus?.outline && parseFloat(focus.outline.width) >= 2, `${element}: a focus-visible outline of at least 2px`);
}
assert.doesNotMatch(JSON.stringify(themeJson.styles.elements.heading), /!important/, 'heading margins without !important');
// The editor counts a style file as a color (or font) preset only if it holds nothing else.
const onlyKeys = (object, keys) => Object.fromEntries(Object.entries(object).flatMap(([key, value]) => {
  if (keys.includes(key)) return [[key, value]];
  if (value && typeof value === 'object') {
    const kept = onlyKeys(value, keys);
    return Object.keys(kept).length ? [[key, kept]] : [];
  }
  return [];
}));
const isPreset = (json, keys) => ['settings', 'styles'].every((part) => JSON.stringify(onlyKeys(json[part] ?? {}, keys)) === JSON.stringify(json[part] ?? {}));
const dark = JSON.parse(read('styles/dark.json'));
assert.ok(isPreset(dark, ['color']), 'Dark only recolors (the Site Editor lists it under Colors)');
assert.ok(themeJson.settings.custom.radius.card !== '8px' || themeJson.settings.custom.motion.base !== '0.15s' || themeJson.settings.custom.color?.primary !== '262 100% 62%', '2.0 sets its own token values');

console.log('release source checks passed');
