<?php
/**
 * Add main footer section and it's fields inside footer section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_footer_main_area' );

if ( ! function_exists( 'storeflex_register_footer_main_area' ) ) :

    /**
     * Register main area section's fields.
     */
    function storeflex_register_footer_main_area ( $wp_customize ) {

        /**
         * Footer Section
         *
         * Footer Settings > Widget Area
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_footer_main_area',
            array(
                'priority' => 15,
                'panel'     => 'storeflex_footer_panel',
                'title'     => __( 'Footer Main Area', 'storeflex' )
            )
        );


         /**
          * Toggle Field to enable or disable footer widget area
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_widget_area',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_widget_area' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_widget_area',
                array(
                    'priority'      => 5,
                    'section'       => 'storeflex_section_footer_main_area',
                    'settings'      => 'storeflex_enable_widget_area',
                    'label'         => __( 'Enable Footer Main Area', 'storeflex' ),
                )
            )
        );


        /**
          * Radio Image fields for footer widget area.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_widget_area_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_widget_area_layout' ),
                'sanitize_callback' => 'sanitize_key'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_widget_area_layout',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_footer_main_area',
                    'settings'      => 'storeflex_widget_area_layout',
                    'label'         => __( 'Column Layout', 'storeflex' ),
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_footer_widget_area_layout_choices(),
                    'active_callback'   => 'storeflex_has_enable_widget_area_layout'
                )
            )
        );

        /**
         * Toogle to enable or disable to display bottom widget
         *
         * @since 1.0.0
         */

         $wp_customize->add_setting( 'storeflex_enable_bottom_widget_in_footer',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_enable_bottom_widget_in_footer' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_bottom_widget_in_footer',
                array(
                    'priority'      => 15,
                    'section'       => 'storeflex_section_footer_main_area',
                    'settings'      => 'storeflex_enable_bottom_widget_in_footer',
                    'label'         => __( 'Enable Bottom Widget', 'storeflex' ),
                    'active_callback'   => 'storeflex_has_enable_widget_area_layout'
                )
            )
        );

        /**
         * Upgrade field for footer main area section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_footer_main_area',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_footer_main_area',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_footer_main_area',
                    'settings'      => 'storeflex_upgrade_footer_main_area',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_footer' )
                )
            )
        );

    }
    
endif;