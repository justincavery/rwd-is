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

  add_image_size( 'post-standard', 800, 460, true ); // Hard Crop Modes
  add_image_size( 'post-large', 800, 580, true ); // Soft Crop Mode
  add_image_size( 'post-square', 800, 790, true ); // Soft Crop Mode

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
	// wp_enqueue_style( 'rwd-is-style', get_stylesheet_uri() );

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
    "yarpp_support" => true
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
    "yarpp_support" => true
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
    "yarpp_support" => true
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
    "yarpp_support" => true
			);
	register_post_type( "article", $args );

// End of CPT_register_my_cpts_articles()
}



// register a new taxonomy resource structure to make it differnet from the name of teh custom post type.

add_action( 'init', 'cptui_register_my_taxes_resource_tags' );
function cptui_register_my_taxes_resource_tags() {
	$labels = array(
		"name" => __( '_Resource Tags', 'rwd-is' ),
		"singular_name" => __( '_Resource Tag', 'rwd-is' ),
		);

	$args = array(
		"label" => __( '_Resource Tags', 'rwd-is' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "_Resource Tags",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'resources', 'with_front' => false, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
    "yarpp_support" => true
	);
	register_taxonomy( "resource_tags", array( "post", "page", "example", "resource" ), $args );

// End cptui_register_my_taxes_resource_tags()
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
		"has_archive" => "resources",
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "resources/%resource_tags%", "with_front" => false ),
		"query_var" => true,

		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "post_tag", "resource_tags", "People" ),
    "yarpp_support" => true
			);

	register_post_type( "resource", $args );

// End of CPT_register_my_cpts_example()
}


function wpa_show_permalinks ( $post_link, $post){
	if ( is_object( $post ) && $post->post_type == "resource"){
		$terms = wp_get_object_terms( $post->ID, "resource_tags" );
		if( $terms ) {
			return str_replace( "resource_tags", $terms[0]->slug, $post_link );
		}
	}
	return $post_link;
}
add_filter( "post_type_link", "wpa_show_permalinks", 1, 2 );


// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');



// remove the prefetch meta tag for wordpress.org
add_filter( 'emoji_svg_url', '__return_false' );
// remove the emojis.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
//remove the "This page is built by Wordpress" item
remove_action('wp_head', 'wp_generator');


/**
 * Tell WordPress how to interpret our Resources URL structure
 *
 * @param array $rules Existing rewrite rules
 * @return array
 */
function so23698827_add_rewrite_rules( $rules ) {
  $new = array();
  $new['resources/([^/]+)/(.+)/?$'] = 'index.php?resource=$matches[2]';
  $new['resources/(.+)/?$'] = 'index.php?resource_tags=$matches[1]';

  return array_merge( $new, $rules ); // Ensure our rules come first
}
add_filter( 'rewrite_rules_array', 'so23698827_add_rewrite_rules' );

/**
 * Handle the '%project_category%' URL placeholder
 *
 * @param str $link The link to the post
 * @param WP_Post object $post The post object
 * @return str
 */
function so23698827_filter_post_type_link( $link, $post ) {
  if ( $post->post_type == 'resource' ) {
    if ( $cats = get_the_terms( $post->ID, 'resource_tags' ) ) {
      $link = str_replace( '%resource_tags%', current( $cats )->slug, $link );
    }
  }
  return $link;
}
add_filter( 'post_type_link', 'so23698827_filter_post_type_link', 10, 2 );

// allow the uploading of SVG's

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

