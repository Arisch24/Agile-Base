<?php
/**
 * Title: Services Grid
 * Slug: agile-base/services-grid
 * Categories: agile-base, services
 * Keywords: services, offerings, cards, what we do
 * Viewport Width: 1400
 * Description: Your services as cards, each with an icon, a heading, a sentence and a link.
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
	<h2 class="wp-block-heading alignwide has-3-x-large-font-size"><?php esc_html_e( 'What we do', 'agile-base' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"17rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"className":"agile-base-service","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group agile-base-service" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"textColor":"accent","fontFamily":"mono","fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-accent-color has-text-color has-mono-font-family has-large-font-size" style="font-weight:700"><?php echo esc_html_x( 'No. 001', 'serial number of a quote line', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
			<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Your main service', 'agile-base' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Describe what the client gets, in one sentence.', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Learn more', 'agile-base' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-service","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group agile-base-service" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"textColor":"accent","fontFamily":"mono","fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-accent-color has-text-color has-mono-font-family has-large-font-size" style="font-weight:700"><?php echo esc_html_x( 'No. 002', 'serial number of a quote line', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
			<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'A second service', 'agile-base' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Describe what the client gets, in one sentence.', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Learn more', 'agile-base' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-service","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group agile-base-service" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"textColor":"accent","fontFamily":"mono","fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-accent-color has-text-color has-mono-font-family has-large-font-size" style="font-weight:700"><?php echo esc_html_x( 'No. 003', 'serial number of a quote line', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
			<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'A third service', 'agile-base' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Describe what the client gets, in one sentence.', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Learn more', 'agile-base' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
