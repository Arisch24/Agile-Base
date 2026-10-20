<?php
/**
 * Title: Page: Services
 * Slug: agile-base/page-services
 * Categories: agile-base, services
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A Services page: a short intro, three feature cards, a testimonial, an FAQ and a call to action. Looks best with the Page (Full Width) template.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
	<p class="agile-base-eyebrow"><?php esc_html_e( 'Services', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"x-large"} -->
	<p class="has-x-large-font-size"><?php esc_html_e( 'From the first sketch to launch day and beyond, we help you plan, build and grow your site.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/features"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonial"} /-->

<!-- wp:pattern {"slug":"agile-base/faq"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
