<?php
/**
 * Title: About the Founder
 * Slug: agile-base/about-founder
 * Categories: agile-base, about
 * Keywords: about, founder, freelancer, bio, portrait
 * Viewport Width: 1400
 * Description: A portrait beside your name, role and a short story, with a button. Add your own photo.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
<!-- wp:media-text {"mediaPosition":"left","mediaType":"image","isStackedOnMobile":true,"className":"agile-base-media"} -->
<div class="wp-block-media-text is-stacked-on-mobile agile-base-media"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Hi, I\'m Your Name', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Your role', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Tell visitors who you are and why you do this work.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Describe how you help your clients and what they can expect when working with you.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Work with me', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div></div>
<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
