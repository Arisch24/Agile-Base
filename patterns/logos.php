<?php
/**
 * Title: Logos Strip
 * Slug: agile-base/logos
 * Categories: agile-base, featured
 * Keywords: logos, clients, brands, trust
 * Viewport Width: 1400
 * Description: A ruled row of brand names to show who you work with.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"agile-base-ruled","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agile-base-ruled" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-small","left":"var:preset|spacing|large"}},"typography":{"fontWeight":"700"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide" style="font-weight:700">
		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size"><?php echo esc_html_x( 'Northwind', 'placeholder company name', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size"><?php echo wp_kses_post( _x( 'Acme&nbsp;Co', 'placeholder company name', 'agile-base' ) ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size"><?php echo esc_html_x( 'Lumen', 'placeholder company name', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size"><?php echo esc_html_x( 'Hatch', 'placeholder company name', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size"><?php echo esc_html_x( 'Vertex', 'placeholder company name', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
