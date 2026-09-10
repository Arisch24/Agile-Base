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
			<p class="agile-base-swatch-label">Black</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Black Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-ultra-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-ultra-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Black Ultra Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Black Dark</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"black-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-black-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Black Ultra Dark</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"white","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-white-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">White</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"paper","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-paper-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Paper</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"ink","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-ink-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Ink</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"surface","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-surface-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Surface</p>
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
			<p class="agile-base-swatch-label">Ultra Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Primary</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Dark</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"primary-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-primary-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Ultra Dark</p>
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
			<p class="agile-base-swatch-label">Ultra Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Secondary</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Dark</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"secondary-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-secondary-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Ultra Dark</p>
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
			<p class="agile-base-swatch-label">Ultra Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent-light","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-light-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Light</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Accent</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Dark</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-swatch-item","layout":{"type":"constrained"}} -->
		<div class="wp-block-group agile-base-swatch-item">
			<!-- wp:group {"className":"agile-base-swatch","backgroundColor":"accent-ultra-dark","layout":{"type":"default"}} -->
			<div class="wp-block-group agile-base-swatch has-accent-ultra-dark-background-color has-background"></div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">Ultra Dark</p>
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
			<p class="has-x-small-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">x-small · 12px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"small","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-small-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">small · 14px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"medium","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-medium-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">medium · 16–18px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-large-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">large · 18–22px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-x-large-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">x-large · 22–28px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"2-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-2-x-large-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">2-x-large · 28–34px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"3-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-3-x-large-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">3-x-large · 34–46px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"4-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-4-x-large-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">4-x-large · 46–58px</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"agile-base-type-row","layout":{"type":"flex","justifyContent":"space-between"}} -->
		<div class="wp-block-group agile-base-type-row">
			<!-- wp:paragraph {"fontSize":"5-x-large","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="has-5-x-large-font-size" style="margin-top:0;margin-bottom:0">Aa</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
			<p class="agile-base-swatch-label" style="margin-top:0;margin-bottom:0">5-x-large · 58–70px</p>
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
			<p class="agile-base-swatch-label">x-small</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--small)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">small</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--medium)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">medium</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">large</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--x-large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">x-large</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--2-x-large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">2-x-large</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:html -->
			<div class="agile-base-scale-bar" style="width:var(--wp--preset--spacing--3-x-large)"></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"agile-base-swatch-label"} -->
			<p class="agile-base-swatch-label">3-x-large</p>
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
