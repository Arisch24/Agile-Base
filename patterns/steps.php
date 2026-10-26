<?php
/**
 * Title: How It Works
 * Slug: agile-base/steps
 * Categories: agile-base, services
 * Keywords: steps, process, how it works
 * Viewport Width: 1400
 * Description: Three numbered steps, each with a short heading and sentence.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:heading {"align":"wide","fontSize":"3-x-large"} -->
	<h2 class="wp-block-heading alignwide has-3-x-large-font-size"><?php esc_html_e( 'How it works', 'agile-base' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}}} -->
	<div class="wp-block-columns alignwide">
			<!-- wp:column {"className":"agile-base-step","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
			<div class="wp-block-column agile-base-step">
				<!-- wp:paragraph {"textColor":"accent","fontFamily":"mono","fontSize":"3-x-large","style":{"typography":{"fontWeight":"700"}}} -->
				<p class="has-accent-color has-text-color has-mono-font-family has-3-x-large-font-size" style="font-weight:700"><?php echo esc_html_x( '01', 'step number', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
				<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Tell us what you need', 'agile-base' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Say how a customer starts: a call, a form or a visit.', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"agile-base-step","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
			<div class="wp-block-column agile-base-step">
				<!-- wp:paragraph {"textColor":"accent","fontFamily":"mono","fontSize":"3-x-large","style":{"typography":{"fontWeight":"700"}}} -->
				<p class="has-accent-color has-text-color has-mono-font-family has-3-x-large-font-size" style="font-weight:700"><?php echo esc_html_x( '02', 'step number', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
				<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'We agree a plan and a price', 'agile-base' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Say what the customer gets in writing before any work begins.', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"className":"agile-base-step","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
			<div class="wp-block-column agile-base-step">
				<!-- wp:paragraph {"textColor":"accent","fontFamily":"mono","fontSize":"3-x-large","style":{"typography":{"fontWeight":"700"}}} -->
				<p class="has-accent-color has-text-color has-mono-font-family has-3-x-large-font-size" style="font-weight:700"><?php echo esc_html_x( '03', 'step number', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
				<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'We do the work, you get the result', 'agile-base' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p><?php esc_html_e( 'Say how the work is finished and checked.', 'agile-base' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
