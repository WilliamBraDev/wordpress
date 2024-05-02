<?php
/**
 * StoreFlex Theme Customizer
 *
 * @package StoreFlex
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function storeflex_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'storeflex_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'storeflex_customize_partial_blogdescription',
			)
		);
	}

	require get_template_directory(). '/inc/customizer/custom-controls/mt-custom-controls.php';

	/**
     * Register theme upsell sections.
     *
     * @since 1.0.1
     */
    $wp_customize->add_section( new StoreFlex_Section_Upsell(
        $wp_customize, 'storeflex_theme_upsell',
            array(
            	'priority' 	=> 1,
                'title'    	=> esc_html__( 'StoreFlex Pro', 'storeflex' ),
                'pro_text' 	=> esc_html__( 'Buy Now', 'storeflex' ),
                'pro_url'  	=> 'https://mysterythemes.com/pricing/?product_id=15073',          
            )
        )
    );

	/**
     * Checkbox for show home content
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 'storeflex_homepage_content_status',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => storeflex_get_customizer_default( 'storeflex_homepage_content_status' ),
            'sanitize_callback' => 'storeflex_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( new StoreFlex_Control_Toggle(
        $wp_customize, 'storeflex_homepage_content_status',
            array(
                'label'         => __( 'Enable HomePage Content', 'storeflex' ),
                'description'   => __( 'Enable/disable latest posts content in Home page.', 'storeflex' ),
                'section'       => 'static_front_page',
                'settings'      => 'storeflex_homepage_content_status',
                'priority'      => 15
            )
        )
    );
}
add_action( 'customize_register', 'storeflex_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function storeflex_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function storeflex_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function storeflex_customize_preview_js() {

	wp_enqueue_script( 'storeflex-google-webfont', get_template_directory_uri() . '/inc/customizer/custom-controls/typography/webfontloader.js', array( 'jquery' ) );

	wp_enqueue_script( 'storeflex-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), STOREFLEX_VERSION, true );
}

add_action( 'customize_preview_init', 'storeflex_customize_preview_js' );

function storeflex_customize_backend_scripts(){

	wp_enqueue_style( 'select2', get_template_directory_uri() . '/assets/library/select2/css/select2.css', null );

	wp_enqueue_style( 'box-icons', get_template_directory_uri() . '/assets/library/box-icons/css/boxicons.css', array(), STOREFLEX_VERSION );

	wp_enqueue_style( 'storeflex-custom-control-styles', get_template_directory_uri() . '/inc/customizer/assets/css/custom-control-styles.css', array(), STOREFLEX_VERSION );

	wp_enqueue_style( 'storeflex-extend-customizer', get_template_directory_uri() . '/inc/customizer/assets/css/extend-customizer.css', array(), STOREFLEX_VERSION );

	wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/library/select2/js/select2.js', array( 'jquery' ), '4.0.13', true );

	wp_enqueue_script( 'storeflex-extend-customizer', get_template_directory_uri(). '/inc/customizer/assets/js/extend-customizer.js', array('jquery'), STOREFLEX_VERSION, true );

	wp_enqueue_script( 'storeflex-extend-control-scripts', get_template_directory_uri(). '/inc/customizer/assets/js/extend-control-scripts.js', array('jquery'), STOREFLEX_VERSION, true );

	wp_enqueue_script( 'storeflex-custom-control-scripts', get_template_directory_uri() . '/inc/customizer/assets/js/custom-control-scripts.js', array( 'jquery', 'customize-controls', 'customize-base', 'select2' ), STOREFLEX_VERSION, true );

	 wp_enqueue_script( 'storeflex-backend-scripts', get_template_directory_uri() . '/assets/js/custom-backend-scripts.js', array( 'jquery' ), STOREFLEX_VERSION, true );

}
add_action( 'customize_controls_enqueue_scripts', 'storeflex_customize_backend_scripts', 10 );


require get_template_directory(). '/inc/customizer/customizer-panels.php';

require get_template_directory() . '/inc/customizer/customizer-helper.php';
require get_template_directory() . '/inc/customizer/mt-active-callback.php';
require get_template_directory() . '/inc/customizer/mt-customizer-sanitize.php';

require get_template_directory(). '/inc/customizer/extend-customizer/class-customize-section.php';
require get_template_directory(). '/inc/customizer/extend-customizer/class-customize-panel.php';

/**
 * Load Customizer files.
 */
 $storeflex_sub_sections = array(
	'general'		=> array( 'site-layout', 'preloader', 'color', 'sidebar', 'social-icons', 'typography', 'scroll-top', 'posts', 'general-default' ),
	'header'		=> array( 'site-identity' , 'top-area', 'main-area' ),
	'frontpage'		=> array( 'banner', 'fullwidth' ),
	'innerpage'		=> array( 'innerpage-section', 'archive', 'single-post', 'error', 'shop' ),
	'footer'		=> array( 'testimonial', 'footer-info', 'main-area'  , 'bottom-area' )
);

foreach ( $storeflex_sub_sections as $key => $value ) {
	foreach ( $value as $k => $v ) {
		require get_template_directory() . '/inc/customizer/sections/'. $key . '/' . $v .'.php';
	}
}
