<?php
/**
 * Title: Text and Image
 * Slug: agile-base/text-image
 * Categories: agile-base, about
 * Keywords: about, introduction, image, photo, media and text
 * Viewport Width: 1400
 * Description: A heading, a few sentences and a button beside a photo.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|large"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"41.66%","style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:41.66%">
			<!-- wp:heading {"fontSize":"3-x-large"} -->
			<h2 class="wp-block-heading has-3-x-large-font-size"><?php esc_html_e( 'Show who does the work', 'agile-base' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'A few sentences about how you work and what it is like to hire you. Swap the photo for one of you, your team or your work.', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--x-small)">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About us', 'agile-base' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"58.33%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58.33%">
			<!-- wp:image {"aspectRatio":"4/3","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/placeholder-photo.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A potter shaping clay on a spinning wheel', 'placeholder photo alt text', 'agile-base' ); ?>" style="aspect-ratio:4/3;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
