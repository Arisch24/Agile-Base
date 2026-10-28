<?php
/**
 * Title: Page: Contact
 * Slug: agile-base/page-contact
 * Categories: agile-base, contact
 * Block Types: core/post-content
 * Post Types: page
 * Keywords: contact, business, page, information
 * Viewport Width: 1400
 * Description: A Contact page: a short intro, email, address and opening hours, and an FAQ. Looks best with the Page (Full Width) template.
 *
 * @package Agile_Base
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|large"}}},"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--large)">
	<!-- wp:paragraph {"fontSize":"x-large"} -->
	<p class="has-x-large-font-size"><?php esc_html_e( 'Tell us what you need help with, and how to reach you.', 'agile-base' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"agile-base/contact-details"} /-->

<!-- wp:pattern {"slug":"agile-base/faq"} /-->
