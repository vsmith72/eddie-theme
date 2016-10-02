<?php
/**
 * theme_name functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme_name
 */
if ( ! function_exists( 'theme_name_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_name_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'starter2' to the name of your theme in all the template files.
	 */
    load_theme_textdomain( 'theme_name', get_template_directory() . '/languages' );

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

    add_image_size( 'theme_name-featured-image', 640, 9999 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Top', 'theme_name' ),
    ) );


    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

}
endif;
add_action( 'after_setup_theme', 'theme_name_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_name_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'theme_name' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'theme_name_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function starter2_scripts() {
    wp_enqueue_style( 'theme_name-style', get_stylesheet_uri() );

    wp_enqueue_script( 'theme_name-custom', get_template_directory_uri() . '/js/custom.js', array(), '20161002', true );

}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );