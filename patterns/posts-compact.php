<?php
/**
 * Title: Latest Posts (List)
 * Slug: agile-base/posts-compact
 * Categories: agile-base, posts
 * Keywords: posts, news, list, latest, compact
 * Viewport Width: 800
 * Description: The five latest posts as date and title rows, for sidebars and footers.
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
<h2 class="wp-block-heading"><?php esc_html_e( 'Recent posts', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:query {"queryId":14,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","sticky":"ignore","inherit":false}} -->
<div class="wp-block-query">
<!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:group {"className":"agile-base-list-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"baseline"}} -->
<div class="wp-block-group agile-base-list-item" style="padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">
<!-- wp:post-date {"className":"agile-base-meta","fontSize":"small"} /-->
<!-- wp:post-title {"isLink":true,"level":3} /-->
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
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
