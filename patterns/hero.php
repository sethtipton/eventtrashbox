<?php
/**
 * Title: Hero
 * Slug: eventtrashbox/hero
 * Categories: eventtrashbox
 * Description: A simple homepage hero with headline, copy, and buttons.
 *
 * @package EventTrashBox
 */
?>

<!-- wp:group {"align":"full","className":"etb-block-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull etb-block-hero">
	<!-- wp:paragraph {"className":"etb-pattern-eyebrow"} -->
	<p class="etb-pattern-eyebrow">EventTrashBox</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"className":"etb-block-hero__title"} -->
	<h1 class="wp-block-heading etb-block-hero__title">Simple cleanup support for busy events.</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"etb-block-hero__copy"} -->
	<p class="etb-block-hero__copy">Use this section to introduce the service, who it is for, and what action visitors should take next.</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact/">Request a quote</a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#use-cases">See use cases</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
