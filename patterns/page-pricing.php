<?php
/**
 * Title: Page: Pricing
 * Slug: agile-base/page-pricing
 * Categories: agile-base, call-to-action
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A Pricing page: a short intro, three plan cards, an FAQ and a call to action. Looks best with the Page (Full Width) template.
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
	<p class="agile-base-eyebrow"><?php esc_html_e( 'Pricing', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"x-large"} -->
	<p class="has-x-large-font-size"><?php esc_html_e( 'Clear plans with no surprises. Start free and upgrade when you need more.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/pricing"} /-->

<!-- wp:pattern {"slug":"agile-base/faq"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
