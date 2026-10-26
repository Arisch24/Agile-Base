# AGENTS.md

Guidance for coding agents in this repository. `CLAUDE.md` imports this file.

When reporting information to me, be extremely concise and sacrifice grammar for sake of concision.

## Overview

**Agile Base**: a no-build WordPress block theme (`theme.json` v3), on WordPress.org as
`agile-base` (author `arisch24`). Edit `theme.json`, `.html` and pattern `.php` files directly;
no Gulp/SASS/webpack. Who it's for: `PRODUCT.md`. Design system: `DESIGN.md`.

Every change keeps these true:

- **Rebrandable.** Every visual value is a `theme.json` preset or `custom` token: colors as
  palette presets, fonts through the `body`/`display`/`mono` roles. No raw colors, fonts or
  sizes in CSS or markup.
- **Fast.** No theme JavaScript, no external requests (fonts self-hosted in `assets/fonts/`;
  never Google Fonts), small CSS.
- **Stable.** Pattern slugs, template and part names, tokens, CSS classes and block style
  names are public API: restyle them, never rename or remove them within a major version.
- **Editable without code.** Core blocks only; no shortcodes, custom blocks, custom post
  types or required plugins.
- **Accessible.** WCAG 2.2 AA in every style and preset.
- **Business-ready copy.** Translatable placeholder copy for a generic service business that
  says what goes there. Never marketing for Agile Base.

## Architecture

- `theme.json`: palette, fluid type and spacing, layout (960px / 1280px), `custom` tokens,
  block styles, `templateParts`, `customTemplates`, `fontFace`s.
- `styles/`: `dark.json` (the Dark variation); `colors/*.json` and `typography/*.json`
  presets, which must hold only `color` or only `typography` keys or the Site Editor stops
  listing them as presets (`typography/system.json` downloads no fonts); `velocity.json`,
  the frozen 1.x look: never edit it.
- `templates/` compose header part → `core/group` `tagName="main"` → footer part. Part text
  lives in `hidden-*` patterns (most parts are a single `wp:pattern` line) so it can be
  translated.
- `patterns/`: building blocks (`Inserter: no`, including the `hidden-*` ones), sections
  (category `agile-base`), page layouts (`Block Types: core/post-content`, offered for
  new pages) and template designs (`Template Types:`, in the Site Editor's Design panel).
- `style.css`: CSS blocks can't express, on `agile-base-` classes.
  `assets/styles/core-<block>.css` loads only on pages with that block;
  `assets/styles/legacy-presets.css` keeps the 1.x preset slugs.
- `functions.php`: `agile_base_` prefix, `function_exists`-wrapped, no classes. Preloads a
  font only while its role still uses the bundled family.

## Conventions

- **All design work goes through `/impeccable`**: tokens, fonts, colors and presets,
  layout, components, states, pattern copy. Load its context once per session
  (`scripts/impeccable context` in the skill folder). `shape` for a new surface; `typeset`,
  `colorize`, `layout`, `adapt` (screen sizes, right-to-left), `harden` (edge states, i18n),
  `clarify` (copy); `critique`/`audit` to review; `polish` to finish. Follow `DESIGN.md`
  and `.impeccable/surfaces/*.md`. Only `/impeccable document` writes `DESIGN.md`.
- Text domain `agile-base`; PHP prefix `agile_base_`.
- Every string a visitor or screen reader gets is translatable (`esc_html_e()`,
  `esc_attr_x()`). Templates and parts can't run PHP, so their text, including block
  labels such as `ariaLabel`, goes in a hidden pattern. `tests/markup-check.mjs` enforces it.
- Write block markup exactly as the editor saves it, or the Site Editor reports "unexpected
  or invalid content". Traps: inline padding is longhand (`padding-top` etc.), never
  `padding`; a button's border color goes inline, not as a `has-*-border-color` class.
- Bylines use Avatar + Post Author Name (the Post Author block is deprecated).
- New fonts: `node bin/add-font.mjs @fontsource-variable/<id>` (woff2 + OFL file; prints the
  `theme.json` entry and readme credit). Credit every bundled asset in `readme.txt`.
- Site Editor changes go back to files with the Create Block Theme plugin.
- **1.x compatibility contract** (`tests/compat-check.mjs`): the 1.x pattern slugs,
  template, part and custom-template names, CSS for every class 1.x put into content, 1.x
  palette, font-size and spacing slugs, the Tags styles `pill`/`plain` and the `agile-base`
  category stay. Restyle them; never delete them.

## Verifying changes

- `npm test`: release structure, block markup and translatable text, 1.x contract. Add
  `tests/release-check.mjs` assertions when structure changes. CI also runs `php -l` and
  `vendor/bin/phpcs .` on pushes and PRs to `main` and `release/**`.
- `npm run check:editor [-- <filter>]`: every template, part and pattern in the ddev
  editor; fails on invalid blocks or console errors.
- `npm run check:frontend -- [--style <name>] [--axe] [--rtl] [--only home,single]
  [--expect-font "<family>"] [--no-webfonts] [label]`: each page type at 375/768/1440 px;
  screenshots in `build/checks/<label>/`. `--style` takes `dark`, `velocity`, `colors/<x>`,
  `typography/<x>` or `client-brand` (`tests/fixtures/client-brand.json`; rerun
  `bin/make-client-brand.mjs` after palette changes) and restores saved styles after.
  `node bin/compare-screenshots.mjs <a> <b>` byte-compares two runs.
- `bash tests/release-package-check.sh` builds the zip and checks its contents. Theme Check:
  no REQUIRED items on the zip (dev-folder hits on `bin/`, `build/`, `phpcs.xml.dist` are fine).
- Local site: ddev, https://theme-dev-wp.ddev.site. Run `ddev wp`/`ddev exec` from the
  WordPress root (`../../..`). Keep `WP_DEBUG` on with no notices. Reset any template or part
  you save in the Site Editor while testing; saves override the theme files.

## Releases

- **2.0 is built on `release/2.0`.** Each plan part
  (`docs/superpowers/plans/2026-10-24-2.0-part-*.md`) is a PR into it; `main` stays 1.4.x
  for hotfixes, merged into `release/2.0` the same day. Part 5 opens `release/2.0` → `main`.
- Bump `Version:` (`style.css`), `Stable tag:` (`readme.txt`), the changelog and the version
  assertions in `tests/release-check.mjs`. If the homepage changed, rerun
  `bin/generate-screenshot.sh` (1200×900) on a site with no Site Editor customizations.
- After merging to `main`: `bash bin/build-release.sh` writes `build/agile-base-X.Y.Z.zip`;
  upload it by hand at https://wordpress.org/themes/upload/. Tag it:
  `git tag -a X.Y.Z -m "X.Y.Z - Short description"`.
- Versions never uploaded fold into the next release's changelog entry.
