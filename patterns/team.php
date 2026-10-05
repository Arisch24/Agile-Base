<?php
/**
 * Title: Team
 * Slug: agile-base/team
 * Categories: agile-base, team
 * Description: A section heading with a grid of team members, shown with initials instead of photos.
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
		<p class="agile-base-eyebrow"><?php esc_html_e( 'The team', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"fontSize":"3-x-large"} -->
		<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'The people behind the work', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","minimumColumnWidth":"14rem"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"className":"post-card","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group post-card" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:html -->
			<div class="agile-base-avatar" aria-hidden="true"><?php esc_html_e( 'AL', 'agile-base' ); ?></div>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
			<p style="font-weight:700"><?php esc_html_e( 'Ada Lin', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Founder', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"post-card","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group post-card" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:html -->
			<div class="agile-base-avatar" aria-hidden="true"><?php esc_html_e( 'MD', 'agile-base' ); ?></div>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
			<p style="font-weight:700"><?php esc_html_e( 'Marco Diaz', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Design lead', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"post-card","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group post-card" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:html -->
			<div class="agile-base-avatar" aria-hidden="true"><?php esc_html_e( 'PN', 'agile-base' ); ?></div>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
			<p style="font-weight:700"><?php esc_html_e( 'Priya Nair', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Engineering', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"post-card","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group post-card" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)">
			<!-- wp:html -->
			<div class="agile-base-avatar" aria-hidden="true"><?php esc_html_e( 'SO', 'agile-base' ); ?></div>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
			<p style="font-weight:700"><?php esc_html_e( 'Sam Okafor', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
			<p class="agile-base-eyebrow"><?php esc_html_e( 'Support', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
