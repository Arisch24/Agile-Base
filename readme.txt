=== Agile Base ===
Contributors: arisch24
Requires at least: 6.6
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 2.0.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, portfolio, one-column, wide-blocks, block-patterns, block-styles, custom-colors, custom-logo, editor-style, featured-images, full-site-editing, full-width-template, style-variations, template-editing, threaded-comments, translation-ready

A fast, rebrandable block theme for business and client sites.

== Description ==

Agile Base is a fast block theme for business and client sites. Start with a ready-made homepage or page layout, replace the text and images, and choose your colors and fonts in the Site Editor. No page builder, no theme JavaScript.

* Three starter homepages: Agency, Local Business and Freelancer.
* Page layouts for About, Services, Service Details, Pricing, Team, Contact, Portfolio, Case Study, Landing, Thank You and Legal pages.
* Ready-made sections for services, testimonials, pricing, case studies, FAQs, contact details and more.
* Four headers, including Header (Button), three footers, including Footer (Business), and a Landing Page template with no menu.
* Harbour, Terracotta and Contrast color presets; Classic, Friendly and System font presets. System downloads no fonts.
* Field, Ink and Ruled section styles; Boxed, Double rule and Ruled box block styles.
* Dark style and Velocity, which restores the 1.x colors, fonts and shapes.
* Underlined text links, visible keyboard focus, reduced-motion support and an accessibility statement.
* Self-hosted fonts, fluid typography and spacing, and translation-ready patterns.

== Frequently Asked Questions ==

= How do I start from a starter homepage? =

Go to Appearance → Editor → Templates, open the Front Page, and choose Agency, Local Business or Freelancer in the Design panel. Then replace the placeholder text and add your images; every block says what belongs in it.

= How do I rebrand the theme for a client? =

In Appearance → Editor → Styles, pick a color preset or edit the palette, and pick a font preset (or install fonts in the Font Library and choose them for Body and Headings). The whole site follows. Corner radius and shadows can be changed in a child theme's theme.json under settings.custom.

= Does it include a contact form? =

No. Forms belong in a plugin, so use any form plugin you like: the theme styles its fields, labels and buttons to match. The Contact page layout leaves room for one.

= How do I remove "Proudly powered by WordPress"? =

Open Appearance → Editor → Patterns → Footer (or the footer you use), select the line, and delete or edit it.

= I updated from 1.x. How do I keep the old look? =

Go to Appearance → Editor → Styles → Browse styles and choose "Velocity". It restores the 1.x colors, fonts and shapes.

= Some pages still look like 1.x after updating. Why? =

Templates and template parts you changed in the Site Editor keep your version. To get the 2.0 design, open Appearance → Editor → Templates (or Patterns → Template Parts), choose the item, and use ⋯ → Reset. Your posts and pages are not affected.

== Changelog ==

= 2.0.0 =
* Change: a new design for business and client sites, with bold type, color fields and fine rules inspired by a printed quote book. Choose "Velocity" to keep the 1.x look (see the FAQ).
* Add: three starter homepages (Agency, Local Business, Freelancer), chosen in the Front Page template's Design panel.
* Add: page layouts for Service Details, Portfolio, Case Study, Landing, Thank You and Legal pages; rebuilt About, Pricing, Team and Contact layouts.
* Add: Services Grid, Services List, How It Works, Hero (Split), Hero (Cover), Case Studies, Testimonials Grid, Guarantees, Contact Details, CTA Banner, About the Founder, Subscribe, Text and Image, Latest Posts (Grid and List) and About the Author patterns.
* Add: Header (Button), Footer (Business) and a Landing Page template with no menu.
* Add: Harbour, Terracotta and Contrast color presets; Classic, Friendly and System font presets. System downloads no fonts.
* Add: Field, Ink and Ruled section styles for Group, Columns and Cover blocks; Boxed, Double rule and Ruled box block styles.
* Add: styling for form plugins' fields, labels and buttons.
* Add: an accessibility statement, underlined links in text and visible focus outlines; automated contrast checks in every color preset.
* Change: page layouts no longer repeat the page name as a label above the page.
* Change: self-hosted Public Sans, Archivo, JetBrains Mono and Source Serif 4 fonts. Fonts are only preloaded while in use.
* Fix: category links in post lists are large enough to tap on phones (WCAG 2.2).
* Fix: long words, wide tables and long code lines no longer make posts scroll sideways on phones.
* Fix: homepage feature labels, search, menu and post navigation labels, and style guide labels can now be translated.

