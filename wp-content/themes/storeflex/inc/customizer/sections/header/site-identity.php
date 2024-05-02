<?php
/**
 * Add header default and it's fields inside header section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_header_default' );

if ( ! function_exists( 'storeflex_register_header_default' ) ) :

    /**
     * Register header item .
     */
    function storeflex_register_header_default ( $wp_customize ) {

    	/**
         * Site Style style section
         *
         * Header Settings > Site Identity
         *
         * @since 1.0.0
         */

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_site_identity',
                array(
                    'priority'  => 5,
                    'panel'     => 'storeflex_header_panel',
                    'title'     => __( 'Site Identity', 'storeflex' ),
                )
            )
        );

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_site_title',
                array(
                    'priority'  => 10,
                    'panel'     => 'storeflex_header_panel',
                    'section'   => 'storeflex_section_site_identity',
                    'title'     => __( 'Site Title and Tagline', 'storeflex' ),
                )
            )
        );


         /**
         * Tabs field for scroll top
         *
         * Heading Settings > Site Identity > Site Title and Tagline
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_site_title_tabs',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_site_title_tabs' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Tabs(
            $wp_customize, 'storeflex_site_title_tabs',
                array(
                    'priority'          => 1,
                    'section'           => 'storeflex_section_site_title',
                    'settings'          => 'storeflex_site_title_tabs',
                    'choices'           => storeflex_site_title_tabs_choices(),
                )
            )
        );

        $wp_customize->get_control( 'blogname' )->section = 'storeflex_section_site_title';
        $wp_customize->get_control( 'blogdescription' )->section = 'storeflex_section_site_title';
        $wp_customize->get_control( 'display_header_text' )->section = 'storeflex_section_site_title';
        $wp_customize->get_control( 'display_header_text' )->priority = 15;

         /**
         * Heading field for site title typography
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_section_site_title_typography',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle(
            $wp_customize, 'storeflex_section_site_title_typography',
                array(
                    'priority'          => 20,
                    'section'           => 'storeflex_section_site_title',
                    'settings'          => 'storeflex_section_site_title_typography',
                    'label'             => __( 'Site Title Typography', 'storeflex' ),
                )
            )
        );

        /**
         * Typography Font field for site title typography
         *
         * Header Settings > Site Identity > Site Title and Tagline
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_site_title_font_family',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_site_title_font_family' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_setting( 'storeflex_site_title_font_weight',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_site_title_font_weight' ),
                'sanitize_callback' => 'sanitize_key',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Typography (
            $wp_customize, 'site_title_typography',
                array(
                    'priority'      => 25,
                    'section'       => 'storeflex_section_site_title',
                    'settings'      => array(
                        'family'        => 'storeflex_site_title_font_family',
                        'weight'        => 'storeflex_site_title_font_weight',
                    ),
                    'description'   => __( 'Select how you want your site title fonts to appear.', 'storeflex' ),
                    'l10n'          => array() // Pass custom labels. Use the setting key (above) for the specific label.
                )
            )
        );

         /**
         * Heading field for site description typography
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_section_site_tagline_typography',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle(
            $wp_customize, 'storeflex_section_site_tagline_typography',
                array(
                    'priority'          => 30,
                    'section'           => 'storeflex_section_site_title',
                    'settings'          => 'storeflex_section_site_tagline_typography',
                    'label'             => __( 'Site Tagline Typography', 'storeflex' ),
                )
            )
        );

        /**
         * Typography Font field for site title typography
         *
         * Header Settings > Site Identity > Site Title and Tagline
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_site_tagline_font_family',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_site_tagline_font_family' ),
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_setting( 'storeflex_site_tagline_font_weight',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_site_tagline_font_weight' ),
                'sanitize_callback' => 'sanitize_key',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Typography (
            $wp_customize, 'site_tagline_typography',
                array(
                    'priority'      => 35,
                    'section'       => 'storeflex_section_site_title',
                    'settings'      => array(
                        'family'        => 'storeflex_site_tagline_font_family',
                        'weight'        => 'storeflex_site_tagline_font_weight',
                    ),
                    'description'   => __( 'Select how you want your site tagline fonts to appear.', 'storeflex' ),
                    'l10n'          => array() // Pass custom labels. Use the setting key (above) for the specific label.
                )
            )
        );

        $wp_customize->add_section( new StoreFlex_Customize_Section (
            $wp_customize, 'storeflex_section_site_logo',
                array(
                    'priority'  => 20,
                    'panel'     => 'storeflex_header_panel',
                    'section'   => 'storeflex_section_site_identity',
                    'title'     => __( 'Logo & Site Icon', 'storeflex' ),
                )
            )
        );

        $wp_customize->get_control( 'custom_logo' )->section = 'storeflex_section_site_logo';

         /**
         * Slider field for logo width
         *
         * Heading Settings > Logo & Site Icon
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_logo_width',
            array(
                'default'               => storeflex_get_customizer_default( 'storeflex_logo_width' ),
                'sanitize_callback'     => 'storeflex_sanitize_number',
            )
        );
        $wp_customize->add_setting( 'storeflex_logo_width_tablet',
            array(
                'default'               => storeflex_get_customizer_default( 'storeflex_logo_width_tablet' ),
                'sanitize_callback'     => 'storeflex_sanitize_number',
            )
        );
        $wp_customize->add_setting( 'storeflex_logo_width_mobile',
            array(
                'default'               => storeflex_get_customizer_default( 'storeflex_logo_width_mobile' ),
                'sanitize_callback'     => 'storeflex_sanitize_number',
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Slider(
                $wp_customize, 'storeflex_logo_width',
                array(
                    'priority'              => 20,
                    'section'               => 'storeflex_section_site_logo',
                    'settings' => array(
                        'desktop'   => 'storeflex_logo_width',
                        'tablet'    => 'storeflex_logo_width_tablet',
                        'mobile'    => 'storeflex_logo_width_mobile',
                    ),
                    'label'                 => esc_html__( 'Logo Width', 'storeflex' ),
                    'input_attrs'           => array(
                        'min'   => 1,
                        'max'   => 400,
                        'step'  => 1,
                        'unit'  => 'px',
                    ),
                )
            )
        );

        $wp_customize->get_control( 'site_icon' )->section = 'storeflex_section_site_logo';

         /**
         *
         * Header Settings > Header Image
         *
         * @since 1.0.0
         */
         
        $wp_customize->get_section( 'header_image' )->panel = 'storeflex_header_panel';
        $wp_customize->get_section( 'header_image' )->priority = 10;

    }

endif;