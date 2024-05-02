<?php
/**
 *  Add shop settings and it's fields inside woocommerce section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_woocommerce_shop_section' );

if ( ! function_exists( 'storeflex_register_woocommerce_shop_section' ) ) :

    /**
     * Register archive section.
     */
    function storeflex_register_woocommerce_shop_section ( $wp_customize ) {

         /**
         * Woocommerce section
         *
         * Inner Page Settings > Woocommerce Settings > Shop Settings
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_woocommerce_shop',
                array(
                    'priority'  => 10,
                    'panel'     => 'storeflex_inner_page_panel',
                    'section'   => 'storeflex_section_woocommerce',
                    'title'     => __( 'Shop Settings', 'storeflex' ),
                )
            )
        );

        if ( storeflex_is_active_woocommerce() ) {

            /**
              * Toggle Field to enable or disable sale flash badge
              * 
              * @since 1.0.0 
             */
            $wp_customize->add_setting( 'storeflex_enable_display_sale_badge',
                array(
                    'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_display_sale_badge' ),
                    'sanitize_callback' => 'storeflex_sanitize_checkbox'
                )
            );

            $wp_customize->add_control( new StoreFlex_Control_Toggle(
                $wp_customize, 'storeflex_enable_display_sale_badge',
                    array(
                        'priority'      => 10,
                        'section'       => 'storeflex_section_woocommerce_shop',
                        'settings'      => 'storeflex_enable_display_sale_badge',
                        'label'         => __( 'Enable Product Sales Badge', 'storeflex' ),
                    )
                )
            );

            /**
              * Toggle Field to enable or disable product gallery
              * 
              * @since 1.0.0 
             */
            $wp_customize->add_setting( 'storeflex_enable_display_product_gallery',
                array(
                    'default'   =>  storeflex_get_customizer_default( 'storeflex_enable_display_product_gallery' ),
                    'sanitize_callback' => 'storeflex_sanitize_checkbox'
                )
            );

            $wp_customize->add_control( new StoreFlex_Control_Toggle(
                $wp_customize, 'storeflex_enable_display_product_gallery',
                    array(
                        'priority'      => 20,
                        'section'       => 'storeflex_section_woocommerce_shop',
                        'settings'      => 'storeflex_enable_display_product_gallery',
                        'label'         => __( 'Enable Product Gallery on Hover', 'storeflex' ),
                    )
                )
            );

            /**
             * Upgrade field for shop page
             *
             * @since 1.0.0
             */ 
            $wp_customize->add_setting( 'storeflex_upgrade_shop_page',
                array(
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );
            $wp_customize->add_control( new StoreFlex_Control_Upgrade(
                $wp_customize, 'storeflex_upgrade_shop_page',
                    array(
                        'priority'      => 200,
                        'section'       => 'storeflex_section_woocommerce_shop',
                        'settings'      => 'storeflex_upgrade_shop_page',
                        'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                        'choices'       => storeflex_upgrade_choices( 'storeflex_shop_page' )
                    )
                )
            );
        }
    }

endif;