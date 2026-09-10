<?php
/**
 * Title: FAQ
 * Slug: agile-base/faq
 * Categories: agile-base, text
 * Description: A Radix-style accordion of frequently asked questions.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"agile-base-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull agile-base-band" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
		<p class="agile-base-eyebrow"><?php esc_html_e( 'Answers', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"fontSize":"3-x-large"} -->
		<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'Frequently asked questions', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"agile-base-faq","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group agile-base-faq">
		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'Do I need to know how to code?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'No. Agile Base is built for the WordPress Site Editor. You assemble pages from patterns and edit everything visually.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'Does it work with my plugins?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Agile Base sticks to core blocks and standard theme features, so it plays nicely with the plugins you already use.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'Can I change the colors and fonts?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Yes. Pick a style variation or open Styles in the editor to adjust colors, typography and spacing across the whole site.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'Is it good for performance?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Very. Fonts are self-hosted, there is no page builder overhead, and the critical fonts are preloaded for fast first paint.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
