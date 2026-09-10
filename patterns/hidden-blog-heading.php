<?php
/**
 * Title: Hidden Blog Heading
 * Slug: agile-base/hidden-blog-heading
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
	<p class="agile-base-eyebrow"><?php esc_html_e( 'The blog', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"fontSize":"4-x-large"} -->
	<h1 class="wp-block-heading has-4-x-large-font-size"><?php esc_html_e( 'Latest posts', 'agile-base' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:site-tagline {"fontSize":"large"} /-->
</div>
<!-- /wp:group -->
