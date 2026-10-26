<?php
/**
 * Title: Hidden Post Navigation
 * Slug: agile-base/hidden-post-navigation
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"className":"agile-base-postnav","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group agile-base-postnav">
	<!-- wp:post-navigation-link {"type":"previous","showTitle":true,"label":"<?php echo esc_attr_x( 'Previous', 'label for the previous post link', 'agile-base' ); ?>","arrow":"arrow"} /-->

	<!-- wp:post-navigation-link {"showTitle":true,"label":"<?php echo esc_attr_x( 'Next', 'label for the next post link', 'agile-base' ); ?>","arrow":"arrow"} /-->
</div>
<!-- /wp:group -->
