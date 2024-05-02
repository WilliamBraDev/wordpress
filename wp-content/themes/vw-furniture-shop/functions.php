<?php
/**
 * VW Furniture Shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package VW Furniture Shop
 */

if ( ! defined( 'VW_FURNITURE_SHOP_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'VW_FURNITURE_SHOP_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! function_exists( 'vw_furniture_shop_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vw_furniture_shop_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'woocommerce' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Enqueue editor styles.
		// add_editor_style( 'style.css' );

		// Experimental support for adding blocks inside nav menus
		add_theme_support( 'block-nav-menus' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Register nav menus.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Navigation', 'vw-furniture-shop' ),
			)
		);

		// Theme Activation Notice
		global $pagenow;

		if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
			add_action('admin_notices', 'vw_furniture_shop_activation_notice');
		}
	}
endif;
add_action( 'after_setup_theme', 'vw_furniture_shop_setup' );

// Notice after Theme Activation
function vw_furniture_shop_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing VW Furniture Shop. Would like to have you on our Welcome page so that you can reap all the benefits of our VW Furniture Shop.', 'vw-furniture-shop' ) .'</p>';
	echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=vw-furniture-shop-info' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-furniture-shop' ) .'</a></span>';
	echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-furniture-shop/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-furniture-shop' ) .'</a></span>';
	echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/themes/furniture-wordpress-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'vw-furniture-shop' ) .'</a></span>';
	echo '</div>';
}

/**
 * Theme Fonts.
 *
 * @return array
 */
function vw_furniture_shop_theme_font_families() {
    return array_filter( array( 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900', 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900', 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900', 'Outfit:wght@100;200;300;400;500;600;700;800;900', 'Inter:wght@100;200;300;400;500;600;700;800;900', 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900', 'Oswald:wght@200;300;400;500;600;700',
    'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
    'Spartan:wght@100;200;300;400;500;600;700;800;900' ) );
}

if ( ! function_exists( 'vw_furniture_shop_fonts_url' ) ) :
    /**
     * Register Google fonts for VW Furniture Shop
     *
     * Create your own vw_furniture_shop_fonts_url() function to override in a child theme.
     *
     * @since 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function vw_furniture_shop_fonts_url() {
        $fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by Poppins, translate this to 'off'. Do not translate
        * into your own language.
        */
        $font_families = vw_furniture_shop_theme_font_families();

        if ( ! empty( $font_families ) ) {

            $query_args = array(
                'family' => implode( '&family=', $font_families ), //urlencode( implode( '|', $font_families ) ),
                // 'subset' => urlencode( 'latin,latin-ext' ),
                'display' => 'swap',
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
        }

        if ( ! class_exists( 'WPTT_WebFont_Loader' ) ) {
            // Load Google fonts from Local.
            require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
        }

        return esc_url( wptt_get_webfont_url( $fonts_url ) );
    }
endif;

/**
 * Enqueue scripts and styles.
 */
function vw_furniture_shop_scripts() {
	wp_enqueue_style('vw-furniture-shop-font', vw_furniture_shop_fonts_url(), array());
	wp_enqueue_style('vw-furniture-shop-style', get_stylesheet_uri(), array() );
	wp_enqueue_script( 'vw-furniture-shop-jquery-wow', esc_url(get_template_directory_uri()) . '/js/wow.js', array('jquery') );
	wp_enqueue_style( 'vw-furniture-shop-animate-css', esc_url(get_template_directory_uri()).'/css/animate.css' );
	$font_families = vw_furniture_shop_theme_font_families();
    if ( ! empty( $font_families ) ) {
        wp_enqueue_style( 'vw-furniture-shop-fonts', vw_furniture_shop_fonts_url(), array(), null );
    }
}
add_action( 'wp_enqueue_scripts', 'vw_furniture_shop_scripts' );

/**
 * Enqueue block editor style
 */
function vw_furniture_shop_block_editor_styles() {
	wp_enqueue_style( 'vw-furniture-shop-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
	wp_enqueue_style('vw-furniture-shop-font', vw_furniture_shop_fonts_url(), array());
}
add_action( 'enqueue_block_editor_assets', 'vw_furniture_shop_block_editor_styles' );

define('VW_FURNITURE_SHOP_BUY_NOW',__('https://www.vwthemes.com/themes/furniture-wordpress-theme/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_SUPPORT',__('https://wordpress.org/support/theme/vw-furniture-shop/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_REVIEW',__('https://wordpress.org/support/theme/vw-furniture-shop/reviews/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_LIVE_DEMO',__('https://www.vwthemes.net/vw-furniture-shop/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/vw-furniture-shop-pro/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_FREE_DOC',__('https://preview.vwthemesdemo.com/docs/vw-furniture-shop/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_FAQ',__('https://www.vwthemes.com/faqs/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-furniture-shop'));
define('VW_FURNITURE_SHOP_CONTACT',__('https://www.vwthemes.com/contact/','vw-furniture-shop'));


// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Section Pro
 */
require get_template_directory() . '/inc/section-pro/customizer.php';

/**
 * TGM
 */
require_once get_template_directory() . '/inc/tgm/tgm.php';

/**
 * Load core file.
 */
require_once get_template_directory() . '/inc/core/theme-info.php';
require_once get_template_directory() . '/inc/core/template-functions.php';