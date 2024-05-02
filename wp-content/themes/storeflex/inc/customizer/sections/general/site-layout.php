<?php
/**
 * Add Site Layout section and it's fields inside General section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_site_layout_fields' );

if ( ! function_exists( 'storeflex_register_site_layout_fields' ) ) :

    /**
     * Register site layout section's fields.
     */
    function storeflex_register_site_layout_fields ( $wp_customize ) {

        /**
         * Site Layout Section
         *
         * General > Site Layout
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_site_layout',
            array(
                'priority' => 5,
                'panel'     => 'storeflex_general_panel',
                'title'     => __( 'Site Layout', 'storeflex' )
            )
        );

         /**
          * Radio Image fields for site layout.
          * 
          * @since 1.0.0
          * 
         */

        $wp_customize->add_setting( 'storeflex_site_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_site_layout' ),
                'sanitize_callback' => 'sanitize_key'
           
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_site_layout',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_site_layout',
                    'settings'      => 'storeflex_site_layout',
                    'label'         => __( 'Site Layout', 'storeflex' ),
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_layout_choices()
                )
            )
        );


         /**
         * Enable or disable site mode switcher
         *
         * @since 1.0.0
         */

        $wp_customize->add_setting( 'storeflex_site_mode_switcher_option',
            array(
                'capability'        => 'edit_theme_options',
                'default'           => storeflex_get_customizer_default( 'storeflex_site_mode_switcher_option' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox',
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_site_mode_switcher_option',
                array(
                    'label'         => __( 'Enable Site Mode Switcher', 'storeflex' ),
                    'section'       => 'storeflex_section_site_layout',
                    'settings'      => 'storeflex_site_mode_switcher_option',
                    'priority'      => 20,
                )
            )
        );

         /**
         * Radio buttonset field for sitemode
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_site_mode_option',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_site_mode_option' ),
                'sanitize_callback' => 'storeflex_sanitize_select',
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Buttonset(
            $wp_customize, 'storeflex_site_mode_option',
                array(
                    'priority'          => 65,
                    'section'           => 'storeflex_section_site_layout',
                    'settings'          => 'storeflex_site_mode_option',
                    'label'             => __( 'Site Mode Option', 'storeflex' ),
                    'choices'           => storeflex_site_mode_choices(),
                    'active_callback'   => 'storeflex_has_site_mode_switcher_enable'
                )
            )
        );
        
    }

endif;