<?php
/**
 * Hooks for handling homepage section.
 * 
 * @package StoreFlex
 */

if ( ! function_exists( 'storeflex_main_header' ) ) :

    /**
     * Function for loading header part.
     * 
     */
    function storeflex_main_header() {

        /**
         * require file to display header in site
         *
         * @since 1.0.0
         */
        
        get_template_part( '/template-parts/header/content', 'header' );
    }

endif;

add_action( 'storeflex_header_section', 'storeflex_main_header', 10 );

if ( ! function_exists( 'storeflex_container_wrapper' ) ) :

    /**
     * Function for start container wrapper.
     * 
     */
    function storeflex_container_wrapper() {

        $homepage_latest_post_content = storeflex_get_customizer_option_value( 'storeflex_homepage_content_status' );

        if ( $homepage_latest_post_content == false && is_front_page() ) {
            return;
        }

        if ( $homepage_latest_post_content == true && is_front_page() ) {
            echo '<div id="storeflex-latest-post-section" class="storeflex-clearfix">';   
        }

        echo '<div class="storeflex-container">';

    }

endif;

add_action( 'storeflex_before_page_main_content', 'storeflex_container_wrapper', 10 );

if ( ! function_exists( 'storeflex_container_wrapper_end' ) ) :

    /**
     * Function for end container wrapper.
     * 
     */
    function storeflex_container_wrapper_end() {

        $homepage_latest_post_content = storeflex_get_customizer_option_value( 'storeflex_homepage_content_status' );

        if ( $homepage_latest_post_content == false && is_front_page() ) {
            return;
        }

        echo '</div><!-- .storeflex-container -->';

        if ( $homepage_latest_post_content == true && is_front_page() ) {
            echo '</div><!-- .storeflex-latest-post-section -->';   
        }

    }

endif;

add_action( 'storeflex_after_page_main_content', 'storeflex_container_wrapper_end', 10 );

if ( ! function_exists( 'storeflex_main_banner' ) ) :

    /**
     * Function for loading footer part.
     * 
     */
    function storeflex_main_banner() {

        /**
         * require file to display banner in site
         *
         * @since 1.0.0
         */
        
        get_template_part( '/template-parts/frontpage/content', 'banner' );
    }

endif;

add_action( 'storeflex_homepage_section', 'storeflex_main_banner', 10 );

if ( ! function_exists( 'storeflex_fullwidth_section' ) ) :

    /**
     * Function for display fullwidth.
     * 
     */
    function storeflex_fullwidth_section() {

        /**
         * require file to display fullwidth in homepage
         *
         * @since 1.0.0
         */
        
        get_template_part( '/template-parts/frontpage/content', 'fullwidth' );
    }

endif;

add_action( 'storeflex_homepage_section', 'storeflex_fullwidth_section', 20 );

if ( ! function_exists( 'storeflex_homepage_latest_post_section' ) ) :

    /**
     * Function for display fullwidth.
     * 
     */
    function storeflex_homepage_latest_post_section() {

        /**
         * require file to display post in homepage
         *
         * @since 1.0.0
         */
        
        get_template_part( '/template-parts/frontpage/content', 'latest-post' );
    }

endif;

add_action( 'storeflex_homepage_post_section', 'storeflex_homepage_latest_post_section', 10 );

if ( ! function_exists( 'storeflex_testimonial' ) ) :

    /**
     * Function for testimonial.
     * 
     */
    function storeflex_testimonial() {

        /**
         * require file to testimonial in site
         *
         * @since 1.0.0
         */
        
        $testimonial_display_choices = storeflex_get_customizer_option_value( 'storeflex_testimonial_display_choices' );

        if ( $testimonial_display_choices == 'all-page' || ( $testimonial_display_choices == 'front-page' && is_front_page() ) ) :

            get_template_part( '/template-parts/footer/partials/content', 'testimonial' );

        endif;
    }

endif;

add_action( 'storeflex_testimonial_section', 'storeflex_testimonial', 10 );

if ( ! function_exists( 'storeflex_main_footer' ) ) :

    /**
     * Function for loading footer part.
     * 
     */
    function storeflex_main_footer() {

        /**
         * require file to display footer in site
         *
         * @since 1.0.0
         */
        
        get_template_part( '/template-parts/footer/content', 'footer' );
    }

endif;

add_action( 'storeflex_footer_section', 'storeflex_main_footer', 10 );

if ( ! function_exists( 'storeflex_scroll_top' ) ) :
    
    /**
     * Function for loading footer part.
     * 
     */
    function storeflex_scroll_top() {

        /**
         * require file to display scroll up in site
         *
         * @since 1.0.0
         */
        
        get_template_part( '/template-parts/footer/partials/content', 'scroll-top' );
    }

endif;

add_action( 'storeflex_scroll_top_section', 'storeflex_scroll_top', 10 );