<?php
/**
 * Add main area and it's fields inside header section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_header_main_area' );

if ( ! function_exists( 'storeflex_register_header_main_area' ) ) :

    /**
     * Register main area header item .
     */
    function storeflex_register_header_main_area ( $wp_customize ) {

    	/**
         * Header Section
         *
         * Header Settings > Main Area
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_header_main_area',
            array(
                'priority' => 20,
                'panel'     => 'storeflex_header_panel',
                'title'     => __( 'Main Area', 'storeflex' )
            )
        );

         /**
          * Toggle Field to enable or disable sticky header.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_sticky_header',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_sticky_header' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_sticky_header',
                array(
                    'priority'      => 5,
                    'section'       => 'storeflex_section_header_main_area',
                    'settings'      => 'storeflex_enable_sticky_header',
                    'label'         => __( 'Enable Sticky Header', 'storeflex' ),
                )
            )
        );

        /**
          * Toggle Field to enable or disable primary menu description.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_primary_menu_description',
            array(
                'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_primary_menu_description' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_primary_menu_description',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_header_main_area',
                    'settings'      => 'storeflex_enable_primary_menu_description',
                    'label'         => __( 'Enable Primary Menu Description', 'storeflex' ),
                )
            )
        );

         if ( storeflex_is_active_woocommerce() ) {

             /**
              * Toggle to enable or disable woo cart.
              * 
              * @since 1.0.0 
             */
            $wp_customize->add_setting( 'storeflex_enable_woo_cart',
                array(
                    'default'   => storeflex_get_customizer_default( 'storeflex_enable_woo_cart' ),
                    'sanitize_callback' => 'storeflex_sanitize_checkbox'
                )
            );

            $wp_customize->add_control( new StoreFlex_Control_Toggle(
                $wp_customize, 'storeflex_enable_woo_cart',
                    array(
                        'priority'      => 15,
                        'section'       => 'storeflex_section_header_main_area',
                        'settings'      => 'storeflex_enable_woo_cart',
                        'label'         => __( 'Enable Woo Cart', 'storeflex' ),
                    )
                )
            );
        }

        if ( storeflex_is_active_wishlist() ) {

             /**
              * Toggle to enable or disable yith wishlist.
              * 
              * @since 1.0.0 
             */
            
            $wp_customize->add_setting( 'storeflex_enable_yith_wishlist',
                array(
                    'default'   => storeflex_get_customizer_default( 'storeflex_enable_yith_wishlist' ),
                    'sanitize_callback' => 'storeflex_sanitize_checkbox'
                )
            );

            $wp_customize->add_control( new StoreFlex_Control_Toggle(
                $wp_customize, 'storeflex_enable_yith_wishlist',
                    array(
                        'priority'      => 20,
                        'section'       => 'storeflex_section_header_main_area',
                        'settings'      => 'storeflex_enable_yith_wishlist',
                        'label'         => __( 'Enable YITH Wishlist', 'storeflex' ),
                    )
                )
            );
        }

        /**
         * Upgrade field for header section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_header',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_header',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_header_main_area',
                    'settings'      => 'storeflex_upgrade_header',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_header' )
                )
            )
        );

    }
    
endif;