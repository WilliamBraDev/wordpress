<?php
/**
 * Add full-width and it's fields inside front page section group.
 * 
 * @package StoreFlex
 */

add_action( 'customize_register', 'storeflex_register_fullwidth_fields' );

if ( ! function_exists( 'storeflex_register_fullwidth_fields' ) ) :

    /**
     * Register full-width section's fields.
     */
    function storeflex_register_fullwidth_fields ( $wp_customize ) {

    	 if ( storeflex_is_active_woocommerce() ) {
        
	        /**
	         * Full Width Section
	         *
	         * Front Page > Fullwidth Section
	         * 
	         * @since 1.0.0
	         */
	         $wp_customize->add_section( 'storeflex_section_category',
	            array(
	                'priority'  => 10,
	                'panel'     => 'storeflex_front_page_panel',
	                'title'     => __( 'Fullwidth Section', 'storeflex' )
	            )
	        );

	         
	        /**
	         * Block Repeater field for Fullwidth
	         * 
	         * @since 1.0.0
	         */
	        $wp_customize->add_setting( 'front_fullwidth_blocks',
	            array(
	                'default'           => storeflex_get_customizer_default( 'front_fullwidth_blocks' ),
	                'sanitize_callback' => 'sanitize_text_field'
	            )
	        );
	        $wp_customize->add_control( new storeflex_Control_Blocks_Repeater(
	            $wp_customize, 'front_fullwidth_blocks',
	                array(
	                    'label'       => esc_html__( 'Full Width Section Blocks', 'storeflex' ),
	                    'section'     => 'storeflex_section_category',
	                    'settings'    => 'front_fullwidth_blocks',
	                    'priority'      => 10
	                )
	            )
	        );
	    }

	    /**
         * Upgrade field for fullwidth section
         *
         * @since 1.0.0
         */ 
        $wp_customize->add_setting( 'storeflex_upgrade_fullwidth',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Upgrade(
            $wp_customize, 'storeflex_upgrade_fullwidth',
                array(
                    'priority'      => 200,
                    'section'       => 'storeflex_section_category',
                    'settings'      => 'storeflex_upgrade_fullwidth',
                    'label'         => __( 'More features with StoreFlex Pro', 'storeflex' ),
                    'choices'       => storeflex_upgrade_choices( 'storeflex_single_post' )
                )
            )
        );

     }

endif;
