# AGENTS.md

This file provides guidance to Codex when working with code in this repository.

## Overview

**Agile Base** is a WordPress **Full Site Editing (block) theme**, published in the
WordPress.org theme directory as `agile-base` (author `arisch24`). It is a **no-build**
theme: there is no Gulp/SASS/webpack step. Appearance is driven almost entirely by
`theme.json`; structure by block templates, template parts and patterns.

## Architecture

- `theme.json` (v3) — the single source of truth for the design system: color palette
  (HSL custom props under `settings.custom.color`, surfaced as presets), fluid typography,
  fluid spacing, layout `contentSize`/`wideSize` (960px / 1280px), and global block styles.
  Also declares `templateParts`, `customTemplates` (Page (No Title), Page (Full Width),
  Post (Wide), Blank Canvas), and the self-hosted Figtree, Space Grotesk, and Space Mono
  `fontFace` entries.
- `templates/*.html` — block templates: `index`, `home` (the blog posts page),
  `front-page` (renders the `page-home` landing pattern), `single`, `single-wide`, `page`,
  `page-no-title`, `page-full-width`, `page-blank`, `archive`, `author`, `search`, `404`.
  Each composes: header part → a `core/group` with `tagName="main"` → footer part
  (`page-blank` has no header or footer). WordPress auto-injects the skip link and
  targets the first `<main>`. `author` has its own query loop whose cards show the date
  instead of a byline.
- `parts/*.html` — template parts, referenced via `wp:template-part` with `tagName`:
  `header` (Site Logo + Site Title + Navigation), `header-centered`, `header-minimal`,
  `footer` (credit line), `footer-columns` (title, footer menu, search). Users swap the
  variants in with "Replace" in the Site Editor.
- `patterns/*.php` — four kinds:
  - **Building blocks** (`Inserter: no`), referenced from templates and parts with
    `<!-- wp:pattern {"slug":"agile-base/..."} /-->`: `posts-list` (the query-loop card
    grid shared by index/home/archive/search), `comments`, and the `hidden-*` patterns
    (post header, blog heading, no results, 404, footer credit, footer columns).
  - **Sections** in the inserter (category `agile-base`): `hero`, `logos`, `features`,
    `stats`, `testimonial`, `faq`, `call-to-action`, `team`, `pricing`, `style-guide`.
  - **Page layouts** (`Block Types: core/post-content`, offered in the new-page "Choose a
    pattern" modal): `page-home`, `page-about`, `page-services`, `page-pricing`,
    `page-team`, `page-contact`. They nest the section patterns with `wp:pattern`.
  - **Template designs** (`Template Types:`, `Inserter: no`, listed in the Site Editor's
    template "Design" panel): `template-archive-list`, `template-404-search`.
- `styles/dark.json` — the **Dark** style variation. The root `theme.json` is the default
  (light) style. Variations override `styles.color`/elements only; they are admin-selected
  global styles, not a visitor runtime toggle.
- `style.css` — `.org` header block + the CSS blocks can't express (post cards, the FAQ
  accordion, the author header, post navigation, etc.), using `agile-base-` class names.
  `functions.php` enqueues it.
- `assets/styles/core-<block>.css` — per-block stylesheets, loaded only on pages that render
  that block (`functions.php` globs the folder). Currently `core-post-terms.css` (tag pills).
- `functions.php` — minimal, `agile_base_`-prefixed and `function_exists`-wrapped: theme
  supports and editor styles, the `agile-base` pattern category, per-block stylesheets, the
  Pill/Plain block styles for `core/post-terms`, enqueue `style.css` + `comment-reply` on
  singular, and preloading the two latin fonts. No autoloader, no classes, no constants.

## Conventions

- **No build step.** Edit `theme.json` / `.html` / pattern `.php` directly, then refine in
  **Appearance → Editor**. Use the *Create Block Theme* plugin to export Site Editor
  changes back to these files and to manage fonts.
- Text domain is `agile-base` (must equal the folder slug). All PHP prefixed `agile_base`/`agile_base_`.
- Self-hosted fonts live in `assets/fonts/` and are wired via `theme.json`
  `fontFace` (with `unicodeRange` per latin / latin-ext subset) — **no external font
  requests**. Don't reintroduce Google Fonts.
