<?php
/**
 * Title: Testimonials Grid
 * Slug: agile-base/testimonials-grid
 * Categories: agile-base, testimonials
 * Keywords: testimonials, reviews, quotes, clients
 * Viewport Width: 1400
 * Description: Three short client quotes with names and roles.
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
<h2 class="wp-block-heading"><?php esc_html_e( 'What clients say', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"17rem"}} -->
<div class="wp-block-group">
<!-- wp:group {"className":"is-style-ruled","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-ruled">
<!-- wp:quote -->
<blockquote class="wp-block-quote">
<!-- wp:paragraph -->
<p><?php esc_html_e( 'A short quote about the result your client got. Replace this with their own words.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<cite><?php esc_html_e( 'Client name, Company', 'agile-base' ); ?></cite></blockquote>
<!-- /wp:quote -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-ruled","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-ruled">
<!-- wp:quote -->
<blockquote class="wp-block-quote">
<!-- wp:paragraph -->
<p><?php esc_html_e( 'A short quote about what it was like to work with you. Use your client’s own words.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<cite><?php esc_html_e( 'Client name, Company', 'agile-base' ); ?></cite></blockquote>
<!-- /wp:quote -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-ruled","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-ruled">
<!-- wp:quote -->
<blockquote class="wp-block-quote">
<!-- wp:paragraph -->
<p><?php esc_html_e( 'A short quote about why your client would recommend you. Ask before publishing their words.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<cite><?php esc_html_e( 'Client name, Company', 'agile-base' ); ?></cite></blockquote>
<!-- /wp:quote -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
