<?php
/**
 * Title: Page: About
 * Slug: agile-base/page-about
 * Categories: agile-base, about
 * Block Types: core/post-content
 * Post Types: page
 * Keywords: about, business, page, information
 * Viewport Width: 1400
 * Description: An About page: a short intro, headline numbers, the team, a testimonial and a call to action. Looks best with the Page (Full Width) template.
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
	<p class="has-x-large-font-size"><?php esc_html_e( 'Tell visitors who you are, who you work for, and why.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/stats"} /-->

<!-- wp:pattern {"slug":"agile-base/team"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonials-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
