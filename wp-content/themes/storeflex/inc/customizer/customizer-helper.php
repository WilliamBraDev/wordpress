<?php
/**
 * Customizer helper where define functions related to customizer panel, sections and settings.
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'storeflex_layout_choices' ) ) :

    /**
     * function to return choices of site layout.
     *
     * @since 1.0.0
     */
    function storeflex_layout_choices() {

        $site_layouts = apply_filters( 'storeflex_layout_choices',
            array(
                'full-width'    => array(
                    'title'     => __( 'Fullwidth', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/full-width.png'
                ),
                'boxed-layout'  => array(
                    'title'     => __( 'Boxed', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/boxed-layout.png'
                )
            )
        );

        return $site_layouts;
    }

endif;

if ( ! function_exists( 'storeflex_site_mode_choices' ) ) :

    /**
     * function to return choices for site mode.
     *
     * @since 1.0.0
     */
    function storeflex_site_mode_choices() {

        $site_mode_choices = apply_filters( 'storeflex_site_mode_choices',
            array(
                'light'    => __( 'Light Mode', 'storeflex' ),
                'dark'     => __( 'Dark Mode', 'storeflex' )
            )
        );

        return $site_mode_choices;

    }

endif;

if ( ! function_exists( 'storeflex_preloader_choices' ) ) :

    /**
     * function to return choices .
     *
     * @since 1.0.0
     */
    function storeflex_preloader_choices() {

        $preloader_choices = apply_filters( 'storeflex_preloader_choices',
            array(
                'default-style'    => __( 'Default Styles', 'storeflex' ),
                'logo'             => __( 'Logo or GIF', 'storeflex' )
            )
        );

        return $preloader_choices;

    }

endif;


if ( ! function_exists( 'storeflex_preloader_style_choices' ) ) :

    /**
     * function to return choices for preloader styles.
     *
     * @since 1.0.0
     */
    function storeflex_preloader_style_choices() {

        $site_container_layout = apply_filters( 'storeflex_preloader_style_choices',
            array(
                'three_bounce'    => array(
                    'title'     => __( 'Style 1', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/three-bounce-preloader.gif'
                ),
                'wave'         => array(
                    'title'     => __( 'Style 2', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/wave-preloader.gif'
                ),
                'folding_cube'         => array(
                    'title'     => __( 'Style 3', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/folding-cube-preloader.gif'
                )
            )
        );

        return $site_container_layout;

    }

endif;

if ( ! function_exists( 'storeflex_sidebar_layout_choices' ) ) :

        /**
         * function to return choices for sidebar layouts.
         *
         * @since 1.0.0
         */
        function storeflex_sidebar_layout_choices() {

            $sidebar_layouts = apply_filters( 'storeflex_sidebar_layout_choices',
                array(
                    'right-sidebar'    => array(
                        'title'     => __( 'Right Sidebar', 'storeflex' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/right-sidebar.png'
                    ),
                    'left-sidebar'  => array(
                        'title'     => __( 'Left Sidebar', 'storeflex' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/left-sidebar.png'
                    ),
                    'no-sidebar'  => array(
                        'title'     => __( 'No Sidebar', 'storeflex' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar.png'
                    ),
                    'no-sidebar-center'  => array(
                        'title'     => __( 'No Sidebar Center', 'storeflex' ),
                        'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/no-sidebar-center.png'
                    )
                )
            );

            return $sidebar_layouts;

        }

endif;

if ( ! function_exists( 'storeflex_hover_effects_choices' ) ) :

    /**
     * function to return choices for hover effects.
     *
     * @since 1.0.0
     */
    function storeflex_hover_effects_choices() {

        $hover_effects_choices = apply_filters( 'storeflex_hover_effects_choices',
            array(
                'none'    => __( 'None', 'storeflex' ),
                'one'     => __( 'One', 'storeflex' )
            )
        );

        return $hover_effects_choices;

    }

endif;

if ( ! function_exists( 'storeflex_site_title_tabs_choices' ) ) :

    /**
     * function to return choices for site title tab fields.
     *
     * @since 1.0.0
     */
    function storeflex_site_title_tabs_choices() {

        $site_title_tabs = apply_filters( 'storeflex_site_title_tabs_choices',
            array(
                'general'   => array(
                    'title'     => __( 'General', 'storeflex' ),
                    'fields'    => array(
                        'blogname',
                        'blogdescription',
                        'display_header_text',
                    )
                ),
                'design'    => array(
                    'title' => __( 'Design', 'storeflex' ),
                    'fields'    => array(
                        'storeflex_section_site_title_typography',
                        'site_title_typography',
                        'storeflex_section_site_tagline_typography',
                        'site_tagline_typography',
                    )
                )
            )
        );

        return $site_title_tabs;

    }

endif;


if ( ! function_exists( 'storeflex_advance_search_choices' ) ) :

    /**
     * function to return choices for advance search.
     *
     * @since 1.0.0
     */
    function storeflex_advance_search_choices() {

        $advance_search_choices = apply_filters( 'storeflex_advance_search_choices',
            array(
                'default'             => __( 'Default', 'storeflex' ),
                'live-search'         => __( 'Live Search', 'storeflex' ),
                'advance-product'     => __( 'Advance Product Search', 'storeflex' )
            )
        );

        return $advance_search_choices;

    }

endif;

if ( ! function_exists( 'storeflex_product_category_dropdown' ) ) :

    /**
     * Function to return choices for WooCommerce product categories.
     *
     * @since 1.0.0
     */

    function storeflex_product_category_dropdown() {

        $get_cats = get_terms( 'product_cat' );

        $cat_lists = array(
            '' => __( 'Select Product Category', 'storeflex' )
        );

        foreach( $get_cats as $cat ) {
            $cat_lists[$cat->slug] = $cat->name;
        }

        return $cat_lists;
    }

endif;

if ( ! function_exists( 'storeflex_banner_layout_choices' ) ) :

    /**
     * function to return choices of site layout.
     *
     * @since 1.0.0
     */
    function storeflex_banner_layout_choices() {

        $banner_layouts = apply_filters( 'storeflex_layout_choices',
            array(
                'one'    => array(
                    'title'     => __( 'Layout 1', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/banner-layout-one.png'
                ),
                'two'  => array(
                    'title'     => __( 'Layout 2', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/banner-layout-two.png'
                )
            )
        );

        return $banner_layouts;
    }

endif;


if ( ! function_exists( 'storeflex_archive_post_display_choices' ) ) :
    
    /**
     * function to return choices of archive page post.
     *
     * @since 1.0.0
     */
    function storeflex_archive_post_display_choices() {

        $display_option = apply_filters( 'storeflex_archive_post_display_choices',
           array(
                'grid'    => array(
                    'title'     => __( 'Grid', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/grid-layout-one.png'
                ),
                'classic'  => array(
                    'title'     => __( 'Classic', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/single-layout-one.png'
                ),
                'list'  => array(
                    'title'     => __( 'List', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/list-layout-one.png'
                ),
            )
        );

        return $display_option;

    }

endif;

if ( ! function_exists( 'storeflex_testimonial_display_choices' ) ) :

    /**
     * function to return choices for site mode.
     *
     * @since 1.0.0
     */
    function storeflex_testimonial_display_choices() {

        $testimonial_display_choices = apply_filters( 'storeflex_testimonial_display_choices',
            array(
                'front-page'    => __( 'Front Page Only', 'storeflex' ),
                'all-page'      => __( 'All Pages', 'storeflex' )
            )
        );

        return $testimonial_display_choices;

    }

endif;


if ( ! function_exists( 'storeflex_footer_widget_area_layout_choices' ) ) :

    /**
     * function to return choices of footer widget layout.
     *
     * @since 1.0.0
     */

    function storeflex_footer_widget_area_layout_choices() {

        $footer_layout = apply_filters( 'storeflex_footer_widget_area_layout_choices',
            array(
                'column-one'  => array(
                    'title'     => __( 'Layout 1', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-1.png'
                ),
                'column-two'  => array(
                    'title'     => __( 'Layout 2', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-2.png'
                ),
                'column-three'  => array(
                    'title'     => __( 'Layout 3', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-3.png'
                ),
                'column-four'  => array(
                    'title'     => __( 'Layout 4', 'storeflex' ),
                    'src'       => get_template_directory_uri() . '/inc/customizer/assets/images/footer-4.png'
                )
            )
        );

        return $footer_layout;
    }

endif;

   
if ( ! function_exists( 'storeflex_upgrade_choices' ) ) :

    /**
     * function to return choices for upgrade to pro.
     *
     * @since 1.0.0
     */
    function storeflex_upgrade_choices( $setting_id ) {

        $upgrade_info_lists = array(
            'preloader'     => array( __( '9 Styles', 'storeflex' ) ),
            'social_icons'  => array( __( '1 More Layout', 'storeflex' ), __( 'Official Color', 'storeflex' ), __( 'Unlimited Social Icons', 'storeflex' ) ),
            'typography'    => array( __( '600+ Google Fonts', 'storeflex' ), __( 'Adjustable font size', 'storeflex' ), __( 'Font Color Option', 'storeflex' ) ),
            'scroll_top'    => array( __( '10 Arrow Icons', 'storeflex' ), __( 'Alignment Options', 'storeflex' ), __( 'Device visibility', 'storeflex' ), __( 'Color Option', 'storeflex' ) ),
            'header'        => array( __( '2 More Header Layouts', 'storeflex' ), __( 'Background Options' , 'storeflex' ) ),   
            'banner'        => array( __( '1 More Layouts', 'storeflex' ), __( 'Unlimited Slider and Features Post', 'storeflex' ), __( 'Sortable Banner', 'storeflex') ),
            'fullwidth'     => array( __( 'Clone Blocks', 'storeflex' ), __( 'Custom Blocks', 'storeflex' ), __( 'Middle Content Section with Sidebar' , 'storeflex' )),
            'archive'       => array( __( '3 More Layouts', 'storeflex' ) ),
            'single_post'   => array( __( '2 More Layouts', 'storeflex' ), __( '2 Layouts for Author box', 'storeflex' ), __( 'Range for Related Post' , 'storeflex' ) ),
            'error_page'    => array( __( '3 More Page Layouts', 'storeflex' ) ),
            'shop_page'     => array( __( '2 More Page Layouts', 'storeflex' ), __( '2 Sales Badge Layouts', 'storeflex' ), __( '2 Out of Stocks Layouts', 'storeflex' ), __( '2 Sales Ribbon Layouts', 'storeflex' ), __( 'Custom Add to Cart Text', 'storeflex' ), __( '2 Product Page Layouts ', 'storeflex' ), __( 'Background Option for Out of Stock and Sales Ribbon ', 'storeflex' ) ),
            'testimonial'   => array( __( '2 Testimonial Layouts', 'storeflex' ), __( 'Unlimited Testimonial Posts' , 'storeflex' ) ),
            'footer_info'   => array( __( '2 Footer Info Layouts', 'storeflex' ), __( 'Unlimited Footer Info' , 'storeflex' ) ),
            'footer'        => array( __( 'Custom Text Color and Background Color', 'storeflex' ) ),
        );

        $setting_id = explode( 'storeflex_', $setting_id );
        $setting_id = $setting_id[1];

        return $upgrade_info_lists[$setting_id];

    }

endif;