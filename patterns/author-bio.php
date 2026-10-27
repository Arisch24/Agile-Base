<?php
/**
 * Title: About the Author
 * Slug: agile-base/author-bio
 * Categories: agile-base, text
 * Keywords: author, bio, byline
 * Viewport Width: 1000
 * Description: The post author's avatar, linked name and biography. Insert it at the end of the Single template to show it under every post.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"className":"agile-base-author-bio","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"}} -->
<div class="wp-block-group agile-base-author-bio">
	<!-- wp:avatar {"size":64,"style":{"border":{"radius":"var:custom|radius|round"}}} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|x-small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group">
		<!-- wp:post-author-name {"isLink":true} /-->

		<!-- wp:post-author-biography /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
