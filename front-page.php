<?php
/**
 * The front page template.
 *
 * This template intentionally renders native WordPress page content so the
 * homepage can be edited from the block editor.
 *
 * @package EventTrashBox
 */

get_header();
?>

<main id="primary" class="site-main etb-front-page">
	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'etb-front-page__content' ); ?>>
			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eventtrashbox' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'eventtrashbox' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer>
			<?php endif; ?>
		</article>

		<?php
	endwhile;
	?>
</main>

<?php
get_footer();
