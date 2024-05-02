<?php
/**
 * Add top area and it's fields inside header section group.
 * 
 * @package StoreFlex
 */


add_action( 'customize_register', 'storeflex_register_header_top_area' );

if ( ! function_exists( 'storeflex_register_header_top_area' ) ) :

    /**
     * Register top area header item .
     */
    function storeflex_register_header_top_area ( $wp_customize ) {

    	/**
         * Header Section
         *
         * Header Settings > Top Area
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_header_top_area',
            array(
                'priority' => 15,
                'panel'     => 'storeflex_header_panel',
                'title'     => __( 'Top Area', 'storeflex' )
            )
        );

        /**
         * Text field for top header
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_top_header_text_field',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_top_header_text_field' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control( 'storeflex_top_header_text_field',
            array(
                'priority'  => 10,
                'section'   => 'storeflex_section_header_top_area',
                'setting'   => 'storeflex_top_header_text_field',
                'label'     => __( 'Top Header Area Text Field', 'storeflex' ),
                'type'      => 'text',
                'input_attrs' => array(
                    'placeholder'   => __( 'Opening hours', 'storeflex' )
                ),

            )
        );

        /**
          * Toggle Field to enable or disable search bar.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_search_bar',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_search_bar' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_search_bar',
                array(
                    'priority'      => 15,
                    'section'       => 'storeflex_section_header_top_area',
                    'settings'      => 'storeflex_enable_search_bar',
                    'label'         => __( 'Enable Search Bar', 'storeflex' ),
                )
            )
        );

        /**
         * Select Field for search option
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_advance_search_option',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_advance_search_option' ),
                'sanitize_callback' => 'storeflex_sanitize_select',
            )
        );

        $wp_customize->add_control( 'storeflex_advance_search_option',
            array(
                'priority'  => 20,
                'section'   => 'storeflex_section_header_top_area',
                'setting'   => 'storeflex_advance_search_option',
                'label'     => __( 'Advance Search Option', 'storeflex' ),
                'type'      => 'select',
                'choices'   => storeflex_advance_search_choices(),
                'active_callback'   => 'storeflex_has_search_enable'
            )
        );

    }

endif;

