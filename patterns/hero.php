<?php
/**
 * Title: Hero
 * Slug: agile-base/hero
 * Categories: agile-base, banner, featured
 * Description: A left-aligned hero with a mono eyebrow, large heading with a marked word and a feature strip.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|3-x-large","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--3-x-large);padding-bottom:0">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained","contentSize":"880px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
		<p class="agile-base-eyebrow"><?php esc_html_e( 'The block theme for builders', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"fontSize":"5-x-large"} -->
		<h1 class="wp-block-heading has-5-x-large-font-size">
		<?php
		/* translators: %s: the highlighted word "proud". */
		printf( wp_kses( __( 'Ship a site you are %s of.', 'agile-base' ), array( 'mark' => array( 'class' => true ) ) ), '<mark class="agile-base-mark">proud</mark>' );
		?>
		</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small"}}}} -->
		<p class="has-large-font-size" style="margin-top:var(--wp--preset--spacing--x-small)"><?php esc_html_e( 'Agile Base is a fast, no-build block theme. Assemble pages from patterns, flip between light and dark in a click, and launch something that looks nothing like a template.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"full","layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull">
		<!-- wp:html -->
		<div class="agile-base-marquee" aria-hidden="true"><div class="agile-base-marquee__track"><span>No build step</span><span>Self-hosted fonts</span><span>Light &amp; dark</span><span>Pattern library</span><span>Fluid type &amp; space</span></div></div>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
