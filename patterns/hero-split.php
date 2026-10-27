<?php
/**
 * Title: Hero (Split)
 * Slug: agile-base/hero-split
 * Categories: agile-base, banner
 * Keywords: hero, banner, intro, image, split
 * Viewport Width: 1400
 * Description: A headline, a sentence and two buttons beside an image. Add your own image.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"is-style-section-field","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-field" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:media-text {"mediaPosition":"right","mediaType":"image","isStackedOnMobile":true,"className":"agile-base-media"} -->
<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile agile-base-media"><div class="wp-block-media-text__content">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Say what you do, for whom, in one line', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'One or two sentences on the result clients get. Keep it concrete.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Book a call', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'See services', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div><figure class="wp-block-media-text__media"></figure></div>
<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
