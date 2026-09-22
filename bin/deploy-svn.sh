#!/bin/bash
#
# Deploy this theme to the WordPress.org theme SVN repository.
#
# Adapted from 10up/action-wordpress-plugin-deploy (MIT License,
# Copyright (c) 2019 Helen Hou-Sandi -- https://github.com/10up/action-wordpress-plugin-deploy),
# retargeted from plugins.svn.wordpress.org to themes.svn.wordpress.org
# (hardcoded in the original, not an input) and simplified for a
# no-build theme: no .distignore/BUILD_DIR branching, always exports
# via `git archive` + .gitattributes export-ignore.
#
# Not using `pipefail` is deliberate, matching the original: the later
# `grep` for deleted files is expected to not match most of the time,
# which exits non-zero even though that's not an error here.
set -eo

command_exists() { command -v "$1" >/dev/null 2>&1; }

DRY_RUN=false
for arg in "$@"; do
	case "$arg" in
	--dry-run) DRY_RUN=true ;;
	esac
done
VERSION="${1:-}"
if [[ "$VERSION" == --* ]]; then
	VERSION=""
fi

THEME_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
GITHUB_WORKSPACE="${GITHUB_WORKSPACE:-$THEME_DIR}"

SLUG="${SLUG:-agile-base}"
echo "ℹ SLUG is $SLUG"

if [[ -z "$VERSION" ]]; then
	if [[ "${GITHUB_REF:-}" == refs/tags/* ]]; then
		VERSION="${GITHUB_REF#refs/tags/}"
		VERSION="${VERSION#v}"
	else
		VERSION="$(sed -n 's/^Version:[[:space:]]*//p' "$THEME_DIR/style.css" | head -n 1)"
	fi
fi
echo "ℹ VERSION is $VERSION"

if $DRY_RUN; then
	echo "ℹ Dry run: no files will be committed to Subversion."
	[[ -z "${SVN_USERNAME:-}" ]] && echo "Warning: SVN_USERNAME is unset; a real run would fail."
	[[ -z "${SVN_PASSWORD:-}" ]] && echo "Warning: SVN_PASSWORD is unset; a real run would fail."
else
	if [[ -z "${SVN_USERNAME:-}" ]]; then
		echo "Set the SVN_USERNAME env var (or secret, in CI)" >&2
		exit 1
	fi
	if [[ -z "${SVN_PASSWORD:-}" ]]; then
		echo "Set the SVN_PASSWORD env var (or secret, in CI)" >&2
		exit 1
	fi
fi

if command_exists svn; then
	echo "ℹ SVN is already installed."
else
	echo "ℹ Installing SVN..."
	sudo apt-get update -y
	sudo apt-get install -y subversion
	command_exists svn || { echo "Failed to install SVN." >&2; exit 1; }
fi

ASSETS_DIR="${ASSETS_DIR:-.wordpress-org}"
SVN_URL="https://themes.svn.wordpress.org/${SLUG}/"
SVN_DIR="${HOME}/svn-${SLUG}"

echo "➤ Checking out .org repository..."
svn checkout --depth immediates "$SVN_URL" "$SVN_DIR"
cd "$SVN_DIR"
svn update --set-depth infinity assets
svn update --set-depth infinity trunk
svn update --set-depth immediates tags

if [[ -d "tags/$VERSION" ]]; then
	echo "ℹ Version $VERSION of $SLUG was already published"
	exit
fi

echo "➤ Exporting a clean copy of the theme (git archive + .gitattributes export-ignore)..."
TMP_DIR="${HOME}/archivetmp-${SLUG}"
rm -rf "$TMP_DIR"
mkdir "$TMP_DIR"
git -C "$GITHUB_WORKSPACE" config --global --add safe.directory "$GITHUB_WORKSPACE" 2>/dev/null || true
git -C "$GITHUB_WORKSPACE" archive HEAD | tar x --directory="$TMP_DIR"

cd "$SVN_DIR"
echo "➤ Syncing into trunk..."
rsync -rc "$TMP_DIR/" trunk/ --delete --delete-excluded

if [[ -d "$GITHUB_WORKSPACE/$ASSETS_DIR/" ]]; then
	echo "➤ Syncing WordPress.org listing assets (banner/screenshots)..."
	rsync -rc "$GITHUB_WORKSPACE/$ASSETS_DIR/" assets/ --delete
else
	echo "ℹ No $ASSETS_DIR directory found; skipping listing-asset copy"
fi

echo "➤ Preparing files..."
svn add . --force >/dev/null
svn status | grep '^!' | sed 's/! *//' | xargs -I% svn rm %@ >/dev/null

echo "➤ Copying tag..."
svn cp "trunk" "tags/$VERSION"

for ext_type in "png image/png" "jpg image/jpeg" "gif image/gif" "svg image/svg+xml"; do
	ext="${ext_type%% *}"
	mime="${ext_type#* }"
	if [[ -d "$SVN_DIR/assets" ]] && find "$SVN_DIR/assets" -maxdepth 1 -name "*.$ext" -print -quit | grep -q .; then
		svn propset svn:mime-type "$mime" "$SVN_DIR/assets/"*."$ext" || true
	fi
done

svn update
svn status

if $DRY_RUN; then
	echo "➤ Dry run: files not committed."
else
	echo "➤ Committing files..."
	svn commit -m "Update to version $VERSION from GitHub" --no-auth-cache --non-interactive \
		--username "$SVN_USERNAME" --password "$SVN_PASSWORD"
	echo "✓ Theme deployed!"
fi
