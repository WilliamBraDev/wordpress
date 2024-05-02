<?php
/**
 * Add scroll top section and it's fields inside General section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_scroll_top_fields' );

if ( ! function_exists( 'storeflex_register_scroll_top_fields' ) ) :

    /**
     * Register scroll top section's fields.
     */
    function storeflex_register_scroll_top_fields ( $wp_customize ) {

    	/**
         * Preloader Section
         *
         * General > Scroll Top
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_scroll_top',
            array(
                'priority' => 30,
                'panel'     => 'storeflex_general_panel',
                'title'     => __( 'Scroll Top', 'storeflex' )
            )
        );

        /**
          * Toggle to enable or disable scroll top.
          * 
          * @since 1.0.0 
         */
        $wp_customize->add_setting( 'storeflex_enable_scroll_top',
            array(
                'default'   => storeflex_get_customizer_default( 'storeflex_enable_scroll_top' ),
                'sanitize_callback' => 'storeflex_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new StoreFlex_Control_Toggle(
            $wp_customize, 'storeflex_enable_scroll_top',
	            array(
	                'priority'      => 5,
	                'section'       => 'storeflex_section_scroll_top',
	                'settings'      => 'storeflex_enable_scroll_top',
	                'label'         => __( 'Enable Scroll Top', 'storeflex' ),
	            )
        	)
    	);

         /**
         * Upgrade field for scroll top section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_scroll_top',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_scroll_top',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_scroll_top',
                    'settings'      => 'storeflex_upgrade_scroll_top',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_scroll_top' )
                )
            )
        );
    }

 endif;