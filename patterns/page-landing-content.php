<?php
/**
 * Title: Page: Landing
 * Slug: agile-base/page-landing-content
 * Categories: agile-base, call-to-action
 * Keywords: landing, campaign, offer, ads
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A campaign page: the offer, why it's good, proof and one call to action. Use with the Landing Page template.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--large)">
<!-- wp:paragraph {"fontSize":"x-large"} -->
<p class="has-x-large-font-size"><?php esc_html_e( 'Introduce your offer and who it is for in one short sentence.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:pattern {"slug":"agile-base/hidden-landing-offer"} /-->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"},"align":"full"} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Why choose this offer', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Your first benefit', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Name the main problem this offer solves for your customer.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Your second benefit', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Describe another useful outcome and how the customer gets it.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Your third benefit', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Explain what makes the next step simple for your customer.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:pattern {"slug":"agile-base/testimonials-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/guarantees"} /-->

<!-- wp:pattern {"slug":"agile-base/hidden-landing-cta"} /-->
