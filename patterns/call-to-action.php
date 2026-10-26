<?php
/**
 * Title: Call to Action
 * Slug: agile-base/call-to-action
 * Categories: agile-base, call-to-action, banner
 * Keywords: call to action, cta, contact, book
 * Viewport Width: 1400
 * Description: A color field with a heading, a sentence and a button that asks visitors to get in touch.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"agile-base-field","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|x-small"}},"backgroundColor":"primary","textColor":"black","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agile-base-field has-black-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"760px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"fontSize":"3-x-large"} -->
		<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'Ready to talk about your project?', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
		<p class="has-large-font-size" style="font-weight:700"><?php esc_html_e( 'Tell visitors what happens next and how soon you reply.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a call', 'agile-base' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
