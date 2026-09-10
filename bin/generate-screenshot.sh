#!/usr/bin/env bash
#
# Generate the theme's screenshot.png from a live rendering of the homepage.
#
# WordPress.org requires screenshot.png to be 1200x900 (a 4:3 ratio). This
# drives a headless Chromium at that exact viewport and captures it directly,
# so no post-hoc cropping/resizing is needed.
#
# Usage:
#   bin/generate-screenshot.sh [url] [output-path]
#
# Env overrides:
#   CHROME_BIN   path to a Chromium/Chrome binary (auto-detected otherwise)
#   WIDTH        viewport width  (default 1200)
#   HEIGHT       viewport height (default 900)

set -euo pipefail

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
URL="${1:-${SCREENSHOT_URL:-https://theme-dev-wp.ddev.site/}}"
OUTPUT="${2:-$THEME_DIR/screenshot.png}"
WIDTH="${WIDTH:-1200}"
HEIGHT="${HEIGHT:-900}"

find_chrome() {
	if [[ -n "${CHROME_BIN:-}" ]] && [[ -x "$CHROME_BIN" ]]; then
		echo "$CHROME_BIN"
		return 0
	fi

	local candidates=(
		google-chrome
		google-chrome-stable
		chromium
		chromium-browser
	)
	for bin in "${candidates[@]}"; do
		if command -v "$bin" >/dev/null 2>&1; then
			command -v "$bin"
			return 0
		fi
	done

	# Fall back to a Playwright-managed Chromium install, if one is cached
	# locally (e.g. from `npx playwright install`).
	local playwright_chrome
	playwright_chrome="$(find "$HOME/.cache/ms-playwright" -maxdepth 2 -type d -name 'chromium-*' 2>/dev/null \
		| sort -V | tail -n1)"
	if [[ -n "$playwright_chrome" ]] && [[ -x "$playwright_chrome/chrome-linux64/chrome" ]]; then
		echo "$playwright_chrome/chrome-linux64/chrome"
		return 0
	fi

	return 1
}

CHROME_BIN="$(find_chrome)" || {
	echo "error: no Chromium/Chrome binary found. Install one, or set CHROME_BIN=/path/to/chrome." >&2
	exit 1
}

echo "Using Chrome: $CHROME_BIN"
echo "Capturing:    $URL"
echo "Viewport:     ${WIDTH}x${HEIGHT}"

"$CHROME_BIN" \
	--headless=new \
	--disable-gpu \
	--hide-scrollbars \
	--force-device-scale-factor=1 \
	--ignore-certificate-errors \
	--window-size="${WIDTH},${HEIGHT}" \
	--screenshot="$OUTPUT" \
	"$URL"

if [[ ! -s "$OUTPUT" ]]; then
	echo "error: screenshot was not written to $OUTPUT" >&2
	exit 1
fi

echo "Wrote $OUTPUT"
