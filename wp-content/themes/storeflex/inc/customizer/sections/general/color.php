<?php
/**
 * Add Colors section and it's fields inside General section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_colors_fields' );

if ( ! function_exists( 'storeflex_register_colors_fields' ) ) :

    /**
     * Register colors section's fields.
     */
    function storeflex_register_colors_fields ( $wp_customize ) {

         /**
         * Colors choices for site
         *
         * General Settings > Colors
         *
         * @since 1.0.0
         **/

         $wp_customize->add_section( 'storeflex_section_theme_color',
            array(
                'priority' => 15,
                'panel'     => 'storeflex_general_panel',
                'title'     => __( 'Colors', 'storeflex' )
            )
        );

        $wp_customize->get_control( 'header_textcolor' )->section     = 'storeflex_section_theme_color';
        $wp_customize->get_control( 'header_textcolor' )->priority    = 1;


        $wp_customize->add_setting( 'storeflex_primary_theme_color',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_primary_theme_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'   => 'postMessage'
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'storeflex_primary_theme_color',
                array(
                    'priority'   => 5,
                    'label'      => __( 'Primary Color', 'storeflex' ),
                    'section'    => 'storeflex_section_theme_color',
                    'settings'   => 'storeflex_primary_theme_color',
                    
                )
            )
        );

        $wp_customize->add_setting( 'storeflex_text_color',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_text_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'   => 'postMessage'

            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'storeflex_text_color',
                array(
                    'priority'   => 10,
                    'label'      => __( 'Text Color', 'storeflex' ),
                    'section'    => 'storeflex_section_theme_color',
                    'settings'   => 'storeflex_text_color',
                    
                )
            )
        );


        $wp_customize->add_setting( 'storeflex_link_color',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_link_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
                'transport'         => 'postMessage'

            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'storeflex_link_color',
                array(
                     'priority'  => 15,
                    'label'      => __( 'Link Color', 'storeflex' ),
                    'section'    => 'storeflex_section_theme_color',
                    'settings'   => 'storeflex_link_color',
                )
            )
        );

         $wp_customize->add_setting( 'storeflex_link_hover_color',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_link_hover_color' ),
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'storeflex_link_hover_color',
                array(
                    'priority'   => 20,
                    'label'      => __( 'Link Hover Color', 'storeflex' ),
                    'section'    => 'storeflex_section_theme_color',
                    'settings'   => 'storeflex_link_hover_color',
                    
                )
            )
        );

        $wp_customize->get_control( 'background_color' )->section    = 'storeflex_section_theme_color';
        $wp_customize->get_control( 'background_color' )->priority    = 25;

    }

endif;