<?php
/**
 * Title: Style Guide
 * Slug: agile-base/style-guide
 * Categories: agile-base, featured, text
 * Keywords: style guide, colors, typography, spacing, styles
 * Viewport Width: 1400
 * Description: A live preview of your colors, type scale, spacing, section styles, block styles and buttons.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Style guide', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Preview your colors, type, spacing and block styles. Change Styles in the editor to make them your own.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Colors', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group">
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-black-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Black', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-white-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'White', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-primary-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Primary', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"on-primary","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-on-primary-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Text on Primary', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-secondary-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Secondary', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-accent-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Accent', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"paper","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-paper-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Paper', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"ink","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-ink-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Ink', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-swatch-item">
<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"surface","layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-swatch has-surface-background-color has-background"></div>
<!-- /wp:group -->
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Surface', 'color swatch name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Type scale', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"agile-base-type-scale","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-scale">
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"x-small"} -->
<p class="has-x-small-font-size"><?php echo esc_html_x( 'xSmall', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php echo esc_html_x( 'Small', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php echo esc_html_x( 'Medium', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"large"} -->
<p class="has-large-font-size"><?php echo esc_html_x( 'Large', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"x-large"} -->
<p class="has-x-large-font-size"><?php echo esc_html_x( 'xLarge', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"2-x-large"} -->
<p class="has-2-x-large-font-size"><?php echo esc_html_x( '2xLarge', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"3-x-large"} -->
<p class="has-3-x-large-font-size"><?php echo esc_html_x( '3xLarge', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"4-x-large"} -->
<p class="has-4-x-large-font-size"><?php echo esc_html_x( '4xLarge', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"constrained"}} -->
<div class="wp-block-group agile-base-type-row">
<!-- wp:paragraph {"fontSize":"5-x-large"} -->
<p class="has-5-x-large-font-size"><?php echo esc_html_x( '5xLarge', 'font size preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Spacing', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"17rem"}} -->
<div class="wp-block-group">
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'x-small', 'spacing preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"agile-base-scale-bar","style":{"dimensions":{"minHeight":"var:preset|spacing|x-small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-scale-bar" style="min-height:var(--wp--preset--spacing--x-small)"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'small', 'spacing preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"agile-base-scale-bar","style":{"dimensions":{"minHeight":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-scale-bar" style="min-height:var(--wp--preset--spacing--small)"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'medium', 'spacing preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"agile-base-scale-bar","style":{"dimensions":{"minHeight":"var:preset|spacing|medium"}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-scale-bar" style="min-height:var(--wp--preset--spacing--medium)"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'large', 'spacing preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"agile-base-scale-bar","style":{"dimensions":{"minHeight":"var:preset|spacing|large"}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-scale-bar" style="min-height:var(--wp--preset--spacing--large)"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( 'x-large', 'spacing preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"agile-base-scale-bar","style":{"dimensions":{"minHeight":"var:preset|spacing|x-large"}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-scale-bar" style="min-height:var(--wp--preset--spacing--x-large)"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( '2-x-large', 'spacing preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"agile-base-scale-bar","style":{"dimensions":{"minHeight":"var:preset|spacing|2-x-large"}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-scale-bar" style="min-height:var(--wp--preset--spacing--2-x-large)"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
<p class="agile-base-swatch-label"><?php echo esc_html_x( '3-x-large', 'spacing preset name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"agile-base-scale-bar","style":{"dimensions":{"minHeight":"var:preset|spacing|3-x-large"}},"layout":{"type":"default"}} -->
<div class="wp-block-group agile-base-scale-bar" style="min-height:var(--wp--preset--spacing--3-x-large)"></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Section styles', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"is-style-section-field","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-section-field">
<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php esc_html_e( 'Field', 'agile-base' ); ?></h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php echo esc_html_x( 'A heading, text and actions in this section style.', 'section style sample', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact us', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-boxed"} -->
<div class="wp-block-button is-style-boxed"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'See services', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-section-ink","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-section-ink">
<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php esc_html_e( 'Ink', 'agile-base' ); ?></h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php echo esc_html_x( 'A heading, text and actions in this section style.', 'section style sample', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact us', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-boxed"} -->
<div class="wp-block-button is-style-boxed"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'See services', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"is-style-section-ruled","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-section-ruled">
<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php esc_html_e( 'Ruled', 'agile-base' ); ?></h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php echo esc_html_x( 'A heading, text and actions in this section style.', 'section style sample', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact us', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-boxed"} -->
<div class="wp-block-button is-style-boxed"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'See services', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Block styles', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:group {"className":"is-style-ruled","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-ruled">
<!-- wp:paragraph -->
<p><?php echo esc_html_x( 'Ruled box', 'block style name', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
<!-- wp:separator {"className":"is-style-double-rule"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-double-rule"/>
<!-- /wp:separator -->
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Buttons', 'agile-base' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact us', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'See services', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
<!-- wp:button {"className":"is-style-boxed"} -->
<div class="wp-block-button is-style-boxed"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About us', 'agile-base' ); ?></a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
