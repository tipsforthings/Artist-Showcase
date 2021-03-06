<?php
/**
 * artist_showcase functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package artist_showcase
 */

if ( ! function_exists( 'artist_showcase_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function artist_showcase_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on artist_showcase, use a find and replace
	 * to change 'artist_showcase' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'artist_showcase', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'artist_showcase' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'artist_showcase_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // artist_showcase_setup
add_action( 'after_setup_theme', 'artist_showcase_setup' );
if(!class_exists('Showreel'))
{
    class Showreel
    {

    }
}
if(class_exists('Showreel'))
{
    $showreel = new Showreel();
}
if (isset($showreel)) {
  require get_template_directory() . '/inc/showreel-init.php';
  require get_template_directory() . '/inc/showreel-columns.php';

}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function artist_showcase_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'artist_showcase_content_width', 640 );
}
add_action( 'after_setup_theme', 'artist_showcase_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function artist_showcase_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'artist_showcase' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'artist_showcase_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function artist_showcase_scripts() {
	wp_enqueue_style( 'artist_showcase-style', get_stylesheet_uri() );

	wp_register_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '20120206', true );
	wp_register_script( 'waypoints-init', get_template_directory_uri() . '/js/waypoints.init.js', array(), '20120206', true );
	wp_register_script( 'sticky', get_template_directory_uri() . '/js/sticky.js', array(), '20120206', true );
	wp_enqueue_script( 'lounge-libs', get_template_directory_uri() . '/js/libs/libs.min.js', array(), '20120206', true );
	wp_enqueue_script( 'lounge-foundation', get_template_directory_uri() . '/js/libs/foundation.min.js', array(), '20120206', true );
	wp_enqueue_script( 'lounge-app', get_template_directory_uri() . '/js/app.min.js', array(), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( get_theme_mod('sticky_nav') == 'true' ) {
	  wp_enqueue_script( 'waypoints');
	  wp_enqueue_script( 'sticky');
	  wp_enqueue_script( 'waypoints-init');
	}
}
add_action( 'wp_enqueue_scripts', 'artist_showcase_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Top Bar Walker
 *
 * @since 1.0.0
 */
class Top_Bar_Walker extends Walker_Nav_Menu {
  /**
    * @see Walker_Nav_Menu::start_lvl()
   * @since 1.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

    /**
     * @see Walker_Nav_Menu::start_el()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args );  

        $output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';

        $classes = empty( $object->classes ) ? array() : ( array ) $object->classes;  

        if ( in_array('label', $classes) ) {
            $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '<label>$1</label>', $item_html );
        }

    if ( in_array('divider', $classes) ) {
      $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }

        $output .= $item_html;
    }

  /**
     * @see Walker::display_element()
     * @since 1.0.0
   * 
   * @param object $element Data object
   * @param array $children_elements List of elements to continue traversing.
   * @param int $max_depth Max depth to traverse.
   * @param int $depth Depth of current element.
   * @param array $args
   * @param string $output Passed by reference. Used to append additional content.
   * @return null Null on failure with no changes to parameters.
   */
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}
show_admin_bar( false );
