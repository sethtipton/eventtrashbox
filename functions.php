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
 * Enqueue scripts and styles.
 */
function eventtrashbox_scripts() {
	wp_enqueue_style( EVENTTRASHBOX_STYLE_HANDLE, get_stylesheet_uri(), array(), EVENTTRASHBOX_VERSION );
	wp_style_add_data( EVENTTRASHBOX_STYLE_HANDLE, 'rtl', 'replace' );

	wp_enqueue_script( EVENTTRASHBOX_NAVIGATION_HANDLE, get_template_directory_uri() . '/js/navigation.js', array(), EVENTTRASHBOX_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'eventtrashbox_scripts' );

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
