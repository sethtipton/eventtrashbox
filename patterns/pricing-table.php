<?php
/**
 * Title: Pricing table
 * Slug: eventtrashbox/pricing-table
 * Categories: eventtrashbox
 * Description: Two simple editable pricing cards.
 *
 * @package EventTrashBox
 */
?>

<!-- wp:group {"align":"wide","className":"etb-pattern-section","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide etb-pattern-section">
	<!-- wp:paragraph {"className":"etb-pattern-eyebrow"} -->
	<p class="etb-pattern-eyebrow">Pricing</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading">Start with simple packages</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"className":"etb-pattern-card-grid"} -->
	<div class="wp-block-columns etb-pattern-card-grid">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"etb-pattern-card","layout":{"type":"constrained"}} -->
			<div class="wp-block-group etb-pattern-card">
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">Small event</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"etb-pattern-price"} -->
				<p class="etb-pattern-price">Quote</p>
				<!-- /wp:paragraph -->
				<!-- wp:list -->
				<ul>
					<li>Basic planning call</li>
					<li>Event-day cleanup scope</li>
					<li>Simple disposal plan</li>
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"etb-pattern-card is-featured","layout":{"type":"constrained"}} -->
			<div class="wp-block-group etb-pattern-card is-featured">
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">Full event</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"etb-pattern-price"} -->
				<p class="etb-pattern-price">Quote</p>
				<!-- /wp:paragraph -->
				<!-- wp:list -->
				<ul>
					<li>Detailed cleanup plan</li>
					<li>Larger event footprint</li>
					<li>Post-event wrap-up</li>
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
