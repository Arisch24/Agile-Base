---
name: Agile Base
description: A rebrandable block theme set as a printed quote book, with a canary field, ink, serial numerals and hairline rules.
colors:
  primary: "#fbe35a"
  on-primary: "#000000"
  secondary: "#f2b8c6"
  accent: "#c8321e"
  ink: "#16213e"
  paper: "#ffffff"
  surface: "#f1f2f4"
  black: "#000000"
  white: "#ffffff"
  dark-paper: "#0f1527"
  dark-ink: "#f4f4ef"
  dark-surface: "#1a2340"
  dark-accent: "#ff6b57"
  dark-secondary: "#e592a8"
typography:
  display:
    fontFamily: "Archivo, sans-serif"
    fontSize: "clamp(2.625rem, 1.5rem + 5vi, 5.5rem)"
    fontWeight: 700
    lineHeight: 1.05
    letterSpacing: "-0.025em"
  headline:
    fontFamily: "Archivo, sans-serif"
    fontSize: "clamp(2.125rem, 1.7rem + 2vi, 3rem)"
    fontWeight: 700
    lineHeight: 1.05
    letterSpacing: "-0.025em"
  title:
    fontFamily: "Archivo, sans-serif"
    fontSize: "clamp(1.4375rem, 1.2rem + 1vi, 1.75rem)"
    fontWeight: 700
    lineHeight: 1.05
    letterSpacing: "-0.025em"
  body:
    fontFamily: "'Public Sans', sans-serif"
    fontSize: "clamp(1rem, 0.95rem + 0.2vi, 1.125rem)"
    fontWeight: 400
    lineHeight: 1.55
  label:
    fontFamily: "'JetBrains Mono', ui-monospace, 'SFMono-Regular', Menlo, monospace"
    fontSize: "14px"
    fontWeight: 400
    lineHeight: 1.55
  serial:
    fontFamily: "'JetBrains Mono', ui-monospace, 'SFMono-Regular', Menlo, monospace"
    fontSize: "clamp(2.125rem, 1.7rem + 2vi, 3rem)"
    fontWeight: 700
    lineHeight: 1.55
rounded:
  bar: "0"
  panel: "0"
  card: "2px"
  icon: "2px"
  pill: "999px"
  round: "50%"
spacing:
  x-small: "clamp(1rem, 0.667rem + 1.667vi, 2rem)"
  small: "clamp(1.5rem, 1.167rem + 1.667vi, 2.5rem)"
  medium: "clamp(2rem, 1.5rem + 2.5vi, 3.5rem)"
  large: "clamp(3rem, 2.333rem + 3.333vi, 5rem)"
  x-large: "clamp(4rem, 3rem + 5vi, 7rem)"
  2x-large: "clamp(5rem, 3.667rem + 6.667vi, 9rem)"
  3x-large: "clamp(6rem, 4.333rem + 8.333vi, 11rem)"
components:
  button:
    backgroundColor: "{colors.ink}"
    textColor: "{colors.paper}"
    rounded: "{rounded.bar}"
    padding: "0.75em 1em"
  button-hover:
    backgroundColor: "{colors.paper}"
    textColor: "{colors.ink}"
  button-on-field:
    backgroundColor: "{colors.on-primary}"
    textColor: "{colors.primary}"
    rounded: "{rounded.bar}"
  button-on-field-hover:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.on-primary}"
  field-band:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.on-primary}"
  hero-photo:
    rounded: "{rounded.card}"
    width: "21%"
  service-card:
    backgroundColor: "{colors.paper}"
    textColor: "{colors.ink}"
    rounded: "{rounded.card}"
    padding: "{spacing.small}"
  testimonial:
    backgroundColor: "{colors.secondary}"
    textColor: "{colors.black}"
    rounded: "{rounded.panel}"
  text-input:
    backgroundColor: "{colors.paper}"
    textColor: "{colors.ink}"
    rounded: "{rounded.bar}"
    padding: "0.7em 0.9em"
  serial-numeral:
    textColor: "{colors.accent}"
    typography: "{typography.serial}"
---

# Design System: Agile Base

## Overview

**Creative North Star: "The Quote Book"**

