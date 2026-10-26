<?php
/**
 * Title: Hidden Header (Centered)
 * Slug: agile-base/hidden-header-centered
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"site-header","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull site-header" style="padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:site-logo {"width":56} /-->

		<!-- wp:site-title {"level":0,"textAlign":"center","style":{"typography":{"fontWeight":"700"}},"fontSize":"large"} /-->

		<!-- wp:navigation {"ariaLabel":"<?php echo esc_attr_x( 'Primary', 'navigation landmark label', 'agile-base' ); ?>","overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
