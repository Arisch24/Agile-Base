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
assert.equal((pricingSection.match(/<!-- wp:column(?: \{| -->)/g) || []).length, 3);
assert.equal((pricingSection.match(/<!-- wp:list -->/g) || []).length, 3);
// 2.0 plans link to contact; destination assertions below replace the 1.x no-links check.
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

assert.deepEqual(pageSlugs(assertPagePattern('page-services', 'services')), ['services-grid', 'steps', 'testimonial', 'faq', 'call-to-action']);
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
assert.equal(velocity.settings.color.palette.length, 25);

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

// 2.0 Part 2: brand presets (spec §4, D13). Color presets hold only colors and redefine the
// whole palette; font presets hold only typography and redefine the three role fonts; System
// downloads nothing; the client-brand fixture changes every brand value at once.
const presetFiles = (dir) => (existsSync(new URL(`../${dir}`, import.meta.url))
  ? readdirSync(new URL(`../${dir}`, import.meta.url)).filter((f) => f.endsWith('.json')).map((f) => [f, JSON.parse(read(`${dir}/${f}`))])
  : []);
const paletteSlugs = themeJson.settings.color.palette.map((c) => c.slug).sort();
const colorPresets = presetFiles('styles/colors');
assert.ok(colorPresets.length >= 3, 'at least three color presets besides Dark');
for (const [file, preset] of [...colorPresets, ['dark.json', dark]]) {
  assert.ok(preset.title, `${file}: title`);
  assert.ok(isPreset(preset, ['color']), `${file}: colors only, so the Site Editor lists it under Colors`);
  assert.deepEqual(preset.settings.color.palette.map((c) => c.slug).sort(), paletteSlugs, `${file}: redefines every palette color`);
  assert.ok(preset.settings.color.palette.every((c) => !/var\(/.test(c.color)), `${file}: plain color values`);
}
const fontPresets = presetFiles('styles/typography');
assert.ok(fontPresets.length >= 3, 'at least two font presets plus System');
for (const [file, preset] of fontPresets) {
  assert.ok(preset.title, `${file}: title`);
  assert.ok(isPreset(preset, ['typography']), `${file}: typography only, so the Site Editor lists it under Typography`);
  assert.deepEqual(fontFamilies(preset).map((f) => f.slug).sort(), ['body', 'display', 'mono'], `${file}: redefines the three role fonts`);
}
const systemPreset = fontPresets.find(([file]) => file === 'system.json')?.[1];
assert.ok(systemPreset, 'styles/typography/system.json (spec D13)');
assert.ok(fontFamilies(systemPreset).every((f) => !f.fontFace), 'System downloads no fonts');
const clientBrand = JSON.parse(read('tests/fixtures/client-brand.json'));
assert.deepEqual(clientBrand.settings.color.palette.map((c) => c.slug).sort(), paletteSlugs, 'client-brand covers every palette color (re-run bin/make-client-brand.mjs)');
assert.deepEqual(fontFamilies(clientBrand).map((f) => f.slug).sort(), ['body', 'display', 'mono']);
assert.deepEqual(Object.keys(clientBrand.settings.custom.radius).sort(), Object.keys(themeJson.settings.custom.radius).sort(), 'client-brand covers every radius token');
assert.ok(Object.values(clientBrand.settings.custom.radius).every((r) => r === '0'), 'client-brand squares every corner');

// 2.0 Part 2: homepage. One <h1> wherever the hero goes (spec D5); no small label above a
// heading (the 1.x eyebrow); demo copy never markets the theme (D4).
const KICKER = [
  /<!-- wp:paragraph \{[^\n]*agile-base-eyebrow[^\n]*\} -->\s*<p[^>]*>[\s\S]*?<\/p>\s*<!-- \/wp:paragraph -->\s*<!-- wp:(?:heading|post-title|query-title)\b/,
  /<!-- wp:(?:post-terms|post-date)[^\n]*agile-base-eyebrow[^\n]*\/-->\s*<!-- wp:(?:heading|post-title|query-title)\b/,
];
const hasKicker = (source) => KICKER.some((re) => re.test(source));
const marketsTheme = (source) => /Agile Base/.test(source.replace(/<\?php[\s\S]*?\?>/g, (php) => php.replace(/'agile-base'/g, '')));
// Every new inserter pattern meets the same bar (spec §7).
const CORE_CATEGORIES = new Set(['banner', 'buttons', 'columns', 'text', 'query', 'featured', 'call-to-action', 'team', 'testimonials', 'services', 'contact', 'about', 'portfolio', 'gallery', 'media', 'videos', 'audio', 'posts', 'footer', 'header', 'navigation']);
const assertNewPattern = (slug, { title, categories }) => {
  const source = read(`patterns/${slug}.php`);
  assert.match(source, new RegExp(`^ \\* Title: ${title.replace(/[()]/g, '\\$&')}$`, 'm'), `${slug}: title`);
  assert.match(source, new RegExp(`^ \\* Categories: ${categories.join(', ')}$`, 'm'), `${slug}: categories`);
  assert.ok(categories[0] === 'agile-base' && categories.slice(1).some((c) => CORE_CATEGORIES.has(c)), `${slug}: agile-base plus a core category`);
  for (const header of ['Keywords', 'Viewport Width', 'Description']) assert.match(source, new RegExp(`^ \\* ${header}: .+$`, 'm'), `${slug}: ${header}`);
  assert.doesNotMatch(source, /href="#"/, `${slug}: no dead links`);
  assert.equal(marketsTheme(source), false, `${slug}: copy does not market the theme`);
  assert.equal(hasKicker(source), false, `${slug}: no label above a heading`);
  assert.doesNotMatch(source, /<h1\b|"level":1\b/, `${slug}: sections never add an <h1>`);
  return source;
};
const queriesIn = (source) => [...source.matchAll(/<!-- wp:query (\{[^\n]*\}) -->/g)].map((m) => JSON.parse(m[1]));

const homeHero = read('patterns/hidden-home-hero.php');
assert.match(homeHero, /^ \* Inserter: no$/m);
assert.equal((homeHero.match(/<h1\b/g) || []).length, 1, 'hidden-home-hero holds the homepage <h1>');
assert.equal((read('patterns/hero.php').match(/<h1\b/g) || []).length, 0, 'the hero section must not add a second <h1>');
assert.match(read('patterns/hero.php'), /<h2\b/);
const servicesGrid = assertNewPattern('services-grid', { title: 'Services Grid', categories: ['agile-base', 'services'] });
assert.ok((servicesGrid.match(/<h3\b/g) || []).length >= 3, 'at least three services, each with a heading');
const pageHome = read('patterns/page-home.php');
assert.match(pageHome, /^ \* Title: Page: Home \(Agency\)$/m);
assert.ok(pageHome.indexOf('"slug":"agile-base/hidden-home-hero"') > -1 && pageHome.indexOf('"slug":"agile-base/hidden-home-hero"') < pageHome.indexOf('"slug":"agile-base/services-grid"'), 'the homepage opens with its hero, then shows the services');
assert.doesNotMatch(pageHome, /wp:pattern \{"slug":"agile-base\/hero"\}/);
for (const slug of ['hidden-home-hero', 'hero', 'logos', 'features', 'stats', 'testimonial', 'faq', 'call-to-action', 'page-home', 'hidden-header', 'hidden-footer-credit']) {
  const source = read(`patterns/${slug}.php`);
  assert.equal(hasKicker(source), false, `${slug}: no label above a heading`);
  assert.equal(marketsTheme(source), false, `${slug}: demo copy must not market the theme`);
}
assert.doesNotMatch(read('patterns/hidden-header.php'), /agile-base-eyebrow/);

// 2.0 Part 2: Services page (spec §7.3). The template shows the page title (the <h1>); the
// layout's intro adds no label and no heading, so nothing repeats the page name.
const steps = assertNewPattern('steps', { title: 'How It Works', categories: ['agile-base', 'services'] });
assert.equal((steps.match(/<h3\b/g) || []).length, 3, 'three steps, each with a heading');
const pageServices = read('patterns/page-services.php');
const servicesIntro = pageServices.slice(pageServices.indexOf('?>'), pageServices.indexOf('<!-- wp:pattern'));
assert.doesNotMatch(servicesIntro, /agile-base-eyebrow|wp:heading|<h1/, 'page-services: the intro repeats nothing');
assert.equal(hasKicker(pageServices), false);

// 2.0 Part 2: single post. The post header has no label above the title, both single
// templates share the header, navigation and comments, and content blocks are styled in theme.json.
const postHeader2 = read('patterns/hidden-post-header.php');
assert.equal(hasKicker(postHeader2), false, 'hidden-post-header: no label above the title');
assert.match(postHeader2, /wp:post-title \{[^\n]*"level":1/);
for (const template of ['single', 'single-wide']) {
  const source = read(`templates/${template}.html`);
  for (const slug of ['hidden-post-header', 'hidden-post-navigation', 'comments']) assert.match(source, new RegExp(`"slug":"agile-base/${slug}"`), `${template}: ${slug}`);
}
for (const block of ['core/quote', 'core/pullquote', 'core/code', 'core/preformatted', 'core/table', 'core/separator']) {
  assert.ok(themeJson.styles.blocks[block], `theme.json styles.blocks["${block}"]`);
}
assert.match(read('patterns/hidden-post-navigation.php'), /"className":"agile-base-postnav"/, 'the postnav class keeps a rule (contract)');
assert.match(read('assets/styles/core-post-terms.css'), /:where\(\.wp-block-post-terms\.taxonomy-post_tag:not\(\.is-style-plain\)\)/, 'pill selector kept (contract)');

// 2.0 Part 2b: Text on Primary (spec §4, D16). Whatever sits on a primary background takes
// on-primary, so a dark brand primary gets light text. Every style file with a palette sets
// it at 4.5:1 or more against its own primary, right after primary in the palette.
const luminance = (rgb) => rgb.map((c) => { c /= 255; return c <= 0.04045 ? c / 12.92 : ((c + 0.055) / 1.055) ** 2.4; })
  .reduce((sum, c, k) => sum + c * [0.2126, 0.7152, 0.0722][k], 0);
const contrastOf = (a, b) => { const [hi, lo] = [luminance(a), luminance(b)].sort((x, y) => y - x); return (hi + 0.05) / (lo + 0.05); };
const hslToRgb = ([h, s, l]) => {
  const a = (s / 100) * Math.min(l / 100, 1 - l / 100);
  return [0, 8, 4].map((n) => { const k = (n + h / 30) % 12; return Math.round(255 * (l / 100 - a * Math.max(-1, Math.min(k - 3, 9 - k, 1)))); });
};
// Palette values are hex, or (Velocity) hsla(var(--wp--custom--color--<name>)) over "H S% L%" tokens.
const rgbOf = (json, value) => {
  const hex = value.match(/^#([0-9a-f]{6})$/i);
  if (hex) return [0, 2, 4].map((i) => parseInt(hex[1].slice(i, i + 2), 16));
  const token = value.match(/^hsla?\(var\(--wp--custom--color--([a-z-]+)\)\)$/);
  assert.ok(token, `unreadable palette value ${value}`);
  return hslToRgb(json.settings.custom.color[token[1].replace(/-([a-z])/g, (_, c) => c.toUpperCase())].split(/\s+/).map(parseFloat));
};
const palettes = [['theme.json', themeJson], ['styles/dark.json', dark], ['styles/velocity.json', velocity],
  ['tests/fixtures/client-brand.json', clientBrand], ...colorPresets.map(([file, json]) => [`styles/colors/${file}`, json])];
for (const [file, json] of palettes) {
  const slugs = json.settings.color.palette.map((c) => c.slug);
  assert.equal(slugs.indexOf('on-primary'), slugs.indexOf('primary') + 1, `${file}: Text on Primary sits right after Primary (spec D16)`);
  const color = Object.fromEntries(json.settings.color.palette.map((c) => [c.slug, c.color]));
  const ratio = contrastOf(rgbOf(json, color.primary), rgbOf(json, color['on-primary']));
  assert.ok(ratio >= 4.5, `${file}: on-primary on primary is ${ratio.toFixed(2)}:1, needs 4.5:1`);
}
// Markup: a block with a primary background sets on-primary text (the style guide's empty
// swatches excepted), and nothing inside a field sets its own black, ink, white or paper text.
const markupFiles = ['patterns', 'templates', 'parts'].flatMap((dir) => readdirSync(new URL(`../${dir}/`, import.meta.url)).map((f) => `${dir}/${f}`));
for (const file of markupFiles) {
  const source = read(file);
  for (const [comment] of source.matchAll(/<!-- wp:[a-z/-]+ \{.*?\} \/?-->/g)) {
    if (/"backgroundColor":"primary"/.test(comment) && !/agile-base-swatch/.test(comment)) {
      assert.match(comment, /"textColor":"on-primary"/, `${file}: text on a primary background uses on-primary (spec D16): ${comment.slice(0, 90)}`);
    }
  }
  if (source.includes('agile-base-field')) assert.doesNotMatch(source, /"textColor":"(black|ink|white|paper)"/, `${file}: text inside a field inherits on-primary`);
}
// Style JSON (theme.json and every style file but frozen Velocity, including section styles
// to come): a node that paints a primary background also sets on-primary text.
const PRIMARY_BACKGROUND = /^(var\(--wp--preset--color--primary\)|var:preset\|color\|primary)$/;
const checkPrimaryText = (node, where, file) => {
  if (!node || typeof node !== 'object') return;
  if (PRIMARY_BACKGROUND.test(node.color?.background ?? '')) assert.match(node.color.text ?? '', /on-primary/, `${file} ${where}: text on a primary background uses on-primary (spec D16)`);
  for (const [key, value] of Object.entries(node)) checkPrimaryText(value, `${where}.${key}`, file);
};
const jsonFiles = (dir) => readdirSync(new URL(`../${dir}/`, import.meta.url), { withFileTypes: true })
  .flatMap((entry) => (entry.isDirectory() ? jsonFiles(`${dir}/${entry.name}`) : entry.name.endsWith('.json') ? [`${dir}/${entry.name}`] : []));
for (const file of ['theme.json', ...jsonFiles('styles').filter((f) => f !== 'styles/velocity.json')]) checkPrimaryText(JSON.parse(read(file)).styles, 'styles', file);
// CSS: field rules take colors from primary and on-primary only; focus rings in a field and
// selected text use on-primary.
const fieldRules = [...css.matchAll(/([^{}]*\.agile-base-field[^{}]*)\{([^}]*)\}/g)];
assert.ok(fieldRules.length >= 3, 'style.css styles the color field');
for (const [, selector, body] of fieldRules) {
  assert.doesNotMatch(body, /--color--(?!primary\)|on-primary\))/, `style.css ${selector.trim()}: field colors come from primary and on-primary only`);
}
assert.ok(fieldRules.some(([, selector, body]) => /:focus-visible/.test(selector) && /outline-color:\s*var\(--wp--preset--color--on-primary\)/.test(body)), 'focus rings in a field use on-primary');
assert.match(css, /::selection\s*\{[^}]*background-color:\s*var\(--wp--preset--color--primary\);[^}]*color:\s*var\(--wp--preset--color--on-primary\)/, 'selected text: on-primary on primary');

