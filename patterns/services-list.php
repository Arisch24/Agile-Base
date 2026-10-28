<?php
/**
 * Title: Services List
 * Slug: agile-base/services-list
 * Categories: agile-base, services
 * Keywords: services, list, offerings, image
 * Viewport Width: 1400
 * Description: Your services as rows that alternate sides, each with an image, a description and a link. Add your own images.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Services', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:group {"className":"agile-base-list-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-list-item" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
<!-- wp:media-text {"mediaPosition":"left","mediaType":"image","isStackedOnMobile":true,"className":"agile-base-media"} -->
<div class="wp-block-media-text is-stacked-on-mobile agile-base-media"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Your main service', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'What the client gets, and how long it takes. Say what is included and who this service helps.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Learn more', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div></div>
<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-list-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-list-item" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
<!-- wp:media-text {"mediaPosition":"right","mediaType":"image","isStackedOnMobile":true,"className":"agile-base-media"} -->
<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile agile-base-media"><div class="wp-block-media-text__content">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'A second service', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'What the client gets, and how long it takes. Say what is included and who this service helps.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Learn more', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div><figure class="wp-block-media-text__media"></figure></div>
<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-list-item","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-list-item" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)">
<!-- wp:media-text {"mediaPosition":"left","mediaType":"image","isStackedOnMobile":true,"className":"agile-base-media"} -->
<div class="wp-block-media-text is-stacked-on-mobile agile-base-media"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'A third service', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'What the client gets, and how long it takes. Say what is included and who this service helps.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Learn more', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div></div>
<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
