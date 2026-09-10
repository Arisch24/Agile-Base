# Agile Base

A clean, fast **Full Site Editing (block) theme** for WordPress — built for blogs and
simple sites. No page builder, no build step: everything is driven by `theme.json`,
block templates, and core blocks.

## Features

- Full Site Editing: block templates (`templates/`) and template parts (`parts/`)
- `theme.json` v3 design system — fluid typography, fluid spacing, color palette
- **Light** and **Dark** style variations (`styles/`)
- Self-hosted **Figtree**, **Space Grotesk**, and **Space Mono** fonts (no external requests)
- Editor-ready block patterns (`patterns/`)
- Translation-ready (`agile-base` text domain)

## Requirements

- WordPress 6.6+
- PHP 7.4+

## Development

This is a no-build theme. Edit `theme.json`, the `.html` templates/parts, and the
`.php` patterns directly, then edit visually in **Appearance → Editor**. The
[Create Block Theme](https://wordpress.org/plugins/create-block-theme/) plugin is
handy for exporting Site Editor changes back to these files and for managing fonts.

PHP is linted against the WordPress coding standards via `phpcs.xml.dist`.
