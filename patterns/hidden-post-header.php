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
<!-- wp:post-terms {"term":"category","className":"agile-base-eyebrow"} /-->

<!-- wp:post-title {"level":1,"fontSize":"4-x-large","style":{"spacing":{"margin":{"top":"var:preset|spacing|x-small"}}}} /-->

<!-- wp:group {"className":"agile-base-meta","style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group agile-base-meta" style="margin-top:var(--wp--preset--spacing--small);margin-bottom:var(--wp--preset--spacing--medium)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">
		<!-- wp:avatar {"size":32,"style":{"border":{"radius":"9999px"}}} /-->

		<!-- wp:post-author-name {"fontSize":"small"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-date {"fontSize":"small"} /-->

	<!-- wp:post-comments-count {"fontSize":"small"} /-->
</div>
<!-- /wp:group -->
