<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EventTrashBox
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing matched.', 'eventtrashbox' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			$message = sprintf(
				wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish the first EventTrashBox post? <a href="%1$s">Start writing</a>.', 'eventtrashbox' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>

			<p><?php echo $message; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'No results for that search. Try a different phrase or browse the latest posts.', 'eventtrashbox' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'There is nothing here yet. Search the site or check back after new posts are published.', 'eventtrashbox' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