= 1.4.1 =
* Fix: the theme screenshot now shows the homepage as it ships. The old one was taken from an earlier draft with hero buttons and a different feature strip.

= 1.4.0 =
* Add: Author archive template with the author's avatar and biography.
* Add: "Blank Canvas" page template with no header or footer, for landing pages.
* Add: "Post (Wide)" post template using the wide content width.
* Add: "Header (Centered)" and "Header (Minimal)" template parts. Swap them in from Appearance → Editor.
* Add: "Footer (Columns)" template part with a footer menu and search.
* Add: ready-made page layouts for About, Services, Pricing, Team and Contact, offered when you create a new page.
* Add: "Team" and "Pricing" block patterns.
* Add: "Archive (List)" design for archive pages: compact rows without images. Apply it from Appearance → Editor.
* Add: "404 (Search First)" design for the not-found page, with search and your latest posts.
* Change: the post author line and the post cards in the blog list now use the Avatar and Author Name blocks (the Post Author block is deprecated).
* Fix: the homepage's feature cards and "Read the blog" button no longer show "Block contains unexpected or invalid content" in the Site Editor.

= 1.0.3 =
* Fix: the homepage now shows the theme's landing page. When "Your homepage displays" was set to "Your latest posts" (the WordPress default), it showed the body of a single post instead.
* Fix: post lists use one full-width column, so a blog with a single post no longer shows it at half width beside an empty column.

= 1.0.2 =
* Fix: tags now show as pills everywhere, including Single Posts templates customized in the Site Editor.
* Add: "Pill" and "Plain" styles for the Tags block. Pill is the default; choose Plain in the block's Styles panel for a regular list.

= 1.0.1 =
* Fix: headings in post content sitting flush against a preceding list, with no spacing above.
* Add: a tag list on single posts.

= 1.0.0 =
* Initial release. Rebuilt as a Full Site Editing block theme.

== Copyright ==

Agile Base WordPress Theme, (C) 2026 Arischvaran Puvanesvaran.
Agile Base is distributed under the terms of the GNU GPL version 2 or later.

== Resources ==

Source Serif 4 font, Copyright 2014 - 2023 Adobe (http://www.adobe.com/), with Reserved Font Name 'Source'
* Source: https://github.com/adobe-fonts/source-serif
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: assets/fonts/OFL-Source-Serif-4.txt

Public Sans font, Copyright 2015 The Public Sans Project Authors
* Source: https://github.com/uswds/public-sans
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: assets/fonts/OFL-Public-Sans.txt

Archivo font, Copyright 2020 The Archivo Project Authors
* Source: https://github.com/Omnibus-Type/Archivo
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: assets/fonts/OFL-Archivo.txt

JetBrains Mono font, Copyright 2020 The JetBrains Mono Project Authors
* Modification: Latin font omits programming ligature features to reduce download size; glyph coverage and weight range are retained.
* Source: https://github.com/JetBrains/JetBrainsMono
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: assets/fonts/OFL-JetBrains-Mono.txt

Figtree font, Copyright 2022 The Figtree Project Authors
* Source: https://github.com/erikdkennedy/figtree
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: assets/fonts/OFL-Figtree.txt

Space Grotesk font, Copyright 2020 The Space Grotesk Project Authors
* Source: https://github.com/floriankarsten/space-grotesk
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: assets/fonts/OFL-Space-Grotesk.txt

Space Mono font, Copyright 2016 The Space Mono Project Authors
* Source: https://github.com/googlefonts/spacemono
* License: SIL Open Font License, 1.1
* License URI: https://scripts.sil.org/OFL
* License bundled at: assets/fonts/OFL-Space-Mono.txt

Logo mark and screenshot, Copyright 2026 Arischvaran Puvanesvaran
* Source: Original artwork created for Agile Base
* License: GNU General Public License v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html

placeholder-photo.webp, photo by Quino Al (2016, released under CC0 on Unsplash before its license change) via Wikimedia Commons, cropped and resized
* Source: https://commons.wikimedia.org/wiki/File:Black_and_white_pottery_(Unsplash).jpg
* License: CC0 1.0 Universal
* License URI: https://creativecommons.org/publicdomain/zero/1.0/
