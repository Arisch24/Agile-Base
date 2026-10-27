<?php
/**
 * Title: Hidden 404
 * Slug: agile-base/hidden-404
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<!-- wp:heading {"level":1,"fontSize":"4-x-large","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small"}}}} -->
<h1 class="wp-block-heading has-4-x-large-font-size" style="margin-top:var(--wp--preset--spacing--x-small);margin-bottom:var(--wp--preset--spacing--small)"><?php esc_html_e( 'Page not found', 'agile-base' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php esc_html_e( 'We couldn’t find what you were looking for. Try a search, or head back home.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"showLabel":false,"buttonPosition":"button-inside","style":{"border":{"radius":"var:custom|radius|bar"},"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} /-->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}},"layout":{"type":"flex"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)">
	<!-- wp:button {"className":"is-style-outline"} -->
	<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'agile-base' ); ?></a></div>
	<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
