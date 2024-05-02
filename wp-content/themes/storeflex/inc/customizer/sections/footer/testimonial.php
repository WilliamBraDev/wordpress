<?php
/**
 * Add testimonial section and it's fields inside footer section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_testimonial_section' );

if ( ! function_exists( 'storeflex_register_testimonial_section' ) ) :

    /**
     * Register testimonial section's fields.
     */
    function storeflex_register_testimonial_section ( $wp_customize ) {

        /**
         * Footer Section
         *
         * Footer Settings > Testimonial Section
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_testimonial',
            array(
                'priority' => 5,
                'panel'     => 'storeflex_footer_panel',
                'title'     => __( 'Testimonial Section', 'storeflex' )
            )
        );


         /**
          * Toggle Field to enable or disable footer widget area
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_testimonial',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_testimonial' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_testimonial',
                array(
                    'priority'      => 5,
                    'section'       => 'storeflex_section_testimonial',
                    'settings'      => 'storeflex_enable_testimonial',
                    'label'         => __( 'Enable Testimonial', 'storeflex' ),
                )
            )
        );

        $wp_customize->add_setting( 'storeflex_testimonial_title',
            array(
                'default'   => storeflex_get_customizer_default( 'storeflex_testimonial_title' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( 'storeflex_testimonial_title',
            array(
                'priority'  => 10,
                'section'   => 'storeflex_section_testimonial',
                'setting'   => 'storeflex_testimonial_title',
                'label'     => __( 'Title', 'storeflex' ),
                'type'      => 'text',
                'input_attrs' => array(
                    'placeholder'   => __( 'Testimonial', 'storeflex' )
                ),
            )
        );


        /**
         * Display choices for Testimonial
         * 
         */
        $wp_customize->add_setting( 'storeflex_testimonial_display_choices',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_testimonial_display_choices' ),
                'sanitize_callback' => 'storeflex_sanitize_select'
            )
        );

        $wp_customize->add_control( 'storeflex_testimonial_display_choices',
            array(
                'priority'  => 15,
                'section'   => 'storeflex_section_testimonial',
                'setting'   => 'storeflex_testimonial_display_choices',
                'label'     => __( 'Testimonial Display', 'storeflex' ),
                'type'      => 'select',
                'choices'   => storeflex_testimonial_display_choices(),
            )
        );

        /**
         * Repeater field for Testimonial
         * 
         */
        $wp_customize->add_setting( 'storeflex_testimonial',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => json_encode(
                    array(
                        array(
                            'testimonial_image'         => '',
                            'testimonial_name'          => '',
                            'testimonial_description'   => '',
                        )
                    )
                ),
                'sanitize_callback' => 'storeflex_sanitize_repeater'
            )
        );

        $wp_customize->add_control( new storeflex_Control_Repeater(
            $wp_customize, 
            'storeflex_testimonial',
                array(
                    'priority'                      => 20,
                    'section'                       => 'storeflex_section_testimonial',
                    'settings'                      => 'storeflex_testimonial',
                    'label'                         => __( 'Testimonials', 'storeflex' ),
                    'storeflex_box_label_text'            => __( 'Testimonial','storeflex' ),
                    'storeflex_box_add_control_text'      => __( 'Add New Testimonial','storeflex' )
                ),
                array(
                    'testimonial_image' => array(
                        'type'        => 'upload',
                        'label'       => __( 'Avatar Image', 'storeflex' ),
                        'description' => __( 'Choose a avatar image for testimonial', 'storeflex' )
                    ),
                    'testimonial_name' => array(
                        'type'        => 'text',
                        'label'       => __( 'Avatar Name', 'storeflex' ),
                        'description' => __( 'Text Field for avatar name', 'storeflex' )
                    ),
                   'testimonial_description' => array(
                        'type'        => 'textarea',
                        'label'       => __( 'Testimonials', 'storeflex' )
                    ),
                )
            )
        );

         /**
         * Upgrade field for testimonial page
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_testimonial',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_testimonial',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_testimonial',
                    'settings'      => 'storeflex_upgrade_testimonial',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_testimonial' )
                )
            )
        );
    }
    
endif;