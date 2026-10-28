<?php
/**
 * Title: Hidden Home (Local Business)
 * Slug: agile-base/hidden-home-local-business
 * Inserter: no
 * Viewport Width: 1400
 * Description: Homepage content for the Local Business front-page design.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"agile-base-field","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|medium"}}},"backgroundColor":"primary","textColor":"on-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agile-base-field has-on-primary-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|medium"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"12%"} -->
		<div class="wp-block-column" style="flex-basis:12%">
			<!-- wp:paragraph {"textColor":"on-primary","fontSize":"large","style":{"typography":{"fontWeight":"700"}},"fontFamily":"mono"} -->
			<p class="has-on-primary-color has-text-color has-mono-font-family has-large-font-size" style="font-weight:700"><?php echo esc_html_x( 'No. 001', 'serial number of the first quote', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"66.66%","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
		<div class="wp-block-column" style="flex-basis:66.66%">
			<!-- wp:heading {"level":1,"fontSize":"5-x-large"} -->
			<h1 class="wp-block-heading has-5-x-large-font-size"><?php esc_html_e( 'Your trade, in your town, done right', 'agile-base' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-large-font-size" style="font-weight:700"><?php esc_html_e( 'Tell neighbors which jobs you take on and the area you serve.', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--small)">
				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'agile-base' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="tel:+15555550123"><?php esc_html_e( '+1 555 555 0123', 'agile-base' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:paragraph {"fontFamily":"mono"} -->
				<p class="has-mono-font-family"><?php esc_html_e( 'Monday to Friday, 9am to 5pm', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/services-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/guarantees"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonials-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/contact-details"} /-->

<!-- wp:pattern {"slug":"agile-base/cta-banner"} /-->
