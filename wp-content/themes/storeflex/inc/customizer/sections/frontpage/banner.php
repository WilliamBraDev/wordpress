<?php
/**
 * Add banner slider and it's fields inside front page section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_banner_fields' );

if ( ! function_exists( 'storeflex_register_banner_fields' ) ) :

    /**
     * Register banner section's fields.
     */
    function storeflex_register_banner_fields ( $wp_customize ) {
        
        /**
         * Site Layout Section
         *
         * Front Page > Banner Settings
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_banner_settings',
            array(
                'priority'  => 5,
                'panel'     => 'storeflex_front_page_panel',
                'title'     => __( 'Banner Settings', 'storeflex' )
            )
        );

         /**
          * Toggle to enable or disable banner section.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_banner_section',
            array(
                'default'   => storeflex_get_customizer_default( 'storeflex_enable_banner_section' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_banner_section',
                array(
                    'priority'      => 1,
                    'section'       => 'storeflex_section_banner_settings',
                    'settings'      => 'storeflex_enable_banner_section',
                    'label'         => __( 'Enable Banner', 'storeflex' ),
                )
            )
        );

         /**
         * Heading field for Slider Post
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_post_slider_post_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle(
            $wp_customize, 'storeflex_post_slider_post_heading',
                array(
                    'priority'          => 5,
                    'section'           => 'storeflex_section_banner_settings',
                    'settings'          => 'storeflex_post_slider_post_heading',
                    'label'             => __( 'Slider Post Settings', 'storeflex' ),
                    'active_callback'   => 'storeflex_has_banner_section_enable'
                )
            )
        );

        /**
         * Block Repeater field for slider post
         * 
         */
        $wp_customize->add_setting( 'storeflex_slider_post',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => json_encode(
                    array(
                        array(
                            'slider_post_heading' => '',
                            'slider_post_description' => '',
                            'slider_post_link' => '',
                            'slider_post_image' => '',
                            'slider_post_button' => '',
                        )
                    )
                ),
                'sanitize_callback' => 'storeflex_sanitize_repeater'
            )
        );

        $wp_customize->add_control( new storeflex_Control_Banner_Repeater(
            $wp_customize, 
            'storeflex_slider_post',
                array(
                    'priority'                      => 10,
                    'section'                       => 'storeflex_section_banner_settings',
                    'settings'                      => 'storeflex_slider_post',
                    'label'                         => __( 'Posts On Slider', 'storeflex' ),
                    'storeflex_box_label_text'            => __( 'Slider Post','storeflex' ),
                    'storeflex_box_add_control_text'      => __( 'Add slider post','storeflex' ),
                    'active_callback'   => 'storeflex_has_banner_section_enable'
                ),
                array(
                    'slider_post_heading' => array(
                        'type'        => 'text',
                        'label'       => __( 'Post Heading', 'storeflex' ),
                        'description' => __( 'This section display heading in post', 'storeflex' )
                    ),
                    'slider_post_description' => array(
                        'type'        => 'text',
                        'label'       => __( 'Post Description', 'storeflex' ),
                        'description' => __( 'This section display description about your post', 'storeflex' )
                    ),
                    'slider_post_link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Post Url', 'storeflex' ),
                        'description' => __( 'This section navigate to post', 'storeflex' )
                    ),
                    'slider_post_image' => array(
                        'type'        => 'upload',
                        'label'       => __( 'Post Image', 'storeflex' ),
                    ),
                    'slider_post_button' => array(
                        'type'        => 'text',
                        'label'       => __( 'Button Text', 'storeflex' ),
                        'description' => __( 'This section display button text', 'storeflex' )
                    ),
                )
            )
        );

        /**
         * Heading field for Sponsor Post
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'store_post_feature_post_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle(
            $wp_customize, 'store_post_feature_post_heading',
                array(
                    'priority'          => 15,
                    'section'           => 'storeflex_section_banner_settings',
                    'settings'          => 'store_post_feature_post_heading',
                    'label'             => __( 'Features Post Settings', 'storeflex' ),
                    'initial'           => false,
                    'active_callback'   => 'storeflex_has_banner_section_enable',
                )
            )
        );

        /**
         * Block Repeater field for slider post
         * 
         */
        $wp_customize->add_setting( 'storeflex_feature_post',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => json_encode(
                    array(
                        array(
                            'feature_post_image' => '',
                            'feature_post_heading' => '',
                            'feature_post_link' => '',
                            'feature_post_button' => '',
                        )
                    )
                ),
                'sanitize_callback' => 'storeflex_sanitize_repeater'
            )
        );

        $wp_customize->add_control( new storeflex_Control_Banner_Repeater(
            $wp_customize, 
            'storeflex_feature_post',
                array(
                    'priority'                      => 20,
                    'section'                       => 'storeflex_section_banner_settings',
                    'settings'                      => 'storeflex_feature_post',
                    'label'                         => __( 'Posts on Features post', 'storeflex' ),
                    'storeflex_box_label_text'            => __( 'Feature Post','storeflex' ),
                    'storeflex_box_add_control_text'      => __( 'Add feature post','storeflex' ),
                    'active_callback'   => 'storeflex_has_banner_section_enable'
                ),
                array(
                    'feature_post_image' => array(
                        'type'        => 'upload',
                        'label'       => __( 'Post Image', 'storeflex' ),
                    ),
                    'feature_post_heading' => array(
                        'type'        => 'text',
                        'label'       => __( 'Post Heading', 'storeflex' ),
                        'description' => __( 'This section display heading in post', 'storeflex' )
                    ),
                    'feature_post_link' => array(
                        'type'        => 'url',
                        'label'       => __( 'Post Url', 'storeflex' ),
                        'description' => __( 'This section navigate to post', 'storeflex' )
                    ),
                    'feature_post_button' => array(
                        'type'        => 'text',
                        'label'       => __( 'Button Text', 'storeflex' ),
                        'description' => __( 'This section display button text', 'storeflex' )
                    ),
                )
            )
        );

        /**
         * Heading field for Banner Design
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_banner_layout_heading',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle(
            $wp_customize, 'storeflex_banner_layout_heading',
                array(
                    'priority'          => 25,
                    'section'           => 'storeflex_section_banner_settings',
                    'settings'          => 'storeflex_banner_layout_heading',
                    'label'             => __( 'Banner Layout', 'storeflex' ),
                    'initial'           => false,
                    'active_callback'   => 'storeflex_has_banner_section_enable'
                )
            )
        );

        /**
          * Radio Image fields for banner layout.
          * 
          * @since 1.0.0
          * 
         */
        $wp_customize->add_setting( 'storeflex_banner_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_banner_layout' ),
                'sanitize_callback' => 'sanitize_key'
           
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_banner_layout',
                array(
                    'priority'      => 30,
                    'section'       => 'storeflex_section_banner_settings',
                    'settings'      => 'storeflex_banner_layout',
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_banner_layout_choices()
                )
            )
        );

        /**
         * Upgrade field for banner section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_banner',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_banner',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_banner_settings',
                    'settings'      => 'storeflex_upgrade_banner',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_banner' )
                )
            )
        );
    }

endif;
