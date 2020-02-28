<?php
/**
 * crezu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crezu
 */

if ( ! function_exists( 'crezu_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function crezu_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on crezu, use a find and replace
		 * to change 'crezu' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'crezu', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'crezu' ),
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
		add_theme_support( 'custom-background', apply_filters( 'crezu_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'crezu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crezu_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'crezu_content_width', 640 );
}
add_action( 'after_setup_theme', 'crezu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function crezu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'crezu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'crezu' ),
		'before_widget' => '<section id="%1$s" class="sidebar__section %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="sidebar__title">',
		'after_title'   => '</h2><div class="sidebar__content">',
	) );
}

/**
 * Enqueue scripts and styles.
 */
function crezu_scripts() {
  wp_enqueue_style( 'crezu-style', get_stylesheet_uri() );

  wp_enqueue_script( 'crezu-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'crezu-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'crezu_scripts' );

/**
 * Custom classes for tags cloud
 */
add_action( 'widgets_init', 'crezu_widgets_init' );

add_filter('wp_generate_tag_cloud', 'my_tag_cloud', 10, 1);
function my_tag_cloud($string){
  $string = preg_replace('/class="([^"]+)"/', 'class="tags__link"', $string);
  return preg_replace('/style="font-size: .+pt;"/', '', $string);
}

/**
 * Custom image sizes
 */
add_image_size( '400px-width', 400 );
add_image_size( 'content', 1200 );

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
  return array_merge( $sizes, array(
      '400px-width' => __( '400px width' ),
      'content' => __( 'Content width' ),
  ) );
}

/**
 *  Custom classes for menu item and link
 */
function wpdocs_channel_nav_class( $classes, $item, $args ) {

  if ( 'menu-1' === $args->theme_location ) {
    $classes[] = "header-menu__item";

    if( in_array('current-menu-item', $classes) ){
      $classes[] = 'header-menu__item_active';
    }
  }

  return $classes;
}
add_filter( 'nav_menu_css_class' , 'wpdocs_channel_nav_class' , 10, 4 );

function add_specific_menu_location_atts( $atts, $item, $args ) {

  if( $args->theme_location == 'menu-1' ) {
    $atts['class'] = 'header-menu__link';
  }

  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );

/**
 *  Enqueue "load more" scripts and styles
 */
function load_more_scripts() {

  global $wp_query;

  wp_register_script( 'loadmore', get_stylesheet_directory_uri() . '/assets/js/loadmore.js', array('jquery') );

  wp_localize_script( 'loadmore', 'loadmore_params', array(
      'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
      'posts' => json_encode( $wp_query->query_vars ), // loop
      'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
      'max_page' => $wp_query->max_num_pages
  ) );

  wp_enqueue_script( 'loadmore' );
}

add_action( 'wp_enqueue_scripts', 'load_more_scripts' );

/**
 *  Ajax handler for "load more"
 */
function loadmore_ajax_handler(){
  // prepare our arguments for the query
  $args = json_decode( stripslashes( $_POST['query'] ), true );
  $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
  $args['post_status'] = 'publish';

  query_posts( $args );

  if( have_posts() ) :

    // run the loop
    while( have_posts() ): the_post();

      get_template_part( 'template-parts/content', 'excerpt' );

    endwhile;

  endif;
  die;
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

