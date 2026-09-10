<?php
/**
 * Title: Call to Action
 * Slug: agile-base/call-to-action
 * Categories: agile-base, call-to-action, banner
 * Description: A bold call-to-action card with a heading and button.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$agile_base_posts_page_id = (int) get_option( 'page_for_posts' );
$agile_base_blog_url      = $agile_base_posts_page_id ? get_permalink( $agile_base_posts_page_id ) : home_url( '/' );

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"},"border":{"radius":"16px"}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained","contentSize":"640px","justifyContent":"center"}} -->
	<div class="wp-block-group has-white-color has-primary-background-color has-text-color has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large)">
		<!-- wp:heading {"textAlign":"center","fontSize":"2-x-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-2-x-large-font-size"><?php esc_html_e( 'Ready to get started?', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><?php esc_html_e( 'Launch your next site with Agile Base and make it yours in an afternoon.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"white","textColor":"ink","style":{"border":{"color":"var:preset|color|white"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-ink-color has-white-background-color has-text-color has-background has-border-color has-white-border-color wp-element-button" href="<?php echo esc_url( $agile_base_blog_url ); ?>"><?php esc_html_e( 'Read the blog', 'agile-base' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
