<?php
/**
 *  Add archive settings and it's fields inside post section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_archive_section' );

if ( ! function_exists( 'storeflex_register_archive_section' ) ) :

    /**
     * Register archive section.
     */
    function storeflex_register_archive_section ( $wp_customize ) {

         /**
         * Archive Posts section
         *
         * Inner Page Settings > Post Settings > Archive Settings
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_archive_post',
                array(
                    'priority'  => 10,
                    'panel'     => 'storeflex_inner_page_panel',
                    'section'   => 'storeflex_section_post',
                    'title'     => __( 'Archive Settings', 'storeflex' ),
                )
            )
        );

        /**
         * Heading Toggle field for Archive Page Layout
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_archive_page_heading_toggle', 
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle( 
            $wp_customize, 'storeflex_archive_page_heading_toggle', 
                array(
                    'priority'    => 5,
                    'label'       => __( 'Archive Post Layout', 'storeflex' ),
                    'section'     => 'storeflex_section_archive_post',
                )
            )
        );

         /**
          * Radio Image fields for archive post layout.
          * 
          * @since 1.0.0
          * 
         */

        $wp_customize->add_setting( 'storeflex_archive_post_layout',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => storeflex_get_customizer_default( 'storeflex_archive_post_layout' ),
                'sanitize_callback' => 'sanitize_key'
           
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Radio_Image(
            $wp_customize, 'storeflex_archive_post_layout',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_archive_post',
                    'settings'      => 'storeflex_archive_post_layout',
                    'description'   => __( 'Choose from available layouts', 'storeflex' ),
                    'choices'       => storeflex_archive_post_display_choices()
                )
            )
        );

        /**
         * Upgrade field for archive section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_archive_page',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_archive_page',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_archive_post',
                    'settings'      => 'storeflex_upgrade_archive_page',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_archive' )
                )
            )
        );
    }

endif;