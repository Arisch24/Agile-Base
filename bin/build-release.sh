#!/usr/bin/env bash
# Build a WordPress.org-ready Agile Base release ZIP from the working tree.

set -euo pipefail

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
THEME_SLUG="agile-base"
VERSION="$(sed -n 's/^Version:[[:space:]]*//p' "$THEME_DIR/style.css" | head -n 1)"
OUTPUT="${1:-$(dirname "$THEME_DIR")/${THEME_SLUG}-${VERSION}.zip}"
STAGING_ROOT="$(mktemp -d)"

cleanup() {
	rm -rf -- "$STAGING_ROOT"
}
trap cleanup EXIT

mkdir -p "$STAGING_ROOT/$THEME_SLUG" "$(dirname "$OUTPUT")"

rsync -a --delete \
	--exclude='.git/' \
	--exclude='.github/' \
	--exclude='.agents/' \
	--exclude='.claude/' \
	--exclude='.codex/' \
	--exclude='.editorconfig' \
	--exclude='.gitattributes' \
	--exclude='.gitignore' \
	--exclude='.DS_Store' \
	--exclude='Thumbs.db' \
	--exclude='AGENTS.md' \
	--exclude='CLAUDE.md' \
	--exclude='README.md' \
	--exclude='bin/' \
	--exclude='composer.json' \
	--exclude='composer.lock' \
	--exclude='docs/' \
	--exclude='phpcs.xml.dist' \
	--exclude='tests/' \
	--exclude='todo.txt' \
	--exclude='vendor/' \
	--exclude='node_modules/' \
	"$THEME_DIR/" "$STAGING_ROOT/$THEME_SLUG/"

python3 -m zipfile -c "$OUTPUT" "$STAGING_ROOT/$THEME_SLUG"

python3 - "$OUTPUT" "$THEME_SLUG" <<'PY'
import sys
import zipfile

archive, slug = sys.argv[1:]
forbidden = {
    f"{slug}/.agents/",
    f"{slug}/.claude/",
    f"{slug}/.codex/",
    f"{slug}/.github/",
    f"{slug}/bin/",
    f"{slug}/composer.json",
    f"{slug}/composer.lock",
    f"{slug}/docs/",
    f"{slug}/phpcs.xml.dist",
    f"{slug}/tests/",
    f"{slug}/todo.txt",
    f"{slug}/vendor/",
    f"{slug}/node_modules/",
}

with zipfile.ZipFile(archive) as release:
    names = release.namelist()
    if not names or any(not name.startswith(f"{slug}/") for name in names):
        raise SystemExit("error: release ZIP has an invalid root directory")
    if any(any(name == item or name.startswith(item) for item in forbidden) for name in names):
        raise SystemExit("error: release ZIP contains development-only files")
    bad = release.testzip()
    if bad:
        raise SystemExit(f"error: corrupt ZIP member: {bad}")

print(f"Wrote {archive} ({len(names)} files and directories)")
PY
