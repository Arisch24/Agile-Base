<?php
/**
 * Title: Subscribe
 * Slug: agile-base/subscribe
 * Categories: agile-base, call-to-action
 * Keywords: subscribe, follow, rss, social, news
 * Viewport Width: 1000
 * Description: Invite visitors to follow your news by RSS or on social media.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"is-style-section-ruled","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-ruled" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Stay in the loop', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'News, tips and offers from us. Follow by RSS or wherever you spend your time.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_feed_link() ); ?>"><?php esc_html_e( 'RSS feed', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:social-links {"iconColor":"paper","iconColorValue":"var(--wp--preset--color--paper)","iconBackgroundColor":"ink","iconBackgroundColorValue":"var(--wp--preset--color--ink)"} -->
<ul class="wp-block-social-links has-icon-color has-icon-background-color">
<!-- wp:social-link {"service":"facebook"} /-->
<!-- wp:social-link {"service":"instagram"} /-->
<!-- wp:social-link {"service":"linkedin"} /-->
</ul>
<!-- /wp:social-links -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
