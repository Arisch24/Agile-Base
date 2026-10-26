<?php
/**
 * Title: Hidden Post Header
 * Slug: agile-base/hidden-post-header
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:post-title {"level":1,"fontSize":"4-x-large"} /-->

<!-- wp:group {"className":"agile-base-meta agile-base-postmeta","style":{"spacing":{"blockGap":"var:preset|spacing|x-small","margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|medium"},"padding":{"top":"var:preset|spacing|x-small","bottom":"var:preset|spacing|x-small"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group agile-base-meta agile-base-postmeta" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--medium);padding-top:var(--wp--preset--spacing--x-small);padding-bottom:var(--wp--preset--spacing--x-small)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
	<div class="wp-block-group">
		<!-- wp:avatar {"size":32} /-->

		<!-- wp:post-author-name {"fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-date {"fontSize":"small"} /-->

	<!-- wp:post-terms {"term":"category","fontSize":"small"} /-->

	<!-- wp:post-comments-count {"fontSize":"small"} /-->
</div>
<!-- /wp:group -->
