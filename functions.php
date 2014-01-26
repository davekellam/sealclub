<?php
/**
 * sealclub functions and definitions
 *
 * @package Seal Club
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sealclub_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sealclub_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sealclub' ),
	) );
}
endif; // sealclub_setup
add_action( 'after_setup_theme', 'sealclub_setup' );

/**
 * Enqueue scripts and styles.
 */
function sealclub_scripts() {
	wp_enqueue_style( 'sealclub-style', get_template_directory_uri() . '/css/style.css', false  );

	wp_enqueue_script( 'sealclub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sealclub-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

}
add_action( 'wp_enqueue_scripts', 'sealclub_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom functions related to Jetpack.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom queries for the site
 */
function ef_custom_queries( $query ) {
	// Display all posts on homepage
	if ( $query->is_home() ) {
		// Setting to -1 isn't great for performance, so 30 for now
		// Could probably use a transient or something instead
		$query->set( 'posts_per_page', 30 );
	}
}
add_action( 'pre_get_posts', 'ef_custom_queries' );
