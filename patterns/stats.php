<?php
/**
 * Title: Stats
 * Slug: agile-base/stats
 * Categories: agile-base, featured
 * Keywords: stats, numbers, figures, proof
 * Viewport Width: 1400
 * Description: A dark field of three headline figures. Replace the placeholder numbers with your own.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","backgroundColor":"ink","textColor":"paper","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-paper-color has-ink-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|large"}}}} -->
	<div class="wp-block-columns alignwide">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"agile-base-stat-number","fontSize":"5-x-large"} -->
				<p class="agile-base-stat-number has-5-x-large-font-size">12</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"medium"} -->
				<p class="has-medium-font-size"><?php esc_html_e( 'Years in business', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"agile-base-stat-number","fontSize":"5-x-large"} -->
				<p class="agile-base-stat-number has-5-x-large-font-size">350</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"medium"} -->
				<p class="has-medium-font-size"><?php esc_html_e( 'Projects delivered', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:paragraph {"className":"agile-base-stat-number","fontSize":"5-x-large"} -->
				<p class="agile-base-stat-number has-5-x-large-font-size">48h</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"medium"} -->
				<p class="has-medium-font-size"><?php esc_html_e( 'Time to your first reply', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
