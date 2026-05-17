<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EventTrashBox
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'This page missed the pickup.', 'eventtrashbox' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'The link may be old, moved, or no longer available. Try a search or choose a helpful starting point below.', 'eventtrashbox' ); ?></p>

					<?php
					get_search_form();
					?>

					<div class="widget">
						<h2 class="widget-title"><?php esc_html_e( 'Helpful pages', 'eventtrashbox' ); ?></h2>
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/products/' ) ); ?>"><?php esc_html_e( 'Browse products', 'eventtrashbox' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/products/compare/' ) ); ?>"><?php esc_html_e( 'Compare box options', 'eventtrashbox' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>"><?php esc_html_e( 'View the gallery', 'eventtrashbox' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"><?php esc_html_e( 'Read frequently asked questions', 'eventtrashbox' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>"><?php esc_html_e( 'Request a quote', 'eventtrashbox' ); ?></a></li>
						</ul>
					</div><!-- .widget -->

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
