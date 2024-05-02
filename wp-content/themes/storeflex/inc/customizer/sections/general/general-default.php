<?php
/**
 * Add background image and it's fields inside general section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_general_default' );

if ( ! function_exists( 'storeflex_register_general_default' ) ) :

    /**
     * Register Background Image .
     */
    function storeflex_register_general_default ( $wp_customize ) {

         /**
         * Preloader Section
         *
         * General > Background Image
         * 
         * @since 1.0.0
         */
    
    	$wp_customize->get_section( 'background_image' )->panel = 'storeflex_general_panel';
        $wp_customize->get_section( 'background_image' )->priority = 40;

    }

endif;