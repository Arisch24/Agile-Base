<?php
/**
 * Title: Page: Services
 * Slug: agile-base/page-services
 * Categories: agile-base, services
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Keywords: services, offerings, business, page
 * Description: A Services page: a short intro, your services as cards, three steps, a testimonial, an FAQ and a call to action. Looks best with the Page (Full Width) template.
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
	<p class="has-x-large-font-size"><?php esc_html_e( 'Say in two sentences what you do, who you do it for, and what a customer can expect.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/services-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/steps"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonial"} /-->

<!-- wp:pattern {"slug":"agile-base/faq"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
