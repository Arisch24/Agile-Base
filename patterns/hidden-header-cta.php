<?php
/**
 * Title: Hidden Header (Button)
 * Slug: agile-base/hidden-header-cta
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"site-header agile-base-header-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull site-header agile-base-header-cta" style="padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":56} /-->

			<!-- wp:site-title {"level":0,"style":{"typography":{"fontWeight":"var(--wp--custom--font-weight--bold)"}},"fontSize":"large"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-header-actions","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"right"}} -->
		<div class="wp-block-group agile-base-header-actions">
		<!-- wp:navigation {"ariaLabel":"<?php echo esc_attr_x( 'Primary', 'navigation landmark label', 'agile-base' ); ?>","overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"}} /-->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a call', 'agile-base' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
