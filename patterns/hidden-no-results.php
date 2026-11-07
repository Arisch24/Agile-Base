<?php
/**
 * Title: No Results
 * Slug: agile-base/hidden-no-results
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php esc_html_e( 'No posts found. Try another search or return to the homepage.', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'agile-base' ); ?>","showLabel":false,"buttonText":"<?php echo esc_attr_x( 'Search', 'search button text', 'agile-base' ); ?>","buttonPosition":"button-inside"} /-->

<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back home', 'agile-base' ); ?></a></p>
<!-- /wp:paragraph -->
