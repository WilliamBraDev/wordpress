<?php
/**
 * Add footer info section and it's fields inside Footer section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_footer_info_fields' );

if ( ! function_exists( 'storeflex_register_footer_info_fields' ) ) :

    /**
     * Register footer section's fields.
     */
    function storeflex_register_footer_info_fields ( $wp_customize ) {

        /**
         * Header Section
         *
         * Header Settings > Header Site Info
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_footer_info',
            array(
                'priority' => 10,
                'panel'     => 'storeflex_footer_panel',
                'title'     => __( 'Footer Site Info', 'storeflex' )
            )
        );

         /**
         * Toogle to enable or disable to display footer info.
         *
         * @since 1.0.0
         */

         $wp_customize->add_setting( 'storeflex_enable_info_on_footer',
            array(
                'default'   => storeflex_get_customizer_default( 'storeflex_enable_info_on_footer' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_info_on_footer',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_footer_info',
                    'settings'      => 'storeflex_enable_info_on_footer',
                    'label'         => __( 'Enable Footer Info', 'storeflex' ),
                )
            )
        );

        /**
         * Block Repeater field for footer info
         * 
         */
        $wp_customize->add_setting( 'storeflex_info_on_footer',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => json_encode(
                    array(
                        array(
                            'footer_info_icon' => '',
                            'footer_info_text' => '',
                            'footer_info_description' => '',
                        )
                    )
                ),
                'sanitize_callback' => 'storeflex_sanitize_repeater',
            )
        );

        $wp_customize->add_control( new storeflex_Control_Banner_Repeater(
            $wp_customize, 
            'storeflex_info_on_footer',
                array(
                    'priority'                      => 20,
                    'section'                       => 'storeflex_section_footer_info',
                    'settings'                      => 'storeflex_info_on_footer',
                    'label'                         => __( 'Informations On Footer', 'storeflex' ),
                    'storeflex_box_label_text'            => __( 'Footer Information','storeflex' ),
                    'storeflex_box_add_control_text'      => __( 'Add Footer Info','storeflex' ),
                    'active_callback' => 'storeflex_has_enable_info_on_footer'
                ),
                array(
                    'footer_info_icon'=> array(
                        'type'        => 'icon',
                        'label'       => __( 'Icon', 'storeflex' ),
                        'description' => __( 'Choose required icon from available list.', 'storeflex' )
                    ),
                    'footer_info_text' => array(
                        'type'        => 'text',
                        'label'       => __( 'Info Heading', 'storeflex' ),
                        'description' => __( 'Information text', 'storeflex' )
                    ),
                    'footer_info_description' => array(
                        'type'                => 'text',
                        'label'               => __( 'Info Description', 'storeflex' ),
                        'description'          => __( 'Information Description text', 'storeflex' )
                    )
                )
            )
        );

        /**
         * Upgrade field for footer info section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_footer_info',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_footer_info',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_footer_info',
                    'settings'      => 'storeflex_upgrade_footer_info',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_footer_info' )
                )
            )
        );
    }

endif;