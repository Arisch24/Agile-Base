<?php
/**
 * Title: Hidden Footer Columns
 * Slug: agile-base/hidden-footer-columns
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"site-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull site-footer" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|large"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"700"}},"fontSize":"x-large"} /-->

			<!-- wp:site-tagline {"fontSize":"small"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Explore', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:navigation {"ariaLabel":"Footer","overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
		<div class="wp-block-column">
			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Search', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:search {"showLabel":false,"buttonPosition":"button-inside","style":{"border":{"radius":"6px"}}} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","className":"is-style-wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|medium"}}}} -->
	<hr class="wp-block-separator alignwide has-alpha-channel-opacity is-style-wide" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--medium)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size">©</p>
			<!-- /wp:paragraph -->

			<!-- wp:site-title {"level":0,"isLink":false,"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:pattern {"slug":"agile-base/hidden-footer-credit"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
