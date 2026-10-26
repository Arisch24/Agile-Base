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
<p class="has-medium-font-size"><?php esc_html_e( 'No posts were found. Try a different search?', 'agile-base' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'search form label', 'agile-base' ); ?>","showLabel":false,"buttonText":"<?php echo esc_attr_x( 'Search', 'search button text', 'agile-base' ); ?>","buttonPosition":"button-inside","style":{"border":{"radius":"6px"}}} /-->
