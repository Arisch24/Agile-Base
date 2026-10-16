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

// Phase 1: release 1.1.0.
assert.match(style, /^Version: 1\.1\.0$/m);
assert.match(readme, /^Stable tag: 1\.1\.0$/m);
assert.match(readme, /^= 1\.1\.0 =$/m);

// Tag pills: the default look of every tag list (no class needed).
const postTermsCss = read('assets/styles/core-post-terms.css');
const singleTagsTemplate = read('templates/single.html');
const PILL = ':where(.wp-block-post-terms.taxonomy-post_tag:not(.is-style-plain))';
for (const part of ['', ' .wp-block-post-terms__separator', ' a', ' a::before', ' a:hover', ' a:focus-visible']) {
  assert.ok(postTermsCss.includes(PILL + part), `pill selector missing for "${part || 'container'}"`);
}
assert.match(postTermsCss, /:where\(\.wp-block-post-terms\.taxonomy-post_tag:not\(\.is-style-plain\)\) \{[^}]*font-family: var\(--wp--preset--font-family--space-mono\);[^}]*font-size: var\(--wp--preset--font-size--small\);/);
assert.match(postTermsCss, /content: "#" \/ "";/);
assert.doesNotMatch(postTermsCss, /agile-base-tags|taxonomy-category|\.single /);
for (const line of postTermsCss.split('\n').filter((l) => /\{\s*$/.test(l) && !l.startsWith('@media'))) {
  assert.match(line.trim(), /^:where\(/, `unwrapped selector: ${line.trim()}`);
}
assert.doesNotMatch(stylesheet, /agile-base-tags/);
assert.match(functions, /wp_enqueue_block_style\(/);
assert.match(functions, /add_editor_style\( array\( 'style\.css', 'assets\/styles\/core-post-terms\.css' \) \)/);
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
const postsList = read('patterns/posts-list.php');
assert.match(postsList, /<!-- wp:post-template [^\n]*"layout":\{"type":"default"\}/);
assert.doesNotMatch(postsList, /"columnCount"/);
assert.match(readme, /^= 1\.0\.3 =$/m);

console.log('release source checks passed');
