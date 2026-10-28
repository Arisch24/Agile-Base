# Agile Base

A fast WordPress block theme for business and client sites. Rebrand ready-made
sections, pages and starter homepages in the Site Editor. No page builder, theme
JavaScript or build step.

Install it from the [WordPress.org theme directory](https://wordpress.org/themes/agile-base/),
or in your dashboard under **Appearance → Themes → Add New Theme** (search for "Agile Base").

## Features

- Three starter homepages: Agency, Local Business and Freelancer, in the Front Page Design panel.
- Page layouts for About, Services, Service Details, Pricing, Team, Contact, Portfolio, Case Study, Landing, Thank You and Legal.
- Business sections: services, case studies, testimonials, pricing, FAQs, contact details, calls to action and more.
- Four headers, including Header (Button), and three footers, including Footer (Business).
- Landing Page (no menu), Blank Canvas, Page (Full Width), Page (No Title) and Post (Wide) templates.
- Harbour, Terracotta and Contrast color presets; Classic, Friendly and System font presets. System downloads no fonts.
- Field, Ink and Ruled section styles; Boxed, Double rule and Ruled box block styles.
- Dark and Velocity variations. Velocity restores the 1.x colors, fonts and shapes.
- Self-hosted Public Sans, Archivo, JetBrains Mono and Source Serif 4; legacy fonts remain for Velocity.
- Fluid type and spacing, underlined text links, visible focus, reduced-motion support and [accessibility statement](accessibility.txt).
- Right-to-left layouts with isolated phone/email links; translation-ready patterns and template parts.

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
npm test                           # source, block markup, 1.x compatibility and 2.x API
npm run check:frontend -- --axe     # live DDEV pages and accessibility
npm run check:editor                # templates, parts and patterns in WordPress editors
npm run check:tools                 # browser QA tool regression fixtures
bash tests/release-package-check.sh # builds a release zip and checks its contents
composer install && vendor/bin/phpcs . # WordPress coding standards (phpcs.xml.dist)
```

To build a release, run `bash bin/build-release.sh`. It writes
`build/agile-base-<version>.zip` without the dev-only files, ready to upload to
WordPress.org.
