<?php
/**
 * Title: Testimonial
 * Slug: agile-base/testimonial
 * Categories: agile-base, text, featured
 * Description: A large left-aligned pull quote with attribution.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|3-x-large","bottom":"var:preset|spacing|3-x-large"}}},"layout":{"type":"constrained","contentSize":"900px"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--3-x-large);padding-bottom:var(--wp--preset--spacing--3-x-large)">
	<!-- wp:group {"className":"agile-base-testimonial","style":{"spacing":{"blockGap":"var:preset|spacing|medium","padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group agile-base-testimonial" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--x-large)">
		<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
		<p class="agile-base-eyebrow"><?php esc_html_e( 'From the field', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"agile-base-quote","fontSize":"4-x-large"} -->
		<p class="agile-base-quote has-4-x-large-font-size">
		<?php
		/* translators: %s: the highlighted word "weekend". */
		printf( wp_kses( __( 'We rebuilt our whole site in a %s, and our editors actually look forward to publishing now.', 'agile-base' ), array( 'mark' => array( 'class' => true ) ) ), '<mark class="agile-base-mark">weekend</mark>' );
		?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-avatar" aria-hidden="true">RC</div>
			<!-- /wp:html -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"0.15em"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
				<p style="font-weight:700"><?php esc_html_e( 'Riley Chen', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
				<p class="agile-base-eyebrow"><?php esc_html_e( 'Head of Marketing · Lumen', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
