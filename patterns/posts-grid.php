<?php
/**
 * Title: Latest Posts (Grid)
 * Slug: agile-base/posts-grid
 * Categories: agile-base, posts
 * Keywords: posts, news, grid, latest, blog
 * Viewport Width: 1400
 * Description: The six latest posts in a responsive grid of cards.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Latest news', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:query {"queryId":13,"className":"agile-base-posts-grid","query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
<div class="wp-block-query agile-base-posts-grid">
<!-- wp:post-template {"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
<!-- wp:group {"className":"post-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group post-card">
<!-- wp:post-featured-image {"aspectRatio":"16/9","style":{"border":{"radius":"var:custom|radius|card"}}} /-->
<!-- wp:post-title {"isLink":true,"level":3} /-->
<!-- wp:post-date {"className":"agile-base-meta","fontSize":"small"} /-->
</div>
<!-- /wp:group -->

<!-- /wp:post-template -->
<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Nothing published yet.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( ( get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' ) ) ); ?>"><?php esc_html_e( 'All posts', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
