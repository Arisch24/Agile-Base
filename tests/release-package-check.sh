#!/usr/bin/env bash
set -euo pipefail

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SCRIPT="$THEME_DIR/bin/build-release.sh"

for directory in build .superpowers .aws; do
	rg -Fq -- "--exclude='$directory/'" "$SCRIPT"
	rg -Fq -- "f\"{slug}/$directory/\"" "$SCRIPT"
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
if rg -q '^agile-base/(build|\.superpowers|\.aws)/|\.zip$' <<< "$MEMBERS"; then
	printf 'error: release package contains forbidden development files\n' >&2
	exit 1
fi

printf 'release package checks passed\n'
