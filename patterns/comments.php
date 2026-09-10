<?php
/**
 * Title: Comments
 * Slug: agile-base/comments
 * Inserter: no
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:comments {"className":"wp-block-comments"} -->
<div class="wp-block-comments">
	<!-- wp:comments-title {"fontSize":"x-large"} /-->

	<!-- wp:comment-template -->
		<!-- wp:columns -->
		<div class="wp-block-columns">
			<!-- wp:column {"width":"40px"} -->
			<div class="wp-block-column" style="flex-basis:40px">
				<!-- wp:avatar {"size":40} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"spacing":{"blockGap":"0.5em"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group">
					<!-- wp:comment-author-name {"fontSize":"small"} /-->
					<!-- wp:comment-date {"fontSize":"small"} /-->
					<!-- wp:comment-edit-link {"fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:comment-content /-->

				<!-- wp:comment-reply-link {"fontSize":"small"} /-->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	<!-- /wp:comment-template -->

	<!-- wp:comments-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
		<!-- wp:comments-pagination-previous /-->
		<!-- wp:comments-pagination-numbers /-->
		<!-- wp:comments-pagination-next /-->
	<!-- /wp:comments-pagination -->

	<!-- wp:post-comments-form /-->
</div>
<!-- /wp:comments -->