- Block markup must use valid Gutenberg block-comment syntax; spacing/colors should
  reference preset CSS vars (`var:preset|spacing|small`, `var(--wp--preset--color--*)`)
  rather than hardcoded values, so the dark variation and user global styles keep working.
- Write markup exactly as the editor would save it, or the Site Editor shows "Block contains
  unexpected or invalid content". Known traps: inline padding must be longhand
  (`padding-top`/`-right`/`-bottom`/`-left`), never shorthand `padding`; a button's border
  color goes inline (`style="border-color:..."`), not as a `has-*-border-color` class.
- Use the Avatar + Post Author Name blocks for bylines; the Post Author block is deprecated.
- **1.x compatibility contract** (`tests/compat-check.mjs`): sites updating from 1.x keep
  their content, so the 26 1.x pattern slugs, the template/part/custom-template names, the
  CSS rule for every class 1.x patterns put into content, every 1.x palette/font-size/
  spacing slug (in `theme.json` or `assets/styles/legacy-presets.css`), the Tags block
  styles `pill`/`plain`, and the `agile-base` pattern category must all stay. Restyle them;
  never delete them.

## Verifying changes

- `node tests/release-check.mjs` — static checks on the source (versions, changelog,
  template and pattern structure). Add assertions when you change structure.
- `bash tests/release-package-check.sh` — builds a release zip and checks its contents.
- `npm test` runs the source checks: release structure, editor markup, and (after Task 4)
  the 1.x compatibility contract. Run `npm install` once for the live checks below.
- `npm run check:editor` opens every template, part and pattern in the ddev editors and
  fails on invalid blocks or console errors (filter with `-- hero`). It creates and
  removes a temporary admin and drafts.
- `npm run check:frontend -- [--style dark|velocity] [label]` checks each page type at
  375/768/1440 px for status, landmarks, PHP notices, overflow, image alt and console
  errors. Screenshots go to `build/checks/<label>/`; `node bin/compare-screenshots.mjs
  <a> <b>` byte-compares two complete runs.
- `vendor/bin/phpcs .` against `phpcs.xml.dist` (WordPress-Extra + WordPress-Docs) after
  `composer install`. CI (`.github/workflows/ci.yml`) runs these plus `php -l` on pushes
  and PRs to `main`.
- The local site is a ddev WordPress install at https://theme-dev-wp.ddev.site (theme root
  is `wp-content/themes/agile-base`; run `ddev wp ...` and `ddev exec ...` from the WP root,
  where PHP is available). Keep `WP_DEBUG = true` and confirm no PHP notices.
- **Theme Check** must have no REQUIRED items for the release zip. Run against the dev
  folder it flags `phpcs.xml.dist`, the `bin/` scripts and `build/` zips; those are
  excluded from the release, so ignore them.
- In the Site Editor, walk every template and both style variations, and check new markup
  opens with no invalid-block warnings. Site Editor saves override the theme files, so
  reset any templates or parts you changed while testing.

## Releases

- Bump `Version:` in `style.css` and `Stable tag:` in `readme.txt`, add a changelog entry,
  and update the version assertions in `tests/release-check.mjs`.
- If the homepage changed, regenerate `screenshot.png` (1200×900) with
  `bin/generate-screenshot.sh`, against a site with no Site Editor customizations.
- After merging to `main`: `bash bin/build-release.sh` writes
  `build/agile-base-X.Y.Z.zip`. Upload it by hand at https://wordpress.org/themes/upload/;
  there is no automated deploy.
- Tag the release commit with a signed annotated tag: `git tag -a X.Y.Z -m "X.Y.Z - Short
  description"`.
- WordPress.org only needs a version higher than the live one, so versions that were never
  uploaded are folded into the next release's changelog entry.

## WordPress.org notes

Keep the theme free of "plugin territory" (no custom post types, no required plugins),
GPL-compatible, with all bundled assets (fonts, images) credited in `readme.txt`.
