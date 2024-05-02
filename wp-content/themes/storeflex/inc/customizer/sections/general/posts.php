<?php
/**
 * Add post section and it's fields inside General section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_posts_fields' );

if ( ! function_exists( 'storeflex_register_posts_fields' ) ) :

    /**
     * Register post section's fields.
     */
    function storeflex_register_posts_fields ( $wp_customize ) {

    	/**
         * Preloader Section
         *
         * General > Scroll Top
         * 
         * @since 1.0.0
         */
         $wp_customize->add_section( 'storeflex_section_posts',
            array(
                'priority' => 35,
                'panel'     => 'storeflex_general_panel',
                'title'     => __( 'Posts', 'storeflex' )
            )
        );

        /**
         * Select Field for hover option
         * 
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'storeflex_hover_effect_option',
            array(
                'default'           => storeflex_get_customizer_default( 'storeflex_hover_effect_option' ),
                'sanitize_callback' => 'storeflex_sanitize_select',
            )
        );

        $wp_customize->add_control( 'storeflex_hover_effect_option',
            array(
                'priority'  => 20,
                'section'   => 'storeflex_section_posts',
                'setting'   => 'storeflex_hover_effect_option',
                'label'     => __( 'Hover Effect Option', 'storeflex' ),
                'type'      => 'select',
                'choices'   => storeflex_hover_effects_choices(),
            )
        );
    }

 endif;