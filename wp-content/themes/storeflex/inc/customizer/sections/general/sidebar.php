<?php
/**
 * Add sidebar and it's fields inside General section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_sidebars' );

if ( ! function_exists( 'storeflex_register_sidebars' ) ) :

    /**
     * Register sidebars.
     */
    function storeflex_register_sidebars ( $wp_customize ) {

        /**
         * Sidebar Layout Section
         *
         * General > Sidebar Layout
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_sidebar',
            array(
                'priority' => 25,
                'panel'     => 'storeflex_general_panel',
                'title'     => __( 'Sidebar Layout', 'storeflex' )
            )
        );

        /**
         * Heading Toggle field for Page Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_page_sidebar_heading_toggle', 
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle( 
            $wp_customize, 'storeflex_page_sidebar_heading_toggle', 
                array(
                    'priority'    => 5,
                    'label'       => esc_html__( 'Page Sidebar Layout', 'storeflex' ),
                    'section'     => 'storeflex_section_sidebar',

                )
            )
        );

         /**
         * Radio Image field for sibebar choices for pages
         *
         * @since 1.0.0
         */

        $wp_customize->add_setting( 'storeflex_page_sidebar_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_page_sidebar_layout' ),
                'sanitize_callback' => 'sanitize_key'

            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_page_sidebar_layout',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_sidebar',
                    'settings'      => 'storeflex_page_sidebar_layout',
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_sidebar_layout_choices()
                )
            )
        );

        /**
         * Heading Toggle field for Archive and Blog Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_archive_sidebar_heading_toggle', 
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle( 
            $wp_customize, 'storeflex_archive_sidebar_heading_toggle', 
                array(
                    'priority'    => 15,
                    'label'       => esc_html__( 'Archive and Blog Sidebar Layout', 'storeflex' ),
                    'section'     => 'storeflex_section_sidebar',
                    'initial'     => false,
                )
            )
        );          

        /**
         * Radio Image field for sibebar choices for archive page
         *
         * @since 1.0.0
         */

        $wp_customize->add_setting( 'storeflex_archive_and_blog_sidebar_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_archive_and_blog_sidebar_layout' ),
                'sanitize_callback' => 'sanitize_key'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_archive_and_blog_sidebar_layout',
                array(
                    'priority'      => 20,
                    'section'       => 'storeflex_section_sidebar',
                    'settings'      => 'storeflex_archive_and_blog_sidebar_layout',
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_sidebar_layout_choices()
                )
            )
        );

        /**
         * Heading Toggle field for Post Sidebar Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_post_sidebar_heading_toggle', 
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle( 
            $wp_customize, 'storeflex_post_sidebar_heading_toggle', 
                array(
                    'priority'    => 25,
                    'label'       => esc_html__( 'Post Sidebar Layout', 'storeflex' ),
                    'section'     => 'storeflex_section_sidebar',
                    'initial'     => false,
                   
                )
            )
        );   

         /**
         * Radio Image field for sibebar choices for post page
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_post_sidebar_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_post_sidebar_layout' ),
                'sanitize_callback' => 'sanitize_key'

            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_post_sidebar_layout',
                array(
                    'priority'      => 30,
                    'section'       => 'storeflex_section_sidebar',
                    'settings'      => 'storeflex_post_sidebar_layout',
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_sidebar_layout_choices()
                )
            )
        );
    }
    
endif;