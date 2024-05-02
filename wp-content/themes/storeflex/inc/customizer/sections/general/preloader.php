<?php
/**
 * Add Preloaders section and it's fields inside General section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_preloader_fields' );

if ( ! function_exists( 'storeflex_register_preloader_fields' ) ) :

    /**
     * Register preloader section's fields.
     */
    function storeflex_register_preloader_fields ( $wp_customize ) {

        /**
         * Preloader Section
         *
         * General > Preloader
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_preloader',
            array(
                'priority' => 10,
                'panel'     => 'storeflex_general_panel',
                'title'     => __( 'Preloader', 'storeflex' )
            )
        );

         /**
          * Toggle to enable or disable preloaders 
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_preloader',
            array(
                'default'   => storeflex_get_customizer_default( 'storeflex_enable_preloader' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_preloader',
            array(
                'priority'      => 5,
                'section'       => 'storeflex_section_preloader',
                'settings'      => 'storeflex_enable_preloader',
                'label'         => __( 'Enable Pre Loader', 'storeflex' ),
            )
        ));


         /**
         * Select option for image hover effect.
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_preloader_choices',
            array(
                'default'   => storeflex_get_customizer_default('storeflex_preloader_choices'),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( 'storeflex_preloader_choices',
            array(
                'priority'  => 5,
                'section'   => 'storeflex_section_preloader',
                'setting'   => 'storeflex_preloader_choices',
                'label'     => __( 'Preloader Choices', 'storeflex' ),
                'type'      => 'select',
                'choices'   => storeflex_preloader_choices(),
                'active_callback'   => 'storeflex_has_enable_preloader'
            )
        );

        /**
          * Radio Image fields for preloader choices.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_preloader',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_preloader' ),
                'sanitize_callback' => 'sanitize_key'

            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_preloader',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_preloader',
                    'settings'      => 'storeflex_preloader',
                    'label'         => __( 'Pre Loader', 'storeflex' ),
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_preloader_style_choices(),
                    'active_callback'   => 'storeflex_has_select_default_preloader'
                )
            )
        );

         /**
         * Image Field for banner background image
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_preloader_image', array(
            'default'           => '',
            'sanitize_callback' => 'storeflex_sanitize_image',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 'storeflex_preloader_image',
                array(
                    'priority'  => 20,
                    'label'    => __( 'Upload', 'storeflex' ),
                    'section'  => 'storeflex_section_preloader',
                    'settings' => 'storeflex_preloader_image',
                     'description'   => __( 'Upload your image or logo to be displayed as a preloader', 'storeflex' ),
                    'active_callback' => 'storeflex_has_select_logo_preloader'
                )
            ) 
        );

         /**
         * Upgrade field for preloader section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_preloader',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_preloader',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_preloader',
                    'settings'      => 'storeflex_upgrade_preloader',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_preloader' )
                )
            )
        );

    }
    
endif;