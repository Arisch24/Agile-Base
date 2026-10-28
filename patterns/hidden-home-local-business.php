<?php
/**
 * Title: Hidden Home (Local Business)
 * Slug: agile-base/hidden-home-local-business
 * Inserter: no
 * Viewport Width: 1400
 * Description: Homepage content for the Local Business front-page design.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"},"align":"full","className":"agile-base-field is-style-section-field"} -->
<div class="wp-block-group alignfull agile-base-field is-style-section-field" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading"><?php esc_html_e( 'Your trade, in your town, done right', 'agile-base' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Tell neighbors which jobs you take on and the area you serve.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph -->
<p><a href="tel:+15555550123"><?php esc_html_e( '+1 555 555 0123', 'agile-base' ); ?></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Monday to Friday, 9am to 5pm', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/services-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/guarantees"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonials-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/contact-details"} /-->

<!-- wp:pattern {"slug":"agile-base/cta-banner"} /-->
