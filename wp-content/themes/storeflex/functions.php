<?php
/**
 * StoreFlex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package StoreFlex
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'STOREFLEX_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$storeflex_theme_info = wp_get_theme();
	define( 'STOREFLEX_VERSION', $storeflex_theme_info->get( 'Version' ) );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function storeflex_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Store Flex, use a find and replace
		* to change 'storeflex' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'storeflex', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary Menu', 'storeflex' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'storeflex_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'storeflex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function storeflex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'storeflex_content_width', 640 );
}
add_action( 'after_setup_theme', 'storeflex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function storeflex_widgets_init() {
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Right sidebar', 'storeflex' ),
			'id'            => 'sidebar-right',
			'description'   => esc_html__( 'Add widgets here.', 'storeflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Left sidebar', 'storeflex' ),
			'id'            => 'sidebar-left',
			'description'   => esc_html__( 'Add widgets here.', 'storeflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Page sidebar', 'storeflex' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'storeflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column one Widget Area', 'storeflex' ),
			'id'            => 'footer-widget-column-one',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column two Widget Area', 'storeflex' ),
			'id'            => 'footer-widget-column-two',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column three Widget Area', 'storeflex' ),
			'id'            => 'footer-widget-column-three',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer column four Widget Area', 'storeflex' ),
			'id'            => 'footer-widget-column-four',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Bottom Widget', 'storeflex' ),
			'id'            => 'footer-bottom-widget',
			'description'   => esc_html__( 'Add widgets here.', 'storeflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		),
	);

}
add_action( 'widgets_init', 'storeflex_widgets_init' );

/**
 * Set the default typography font list.
 */
function storeflex_default_google_fonts() {

	global $wp_filesystem;

	require_once ( ABSPATH . '/wp-admin/includes/file.php' );
	WP_Filesystem();

	$storeflex_google_fonts_file = apply_filters( 'storeflex_google_fonts_json_file', get_template_directory() . '/inc/customizer/custom-controls/typography/mt-google-fonts.json' );

    if ( ! $storeflex_google_fonts_file ) {
        $google_fonts = array();
        return $google_fonts;
    }

    $get_file_content   = $wp_filesystem->get_contents( $storeflex_google_fonts_file );
    $get_google_fonts   = json_decode( $get_file_content, 1 );

    foreach ( $get_google_fonts as $key => $font ) {
        $name = key( $font );
        foreach ( $font[ $name ] as $font_key => $single_font ) {

            if ( 'variants' === $font_key ) {

                foreach ( $single_font as $variant_key => $variant ) {

                    if ( 'regular' == $variant ) {
                        $font[ $name ][ $font_key ][ $variant_key ] = '400';
                    }

                }
            }

            $google_fonts[ $name ] = array_values( $font[ $name ] );
        }
    }

    if ( empty( $storeflex_google_font ) || $google_fonts != $storeflex_google_font ) {
        update_option( 'storeflex_google_font', $google_fonts );
    }

}
add_action( 'after_setup_theme', 'storeflex_default_google_fonts' );

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
 * Customizer stater.
 */
require get_template_directory() . '/inc/customizer/customizer-stater.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load WooCommerce compatibility file.
 */
require get_template_directory() . '/inc/woocommerce/woocommerce-functions.php';

/**
 * Load theme's dynamic styles
 */
require get_template_directory() . '/inc/dynamic-styles.php';

/**
 * Load theme's preloader styles
 */
require get_template_directory() . '/inc/mt-preloader.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	
	require get_template_directory() . '/inc/woocommerce/woocommerce.php';
}

/**
 * Load themes custom hooks.
 */
require get_template_directory() . '/inc/custom-hooks.php';

/**
 * Load StoreFlex Dashboard
 */
require get_template_directory() . '/inc/admin/class-storeflex-admin.php';
require get_template_directory() . '/inc/admin/class-storeflex-notice.php';
require get_template_directory() . '/inc/admin/class-storeflex-dashboard.php';
