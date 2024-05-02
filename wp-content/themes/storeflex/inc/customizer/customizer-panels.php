<?php
/**
 * Theme Panels.
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Panels for theme
 *
 * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
 * @since 1.0.0
 */

if ( ! function_exists( 'storeflex_customize_register_panels' ) ) :

    function storeflex_customize_register_panels( $wp_customize ) {
    
        /**
         * Register General Settings
         *
         * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
         * 
         * @since 1.0.0
         */
        $wp_customize->add_panel( 'storeflex_general_panel',
            array(
                'priority'  => 10,
                'title'     => __( 'General Settings', 'storeflex' )
            )
        );

        /**
         * Register Header Settings
         *
         * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
         * 
         * @since 1.0.0
         */
        $wp_customize->add_panel( 'storeflex_header_panel',
            array(
                'priority'  => 20,
                'title'     => __( 'Header Settings', 'storeflex' )
            )
        );

        /**
         * Register Header Settings
         *
         * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
         * 
         * @since 1.0.0
         */
        $wp_customize->add_panel( 'storeflex_front_page_panel',
            array(
                'priority'  => 30,
                'title'     => __( 'Front Page Settings', 'storeflex' )
            )
        );

        /**
         * Register Inner Page Settings
         *
         * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
         * 
         * @since 1.0.0
         */
        $wp_customize->add_panel( 'storeflex_inner_page_panel',
            array(
                'priority'  => 40,
                'title'     => __( 'Inner Page Settings', 'storeflex' )
            )
        );

        /**
         * Register Footer Settings
         *
         * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
         * 
         * @since 1.0.0
         */
        $wp_customize->add_panel( 'storeflex_footer_panel',
            array(
                'priority'  => 50,
                'title'     => __( 'Footer Settings', 'storeflex' )
            )
        );
    }

endif;

add_action( 'customize_register', 'storeflex_customize_register_panels' );