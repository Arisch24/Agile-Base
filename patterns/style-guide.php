<?php
/**
 * Title: Style Guide
 * Slug: agile-base/style-guide
 * Categories: agile-base, featured, text
 * Description: A living showcase of the theme's colors, type scale, fonts, spacing and buttons — all pulled straight from theme.json.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|3-x-large","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--3-x-large);padding-bottom:0">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained","contentSize":"760px"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--x-large)">
		<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
		<p class="agile-base-eyebrow"><?php esc_html_e( 'Design system', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"fontSize":"4-x-large"} -->
		<h2 class="wp-block-heading has-4-x-large-font-size"><?php esc_html_e( 'Style guide', 'agile-base' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"large","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small"}}}} -->
		<p class="has-large-font-size" style="margin-top:var(--wp--preset--spacing--x-small)"><?php esc_html_e( 'Every color, size and space on this page is a live preset from theme.json — change your Styles in the editor and this page updates with it.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"agile-base-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agile-base-band" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
	<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Colors', 'agile-base' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"agile-base-eyebrow"} -->
	<p class="agile-base-eyebrow"><?php esc_html_e( 'Neutrals', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
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
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Black Light', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-ultra-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-ultra-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Black Ultra Light', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Black Dark', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Black Ultra Dark', 'color swatch name', 'agile-base' ); ?></p>
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

	<!-- wp:paragraph {"className":"agile-base-eyebrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
	<p class="agile-base-eyebrow" style="margin-top:var(--wp--preset--spacing--small)"><?php esc_html_e( 'Primary', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary-ultra-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-ultra-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Ultra Light', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Light', 'color swatch name', 'agile-base' ); ?></p>
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
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Dark', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Ultra Dark', 'color swatch name', 'agile-base' ); ?></p>
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
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"agile-base-eyebrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
	<p class="agile-base-eyebrow" style="margin-top:var(--wp--preset--spacing--small)"><?php esc_html_e( 'Secondary', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary-ultra-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-ultra-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Ultra Light', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Light', 'color swatch name', 'agile-base' ); ?></p>
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
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Dark', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Ultra Dark', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"className":"agile-base-eyebrow","style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
	<p class="agile-base-eyebrow" style="margin-top:var(--wp--preset--spacing--small)"><?php esc_html_e( 'Accent', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent-ultra-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-ultra-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Ultra Light', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Light', 'color swatch name', 'agile-base' ); ?></p>
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
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Dark', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'Ultra Dark', 'color swatch name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
	<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Type scale', 'agile-base' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:group {"className":"agile-base-type-scale","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group agile-base-type-scale">
		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"x-small","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-x-small-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'x-small · 12px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"small","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-small-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'small · 14px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"medium","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-medium-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'medium · 16–18px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-large-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'large · 18–22px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-x-large-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'x-large · 22–28px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"2-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-2-x-large-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( '2-x-large · 28–34px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"3-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-3-x-large-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( '3-x-large · 34–46px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"4-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-4-x-large-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( '4-x-large · 46–58px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"5-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-5-x-large-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( 'Aa', 'type specimen sample', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0"><?php echo esc_html_x( '5-x-large · 58–70px', 'font size preset and size', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"agile-base-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agile-base-band" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
	<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Fonts', 'agile-base' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"fontFamily":"figtree","fontSize":"large"} -->
		<p class="has-figtree-font-family has-large-font-size"><?php esc_html_e( 'The quick brown fox jumps over the lazy dog.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
		<p class="agile-base-swatch-label"><?php esc_html_e( 'Figtree — body text', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"fontFamily":"space-grotesk","fontSize":"large","style":{"typography":{"fontWeight":"700"}}} -->
		<p class="has-space-grotesk-font-family has-large-font-size" style="font-weight:700"><?php esc_html_e( 'The quick brown fox jumps over the lazy dog.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
		<p class="agile-base-swatch-label"><?php esc_html_e( 'Space Grotesk — headings', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"fontFamily":"space-mono","fontSize":"large"} -->
		<p class="has-space-mono-font-family has-large-font-size"><?php esc_html_e( 'The quick brown fox jumps over the lazy dog.', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
		<p class="agile-base-swatch-label"><?php esc_html_e( 'Space Mono — labels & code', 'agile-base' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
	<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Spacing', 'agile-base' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--x-small)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'x-small', 'spacing preset name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--small)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'small', 'spacing preset name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--medium)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'medium', 'spacing preset name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'large', 'spacing preset name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--x-large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( 'x-large', 'spacing preset name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--2-x-large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( '2-x-large', 'spacing preset name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--3-x-large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label"><?php echo esc_html_x( '3-x-large', 'spacing preset name', 'agile-base' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"agile-base-band","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-x-large","bottom":"var:preset|spacing|2-x-large"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull agile-base-band" style="padding-top:var(--wp--preset--spacing--2-x-large);padding-bottom:var(--wp--preset--spacing--2-x-large)">
	<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
	<h3 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Buttons', 'agile-base' ); ?></h3>
	<!-- /wp:heading -->

	<!-- wp:html -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><div class="wp-block-button"><button class="wp-block-button__link wp-element-button" type="button" disabled><?php esc_html_e( 'Primary button', 'agile-base' ); ?></button></div><div class="wp-block-button is-style-outline"><button class="wp-block-button__link wp-element-button" type="button" disabled><?php esc_html_e( 'Outline button', 'agile-base' ); ?></button></div></div>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
