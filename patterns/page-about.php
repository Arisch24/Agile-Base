<?php
/**
 * Title: Page: About
 * Slug: agile-base/page-about
 * Categories: agile-base, about
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: An About page: a short intro, headline numbers, the team, a testimonial and a call to action. Looks best with the Page (Full Width) template.
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
	<p class="agile-base-eyebrow"><?php esc_html_e( 'About us', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"x-large"} -->
	<p class="has-x-large-font-size"><?php esc_html_e( 'We are a small, focused team that builds fast, accessible websites and helps people publish with confidence.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/stats"} /-->

<!-- wp:pattern {"slug":"agile-base/team"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonial"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
