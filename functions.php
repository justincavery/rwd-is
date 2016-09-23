<?php
/**
 * RWD.IS functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RWD.IS
 */

if ( ! function_exists( 'rwd_is_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rwd_is_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on RWD.IS, use a find and replace
	 * to change 'rwd-is' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rwd-is', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rwd-is' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rwd_is_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'rwd_is_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rwd_is_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rwd_is_content_width', 640 );
}
add_action( 'after_setup_theme', 'rwd_is_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rwd_is_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rwd-is' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rwd-is' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rwd_is_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rwd_is_scripts() {
	wp_enqueue_style( 'rwd-is-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'rwd-is-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'rwd-is-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}
}
add_action( 'wp_enqueue_scripts', 'rwd_is_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



add_action( 'init', 'CPT_register_my_cpts_podcasts' );
function CPT_register_my_cpts_podcasts() {
	$labels = array(
		"name" => __( 'Podcasts', 'rwd-is' ),
		"singular_name" => __( 'Podcast', 'rwd-is' ),
		);

	$args = array(
		"label" => __( 'Podcasts', 'rwd-is' ),
		"labels" => $labels,
		"description" => "Responsive Design Podcasts run in two typical show types... ones with a guest and ones without. ",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "podcasts", "with_front" => false ),
		"query_var" => true,

		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
		"taxonomies" => array( "category", "post_tag", "People" ),
			);
	register_post_type( "podcasts", $args );

// End of CPT_register_my_cpts_podcasts()
}

add_action( 'init', 'CPT_register_my_cpts_patterns' );
function CPT_register_my_cpts_patterns() {
	$labels = array(
		"name" => __( 'Patterns', 'rwd-is' ),
		"singular_name" => __( 'Pattern', 'rwd-is' ),
		);

	$args = array(
		"label" => __( 'Patterns', 'rwd-is' ),
		"labels" => $labels,
		"description" => "Responsive Design Patterns run in two typical show types... ones with a guest and ones without. ",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "patterns", "with_front" => false ),
		"query_var" => true,

		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
		"taxonomies" => array( "category", "post_tag" ),
			);
	register_post_type( "patterns", $args );

// End of CPT_register_my_cpts_podcasts()
}

add_action( 'init', 'CPT_register_my_cpts_example' );
function CPT_register_my_cpts_example() {
	$labels = array(
		"name" => __( 'Examples', 'rwd-is' ),
		"singular_name" => __( 'Example', 'rwd-is' ),
		);

	$args = array(
		"label" => __( 'Examples', 'rwd-is' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "examples", "with_front" => false ),
		"query_var" => true,

		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "post_tag" ),
			);
	register_post_type( "example", $args );

// End of CPT_register_my_cpts_example()
}

add_action( 'init', 'CPT_register_my_cpts_article' );
function CPT_register_my_cpts_article() {
	$labels = array(
		"name" => __( 'Articles', 'rwd-is' ),
		"singular_name" => __( 'Article', 'rwd-is' ),
		);

	$args = array(
		"label" => __( 'Articles', 'rwd-is' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "articles", "with_front" => false ),
		"query_var" => true,

		"supports" => array( "title", "editor", "thumbnail" , "excerpt"),
		"taxonomies" => array( "category", "post_tag" ),
			);
	register_post_type( "article", $args );

// End of CPT_register_my_cpts_articles()
}

add_action( 'init', 'CPT_register_my_cpts_resource' );
function CPT_register_my_cpts_resource() {
	$labels = array(
		"name" => __( 'Resources', 'rwd-is' ),
		"singular_name" => __( 'Resource', 'rwd-is' ),
		);

	$args = array(
		"label" => __( 'Resources', 'rwd-is' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "resources", "with_front" => false ),
		"query_var" => true,

		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "post_tag", "Resource", "People" ),
			);
	register_post_type( "resource", $args );

// End of CPT_register_my_cpts_example()
}

// remove the prefetch meta tag for wordpress.org
add_filter( 'emoji_svg_url', '__return_false' );
// remove the emojis.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
//remove the "This page is built by Wordpress" item
remove_action('wp_head', 'wp_generator');