Agile Base looks like the printed quote book of a trade business: a canary-yellow field for the opening page, dark ink on white paper, serial numerals ("No. 001", "01") stamped in monospace, and hairline rules that divide the page the way a form does. Everything is flat and square. Structure comes from rules and boxes, never from shadow or rounding.

It is a base theme, so the system is built to be rebranded. Every visual value reads from a `theme.json` token (plain palette presets read as `--wp--preset--color--*`, three role fonts, shape and motion tokens), and a color preset, a font preset or a client's brand replaces the values without touching the structure. The look has to survive any palette: ruled boxes use `currentColor`, bands use `color-mix` on the current text color, and only the named palette slugs carry color.

**Key Characteristics:**
- Canary field (primary) with Text on Primary (black by default) for the hero and call to action; ink on paper everywhere else.
- Serial numerals in the mono voice and accent color mark ordered things (services, steps).
- Hairline (1px) and heavy (2px) rules in `currentColor` carry all structure.
- Flat and square: zero or 2px corners, no shadows.
- Boxed buttons that invert on hover and focus.
- Links are underlined; focus is a 3px `currentColor` outline.

## Colors

One loud field color, one cool ink, and two supporting hues, all as plain presets (slugs `black`, `white`, `primary`, `on-primary`, `secondary`, `accent`, `paper`, `ink`, `surface`). Components use the slugs, never raw values.

### Primary
- **Canary** (`primary`): the color field of the hero and call to action (`.agile-base-field`), text selection, and the marker swipe behind a single word. Text on it is always `on-primary`.
- **Text on Primary** (`on-primary`): everything on a `primary` background: field text, the filled field button, its outline style, focus rings and selected text. Black by default and in every preset; white in Velocity, whose primary is a mid purple. It sits right after Primary in the palette.

### Secondary
- **Quote Pink** (`secondary`): the testimonial panel, with black text.
- **Redline** (`accent`): serial numerals, the caret, and the invalid-field outline.

### Neutral
- **Ink** (`ink`): body text, button fill, form borders, rules. A cool dark navy.
- **Paper** (`paper`): page background and button inverse.
- **Surface** (`surface`): hover fill for cards and fields, code and preformatted backgrounds.
- **Black / White** (`black`, `white`): fixed pair for text on `secondary`; they do not change with the style.

### Presets (style variations)
Each preset swaps only the palette values behind the same nine slugs.
- **Dark**: paper deep navy, ink warm off-white, same canary, lighter pink and coral accent.
- **Harbour**: aqua primary, pale blue secondary, teal accent, navy ink.
- **Terracotta**: peach primary, sand secondary, brick accent, brown ink.
- **Contrast**: pure yellow, black ink on white, grey secondary, deep red accent.

### Rebrand model
- A color preset or a client's brand can change: every palette value, including `primary`, which fills the field.
- It cannot change: the slug names, which slug plays which role, the structure of rules and boxes, or that everything on a color field takes `on-primary`.
- **The Text-On-Primary Rule.** Everything on a `primary` field takes `on-primary`: the text, the filled button (on-primary fill, primary text), the outline button, focus rings and selected text. A client can pick any primary, dark or light, as long as its palette sets `on-primary` to whichever of black or white reads at 4.5:1 or more; `bin/make-client-brand.mjs` picks it, and `tests/release-check.mjs` checks every palette.

## Typography

**Display Font:** Archivo (with sans-serif), headings, stat figures, quotes, post navigation, site chrome titles
**Body Font:** Public Sans (with sans-serif), running text and UI
**Label/Mono Font:** JetBrains Mono (with ui-monospace, Menlo), serial numerals, post meta, cite lines, code, the feature strip

**Character:** A tight, heavy grotesque on headings against a calm, wide-reading body, with a monospace voice for anything that counts or measures. All three are self-hosted OFL variable fonts with latin and latin-ext subsets, no external requests.

