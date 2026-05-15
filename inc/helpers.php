<?php
/**
 * Small reusable theme helpers.
 *
 * @package EventTrashBox
 */

if ( ! function_exists( 'eventtrashbox_get_button' ) ) :
	/**
	 * Build consistent button-style link markup for PHP-rendered theme chrome.
	 *
	 * @param string $url   Link URL.
	 * @param string $label Link text.
	 * @param string $class Optional CSS class list.
	 * @return string
	 */
	function eventtrashbox_get_button( $url, $label, $class = 'etb-button etb-button--primary' ) {
		return sprintf(
			'<a class="%1$s" href="%2$s">%3$s</a>',
			esc_attr( $class ),
			esc_url( $url ),
			esc_html( $label )
		);
	}
endif;

if ( ! function_exists( 'eventtrashbox_get_meta_description' ) ) :
	/**
	 * Get a plain-text meta description for the current document.
	 *
	 * @return string
	 */
	function eventtrashbox_get_meta_description() {
		$description = get_bloginfo( 'description', 'display' );

		if ( is_singular() ) {
			$post = get_queried_object();

			if ( $post instanceof WP_Post && has_excerpt( $post ) ) {
				$description = get_the_excerpt( $post );
			}
		}

		return trim( wp_strip_all_tags( $description ) );
	}
endif;

if ( ! function_exists( 'eventtrashbox_button' ) ) :
	/**
	 * Echo consistent button-style link markup for PHP-rendered theme chrome.
	 *
	 * @param string $url   Link URL.
	 * @param string $label Link text.
	 * @param string $class Optional CSS class list.
	 */
	function eventtrashbox_button( $url, $label, $class = 'etb-button etb-button--primary' ) {
		echo eventtrashbox_get_button( $url, $label, $class ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;
