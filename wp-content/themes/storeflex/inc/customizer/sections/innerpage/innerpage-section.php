<?php
/**
 * Extends the sections of inner page
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_extended_innerpage_section' );

if ( ! function_exists( 'storeflex_register_extended_innerpage_section' ) ) :

    /**
     * Register extended innerpage section.
     */
    function storeflex_register_extended_innerpage_section ( $wp_customize ) {

         /**
         * Innerpage Choices
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_post',
                array(
                    'priority'  => 10,
                    'panel'     => 'storeflex_inner_page_panel',
                    'title'     => __( 'Post Settings', 'storeflex' ),
                )
            )
        );

        $wp_customize->add_section( new StoreFlex_Customize_Section(
            $wp_customize, 'storeflex_section_woocommerce',
                array(
                    'priority'      => 20,
                    'panel'         => 'storeflex_inner_page_panel',
                    'title'         => __( 'WooCommerce Settings', 'storeflex' )
                )
            )
        );
    }

endif;