### Hierarchy
- **Display** (Archivo 700, `5x-large` 52px to 88px, 1.05): hero headline scale; `4x-large` (42 to 64px) is the h1 and the standard hero h2.
- **Headline** (Archivo 700, `3x-large` 34 to 48px, 1.05): h2 section titles.
- **Title** (Archivo 700, `2x-large` 28 to 36px for h3, `x-large` 23 to 28px for card titles and h4, 1.05): sub-sections and card headings; h5 is `large` (19 to 22px), h6 `medium`.
- **Body** (Public Sans 400, `medium` 16 to 18px, 1.55): paragraphs; FAQ answers and author bio are capped near 60ch.
- **Label** (JetBrains Mono, `small` 14px or `x-small` 12px): post meta (muted to 72% of current color), swatch labels, the feature strip (uppercase, 0.1em tracking).
- **Serial** (JetBrains Mono 700, `large` for "No. 001" up to `3x-large` for step "01", accent color): ordered items.

Headings carry `letter-spacing: -0.025em` and `word-spacing: 0.08em`. Heading sizes are set on the element in `theme.json`, so a heading level keeps its size whatever size class it carries. Weights come from `--wp--custom--font-weight--*`; line heights from `--wp--custom--line-height--{body,heading,one}`.

### Font presets
- **Classic**: Public Sans body with heading weight 600 and -0.01em tracking.
- **Friendly**: Figtree body, -0.02em heading tracking.
- **System**: system sans for body and display and a system mono; no font files are requested at all.
- A font preset or client can change the three role families and heading tracking and weight. It cannot change the roles themselves: body, display and mono are always the three slots, so the mono voice for serials and meta persists in every preset.

### Named Rules
**The Three Roles Rule.** Fonts are referenced only through `--wp--custom--font--{body,display,mono}`; never name a family in CSS or markup.
**The Measurement Rule.** Anything that counts, orders or measures (serials, dates, bylines, citations, code) is set in the mono voice.

## Layout

Constrained flow: content 960px, wide 1280px, with root-padding-aware full-bleed sections. Sections are full-width bands with vertical padding from the spacing scale (typically `2x-large` top and bottom; `medium` top and bottom for the hero), holding a wide inner group. Card sets use a CSS grid with three columns and a 17rem minimum, or wrapping columns with `medium` gaps.

The top is compact. The page has no padding above the header or below the footer; the header pads itself `x-small`, and the homepage hero meets it with no gap. The homepage hero is three columns: the serial (12%), the headline, lead and buttons (62%), and the photo (21%). They stack on phones and tablets, the photo last, kept to half the width from 600 to 781px. At 1366×768 and 1440×900 the next section starts within 85% of the screen, and on a 375×812 phone the first button ends within 80% (`check-frontend --fold`; Velocity, the frozen 1.x look, is exempt).

Spacing is a fluid seven-step scale (`x-small` 16px up to `3x-large` 96 to 176px, all `clamp()`), and block gap is a separate fluid gap scale (`--wp--custom--gap--*`, default `small`). Adjacent full-width sections touch edge to edge, with no gap between color fields. Logical properties only (`margin-block`, `padding-inline`, `border-inline-end`, `inset-inline-start`, `text-align: end`) so right-to-left needs no overrides.

## Elevation & Depth

No shadows. Depth is a drawn edge: 1px hairlines, 2px heavy rules, and flat fills. The `card` shadow preset is `none` and the theme ships no shadow in use. State is shown by a fill change (surface on card and field hover, a 6 to 12% `currentColor` tint on links and summaries) and by inversion, never by lift.

### Named Rules
**The Flat Rule.** Nothing casts a shadow, at rest or on hover. Hierarchy is made with rules, fills and type size.

## Shapes

Square. Buttons, fields, panels and post-navigation links have 0 radius (`bar`, `panel`); cards, images and code blocks have a 2px radius (`card`); the feature icon box is 2px (`icon`). Circles (`round`) are reserved for avatars; `pill` exists for tag pills only. Borders are `currentColor` so they follow any text color: 1px for hairlines, 2px for buttons, heavy rules above reasons and steps, and the header (1px below) and footer (2px above).

## Components

