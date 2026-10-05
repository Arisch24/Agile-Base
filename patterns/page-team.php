<?php
/**
 * Title: Page: Team
 * Slug: agile-base/page-team
 * Categories: agile-base, team
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: A Team page: a short intro, a grid of team members and a call to action. Looks best with the Page (Full Width) template.
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
	<p class="agile-base-eyebrow"><?php esc_html_e( 'Our team', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"fontSize":"x-large"} -->
	<p class="has-x-large-font-size"><?php esc_html_e( 'Designers, engineers and writers who care about the details and ship work we are proud of.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/team"} /-->

<!-- wp:pattern {"slug":"agile-base/call-to-action"} /-->
