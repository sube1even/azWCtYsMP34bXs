<?php
/**
 * framework functions and definitions
 *
 * @package framework
 */
 

/**
 * Include all files in the functions directory
 */
foreach ( glob( get_template_directory() . "/functions/*.php") as $filename )
{
	include $filename;
}


/**
 * Include from lib
 */

require_once( get_template_directory() . '/lib/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function framework_setup() 
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on framework, use a find and replace
	 * to change 'framework' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'framework', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'framework' ),
	) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
add_action( 'after_setup_theme', 'framework_setup' );


/**
 * Enqueue scripts and styles.
 */
function framework_scripts() 
{	
	wp_enqueue_style( 'framework-style', get_stylesheet_uri() );
	wp_enqueue_style( 'framework-main', get_template_directory_uri() . '/stylesheets/main.css' );

	wp_enqueue_script( 'framework-plugins', get_template_directory_uri() . '/javascript/min/plugins.min.js', array( 'jquery' ), 1, true  );
	wp_enqueue_script( 'framework-main', get_template_directory_uri() . '/javascript/min/app.min.js', array( 'jquery' ), 1, true  );

	wp_localize_script( 'framework-main', 'wp',
		array(
			'url' => array(
				'home' => home_url(),
				'template' => get_template_directory_uri(),
				'ajax' => admin_url('admin-ajax.php')
			)
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	{
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'framework_scripts' );

