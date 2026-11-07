<?php
/**
 * Title: Page: Service Details
 * Slug: agile-base/page-service
 * Categories: agile-base, services
 * Keywords: service, details, offering, package
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: One service in detail: who it's for, what's included, how it works, prices and questions. Looks best with the Page (Full Width) template.
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
	<p class="has-x-large-font-size"><?php esc_html_e( 'Who this service is for, and the result they get.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"is-style-section-ruled","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull is-style-section-ruled" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"fontSize":"3-x-large"} -->
		<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'What\'s included', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:list -->
		<ul class="wp-block-list">
			<!-- wp:list-item -->
			<li><?php esc_html_e( 'Name your first deliverable and what the customer receives.', 'agile-base' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php esc_html_e( 'Describe the next part of the service and its scope.', 'agile-base' ); ?></li>
			<!-- /wp:list-item -->

			<!-- wp:list-item -->
			<li><?php esc_html_e( 'Explain the handover and any follow-up support.', 'agile-base' ); ?></li>
			<!-- /wp:list-item -->
		</ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/steps"} /-->

<!-- wp:pattern {"slug":"agile-base/pricing"} /-->

<!-- wp:pattern {"slug":"agile-base/faq"} /-->

<!-- wp:pattern {"slug":"agile-base/cta-banner"} /-->
