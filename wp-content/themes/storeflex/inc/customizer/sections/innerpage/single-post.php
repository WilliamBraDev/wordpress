<?php
/**
 *  Add single post settings and it's fields inside post section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_single_post_section' );

if ( ! function_exists( 'storeflex_register_single_post_section' ) ) :

    /**
     * Register archive section.
     */
    function storeflex_register_single_post_section ( $wp_customize ) {

         /**
         * Archive Posts section
         *
         * Inner Page Settings > Post Settings > Single Post Settings
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_single_post',
                array(
                    'priority'  => 10,
                    'panel'     => 'storeflex_inner_page_panel',
                    'section'   => 'storeflex_section_post',
                    'title'     => __( 'Single Post Settings', 'storeflex' ),
                )
            )
        );

        /**
          * Toggle Field to enable or disable author box on single post.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_author_box',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_author_box' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_author_box',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_single_post',
                    'settings'      => 'storeflex_enable_author_box',
                    'label'         => __( 'Enable Author box', 'storeflex' ),
                )
            )
        );

        /**
          * Toggle Field to enable or disable related post of single post.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_related_post',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_related_post' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_related_post',
                array(
                    'priority'      => 20,
                    'section'       => 'storeflex_section_single_post',
                    'settings'      => 'storeflex_enable_related_post',
                    'label'         => __( 'Enable Related Post', 'storeflex' ),
                )
            )
        );

         /**
         * Upgrade field for single post section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_single_post',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_single_post',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_single_post',
                    'settings'      => 'storeflex_upgrade_single_post',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_single_post' )
                )
            )
        );
    }

endif;