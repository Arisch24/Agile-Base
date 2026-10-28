<?php
/**
 * Title: Home: Local Business
 * Slug: agile-base/template-front-page-local-business
 * Template Types: front-page
 * Inserter: no
 * Viewport Width: 1400
 * Description: For local services and trades: phone, hours, guarantees and reviews up front, with the Header (Button) and Footer (Business).
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:template-part {"slug":"header-cta","tagName":"header","area":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0">
<!-- wp:pattern {"slug":"agile-base/hidden-home-local-business"} /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer-business","tagName":"footer","area":"footer"} /-->
