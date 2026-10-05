<?php
/**
 * Title: Pricing
 * Slug: agile-base/pricing
 * Categories: agile-base, call-to-action
 * Description: A section heading with three plan cards showing a price and what each plan includes.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
		<p class="agile-base-eyebrow"><?php esc_html_e( 'Pricing', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"fontSize":"3-x-large"} -->
		<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'Simple plans that grow with you', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"className":"post-card","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
		<div class="wp-block-column post-card" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Starter', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"3-x-large","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-3-x-large-font-size" style="font-weight:700"><?php echo esc_html_x( '$0', 'Starter plan price', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'per month', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'One site', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Every block pattern', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Community support', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"post-card","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
		<div class="wp-block-column post-card" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Team · Most popular', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"3-x-large","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-3-x-large-font-size" style="font-weight:700"><?php echo esc_html_x( '$19', 'Team plan price', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'per month', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Up to five sites', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Light and dark styles', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Email support', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"className":"post-card","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
		<div class="wp-block-column post-card" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Studio', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"3-x-large","style":{"typography":{"fontWeight":"700"}}} -->
			<p class="has-3-x-large-font-size" style="font-weight:700"><?php echo esc_html_x( '$49', 'Studio plan price', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'per month', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Unlimited sites', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'Priority support', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->

				<!-- wp:list-item -->
				<li><?php esc_html_e( 'An onboarding call', 'agile-base' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
