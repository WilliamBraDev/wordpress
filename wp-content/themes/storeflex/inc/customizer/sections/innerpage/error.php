<?php
/**
 *  Add 404 settings and it's fields inside post section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_error_page_section' );

if ( ! function_exists( 'storeflex_register_error_page_section' ) ) :

    /**
     * Register archive section.
     */
    function storeflex_register_error_page_section ( $wp_customize ) {

         /**
         * Archive Posts section
         *
         * Inner Page Settings > Post Settings > 404 Page Settings
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_error_page',
                array(
                    'priority'  => 10,
                    'panel'     => 'storeflex_inner_page_panel',
                    'section'   => 'storeflex_section_post',
                    'title'     => __( '404 Page Settings', 'storeflex' ),
                )
            )
        );

        /**
          * Toggle Field to enable or disable search box.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_error_search_bar',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_error_search_bar' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_error_search_bar',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_error_page',
                    'settings'      => 'storeflex_enable_error_search_bar',
                    'label'         => __( 'Enable Search Box', 'storeflex' ),
                )
            )
        );

        /**
          * Toggle Field to enable or disable homepage button.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_homepage_button',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_homepage_button' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_homepage_button',
                array(
                    'priority'      => 20,
                    'section'       => 'storeflex_section_error_page',
                    'settings'      => 'storeflex_enable_homepage_button',
                    'label'         => __( 'Enable Homepage button', 'storeflex' ),
                )
            )
        );

         /**
         * Upgrade field for error page
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_error_page',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_error_page',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_error_page',
                    'settings'      => 'storeflex_upgrade_error_page',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_error_page' )
                )
            )
        );
    }

endif;