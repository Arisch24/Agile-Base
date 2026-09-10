<?php
/**
 * Title: Hidden Footer Credit
 * Slug: agile-base/hidden-footer-credit
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">
<?php
printf(
	/* translators: %s: WordPress.org link. */
	wp_kses_post( __( 'Proudly powered by %s', 'agile-base' ) ),
	'<a href="https://wordpress.org" rel="nofollow">WordPress</a>'
);
?>
</p>
<!-- /wp:paragraph -->
