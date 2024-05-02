<?php
/**
 * Extends the sections of typography
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_typography_section' );

if ( ! function_exists( 'storeflex_register_typography_section' ) ) :

    /**
     * Register typography.
     */
    function storeflex_register_typography_section ( $wp_customize ) {

        /**
         * Failsafe is safe
         */
        if ( ! isset( $wp_customize ) ) {
            return;
        }

         /**
         * Typography Choices
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_typography',
                array(
                    'priority'  => 25,
                    'panel'     => 'storeflex_general_panel',
                    'title'     => __( 'Typography', 'storeflex' ),
                )
            )
        );

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_body_typography',
                array(
                    'priority'  => 10,
                    'panel'     => 'storeflex_general_panel',
                    'section'   => 'storeflex_section_typography',
                    'title'     => __( 'Body', 'storeflex' ),
                )
            )
        );

        $wp_customize->add_section( new StoreFlex_Customize_Section(
            $wp_customize, 'storeflex_section_heading_typography',
                array(
                    'priority'      => 20,
                    'panel'         => 'storeflex_general_panel',
                    'section'   => 'storeflex_section_typography',
                    'title'         => __( 'Heading', 'storeflex' )
                )
            )
        );

         $wp_customize->add_section( new StoreFlex_Customize_Section(
            $wp_customize, 'storeflex_section_products_typography',
                array(
                    'priority'      => 30,
                    'panel'         => 'storeflex_general_panel',
                    'section'       => 'storeflex_section_typography',
                    'title'         => __( 'Products', 'storeflex' )
                )
            )
        );

         /**
         * Typography Font field for body typography
         *
         * General Settings > Typography > Body
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_body_font_family',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_body_font_family' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_setting( 'storeflex_body_font_weight',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_body_font_weight' ),
                'sanitize_callback' => 'sanitize_key',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 'storeflex_body_font_style',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_body_font_style' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting( 'storeflex_body_font_transform',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_body_font_transform' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage',
                
            )
        );
        $wp_customize->add_setting( 'storeflex_body_font_decoration',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_body_font_decoration' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage',
                
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Typography (
            $wp_customize, 'body_typography',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_body_typography',
                    'settings'      => array(
                        'family'        => 'storeflex_body_font_family',
                        'weight'        => 'storeflex_body_font_weight',
                        'style'         => 'storeflex_body_font_style',
                        'transform'     => 'storeflex_body_font_transform',
                        'decoration'    => 'storeflex_body_font_decoration'
                    ),
                    'description'   => __( 'Select how you want your body fonts to appear.', 'storeflex' ),
                    'l10n'          => array() // Pass custom labels. Use the setting key (above) for the specific label.
                )
            )
        );

        /**
         * Typography Font filed for heading typography
         *
         * General Settings > Typography > Heading
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'storeflex_heading_font_family',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_heading_font_family' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_setting(
            'storeflex_heading_font_weight',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_heading_font_weight' ),
                'sanitize_callback' => 'sanitize_key',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting(
            'storeflex_heading_font_style',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_heading_font_style' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );
        $wp_customize->add_setting(
            'storeflex_heading_font_transform',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_heading_font_transform' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage',
                
            )
        );
        $wp_customize->add_setting(
            'storeflex_heading_font_decoration',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_heading_font_decoration' ),
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage',
                
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Typography (
            $wp_customize,
                'heading_typography',
                array(
                    'priority'      => 10,
                    'section'       => 'storeflex_section_heading_typography',
                    'settings'      => array(
                        'family'        => 'storeflex_heading_font_family',
                        'weight'        => 'storeflex_heading_font_weight',
                        'style'         => 'storeflex_heading_font_style',
                        'transform'     => 'storeflex_heading_font_transform',
                        'decoration'    => 'storeflex_heading_font_decoration'
                    ),
                    'description'   => __( 'Select how you want your heading fonts to appear.', 'storeflex' ),
                    'l10n'          => array() // Pass custom labels. Use the setting key (above) for the specific label.
                )
            )
        );

        if ( storeflex_is_active_woocommerce() ) {

            /**
             * Typography Font filed for products typography
             *
             * General Settings > Typography > Products
             *
             * @since 1.0.0
             */
            $wp_customize->add_setting(
                'storeflex_products_font_family',
                array(
                    'default'           => storeflex_get_customizer_default( 'storeflex_products_font_family' ),
                    'sanitize_callback' => 'sanitize_text_field'
                )
            );
            $wp_customize->add_setting(
                'storeflex_products_font_weight',
                array(
                    'default'           => storeflex_get_customizer_default( 'storeflex_products_font_weight' ),
                    'sanitize_callback' => 'sanitize_key',
                    'transport'         => 'postMessage'
                )
            );
            $wp_customize->add_setting(
                'storeflex_products_font_style',
                array(
                    'default'           => storeflex_get_customizer_default( 'storeflex_products_font_style' ),
                    'sanitize_callback' => 'sanitize_text_field',
                    'transport'         => 'postMessage'
                )
            );
            $wp_customize->add_setting(
                'storeflex_products_font_transform',
                array(
                    'default'           => storeflex_get_customizer_default( 'storeflex_products_font_transform' ),
                    'sanitize_callback' => 'sanitize_text_field',
                    'transport'         => 'postMessage',
                    
                )
            );
            $wp_customize->add_setting(
                'storeflex_products_font_decoration',
                array(
                    'default'           => storeflex_get_customizer_default( 'storeflex_products_font_decoration' ),
                    'sanitize_callback' => 'sanitize_text_field',
                    'transport'         => 'postMessage',
                    
                )
            );

            $wp_customize->add_control( new StoreFlex_Control_Typography (
                $wp_customize,
                    'products_typography',
                    array(
                        'priority'      => 10,
                        'section'       => 'storeflex_section_products_typography',
                        'settings'      => array(
                            'family'        => 'storeflex_products_font_family',
                            'weight'        => 'storeflex_products_font_weight',
                            'style'         => 'storeflex_products_font_style',
                            'transform'     => 'storeflex_products_font_transform',
                            'decoration'    => 'storeflex_products_font_decoration'
                        ),
                        'description'   => __( 'Select how you want your products fonts to appear.', 'storeflex' ),
                        'l10n'          => array() // Pass custom labels. Use the setting key (above) for the specific label.
                    )
                )
            );
        }

        /**
         * Upgrade field for typography section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_typography',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_typography',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_typography',
                    'settings'      => 'storeflex_upgrade_typography',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_typography' )
                )
            )
        );

    }

endif;