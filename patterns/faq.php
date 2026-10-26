<?php
/**
 * Title: FAQ
 * Slug: agile-base/faq
 * Categories: agile-base, text
 * Keywords: faq, questions, answers, accordion
 * Viewport Width: 1400
 * Description: A ruled accordion of frequently asked questions.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"constrained","contentSize":"760px"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:heading {"fontSize":"3-x-large"} -->
	<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'Frequently asked questions', 'agile-base' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:group {"className":"agile-base-faq","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group agile-base-faq">
		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'What does a project cost?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Say how you price your work, and what affects the final figure.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'How long does it take?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Say how long a typical project takes, from first call to finished work.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'Do you work in my area?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Say where you work, and how customers can check.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details"><summary><?php esc_html_e( 'How do I get started?', 'agile-base' ); ?></summary>
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Say what happens after a customer books a call.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
