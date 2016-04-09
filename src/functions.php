<?php
/**
 * WP Gulp Boilerplate functions and definitions
 *
 * Set up the theme and provide helper functions here. Loosely based on Twenty Sixteen.
 * You probably want to find and replace wpgulpboilerplate with your theme name.
 *
 */

if ( ! function_exists( 'wpgulpboilerplate_setup' ) ) :
	function wpgulpboilerplate_setup() {
		// Make Theme available for translation
		load_theme_textdomain( 'wpgulpboilerplate', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the title tag
		add_theme_support( 'title-tag' );

		// Use post thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// Register a primary menu
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'wpgulpboilerplate' ),
		) );

		// Use HTML 5
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Enable support for post formats
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

	}
endif;
add_action( 'after_setup_theme', 'wpgulpboilerplate_setup' );

// Register a single widget area.
function wpgulpboilerplate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wpgulpboilerplate' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'wpgulpboilerplate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpgulpboilerplate_widgets_init' );

// Detect JavaScript
function wpgulpboilerplate_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'wpgulpboilerplate_javascript_detection', 0 );
