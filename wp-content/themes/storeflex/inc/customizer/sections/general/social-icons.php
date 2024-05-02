<?php
/**
 * Add Social icons section and it's fields inside General section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_social_icons_fields' );

if ( ! function_exists( 'storeflex_register_social_icons_fields' ) ) :

    /**
     * Register preloader section's fields.
     */
    function storeflex_register_social_icons_fields ( $wp_customize ) {
        
        /**
         * Site Layout Section
         *
         * General > Social Icons
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_social_icons',
            array(
                'priority' => 25,
                'panel'     => 'storeflex_general_panel',
                'title'     => __( 'Social Icons', 'storeflex' )
            )
        );

         /**
         * Toogle to enable or disable to display social icons
         *
         * @since 1.0.0
         */

         $wp_customize->add_setting( 'storeflex_enable_social_icons',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_enable_social_icons' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_social_icons',
                array(
                    'priority'      => 5,
                    'section'       => 'storeflex_section_social_icons',
                    'settings'      => 'storeflex_enable_social_icons',
                    'label'         => __( 'Enable Social Icons', 'storeflex' ),
                )
            )
        );

        /**
         * Toogle to enable or disable to open social icon links in new tab
         *
         * @since 1.0.0
         */

         $wp_customize->add_setting( 'storeflex_enable_social_icons_in_new_tab',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_enable_social_icons_in_new_tab' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_social_icons_in_new_tab',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_social_icons',
                    'settings'      => 'storeflex_enable_social_icons_in_new_tab',
                    'label'         => __( 'Open Links in new tab', 'storeflex' ),
                )
            )
        );

        /**
         * Repeater field for Social Icons
         * 
         */
        $wp_customize->add_setting( 'storeflex_social_icons',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => json_encode(
                    array(
                        array(
                            'item_icon' => 'mt mt-square-x-twitter',
                            'item_link' => '#',
                        )
                    )
                ),
                'sanitize_callback' => 'storeflex_sanitize_repeater'
            )
        );

        $wp_customize->add_control( new storeflex_Control_Repeater(
            $wp_customize, 
            'storeflex_social_icons',
                array(
                    'priority'                      => 20,
                    'section'                       => 'storeflex_section_social_icons',
                    'settings'                      => 'storeflex_social_icons',
                    'label'                         => __( 'Social Icons', 'storeflex' ),
                    'storeflex_box_label_text'            => __( 'Social Icon','storeflex' ),
                    'storeflex_box_add_control_text'      => __( 'Add New Icon','storeflex' )
                ),
                array(
                    'item_icon' => array(
                        'type'        => 'social_icon',
                        'label'       => __( 'Icon', 'storeflex' ),
                        'description' => __( 'Choose required icon from available list.', 'storeflex' )
                    ),
                    'item_link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Icon Link', 'storeflex' ),
                        'description' => __( 'Add social icon link.', 'storeflex' )
                    )
                )
            )
        );

        /**
         * Upgrade field for social icons section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_social_icons',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_social_icons',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_social_icons',
                    'settings'      => 'storeflex_upgrade_social_icons',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_social_icons' )
                )
            )
        );
    }

endif;
