<?php
/**
 * Add bottom footer section and it's fields inside footer section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_footer_bottom_area' );

if ( ! function_exists( 'storeflex_register_footer_bottom_area' ) ) :

    /**
     * Register bottom area section's fields.
     */
    function storeflex_register_footer_bottom_area ( $wp_customize ) {

         /**
         * Widget Area Setting
         *
         * Footer Settings > Bottom Footer
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( 'storeflex_bottom_footer_area',
            array(
                'priority' => 20,
                'panel'     => 'storeflex_footer_panel',
                'title'     => __( 'Bottom Footer', 'storeflex' )
            )
        );

        /**
         * Toogle to enable or disable to display social icons in footer
         *
         * @since 1.0.0
         */

         $wp_customize->add_setting( 'storeflex_enable_social_icon_in_footer',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_enable_social_icon_in_footer' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_social_icon_in_footer',
                array(
                    'priority'      => 5,
                    'section'       => 'storeflex_bottom_footer_area',
                    'settings'      => 'storeflex_enable_social_icon_in_footer',
                    'label'         => __( 'Enable Social Icons In Footer', 'storeflex' ),
                )
            )
        );


        $wp_customize->add_setting( 'storeflex_bottom_footer_field',
            array(
                'default'   => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control( 'storeflex_bottom_footer_field',
            array(
                'priority'  => 10,
                'section'   => 'storeflex_bottom_footer_area',
                'setting'   => 'storeflex_bottom_footer_field',
                'label'     => __( 'Footer Area', 'storeflex' ),
                'type'      => 'textarea',
                'input_attrs' => array(
                    'placeholder'   => __( 'Copyright © StoreFlex {year}', 'storeflex' )
                ),
            )
        );

    }

endif;