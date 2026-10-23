# Agile Base

A clean, fast **Full Site Editing (block) theme** for WordPress — built for blogs and
simple sites. No page builder, no build step: everything is driven by `theme.json`,
block templates, and core blocks.

Install it from the [WordPress.org theme directory](https://wordpress.org/themes/agile-base/),
or in your dashboard under **Appearance → Themes → Add New Theme** (search for "Agile Base").

## Features

- Full Site Editing with templates for the homepage, blog, posts, pages, archives,
  author pages, search and 404 (`templates/`)
- Extra templates to pick per post or page: **Post (Wide)**, **Page (Full Width)**,
  **Page (No Title)** and **Blank Canvas** (no header or footer, for landing pages)
- Three headers (default, **Centered**, **Minimal**) and two footers (default,
  **Columns**) to swap in from the Site Editor (`parts/`)
- Ready-made page layouts for **About**, **Services**, **Pricing**, **Team** and
  **Contact**, offered when you create a new page
- Section patterns: hero, logos, features, stats, testimonial, FAQ, team, pricing,
  call to action and a style guide (`patterns/`)
- Alternative designs for archives (**Archive (List)**) and the 404 page
  (**404 (Search First)**), picked from the template's **Design** panel in the Site Editor
- `theme.json` v3 design system — fluid typography, fluid spacing, color palette
- **Light** and **Dark** style variations (`styles/`)
- Self-hosted **Figtree**, **Space Grotesk**, and **Space Mono** fonts (no external requests)
- Translation-ready (`agile-base` text domain)

## Requirements

- WordPress 6.6+
- PHP 7.4+

## Development

This is a no-build theme. Edit `theme.json`, the `.html` templates/parts, and the
`.php` patterns directly, then edit visually in **Appearance → Editor**. The
[Create Block Theme](https://wordpress.org/plugins/create-block-theme/) plugin is
handy for exporting Site Editor changes back to these files and for managing fonts.

Checks (CI runs them on every pull request):

```sh
node tests/release-check.mjs        # source checks: versions, changelog, templates, patterns
bash tests/release-package-check.sh # builds a release zip and checks its contents
composer install && vendor/bin/phpcs . # WordPress coding standards (phpcs.xml.dist)
```

To build a release, run `bash bin/build-release.sh`. It writes
`build/agile-base-<version>.zip` without the dev-only files, ready to upload to
WordPress.org.
