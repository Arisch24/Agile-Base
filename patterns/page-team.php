<?php
/**
 * Title: Page: Team
 * Slug: agile-base/page-team
 * Categories: agile-base, team
 * Block Types: core/post-content
 * Post Types: page
 * Keywords: team, business, page, information
 * Viewport Width: 1400
 * Description: A Team page: a short intro, a grid of team members and a call to action. Looks best with the Page (Full Width) template.
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
	<p class="has-x-large-font-size"><?php esc_html_e( 'Introduce the people customers will work with and what each brings to the job.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/team"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
