<?php
/**
 * Title: Use Case Detail Section
 * Slug: eventtrashbox/use-case-detail-section
 * Categories: eventtrashbox
 * Description: A two-column section for a specific event use case.
 *
 * @package EventTrashBox
 */
?>

<!-- wp:columns {"align":"wide","verticalAlignment":"center","className":"is-style-balanced-grid"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center is-style-balanced-grid">
	<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
		<!-- wp:group {"className":"etb-pattern-image-placeholder","layout":{"type":"constrained"}} -->
		<div class="wp-block-group etb-pattern-image-placeholder"><!-- wp:paragraph --><p>Use-case image</p><!-- /wp:paragraph --></div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"verticalAlignment":"center","width":"58%"} -->
	<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58%">
		<!-- wp:paragraph {"className":"is-style-eyebrow"} -->
		<p class="is-style-eyebrow">Use case</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"className":"is-style-section-heading"} -->
		<h2 class="wp-block-heading is-style-section-heading">Keep collection points clear and on brand.</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph -->
		<p>Describe where the boxes go, who manages them, and what the printed panels should communicate for this event type.</p>
		<!-- /wp:paragraph -->
		<!-- wp:list {"className":"is-style-check-list"} -->
		<ul class="is-style-check-list"><li>Entry and exit areas</li><li>Food and beverage zones</li><li>Sponsor or donation stations</li></ul>
		<!-- /wp:list -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
