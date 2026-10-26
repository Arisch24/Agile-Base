<?php
/**
 * Title: Testimonial
 * Slug: agile-base/testimonial
 * Categories: agile-base, text, featured
 * Keywords: testimonial, quote, review, customer
 * Viewport Width: 1400
 * Description: A large pull quote with attribution. Replace it with a real customer quote.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:group {"className":"agile-base-testimonial","style":{"spacing":{"blockGap":"var:preset|spacing|medium","padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group agile-base-testimonial" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)">
		<!-- wp:paragraph {"className":"agile-base-quote","fontSize":"3-x-large"} -->
		<p class="agile-base-quote has-3-x-large-font-size"><?php esc_html_e( 'Quote a customer in one or two sentences: what changed for them after working with you.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-avatar" aria-hidden="true"><?php echo esc_html_x( 'AB', 'initials of the person quoted', 'agile-base' ); ?></div>
			<!-- /wp:html -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.15em"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
				<p style="font-weight:700"><?php esc_html_e( 'Customer name', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Role, company', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
