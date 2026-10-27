#!/usr/bin/env bash
set -euo pipefail

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SCRIPT="$THEME_DIR/bin/build-release.sh"

for directory in build .superpowers .aws; do
	rg -Fq -- "--exclude='$directory/'" "$SCRIPT"
	rg -Fq -- "f\"{slug}/$directory/\"" "$SCRIPT"
done
for file in package.json package-lock.json PRODUCT.md DESIGN.md; do
	rg -Fq -- "--exclude='$file'" "$SCRIPT"
	rg -Fq -- "f\"{slug}/$file\"" "$SCRIPT"
	rg -Fq -- "/$file export-ignore" "$THEME_DIR/.gitattributes"
done
rg -Fq -- "--exclude='*.zip'" "$SCRIPT"
rg -Fq -- "name.lower().endswith('.zip')" "$SCRIPT"

NESTED_ZIP="$(mktemp --tmpdir="$THEME_DIR/assets" --suffix=.zip package-check.XXXXXX)"
mkdir -p "$THEME_DIR/build"
OUTPUT="$(mktemp --tmpdir="$THEME_DIR/build" --suffix=.zip package-check.XXXXXX)"
trap 'rm -f -- "$NESTED_ZIP" "$OUTPUT"' EXIT

bash "$SCRIPT" "$OUTPUT"
MEMBERS="$(unzip -Z -1 "$OUTPUT")"

rg -q '^agile-base/assets/styles/core-post-terms\.css$' <<< "$MEMBERS"
rg -q '^agile-base/functions\.php$' <<< "$MEMBERS"
rg -q '^agile-base/assets/images/placeholder-photo\.webp$' <<< "$MEMBERS"
if rg -q '^agile-base/(build|\.superpowers|\.aws)/|\.zip$|^agile-base/(package(-lock)?\.json|PRODUCT\.md|DESIGN\.md)$' <<< "$MEMBERS"; then
	printf 'error: release package contains forbidden development files\n' >&2
	exit 1
fi

printf 'release package checks passed\n'
