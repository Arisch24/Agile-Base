<?php
/**
 * Title: Hero
 * Slug: agile-base/hero
 * Categories: agile-base, banner, featured
 * Keywords: hero, banner, headline, introduction
 * Viewport Width: 1400
 * Description: A color field with a large headline, one sentence and two buttons. It uses a level-two heading, so it can sit under a page title.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"agile-base-field","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|x-large"}}},"backgroundColor":"primary","textColor":"black","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agile-base-field has-black-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--x-large)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"860px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"fontSize":"4-x-large"} -->
		<h2 class="wp-block-heading has-4-x-large-font-size"><?php esc_html_e( 'Say what you do, and who it is for.', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
		<p class="has-large-font-size" style="font-weight:700"><?php esc_html_e( 'One short sentence about the problem you solve for your customers.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a call', 'agile-base' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'See services', 'agile-base' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
