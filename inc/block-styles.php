<?php
/**
 * Core block style registrations.
 *
 * @package EventTrashBox
 */

/**
 * Register EventTrashBox style variations for core blocks.
 */
function eventtrashbox_register_block_styles() {
	$block_styles = array(
		'core/group'      => array(
			'section-default'   => __( 'Section Default', 'eventtrashbox' ),
			'section-muted'     => __( 'Section Muted', 'eventtrashbox' ),
			'section-accent'    => __( 'Section Accent', 'eventtrashbox' ),
			'section-dark'      => __( 'Section Dark', 'eventtrashbox' ),
			'section-card'      => __( 'Section Card', 'eventtrashbox' ),
			'section-narrow'    => __( 'Section Narrow', 'eventtrashbox' ),
			'section-full-bleed' => __( 'Section Full Bleed', 'eventtrashbox' ),
		),
		'core/button'     => array(
			'primary'   => __( 'Primary', 'eventtrashbox' ),
			'secondary' => __( 'Secondary', 'eventtrashbox' ),
			'outline'   => __( 'Outline', 'eventtrashbox' ),
			'text-link' => __( 'Text Link', 'eventtrashbox' ),
			'large-cta' => __( 'Large CTA', 'eventtrashbox' ),
		),
		'core/buttons'    => array(
			'stacked-cta' => __( 'Stacked CTA', 'eventtrashbox' ),
		),
		'core/heading'    => array(
			'eyebrow'         => __( 'Eyebrow', 'eventtrashbox' ),
			'hero-heading'    => __( 'Hero Heading', 'eventtrashbox' ),
			'section-heading' => __( 'Section Heading', 'eventtrashbox' ),
			'card-heading'    => __( 'Card Heading', 'eventtrashbox' ),
		),
		'core/paragraph'  => array(
			'lead'           => __( 'Lead', 'eventtrashbox' ),
			'small'          => __( 'Small', 'eventtrashbox' ),
			'fine-print'     => __( 'Fine Print', 'eventtrashbox' ),
			'measure-narrow' => __( 'Measure Narrow', 'eventtrashbox' ),
		),
		'core/image'      => array(
			'rounded'        => __( 'Rounded', 'eventtrashbox' ),
			'product-mockup' => __( 'Product Mockup', 'eventtrashbox' ),
			'framed'         => __( 'Framed', 'eventtrashbox' ),
			'bleed-edge'     => __( 'Bleed Edge', 'eventtrashbox' ),
		),
		'core/columns'    => array(
			'feature-grid'  => __( 'Feature Grid', 'eventtrashbox' ),
			'compact-grid'  => __( 'Compact Grid', 'eventtrashbox' ),
			'balanced-grid' => __( 'Balanced Grid', 'eventtrashbox' ),
		),
		'core/list'       => array(
			'check-list'        => __( 'Check List', 'eventtrashbox' ),
			'spec-list'         => __( 'Spec List', 'eventtrashbox' ),
			'numbered-process'  => __( 'Numbered Process', 'eventtrashbox' ),
		),
		'core/table'      => array(
			'specs-table'      => __( 'Specs Table', 'eventtrashbox' ),
			'comparison-table' => __( 'Comparison Table', 'eventtrashbox' ),
			'pricing-table'    => __( 'Pricing Table', 'eventtrashbox' ),
		),
		'core/details'    => array(
			'faq-item'       => __( 'FAQ Item', 'eventtrashbox' ),
			'support-detail' => __( 'Support Detail', 'eventtrashbox' ),
		),
		'core/gallery'    => array(
			'project-gallery' => __( 'Project Gallery', 'eventtrashbox' ),
			'mockup-gallery'  => __( 'Mockup Gallery', 'eventtrashbox' ),
			'tight-grid'      => __( 'Tight Grid', 'eventtrashbox' ),
		),
		'core/media-text' => array(
			'product-feature'  => __( 'Product Feature', 'eventtrashbox' ),
			'use-case-feature' => __( 'Use Case Feature', 'eventtrashbox' ),
			'process-feature'  => __( 'Process Feature', 'eventtrashbox' ),
		),
		'core/cover'      => array(
			'hero-cover'   => __( 'Hero Cover', 'eventtrashbox' ),
			'cta-cover'    => __( 'CTA Cover', 'eventtrashbox' ),
			'subtle-cover' => __( 'Subtle Cover', 'eventtrashbox' ),
		),
	);

	foreach ( $block_styles as $block_name => $styles ) {
		foreach ( $styles as $style_name => $label ) {
			register_block_style(
				$block_name,
				array(
					'name'  => $style_name,
					'label' => $label,
				)
			);
		}
	}
}
add_action( 'init', 'eventtrashbox_register_block_styles' );
