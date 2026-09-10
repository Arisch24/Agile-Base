<?php
/**
 * Title: Logos Strip
 * Slug: agile-base/logos
 * Categories: agile-base, featured
 * Description: A row of brand names to show who you work with.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:paragraph {"align":"center","className":"agile-base-eyebrow"} -->
	<p class="agile-base-eyebrow has-text-align-center"><?php esc_html_e( 'Trusted by teams everywhere', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|x-large"}},"typography":{"fontWeight":"700"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-group" style="font-weight:700">
		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">Northwind</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">Acme&nbsp;Co</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">Lumen</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">Hatch</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">Vertex</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
