#!/usr/bin/env bash
# Run every browser check against a live WordPress site with Agile Base active: the
# local DDEV site, or another site named by WP_URL and WP_CLI (CI builds one).
#
# Usage: bash bin/check-site.sh [pages] [styles] [editor]   (default: all three)
#   pages   each page type with axe, the fold, right to left, focus at 1440 and 375px,
#           reduced motion, weight, the mobile menu under each header, 1.x content,
#           and the QA tool fixtures
#   styles  each page type with axe, under every style variation and preset
#   editor  every template, part and pattern in the WordPress editors
#
# While it runs, a "Test: Patterns gallery" page holds every inserter pattern and is the
# newest page, so the front-end checks render every pattern. It and the header pages for
# the menu check are deleted afterwards.
set -uo pipefail
cd "$(dirname "$0")/.."
export WP_URL="${WP_URL:-https://theme-dev-wp.ddev.site}"
read -ra wp_cli <<< "${WP_CLI:-ddev wp}"
site_wp() { "${wp_cli[@]}" "$@"; }

groups=("$@")
[ ${#groups[@]} -gt 0 ] || groups=(pages styles editor)
gallery_needed=false
for group in "${groups[@]}"; do
	case "$group" in
		pages | styles) gallery_needed=true ;;
		editor) ;;
		*) echo 'usage: bash bin/check-site.sh [pages] [styles] [editor]' >&2; exit 2 ;;
	esac
done

failed=()
run() {
	printf '\n== %s\n' "$*"
	"$@" || failed+=("$*")
}

gallery=''
headers=()
delete_pages() {
	[ $# -eq 0 ] || site_wp post delete "$@" --force > /dev/null
}
trap 'delete_pages ${gallery:+"$gallery"} "${headers[@]}"' EXIT
trap 'exit 130' INT TERM

if $gallery_needed; then
	# WordPress caches the theme's pattern files; refresh so the gallery has them all.
	site_wp eval 'wp_get_theme()->delete_pattern_cache();'
	# page-home carries the front page's <h1>; every other pattern adds <h2>s at most.
	gallery=$(site_wp eval 'kses_remove_filters(); $c = ""; foreach ( WP_Block_Patterns_Registry::get_instance()->get_all_registered() as $p ) { if ( 0 === strpos( $p["name"], "agile-base/" ) && "agile-base/page-home" !== $p["name"] && ( ! isset( $p["inserter"] ) || false !== $p["inserter"] ) && empty( $p["templateTypes"] ) ) { $c .= $p["content"]; } } echo wp_insert_post( array( "post_type" => "page", "post_status" => "publish", "post_title" => "Test: Patterns gallery", "post_content" => $c ) );')
fi

for group in "${groups[@]}"; do
	case "$group" in
		pages)
			run node bin/check-frontend.mjs --axe
			run node bin/check-frontend.mjs --fold --only home fold
			run node bin/check-frontend.mjs --rtl rtl
			# Focus stops are capped, so these use a content page rather than the gallery.
			read -ra urls <<< "$(site_wp eval '
				$post = get_posts( array( "numberposts" => 1 ) );
				$page = get_posts( array( "post_type" => "page", "numberposts" => 1, "post__not_in" => array( '"$gallery"', (int) get_option( "page_on_front" ), (int) get_option( "page_for_posts" ) ) ) );
				$cat = get_terms( array( "taxonomy" => "category", "number" => 1, "hide_empty" => true ) );
				echo implode( " ", array_filter( array( home_url( "/" ), $post ? get_permalink( $post[0] ) : "", $page ? get_permalink( $page[0] ) : "", $cat ? get_term_link( $cat[0] ) : "", home_url( "/?s=a" ), home_url( "/agile-base-404-check/" ) ) ) );')"
			run node bin/check-focus.mjs "${urls[@]}"
			run node bin/check-focus.mjs --width 375 "${urls[@]}"
			run node bin/check-motion.mjs "${urls[@]}"
			run node bin/check-weight.mjs "${urls[@]}"
			menus=("$WP_URL/")
			for part in header header-centered header-minimal header-cta; do
				id=$(site_wp post create --post_type=page --post_status=publish --post_title="Test: $part" --page_template=page-blank --post_content="<!-- wp:template-part {\"slug\":\"$part\",\"theme\":\"agile-base\",\"tagName\":\"header\"} /--><!-- wp:heading {\"level\":1} --><h1 class=\"wp-block-heading\">Test: $part</h1><!-- /wp:heading -->" --porcelain)
				headers+=("$id")
				menus+=("$WP_URL/?page_id=$id")
			done
			run node bin/check-menu.mjs "${menus[@]}"
			# Delete the header pages now, so the gallery stays the newest page for later groups.
			delete_pages "${headers[@]}"
			headers=()
			run node bin/check-legacy-content.mjs --axe
			run node tests/qa-tools-check.mjs
			;;
		styles)
			styles=(dark velocity client-brand)
			for file in styles/colors/*.json styles/typography/*.json; do
				file=${file#styles/}
				styles+=("${file%.json}")
			done
			for style in "${styles[@]}"; do
				if [ "$style" = typography/system ]; then
					run node bin/check-frontend.mjs --style "$style" --axe --no-webfonts
				else
					run node bin/check-frontend.mjs --style "$style" --axe
				fi
			done
			;;
		editor)
			run node bin/check-editor.mjs
			;;
	esac
done

if [ ${#failed[@]} -gt 0 ]; then
	printf '\n%s failed:\n' "${#failed[@]}"
	printf '  %s\n' "${failed[@]}"
	exit 1
fi
printf '\nsite checks passed (%s)\n' "${groups[*]}"
