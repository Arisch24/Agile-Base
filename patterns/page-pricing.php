<?php
/**
 * Title: Page: Pricing
 * Slug: agile-base/page-pricing
 * Categories: agile-base, call-to-action
 * Block Types: core/post-content
 * Post Types: page
 * Keywords: pricing, business, page, information
 * Viewport Width: 1400
 * Description: A Pricing page: a short intro, three plan cards, an FAQ and a call to action. Looks best with the Page (Full Width) template.
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
	<p class="has-x-large-font-size"><?php esc_html_e( 'Describe your packages, what each includes, and how customers choose the right one.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/pricing"} /-->

<!-- wp:pattern {"slug":"agile-base/faq"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
