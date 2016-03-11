<?php

require_once 'lib/titan-framework.php';
require_once 'inc/admin/theme-panel.php';
require_once 'inc/admin/meta.php';
include_once 'inc/common/post_type.php';
require_once 'inc/common/variables.php';
require_once 'inc/public/kreo_mail.php';
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'kreo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own kreo_setup() function to override in a child theme.
 *
 * @since kreo 1.0
 */
function kreo_setup() {

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kreo' )
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
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
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
endif; // kreo_setup
add_action( 'after_setup_theme', 'kreo_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since kreo 1.0
 */
function kreo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kreo_content_width', 840 );
}
add_action( 'after_setup_theme', 'kreo_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since kreo 1.0
 */
function kreo_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kreo' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'kreo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kreo_widgets_init' );

if ( ! function_exists( 'kreo_fonts_url' ) ) :
/**
 * Register Google fonts for kreo.
 *
 * Create your own kreo_fonts_url() function to override in a child theme.
 *
 * @since kreo 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function kreo_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'kreo' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'kreo' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'kreo' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since kreo 1.0
 */
function kreo_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'kreo_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since kreo 1.0
 */
function kreo_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'kreo-fonts', kreo_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'kreo-style', get_stylesheet_uri() );
    wp_enqueue_style( 'kreo-base-style', get_template_directory_uri().'/css/base.css' );
    wp_enqueue_style( 'kreo-vendor-style', get_template_directory_uri().'/css/vendor.min.css' );
    wp_enqueue_style( 'kreo-main-style', get_template_directory_uri().'/css/main.css' );

    wp_enqueue_script( 'kreo-modernizer-js', get_template_directory_uri().'/js/modernizr.js' );
    wp_enqueue_script( 'kreo-migrate-js', get_template_directory_uri().'/js/jquery-migrate-1.2.1.min.js', array( 'jquery'),false, true );
    wp_enqueue_script( 'kreo-waypoints-js', get_template_directory_uri().'/js/jquery.waypoints.min.js', array( 'jquery'),false, true  );
    wp_enqueue_script( 'kreo-validate-js', get_template_directory_uri().'/js/jquery.validate.min.js', array( 'jquery'),false, true  );
    wp_enqueue_script( 'kreo-fittext-js', get_template_directory_uri().'/js/jquery.fittext.js', array( 'jquery'),false, true  );
    wp_enqueue_script( 'kreo-flex-js', get_template_directory_uri().'/js/jquery.flexslider-min.js', array( 'jquery') );
    wp_enqueue_script( 'kreo-placeholder-js', get_template_directory_uri().'/js/jquery.placeholder.min.js', array( 'jquery'),false, true  );
    wp_enqueue_script( 'kreo-magnific-js', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array( 'jquery'),false, true  );
    wp_enqueue_script( 'kreo-main-js', get_template_directory_uri().'/js/main.js', array( 'jquery', 'kreo-waypoints-js', 'kreo-magnific-js', 'kreo-fittext-js', 'kreo-placeholder-js', 'kreo-validate-js' ) );
    wp_enqueue_script( 'kreo-custom-js', get_template_directory_uri().'/js/custom.js', array( 'jquery') );
    wp_localize_script( 'kreo-custom-js', 'js_data', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nav_links' => json_encode( get_transient( 'kreo_nav_option' ) ),
        'home_url' => home_url('/'),
        'is_home_url' => is_home()?true:false
    ) );
    wp_localize_script( 'kreo-main-js', 'js_data_2', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ) );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kreo_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since kreo 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function kreo_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'kreo_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since kreo 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function kreo_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since kreo 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function kreo_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'kreo_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since kreo 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function kreo_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'kreo_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since kreo 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function kreo_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'kreo_widget_tag_cloud_args' );