### Buttons
- **Shape:** square, 2px ink border (0 radius).
- **Primary:** ink fill, paper text, bold, `0.75em 1em` padding, line height 1.
- **Hover / Focus:** invert to paper fill, ink text, over 0.12s; focus adds the 3px `currentColor` outline at 3px offset. The outline style inverts the other way (transparent to ink fill).
- **On a color field:** `on-primary` fill with `primary` text, inverting to transparent with `on-primary` text; the outline style is transparent with `on-primary` text, inverting to an `on-primary` fill. Focus rings take `on-primary`. Button text is `large` on a field. Submit inputs follow the standard button.

### Color field (`agile-base-field`)
The hero and call to action: a full-width `primary` band, `on-primary` text, large headline and a bold lead sentence, two buttons. This is the one place the accent canvas appears.

### Hero photo (`agile-base-hero-photo`)
The only bundled photo: a black-and-white CC0 placeholder (a potter's hands) in the homepage hero's right column, 4:3, 2px radius, credited in `readme.txt`. Monochrome, so it holds against any primary. It stacks under the buttons on narrow screens. Every other image slot stays empty.

### Ruled row (`agile-base-ruled`)
A hairline above and below, used for the logo row. The feature strip uses 2px rules above and below.

### Service card (`agile-base-service`)
A 1px ruled box, 2px radius, `small` padding, containing a serial numeral ("No. 001"), a title, a sentence and an underlined link. Three-up grid.

### Reason (`agile-base-reason`) and Step (`agile-base-step`)
A 2px rule above a column, `x-small` padding below it. The step leads with a large accent mono numeral ("01"); the reason carries a feature icon box.

### Testimonial (`agile-base-testimonial`)
A square `secondary` panel with black text and a 2px rule on top; the quote is Archivo bold with an oversized opening quotation mark drawn behind it; the avatar is initials on an ink circle.

### FAQ (`agile-base-faq`)
Native `details` as ruled lines: 2px rules top and bottom, 1px between items, a border-drawn chevron that rotates on open, a height transition only when motion is allowed, a 6% tint on hover and an inset 3px focus outline.

### Post navigation (`agile-base-postnav`) and post meta (`agile-base-postmeta`)
Postnav: a hairline above, then two bordered (2px) square links in Archivo that invert to ink fill on hover and focus; the next link aligns to the end. Postmeta: a row ruled above and below with a round avatar and mono meta text.

### Post cards
A 1px ruled box with 2px radius that fills with `surface` on hover.

### Inputs / Fields
Any form plugin's inputs inherit: `0.7em 0.9em` padding, 1px ink border, 0 radius, paper background, surface on hover, 3px `currentColor` focus outline at 2px offset, accent border and 2px accent outline when invalid, 0.65 opacity when disabled.

### Navigation
Header: logo, bold site title and navigation, `x-small` padding above and below, ruled below with a 1px line. Nav links are plain and underline on hover; the footer is ruled above with a 2px line. Header and footer variants (centered, minimal, columns) share these rules.

### Motion
Short and functional: 0.1 to 0.2s (`--wp--custom--motion--*`) color and background transitions only, ease timing, all disabled under `prefers-reduced-motion: reduce`.

## Do's and Don'ts

### Do:
- **Do** read every color from a palette slug and every font from a role token, so presets and client brands change everything.
- **Do** underline text links (thickness 0.08em, offset 0.2em), removing the underline on hover and adding a 12% tint.
- **Do** show focus as a 3px `currentColor` outline.
- **Do** put `on-primary` text, buttons and focus rings on `primary` fields.
- **Do** mark ordered items with a mono serial numeral in the accent color.
- **Do** divide content with `currentColor` rules (1px hairline, 2px heavy) and square corners.
- **Do** write spacing and borders in logical properties.
- **Do** keep AA contrast in every preset, including Dark.

### Don't:
- **Don't** add shadows, gradients as decoration, or rounded corners beyond the 2px card radius.
- **Don't** place a label, kicker or small caps line above a heading; the heading opens the section.
- **Don't** hardcode colors, font families or sizes in CSS or markup.
- **Don't** use physical properties (`margin-left`, `padding-right`, `text-align: left`) in new CSS.
- **Don't** set black, ink, white, paper or any other color's text on `primary`; it takes `on-primary`.
- **Don't** rename or remove slugs, tokens or classes; restyle them.
- **Don't** use the 1.x "Velocity" look (soft shadows, rounded pills) as a reference.
