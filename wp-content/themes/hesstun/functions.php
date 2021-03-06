<?php
/**
 * Hesstun functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hesstun
 */

if ( ! function_exists( 'hesstun_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hesstun_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Hesstun, use a find and replace
		 * to change 'hesstun' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'hesstun', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Header', 'hesstun' ),
			'menu-2' => esc_html__( 'Footer', 'hesstun' ),
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
		add_theme_support( 'custom-background', apply_filters( 'hesstun_custom_background_args', 
            array(
			     'default-color' => 'ffffff',
			     'default-image' => '',
                 'home-image' => '',
		) ) );

        
        
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-width'  => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'hesstun_setup' );

/**
 * Register custom fonts.     'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,500,700'
 */
function hesstun_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Open Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'hesstun' );

	if ( 'off' !== $open_sans ) {
		$font_families = array();

		$font_families[] = 'Open Sans:300,300i,400,400i, 700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function hesstun_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'hesstun-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'hesstun_resource_hints', 10, 2 );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hesstun_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'hesstun_content_width', 640 );
}

add_action( 'after_setup_theme', 'hesstun_content_width', 0 );

/**
 * Remove Paragraph Tags From Around Images
 *
 * Snippet from https://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
 *
 * Written by Justin W Hall
 */

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Enqueue scripts and styles.
 */
function hesstun_scripts() {
	// Enqueue Google Font: Open Sans
	wp_enqueue_style('hesstun', hesstun_fonts_url());

	wp_enqueue_style( 'hesstun-style', get_stylesheet_uri() );

    // Enqueues my javascripts
    
	wp_enqueue_script( 'hesstun-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20181122', true );

	wp_enqueue_script( 'hesstun-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20181123', true );     
    
    // Connecting the navigation with the Screen reader text
	wp_localize_script( 'hesstun-navigation', 'hesstunScreenReaderText', array(
		'expand' => __( 'Expand child menu', 'hesstun'),
		'collapse' => __( 'Collapse child menu', 'hesstun'),
	));
    
	wp_enqueue_script( 'hesstun-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hesstun_scripts' );

/**
 * Trying out adding inline svg using a code snippet from Blue Coda
 * https://www.bluecoda.com/blog/how-use-inline-svgs-wordpress
 */

function inline_svg($name){
    $file = get_template_directory();
    $file .= "/images/" . $name .".svg";
    include($file);
}

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
