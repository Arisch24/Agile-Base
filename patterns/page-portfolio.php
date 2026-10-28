<?php
/**
 * Title: Page: Portfolio
 * Slug: agile-base/page-portfolio
 * Categories: agile-base, portfolio
 * Keywords: portfolio, work, projects, case studies
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: Your recent projects, what clients say, and a call to action. Looks best with the Page (Full Width) template.
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
<p class="has-x-large-font-size"><?php esc_html_e( 'Introduce the work below: the clients, the problems, and the results.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:pattern {"slug":"agile-base/case-studies"} /-->

<!-- wp:pattern {"slug":"agile-base/testimonials-grid"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
