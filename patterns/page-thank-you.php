<?php
/**
 * Title: Page: Thank You
 * Slug: agile-base/page-thank-you
 * Categories: agile-base, text
 * Keywords: thank you, confirmation, next steps
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A thank-you page for after a form or order: what happens next and where to go. Looks best with the Page (Full Width) template.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:paragraph {"fontSize":"x-large"} -->
	<p class="has-x-large-font-size"><?php esc_html_e( 'Thanks, we have your message.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"fontSize":"3-x-large"} -->
		<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'What happens next', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:list {"ordered":true} -->
		<ol class="wp-block-list">
			<!-- wp:list-item -->
			<li><?php esc_html_e( 'Explain how you review the message and who will respond.', 'agile-base' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php esc_html_e( 'Tell the customer when to expect a reply.', 'agile-base' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php esc_html_e( 'Say what they can prepare before you speak.', 'agile-base' ); ?></li>
			<!-- /wp:list-item -->
		</ol>
		<!-- /wp:list -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'agile-base' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>"><?php esc_html_e( 'Read our latest posts', 'agile-base' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/posts-compact"} /-->