function get_hansel_and_gretel_breadcrumbs()
{
    // Set variables for later use
    $here_text        = __( 'You are currently here!' );
    $home_link        = home_url('/');
    $home_text        = __( 'Home' );
    $link_before      = '<li class="nav__item">';
    $link_after       = '</li>';
    $link_attr        = ' class="nav__link"';
    $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $delimiter        = '';              // Delimiter between crumbs
    $before           = '<li class="nav__item">'; // Tag before the current crumb
    $after            = '</li>';                // Tag after the current crumb
    $page_addon       = '';                       // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links   = '';

    /**
     * Set our own $wp_the_query variable. Do not use the global variable version due to
     * reliability
     */
    $wp_the_query   = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if ( is_singular() )
    {
        /**
         * Set our own $post variable. Do not use the global variable version due to
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post( $queried_object );

        // Set variables
        $title          = apply_filters( 'the_title', $post_object->post_title );
        $parent         = $post_object->post_parent;
        $post_type      = $post_object->post_type;
        $post_id        = $post_object->ID;
        $post_link      = $before . $title . $after;
        $parent_string  = '';
        $post_type_link = '';

        if ( 'post' === $post_type )
        {
            // Get the post categories
            $categories = get_the_category( $post_id );
            if ( $categories ) {
                // Lets grab the first category
                $category  = $categories[0];

                $category_links = get_category_parents( $category, true, $delimiter );
                $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
                $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
            }
        }

        if ( !in_array( $post_type, ['post', 'page', 'attachment'] ) )
        {
            $post_type_object = get_post_type_object( $post_type );
            $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

            $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
        }

        // Get post parents if $parent !== 0
        if ( 0 !== $parent )
        {
            $parent_links = [];
            while ( $parent ) {
                $post_parent = get_post( $parent );

                $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse( $parent_links );

            $parent_string = implode( $delimiter, $parent_links );
        }

        // Lets build the breadcrumb trail
        if ( $parent_string ) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }

        if ( $post_type_link )
            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

        if ( $category_links )
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if( is_archive() )
    {
        if (    is_category()
             || is_tag()
             || is_tax()
        ) {
            // Set the variables for this section
            $term_object        = get_term( $queried_object );
            $taxonomy           = $term_object->taxonomy;
            $term_id            = $term_object->term_id;
            $term_name          = $term_object->name;
            $term_parent        = $term_object->parent;
            $taxonomy_object    = get_taxonomy( $taxonomy );
            $current_term_link  = $before . $taxonomy_object->labels->singular_name . ' : is archive : ' . $term_name . $after;
            $parent_term_string = '';

            if ( 0 !== $term_parent )
            {
                // Get all the current term ancestors
                $parent_term_links = [];
                while ( $term_parent ) {
                    $term = get_term( $term_parent, $taxonomy );

                    $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

                    $term_parent = $term->parent;
                }

                $parent_term_links  = array_reverse( $parent_term_links );
                $parent_term_string = implode( $delimiter, $parent_term_links );
            }

            if ( $parent_term_string ) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif ( is_author() ) {

            $breadcrumb_trail = __( 'Author archive for ') .  $before . $queried_object->data->display_name . $after;

        } elseif ( is_date() ) {
            // Set default variables
            $year     = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day      = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ( $monthnum ) {
                $date_time  = DateTime::createFromFormat( '!m', $monthnum );
                $month_name = $date_time->format( 'F' );
            }

            if ( is_year() ) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif( is_month() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif( is_day() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
                $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif ( is_post_type_archive() ) {

            $post_type        = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object( $post_type );

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

        }
    }

    // Handle the search page
    if ( is_search() ) {
        $breadcrumb_trail = __( 'Search query for: ' ) . $before . get_search_query() . $after;
    }

    // Handle 404's
    if ( is_404() ) {
        $breadcrumb_trail = $before . __( 'Error 404' ) . $after;
    }

    // Handle paged pages
    if ( is_paged() ) {
        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        $page_addon   = $before . sprintf( __( ' ( Page %s )' ), number_format_i18n( $current_page ) ) . $after;
    }

    $breadcrumb_output_link  = '';
    $breadcrumb_output_link .= '<ul class="nav__items">';
    if (    is_home()
         || is_front_page()
    ) {
        // Do not show breadcrumbs on page one of home and frontpage
        if ( is_paged() ) {
          //  $breadcrumb_output_link .= $here_text . $delimiter;
            $breadcrumb_output_link .= '<li class="nav__item"><a class="nav__link" href="' . $home_link . '">' . $home_text . '</a></li>';
            $breadcrumb_output_link .= $page_addon;
        }
    } else {
     //   $breadcrumb_output_link .= $here_text . $delimiter;
        $breadcrumb_output_link .= '<li class="nav__item"><a class="nav__link" href="' . $home_link . '">' . $home_text . '</a></li>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }
    $breadcrumb_output_link .= '</ul><!-- .breadcrumbs -->';

    return $breadcrumb_output_link;
}
add_action('init', 'customRSS');
function customRSS(){
        add_feed('facebook', 'customRSSFunc');
        add_feed('podcast', 'customRSSFunc');
}
function customRSSFunc(){
        get_template_part('rss', 'facebook');
}
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
?>