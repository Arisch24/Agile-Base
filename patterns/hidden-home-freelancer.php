<?php
/**
 * Title: Hidden Home (Freelancer)
 * Slug: agile-base/hidden-home-freelancer
 * Inserter: no
 * Viewport Width: 1400
 * Description: Homepage content for the Freelancer front-page design.
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
<h1 class="wp-block-heading"><?php esc_html_e( 'I help small businesses with your specialty', 'agile-base' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Describe the work you do and the difference it makes for your clients.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Work with me', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/about-founder"} /-->

<!-- wp:pattern {"slug":"agile-base/services-list"} /-->

<!-- wp:pattern {"slug":"agile-base/case-studies"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonial"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
