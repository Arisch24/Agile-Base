# AGENTS.md

When reporting information to me, be extremely concise and sacrifice grammar for sake of concision.

## Overview

**Agile Base**: a no-build WordPress block theme (`theme.json` v3), on WordPress.org as
`agile-base` (author `arisch24`). Who it's for: `PRODUCT.md`. Design system: `DESIGN.md`.

## Architecture

- `theme.json`: palette, fluid type and spacing, layout (960px / 1280px), `custom` tokens,
  block styles, `templateParts`, `customTemplates`, `fontFace`s.
- `styles/`: `dark.json` (the Dark variation); `colors/*.json` and `typography/*.json`
  presets, which must hold only `color` or only `typography` keys or the Site Editor stops
  listing them as presets (`typography/system.json` downloads no fonts); `velocity.json`,
  the frozen 1.x look: never change it, except to add a palette color 2.0 patterns need
  (such as `on-primary`).
- `styles/sections/` and `styles/blocks/` hold section and block styles.
- `templates/` compose header part → `core/group` `tagName="main"` → footer part. Part text
  lives in `hidden-*` patterns (most parts are a single `wp:pattern` line) so it can be
  translated.
- `patterns/`: building blocks (`Inserter: no`, including the `hidden-*` ones), sections
  (category `agile-base`), page layouts (`Block Types: core/post-content`, offered for
  new pages) and template designs (`Template Types:`, in the Site Editor's Design panel).
  Starter homepages are `template-front-page-*` designs in the front page Design panel;
  their content lives in `hidden-home-*` patterns (Agency uses `page-home`).
- `style.css`: CSS blocks can't express, on `agile-base-` classes.
  `assets/styles/core-<block>.css` loads only on pages with that block;
  `assets/styles/legacy-presets.css` keeps the 1.x preset slugs.
- `functions.php`: `agile_base_` prefix, `function_exists`-wrapped, no classes. Preloads a
  font only while its role still uses the bundled family.
