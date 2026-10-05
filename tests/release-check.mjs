import assert from 'node:assert/strict';
import { readFileSync, existsSync } from 'node:fs';

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

assert.match(frontPage, /wp:post-content/);
assert.doesNotMatch(frontPage, /agile-base\/page-home/);
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
assert.match(authorTemplate, /"slug":"agile-base\/posts-list"/);
assert.doesNotMatch(authorTemplate, /wp:post-author(?![-\w])/);

// Phase 3: release 1.3.0, preserving earlier changelogs.
assert.match(style, /^Version: 1\.3\.0$/m);
assert.match(readme, /^Stable tag: 1\.3\.0$/m);
assert.match(readme, /^= 1\.3\.0 =$/m);
assert.match(readme, /^= 1\.2\.0 =$/m);
assert.match(readme, /^= 1\.1\.0 =$/m);

// Phase 2: no deprecated Post Author block in the posts list.
const RAW_ENGLISH = />\s*[A-Z][a-z]+\s+[a-z]+/;
const postsList = read('patterns/posts-list.php');
assert.doesNotMatch(postsList, /wp:post-author(?![-\w])/);
assert.match(postsList, /wp:avatar \{"size":32/);
assert.match(postsList, /wp:post-author-name/);

// Phase 2: Header (Centered).
const themeJsonParts = JSON.parse(read('theme.json')).templateParts;
const templatePart = (name) => themeJsonParts.find((p) => p.name === name);
const headerCentered = read('parts/header-centered.html');
assert.match(headerCentered, /wp:site-logo/);
assert.match(headerCentered, /wp:site-title/);
assert.match(headerCentered, /wp:navigation \{"ariaLabel":"Primary","overlayMenu":"mobile"[^\n]*"justifyContent":"center"/);
assert.match(headerCentered, /"orientation":"vertical","justifyContent":"center"/);
assert.deepEqual(templatePart('header-centered'), { name: 'header-centered', title: 'Header (Centered)', area: 'header' });

// Phase 2: Header (Minimal).
const headerMinimal = read('parts/header-minimal.html');
assert.doesNotMatch(headerMinimal, /wp:site-logo/);
assert.match(headerMinimal, /wp:site-title/);
assert.match(headerMinimal, /wp:navigation \{"ariaLabel":"Primary","overlayMenu":"always"/);
assert.match(headerMinimal, /var:preset\|spacing\|x-small/);
assert.deepEqual(templatePart('header-minimal'), { name: 'header-minimal', title: 'Header (Minimal)', area: 'header' });

// Phase 2: Footer (Columns).
const footerColumnsPart = read('parts/footer-columns.html');
const footerColumns = read('patterns/hidden-footer-columns.php');
assert.equal(footerColumnsPart.trim(), '<!-- wp:pattern {"slug":"agile-base/hidden-footer-columns"} /-->');
assert.match(footerColumns, /^ \* Slug: agile-base\/hidden-footer-columns$/m);
assert.match(footerColumns, /^ \* Inserter: no$/m);
assert.match(footerColumns, /wp:navigation \{"ariaLabel":"Footer"/);
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

console.log('release source checks passed');
