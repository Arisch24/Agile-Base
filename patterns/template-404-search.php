<?php
/**
 * Title: 404 (Search First)
 * Slug: agile-base/template-404-search
 * Template Types: 404
 * Viewport Width: 1400
 * Inserter: no
 * Description: A 404 design that leads with a search box and lists your three latest posts.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:template-part {"slug":"header","tagName":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:var(--wp--preset--spacing--x-large);margin-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
	<p class="agile-base-eyebrow"><?php esc_html_e( 'Error 404', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"fontSize":"4-x-large","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|small"}}}} -->
	<h1 class="wp-block-heading has-4-x-large-font-size"><?php esc_html_e( 'Let’s find what you were after.', 'agile-base' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:search {"showLabel":false,"buttonPosition":"button-inside","style":{"border":{"radius":"6px"},"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} /-->

	<!-- wp:heading {"fontSize":"x-large","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-large"}}}} -->
	<h2 class="wp-block-heading has-x-large-font-size" style="margin-top:var(--wp--preset--spacing--x-large)"><?php esc_html_e( 'Latest posts', 'agile-base' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":4,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"layout":{"type":"default"}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
			<!-- wp:group {"className":"agile-base-list-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group agile-base-list-item" style="padding-top:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small)">
				<!-- wp:post-date {"className":"agile-base-eyebrow"} /-->

				<!-- wp:post-title {"isLink":true,"fontSize":"large"} /-->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Nothing has been published yet.', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->

	<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"layout":{"type":"flex"}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--medium)">
		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'agile-base' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","area":"footer"} /-->
