<?php
/**
 * Title: CTA Banner
 * Slug: agile-base/cta-banner
 * Categories: agile-base, call-to-action
 * Keywords: call to action, phone, banner, contact
 * Viewport Width: 1400
 * Description: A full-width band with a headline, your phone number and a button.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"is-style-section-field","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-field" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Ready to start? Call us today.', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><a href="tel:+15555550123"><?php esc_html_e( '+1 555 555 0123', 'agile-base' ); ?></a></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
