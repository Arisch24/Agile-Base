<?php
/**
 * Title: Hidden Footer (Business)
 * Slug: agile-base/hidden-footer-business
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"align":"full","className":"site-footer","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull site-footer" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium)">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-columns alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:site-title {"level":0,"fontSize":"x-large"} /-->
<!-- wp:site-tagline {"fontSize":"small"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"className":"agile-base-footer-heading","fontSize":"large"} -->
<h2 class="wp-block-heading agile-base-footer-heading has-large-font-size"><?php esc_html_e( 'Contact', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><a href="mailto:hello@example.com"><?php esc_html_e( 'hello@example.com', 'agile-base' ); ?></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="tel:+15555550123"><?php esc_html_e( '+1 555 555 0123', 'agile-base' ); ?></a></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Add your street address, city and postcode.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"className":"agile-base-footer-heading","fontSize":"large"} -->
<h2 class="wp-block-heading agile-base-footer-heading has-large-font-size"><?php esc_html_e( 'Opening hours', 'agile-base' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Monday to Friday, 9am to 5pm', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--medium)">
<!-- wp:navigation {"ariaLabel":"<?php echo esc_attr_x( 'Legal', 'navigation landmark label', 'agile-base' ); ?>","overlayMenu":"never","layout":{"type":"flex","flexWrap":"wrap"}} /-->
<!-- wp:social-links {"iconColor":"ink","iconColorValue":"var(--wp--preset--color--ink)","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"service":"facebook"} /-->
<!-- wp:social-link {"service":"instagram"} /-->
<!-- wp:social-link {"service":"linkedin"} /--></ul>
<!-- /wp:social-links -->
</div>
<!-- /wp:group -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:pattern {"slug":"agile-base/hidden-footer-credit"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
