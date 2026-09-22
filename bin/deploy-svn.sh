#!/bin/bash
#
# Deploy this theme to the WordPress.org theme SVN repository.
#
# WordPress.org themes do NOT use the plugin convention (trunk/tags/
# assets). Confirmed against the live repo and the Theme Handbook
# (https://developer.wordpress.org/themes/releasing-your-theme/updating-your-theme/):
# each release is its own complete, immutable top-level directory
# named exactly after its version (e.g. "1.0.1/"), containing the full
# theme. There is no trunk to update in place -- WordPress.org reads
# the live version from readme.txt's Stable tag and serves whichever
# version-named directory matches. Once a commit lands it cannot be
# edited or removed; a mistake needs a new version directory, not a
# fix to the old one -- so this always supports --dry-run, and CI
# defaults to it (see .github/workflows/deploy-svn.yml).
#
# An earlier version of this script was adapted from
# 10up/action-wordpress-plugin-deploy (MIT License, Copyright (c) 2019
# Helen Hou-Sandi), which is plugin-only -- plugins.svn.wordpress.org
# is hardcoded in its deploy.sh, not an input, so it can't target a
# theme's SVN repo even retargeted. A first attempt here assumed
# themes shared the plugin trunk/tags layout; a dry run against the
# real repo showed that assumption was wrong before anything was
# committed. What's left from that version: SVN auto-install, the
# `git archive` + .gitattributes export approach, and the CLI/env-var
# shape (VERSION/SLUG/DRY_RUN, `set -eo` without pipefail since the
# `svn status | grep` step is expected to not match most of the time).
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

SVN_URL="https://themes.svn.wordpress.org/${SLUG}/"
SVN_DIR="${HOME}/svn-${SLUG}"

echo "➤ Checking out .org repository (shallow -- just the version list)..."
rm -rf "$SVN_DIR"
svn checkout --depth immediates "$SVN_URL" "$SVN_DIR"
cd "$SVN_DIR"

echo "ℹ Published versions: $(ls -1 | tr '\n' ' ')"

if [[ -d "$VERSION" ]]; then
	echo "ℹ Version $VERSION of $SLUG was already published -- nothing to do"
	exit
fi

echo "➤ Exporting a clean copy of the theme (git archive + .gitattributes export-ignore)..."
mkdir "$VERSION"
git -C "$GITHUB_WORKSPACE" config --global --add safe.directory "$GITHUB_WORKSPACE" 2>/dev/null || true
git -C "$GITHUB_WORKSPACE" archive HEAD | tar x --directory="$SVN_DIR/$VERSION"

echo "➤ Preparing files..."
svn add "$VERSION" --force >/dev/null

svn status

if $DRY_RUN; then
	echo "➤ Dry run: files not committed. The above is exactly what would ship."
else
	echo "➤ Committing files..."
	svn commit -m "Release $VERSION" --no-auth-cache --non-interactive \
		--username "$SVN_USERNAME" --password "$SVN_PASSWORD"
	echo "✓ Theme deployed! https://themes.svn.wordpress.org/$SLUG/$VERSION/"
	echo "  Remember: readme.txt's Stable tag must equal $VERSION for WordPress.org to serve this as the current version."
fi
