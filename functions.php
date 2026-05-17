<?php
/**
 * EventTrashBox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EventTrashBox
 */

require get_template_directory() . '/inc/constants.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/block-styles.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eventtrashbox_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
	load_theme_textdomain( 'eventtrashbox', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( EVENTTRASHBOX_IMAGE_SIZE_HERO, 1920, 960, true );
	add_image_size( EVENTTRASHBOX_IMAGE_SIZE_PAGE_FEATURE, 1280, 720, true );
	add_image_size( EVENTTRASHBOX_IMAGE_SIZE_CARD, 720, 540, true );
	add_image_size( EVENTTRASHBOX_IMAGE_SIZE_GALLERY, 960, 720, true );

	// Register theme menu locations.
	register_nav_menus(
		array(
			EVENTTRASHBOX_MENU_PRIMARY => esc_html__( 'Primary', 'eventtrashbox' ),
			EVENTTRASHBOX_MENU_FOOTER  => esc_html__( 'Footer', 'eventtrashbox' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'appearance-tools' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'eventtrashbox_setup' );

/**
 * Register block pattern categories.
 */
function eventtrashbox_register_pattern_categories() {
	register_block_pattern_category(
		'eventtrashbox',
		array(
			'label' => esc_html__( 'EventTrashBox', 'eventtrashbox' ),
		)
	);
}
add_action( 'init', 'eventtrashbox_register_pattern_categories' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eventtrashbox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eventtrashbox_content_width', 640 );
}
add_action( 'after_setup_theme', 'eventtrashbox_content_width', 0 );

/**
 * Return a file modification based asset version with a theme version fallback.
 *
 * @param string $relative_path Theme-relative asset path.
 * @return string
 */
function eventtrashbox_asset_version( $relative_path ) {
	$asset_path = get_template_directory() . '/' . ltrim( $relative_path, '/' );

	if ( file_exists( $asset_path ) ) {
		return (string) filemtime( $asset_path );
	}

	return EVENTTRASHBOX_VERSION;
}

/**
 * Enqueue scripts and styles.
 */
function eventtrashbox_scripts() {
	wp_enqueue_style( EVENTTRASHBOX_STYLE_HANDLE, get_stylesheet_uri(), array(), eventtrashbox_asset_version( 'style.css' ) );
	wp_style_add_data( EVENTTRASHBOX_STYLE_HANDLE, 'rtl', 'replace' );

	wp_enqueue_script(
		EVENTTRASHBOX_NAVIGATION_HANDLE,
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		eventtrashbox_asset_version( 'js/navigation.js' ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'eventtrashbox_scripts' );

/**
 * Remove WordPress emoji fallback assets from front-end output.
 */
function eventtrashbox_disable_emoji_assets() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'embed_head', 'print_emoji_detection_script' );
	remove_action( 'enqueue_embed_scripts', 'wp_enqueue_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'eventtrashbox_disable_emoji_assets' );
add_filter( 'emoji_svg_url', '__return_false' );

/**
 * Expose theme image sizes in the editor/media image size picker.
 *
 * @param string[] $sizes Image size labels keyed by registered size name.
 * @return string[]
 */
function eventtrashbox_image_size_names_choose( $sizes ) {
	return array_merge(
		$sizes,
		array(
			EVENTTRASHBOX_IMAGE_SIZE_HERO         => __( 'EventTrashBox Hero', 'eventtrashbox' ),
			EVENTTRASHBOX_IMAGE_SIZE_PAGE_FEATURE => __( 'EventTrashBox Page Feature', 'eventtrashbox' ),
			EVENTTRASHBOX_IMAGE_SIZE_CARD         => __( 'EventTrashBox Card', 'eventtrashbox' ),
			EVENTTRASHBOX_IMAGE_SIZE_GALLERY      => __( 'EventTrashBox Gallery', 'eventtrashbox' ),
		)
	);
}
add_filter( 'image_size_names_choose', 'eventtrashbox_image_size_names_choose' );

/**
 * Add utility classes to menu items that need theme-level emphasis.
 *
 * @param string[] $classes Menu item classes.
 * @param WP_Post  $item    Menu item object.
 * @return string[]
 */
function eventtrashbox_nav_menu_css_class( $classes, $item ) {
	$item_path = ! empty( $item->url ) ? (string) wp_parse_url( $item->url, PHP_URL_PATH ) : '';

	if ( preg_match( '#/quote/?$#', $item_path ) ) {
		$classes[] = 'etb-menu-item-quote';
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'eventtrashbox_nav_menu_css_class', 10, 2 );

/**
 * Replace placeholder menu parent links with real destination URLs.
 *
 * @param array   $atts Menu item link attributes.
 * @param WP_Post $item Menu item object.
 * @return array
 */
function eventtrashbox_nav_menu_link_attributes( $atts, $item ) {
	if ( empty( $atts['href'] ) || '#' !== $atts['href'] ) {
		return $atts;
	}

	$placeholder_links = array(
		'Products'  => '/products/',
		'Use Cases' => '/use-cases/',
		'Support'   => '/how-it-works/',
		'Company'   => '/about-eventtrashbox/',
	);

	$item_title = isset( $item->title ) ? wp_strip_all_tags( $item->title ) : '';

	if ( isset( $placeholder_links[ $item_title ] ) ) {
		$atts['href'] = home_url( $placeholder_links[ $item_title ] );
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'eventtrashbox_nav_menu_link_attributes', 10, 2 );

/**
 * Normalize text for duplicate heading comparisons.
 *
 * @param string $text Text to normalize.
 * @return string
 */
function eventtrashbox_normalize_heading_text( $text ) {
	$text = html_entity_decode( wp_strip_all_tags( $text ), ENT_QUOTES, get_bloginfo( 'charset' ) );
	$text = preg_replace( '/\s+/', ' ', $text );

	return strtolower( trim( $text ) );
}

/**
 * Remove the first editor-authored H2 when it duplicates the page title.
 *
 * @param string $block_content Rendered block content.
 * @param array  $block         Parsed block data.
 * @return string
 */
function eventtrashbox_remove_duplicate_page_title_heading( $block_content, $block ) {
	static $removed_duplicate_title = array();

	if ( is_admin() || is_front_page() || ! is_singular( 'page' ) || 'core/heading' !== $block['blockName'] ) {
		return $block_content;
	}

	$post_id = get_queried_object_id();

	if ( empty( $post_id ) || ! empty( $removed_duplicate_title[ $post_id ] ) ) {
		return $block_content;
	}

	$heading_level = isset( $block['attrs']['level'] ) ? (int) $block['attrs']['level'] : 2;

	if ( 2 !== $heading_level ) {
		return $block_content;
	}

	if ( eventtrashbox_normalize_heading_text( $block_content ) === eventtrashbox_normalize_heading_text( get_the_title( $post_id ) ) ) {
		$removed_duplicate_title[ $post_id ] = true;
		return '';
	}

	return $block_content;
}
add_filter( 'render_block', 'eventtrashbox_remove_duplicate_page_title_heading', 10, 2 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
