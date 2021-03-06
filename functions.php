<?php
/**
 * eddie-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eddie-theme
 */
if ( ! function_exists( 'eddie_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eddie_theme_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'starter2' to the name of your theme in all the template files.
	 */
    load_theme_textdomain( 'eddie_theme', get_template_directory() . '/languages' );

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

    add_image_size( 'eddie_theme-featured-image', 640, 9999 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Top', 'eddie_theme' ),
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
add_action( 'after_setup_theme', 'eddie_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eddie_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'eddie_theme' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'eddie_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eddie_theme_scripts() {
    wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/vendors/normalize-css/normalize.css');
    wp_enqueue_style( 'eddie_theme-style', get_stylesheet_uri() );

    wp_enqueue_script( 'eddie_theme-custom', get_template_directory_uri() . '/js/custom.min.js', array(), '20161002', true );

}
add_action( 'wp_enqueue_scripts', 'eddie_theme_scripts' );
