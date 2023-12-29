<?php
/**
 * Mogo's functions and definitions
 *
 * @package Mogo
 * @since Mogo 1.0
 */

if ( ! defined( 'MOGO_VERSION' ) ) {
	define( 'MOGO_VERSION', '1.0.0' );
}

if ( ! function_exists( 'mogo_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function mogo_setup(): void {

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'mogo', get_template_directory() . '/languages' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus(
			array(
				'header_primary_menu' => __( 'Header Primary Menu', 'mogo' ),
			)
		);

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );

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
endif;
add_action( 'after_setup_theme', 'mogo_setup' );

/**
 * Enqueue scripts and styles.
 */
function mogo_scripts(): void {
	wp_enqueue_style( 'mogo-style', get_stylesheet_uri(), array(), MOGO_VERSION );
	wp_enqueue_style( 'mogo-main-styles', get_template_directory_uri() . '/assets/styles/main_global.css', array( 'mogo-style' ), MOGO_VERSION );
	wp_style_add_data( 'mogo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'mogo-font-loader', get_template_directory_uri() . '/assets/js/font-loader.js', array(), MOGO_VERSION, false );
	wp_enqueue_script( 'mogo-all', get_template_directory_uri() . '/assets/js/all.js', array( 'jquery' ), MOGO_VERSION, true );
	wp_enqueue_script( 'mogo-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), MOGO_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'mogo_scripts' );

/**
 * Adding additional classes to a menu item.
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @return array
 */
function mogo_add_additional_class_on_li(
	array $classes,
	WP_Post $menu_item,
	stdClass $args
): array {
	if ( property_exists( $args, 'add_li_class' ) ) {
		$classes[] = $args->add_li_class;
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'mogo_add_additional_class_on_li', 1, 3 );

/**
 * Adding additional classes to a menu item link.
 *
 * @param array    $atts The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 *
 * @return array
 */
function mogo_add_additional_class_on_a(
	array $atts,
	WP_Post $menu_item,
	stdClass $args
): array {
	if ( property_exists( $args, 'add_link_class' ) ) {
		$atts['class'] = $args->add_link_class;
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'mogo_add_additional_class_on_a', 1, 3 );

/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function mogo_register_acf_blocks(): void {
	register_block_type( __DIR__ . '/blocks/hero-section' );
	register_block_type( __DIR__ . '/blocks/about-section' );
	register_block_type( __DIR__ . '/blocks/service-section' );
	register_block_type( __DIR__ . '/blocks/what-section' );
	register_block_type( __DIR__ . '/blocks/team-section' );
	register_block_type( __DIR__ . '/blocks/testimonials-section' );
	register_block_type( __DIR__ . '/blocks/blog-section' );
}

add_action( 'init', 'mogo_register_acf_blocks' );

/**
 * Check for empty values in the array.
 *
 * @param array|null $arr Array.
 *
 * @return bool
 */
function mogo_is_array_empty( array $arr = null ): bool {
	if ( ! $arr ) {
		return true;
	}

	$arr_filtered = array_filter(
		$arr,
		null,
	);
	if ( count( $arr ) !== count( $arr_filtered ) ) {
		return true;
	}

	return false;
}
