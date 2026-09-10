# AGENTS.md

This file provides guidance to Codex (Codex.ai/code) when working with code in this repository.

## Overview

**Agile Base** is a WordPress **Full Site Editing (block) theme** targeting the WordPress.org
theme directory. It is a **no-build** theme: there is no Gulp/SASS/webpack step. Appearance
is driven almost entirely by `theme.json`; structure by block templates and patterns.

## Architecture

- `theme.json` (v3) — the single source of truth for the design system: color palette
  (HSL custom props under `settings.custom.color`, surfaced as presets), fluid typography,
  fluid spacing, layout `contentSize`/`wideSize`, and global block styles. Also declares
  `templateParts`, `customTemplates`, and the self-hosted Figtree `fontFace` entries.
- `templates/*.html` — block templates (`index`, `single`, `page`, `page-no-title`,
  `page-full-width`, `archive`, `search`, `404`). Each composes: header part → a
  `core/group` with `tagName="main"` → footer part. WordPress auto-injects the skip link
  and targets the first `<main>`.
- `parts/{header,footer}.html` — template parts (Site Logo + Site Title + Navigation;
  colophon). Referenced via `wp:template-part` with `tagName`.
- `patterns/*.php` — reusable block markup referenced from templates with
  `<!-- wp:pattern {"slug":"agile-base/..."} /-->`. Currently `posts-list` (the query-loop
  card grid, shared by index/archive/search), `comments` (shared by single/page), and
  `hidden-no-results`. All are `Inserter: no`.
- `styles/dark.json` — the **Dark** style variation. The root `theme.json` is the default
  (light) style. Variations override `styles.color`/elements only; they are admin-selected
  global styles, not a visitor runtime toggle.
- `style.css` — `.org` header block + only the CSS blocks can't express
  (`.screen-reader-text`, `.post-card`). `functions.php` enqueues it.
- `functions.php` — minimal, `agile_base_`-prefixed: theme supports, enqueue `style.css`,
  `comment-reply` on singular. No autoloader, no classes, no constants.

## Conventions

- **No build step.** Edit `theme.json` / `.html` / pattern `.php` directly, then refine in
  **Appearance → Editor**. Use the *Create Block Theme* plugin to export Site Editor
  changes back to these files and to manage fonts.
- Text domain is `agile-base` (must equal the folder slug). All PHP prefixed `agile_base`/`agile_base_`.
- Self-hosted fonts live in `assets/fonts/figtree/` and are wired via `theme.json`
  `fontFace` (with `unicodeRange` per latin / latin-ext subset) — **no external font
  requests**. Don't reintroduce Google Fonts.
- Block markup must use valid Gutenberg block-comment syntax; spacing/colors should
  reference preset CSS vars (`var:preset|spacing|small`, `var(--wp--preset--color--*)`)
  rather than hardcoded values, so the dark variation and user global styles keep working.

## Verifying changes

- Activate on a local WP (6.5+) with `WP_DEBUG = true`; confirm no PHP notices.
- Install the **Theme Check** plugin and resolve all REQUIRED items; lint PHP with
  `phpcs` against `phpcs.xml.dist` (WordPress-Extra + WordPress-Docs).
- In the Site Editor, walk every template and both style variations.

## WordPress.org notes

This theme is being prepared for directory submission. Keep it free of "plugin territory"
(no custom post types, no required plugins), GPL-compatible, with all bundled assets
(fonts, images) credited in `readme.txt`. The theme name/slug "agile-base" must be confirmed
available on WordPress.org before submission.