// 2.0 Part 2b: a compact top (spec D17). The header and footer pad themselves, so the page
// has no padding above the header; the homepage hero meets the header; the inserter hero
// shares the homepage hero's padding. Sizes are checked live by check-frontend --fold.
assert.equal(themeJson.styles.spacing.padding.top, '0', 'no page padding above the header');
assert.equal(themeJson.styles.spacing.padding.bottom, '0', 'no page padding below the footer');
assert.match(frontPage, /<!-- wp:group \{"tagName":"main","style":\{"spacing":\{"margin":\{"top":"0"\}\}\}/, 'the homepage hero meets the header');
assert.match(frontPage, /<main class="wp-block-group" style="margin-top:0">/, 'front-page main markup matches its attributes');
const fieldPadding = (source) => source.match(/"className":"agile-base-field","style":\{"spacing":\{"padding":(\{[^}]*\})/)?.[1];
assert.ok(fieldPadding(homeHero), 'the homepage hero sets its padding');
assert.equal(fieldPadding(hero), fieldPadding(homeHero), 'the inserter hero and the homepage hero share their padding');

// 2.0 Part 2b: one placeholder photo, in the Text and Image section on the homepage (spec
// D3): CC0 and credited, a small bundled WebP (never hotlinked), translatable alt text, and
// a fixed aspect ratio so the page doesn't move as it loads.
const PHOTO = 'assets/images/placeholder-photo.webp';
assert.ok(existsSync(new URL(`../${PHOTO}`, import.meta.url)), `${PHOTO} exists (spec D3)`);
const photo = readFileSync(new URL(`../${PHOTO}`, import.meta.url));
assert.ok(photo.subarray(0, 4).toString() === 'RIFF' && photo.subarray(8, 12).toString() === 'WEBP', `${PHOTO} is a WebP`);
assert.ok(photo.length <= 80 * 1024, `${PHOTO} is ${Math.round(photo.length / 1024)} KB, at most 80 KB`);
assert.match(readme, /^placeholder-photo\.webp, .+\n\* Source: https:\/\/\S+\n\* License: CC0 1\.0 Universal\n\* License URI: https:\/\/creativecommons\.org\/publicdomain\/zero\/1\.0\/$/m, 'readme credits the photo with its source and CC0 license');
const textImage = assertNewPattern('text-image', { title: 'Text and Image', categories: ['agile-base', 'about'] });
assert.match(textImage, /<img src="<\?php echo esc_url\( get_theme_file_uri\( 'assets\/images\/placeholder-photo\.webp' \) \); \?>" alt="<\?php echo esc_attr_x\( '[^']+', 'placeholder photo alt text', 'agile-base' \); \?>"/, 'the photo is bundled, with translatable alt text');
assert.match(textImage, /<!-- wp:image \{"aspectRatio":"4\/3","scale":"cover"/, 'the photo keeps a 4:3 frame');
assert.doesNotMatch(homeHero, /<img\b/, 'the homepage hero has no photo');
assert.ok(pageHome.indexOf('"slug":"agile-base/logos"') < pageHome.indexOf('"slug":"agile-base/text-image"') && pageHome.indexOf('"slug":"agile-base/text-image"') < pageHome.indexOf('"slug":"agile-base/services-grid"'), 'the homepage shows the Text and Image section after the logos');
for (const file of markupFiles) assert.doesNotMatch(read(file), /<img [^>]*src="https?:/, `${file}: images are bundled, never hotlinked`);
// Full-width sections touch, on the homepage too, and meet the header and footer when a page
// opens or ends with one (check-frontend measures it on every page).
assert.match(css, /:is\(main, \.wp-block-post-content\) > \.alignfull \+ \.alignfull,\s*\.wp-site-blocks > main:has\(> \.wp-block-post-content > \.alignfull:first-child\),\s*\.wp-site-blocks > main > \.wp-block-post-content:has\(> \.alignfull:first-child\),\s*\.wp-site-blocks > main:has\(> \.alignfull:not\(\.wp-block-post-content\):last-child, > \.wp-block-post-content:last-child > \.alignfull:last-child\) \+ \* \{\s*margin-block-start: 0;/, 'full-width sections, the header and the footer sit edge to edge');

// 2.0 Part 3: headers. Every header is one pattern line whose pattern keeps the site title
// and an accessible, mobile-ready menu, with no label above anything; Header (Button)
// adds one translatable call to action (spec §7.1).
for (const part of ['header', 'header-centered', 'header-minimal', 'header-cta']) {
  assert.equal(read(`parts/${part}.html`).trim(), `<!-- wp:pattern {"slug":"agile-base/hidden-${part}"} /-->`, `${part}: markup lives in its hidden pattern`);
  const source = read(`patterns/hidden-${part}.php`);
  assert.match(source, /^ \* Inserter: no$/m, `${part}: hidden pattern`);
  assert.match(source, /wp:site-title /, `${part}: site title`);
  assert.match(source, /wp:navigation \{"ariaLabel":"<\?php echo esc_attr_x\( '[^']+', 'navigation landmark label', 'agile-base' \); \?>"[^\n]*"overlayMenu":"(mobile|always)"/, `${part}: labelled menu with a mobile overlay`);
  assert.doesNotMatch(source, /agile-base-eyebrow/, `${part}: no eyebrow label`);
}
const headerCta = read('patterns/hidden-header-cta.php');
assert.equal((headerCta.match(/<!-- wp:button\b/g) || []).length, 1, 'Header (Button): one call to action');
assert.match(headerCta, /wp-block-button__link[^>]*href="<\?php echo esc_url\(/, 'Header (Button): the button links somewhere real');
assert.match(headerCta, /esc_html_e\(|esc_html__\(/, 'Header (Button): translatable button text');
assert.deepEqual(templatePart('header-cta'), { name: 'header-cta', title: 'Header (Button)', area: 'header' });
assert.ok(themeJson.styles.blocks['core/navigation'], 'theme.json styles the navigation block');

// 2.0 Part 3: footers. No eyebrow labels (1.x had four in Footer (Columns)); the columns
// footer keeps its menu and search; Footer (Business) gives a business's contact details,
// hours, legal links and social icons, all editable and translatable (spec §7.1).
const footerColumns2 = read('patterns/hidden-footer-columns.php');
assert.doesNotMatch(footerColumns2, /agile-base-eyebrow/, 'Footer (Columns): no eyebrow labels');
assert.match(footerColumns2, /wp:navigation /);
assert.match(footerColumns2, /wp:search /);
assert.doesNotMatch(read('parts/footer.html'), /agile-base-eyebrow/);
assert.equal(read('parts/footer-business.html').trim(), '<!-- wp:pattern {"slug":"agile-base/hidden-footer-business"} /-->');
const footerBusiness = read('patterns/hidden-footer-business.php');
assert.match(footerBusiness, /^ \* Inserter: no$/m);
assert.match(footerBusiness, /href="mailto:/, 'Footer (Business): email link');
assert.match(footerBusiness, /href="tel:/, 'Footer (Business): phone link');
assert.match(footerBusiness, /wp:navigation \{"ariaLabel":"<\?php echo esc_attr_x\( '[^']+', 'navigation landmark label', 'agile-base' \); \?>"/, 'Footer (Business): a labelled legal-links menu');
assert.match(footerBusiness, /wp:social-links /);
assert.match(footerBusiness, /"slug":"agile-base\/hidden-footer-credit"/);
assert.equal(hasKicker(footerBusiness), false);
assert.doesNotMatch(footerBusiness, /agile-base-eyebrow/);
assert.deepEqual(templatePart('footer-business'), { name: 'footer-business', title: 'Footer (Business)', area: 'footer' });
// WordPress leaves line breaks in a list whose links have no URL, so :empty never matches.
assert.match(stylesheet, /\.wp-block-social-links:not\(:has\(li\)\)\s*\{\s*display:\s*none;?\s*\}/, 'no gap when no social link is filled in');
assert.match(stylesheet, /\.wp-block-navigation:not\(\.has-background\) \.wp-block-navigation__submenu-container \{[^}]*background-color: var\(--wp--preset--color--paper\)/, 'submenus outweigh WordPress\'s white default');
assert.equal(themeJson.styles.blocks['core/navigation-submenu'], undefined, 'submenu colors live on the container, not the menu item');

// 2.0 Part 3: section styles and block style variations (theme.json partials, WP 6.6+).
// Each is a style-only partial for a fixed set of blocks, with colors from palette presets
// so color presets and a client's brand recolor them.
const partials = (dir) => presetFiles(dir);
const sections = partials('styles/sections');
assert.ok(sections.length >= 3, 'at least three section styles (spec §7.4)');
const SECTION_BLOCKS = new Set(['core/group', 'core/columns', 'core/column', 'core/cover']);
for (const [file, partial] of sections) {
  assert.equal(partial.version, 3, file);
  assert.match(partial.slug, /^section-[a-z0-9-]+$/, `${file}: slug section-*`);
  assert.ok(partial.title, `${file}: title`);
  assert.ok(partial.blockTypes?.length && partial.blockTypes.every((b) => SECTION_BLOCKS.has(b)), `${file}: blockTypes`);
  assert.ok(partial.styles?.color?.background && partial.styles?.color?.text, `${file}: sets background and text`);
  assert.ok(partial.styles?.elements?.link && partial.styles?.elements?.button, `${file}: restyles links and buttons for its background`);
  assert.equal(partial.settings, undefined, `${file}: styles only`);
  assert.doesNotMatch(JSON.stringify(partial.styles), /#[0-9a-f]{3,8}\b|rgba?\(|hsla?\(|--wp--custom--color--/i, `${file}: colors from palette presets`);
  // WordPress splits custom CSS at "&" and drops a rule that lists two; a button the owner
  // colors keeps its colors.
  assert.doesNotMatch(partial.styles.css ?? '', /,\s*&/, `${file}: one "&" selector per rule`);
  for (const rule of (partial.styles.css ?? '').match(/[^{}]*\{[^}]*[\s{;](?:color|background-color):[^}]*\}/g) ?? []) {
    if (/\.wp-block-button__link/.test(rule)) assert.match(rule, /\.wp-block-button__link:not\(\.has-text-color, \.has-background\)/, `${file}: owner button colors win: ${rule.trim().slice(0, 80)}`);
  }
}
for (const [file, partial] of partials('styles/blocks')) {
  assert.equal(partial.version, 3, file);
  assert.ok(partial.slug && partial.title && partial.blockTypes?.length && partial.styles, `${file}: slug, title, blockTypes, styles`);
  // A block's Styles panel lists its section styles and block styles together.
  for (const [sectionFile, section] of sections) {
    if (partial.blockTypes.some((block) => section.blockTypes.includes(block))) assert.notEqual(partial.title, section.title, `${file} and ${sectionFile}: two "${partial.title}" styles in one Styles panel`);
  }
}
// Every search box draws the same corners.
for (const file of markupFiles) assert.doesNotMatch(read(file), /wp:search \{[^\n]*"radius":"var:custom\|radius\|(?!bar")/, `${file}: search uses the bar radius`);
for (const block of ['core/search', 'core/query-pagination', 'core/avatar', 'core/social-links']) {
  assert.ok(themeJson.styles.blocks[block], `theme.json styles.blocks["${block}"]`);
}

// 2.0 Part 3: blog listings. No label above any heading; the card keeps its contract class
// and its byline blocks; the 1.4.0 author header keeps wrapping on phones.
for (const slug of ['posts-list', 'hidden-blog-heading', 'hidden-no-results']) {
  const source = read(`patterns/${slug}.php`);
  assert.equal(hasKicker(source), false, `${slug}: no label above a heading`);
  assert.doesNotMatch(source, /agile-base-eyebrow/, `${slug}: no eyebrow label`);
}
for (const template of ['index', 'home', 'archive', 'search', 'author']) {
  assert.equal(hasKicker(read(`templates/${template}.html`)), false, `${template}: no label above a heading`);
}
assert.match(read('patterns/posts-list.php'), /className":"post-card"/);
assert.match(read('templates/author.html'), /"className":"agile-base-author"[^\n]*"flexWrap":"wrap"/);

// 2.0 Part 3: About the Author (spec §7.2, D6): insertable, not in the templates.
const authorBio = assertNewPattern('author-bio', { title: 'About the Author', categories: ['agile-base', 'text'] });
assert.match(authorBio, /wp:avatar /);
assert.match(authorBio, /wp:post-author-name \{[^\n]*"isLink":true/);
assert.match(authorBio, /wp:post-author-biography /);
for (const template of ['single', 'single-wide']) {
  assert.doesNotMatch(read(`templates/${template}.html`), /agile-base\/author-bio/, `${template}: no author bio by default (D6)`);
}

// 2.0 Part 3: pages, 404 and template designs. No label above a heading anywhere; the
// 1.x structural guarantees (search on 404, rows in Archive (List)) stay; the Landing Page
// template has no menu and one hidden <h1> (spec §7.1).
for (const slug of ['hidden-404', 'template-archive-list', 'template-404-search']) {
  const source = read(`patterns/${slug}.php`);
  assert.equal(hasKicker(source), false, `${slug}: no label above a heading`);
  assert.doesNotMatch(source, /agile-base-eyebrow/, `${slug}: no eyebrow label`);
}
for (const template of ['page', 'page-no-title', 'page-full-width', 'page-blank', '404', 'page-landing']) {
  assert.equal(hasKicker(read(`templates/${template}.html`)), false, `${template}: no label above a heading`);
}
assert.match(read('patterns/hidden-404.php'), /wp:search /);
assert.match(read('patterns/template-404-search.php'), /wp:search /);
const landing = read('templates/page-landing.html');
assert.deepEqual(customTemplate('page-landing'), { name: 'page-landing', title: 'Landing Page', postTypes: ['page'] });
assert.doesNotMatch(landing, /wp:navigation|wp:template-part \{"slug":"header/, 'Landing Page: no menu');
assert.match(landing, /wp:site-title /);
assert.match(landing, /wp:post-title \{"level":1,"className":"screen-reader-text"\}/, 'Landing Page: the title is the hidden <h1>');
assert.match(landing, /wp:post-content \{[^\n]*"align":"full"/, 'Landing Page: content full width');
assert.match(landing, /"slug":"agile-base\/hidden-footer-credit"/);
assert.match(landing, /"tagName":"footer"[^\n]*"padding":\{"top":"var:preset\|spacing\|[a-z-]+","bottom":"var:preset\|spacing\|[a-z-]+"\}/, 'Landing Page: the credit footer has room above and below');
assert.equal((landing.match(/"tagName":"main"/g) || []).length, 1);

// 2.0 Part 4a: Team, Pricing, Style Guide. No labels above headings; pricing buttons go
// somewhere real; the Style Guide shows the whole 2.0 system, so it stays complete.
for (const slug of ['team', 'pricing', 'style-guide']) {
  const source = read(`patterns/${slug}.php`);
  assert.equal(hasKicker(source), false, `${slug}: no label above a heading`);
  assert.doesNotMatch(source, /agile-base-eyebrow/, `${slug}: no eyebrow label`);
}
const guide = read('patterns/style-guide.php');
const kebabSlug = (slug) => slug.replace(/([a-z])([0-9])/g, '$1-$2').replace(/([0-9])([a-z])/g, '$1-$2');
for (const { slug } of themeJson.settings.color.palette) assert.match(guide, new RegExp(`has-${slug}-background-color`), `style guide shows color ${slug}`);
for (const { slug } of themeJson.settings.typography.fontSizes) assert.match(guide, new RegExp(`"fontSize":"${kebabSlug(slug)}"`), `style guide shows font size ${slug}`);
for (const { slug } of themeJson.settings.spacing.spacingSizes) assert.match(guide, new RegExp(`--wp--preset--spacing--${kebabSlug(slug)}\\b`), `style guide shows spacing ${slug}`);
for (const [, partial] of [...partials('styles/sections'), ...partials('styles/blocks')]) assert.match(guide, new RegExp(`is-style-${partial.slug}\\b`), `style guide shows ${partial.slug}`);
assert.doesNotMatch(read('patterns/pricing.php'), /<a(?![^>]*href=)|href="#"/, 'every pricing button goes somewhere real');

console.log('release source checks passed');
