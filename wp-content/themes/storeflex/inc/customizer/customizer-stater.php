<?php
/**
 * Includes theme customizer defaults and starter functions.
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'storeflex_get_customizer_option_value' ) ) :

	/**
	 * Get the customizer value `get_theme_mod()`
	 *
	 * @since 1.0.0
	 */
	function storeflex_get_customizer_option_value( $setting_id ) {

		return get_theme_mod( $setting_id, storeflex_get_customizer_default( $setting_id ) );

	}

endif;

if ( ! function_exists( 'storeflex_get_customizer_default' ) ) :

	/**
	 * Returns an array of the desired default StoreFlex Options
	 *
	 * @return array
	 */
	function storeflex_get_customizer_default( $setting_id ) {

	$default_values = apply_filters( 'storeflex_get_customizer_defaults',
			array(
                //site layout
                'storeflex_site_layout'                   => 'full-width',
                'storeflex_site_mode_switcher_option'     => true,
                'storeflex_site_mode_option'			   => 'light',

                //preloader
                'storeflex_enable_preloader'			 => true,
                'storeflex_preloader_choices'            => 'default-style',
                'storeflex_preloader'					 => 'three_bounce',
                'storeflex_preloader_image'              => '',

                //color
                'storeflex_primary_theme_color'          => '#009b45',
                'storeflex_text_color'           		 => '#212121',
                'storeflex_link_color'           		 => '#212121',
                'storeflex_link_hover_color'             => '#009b45',

                //scroll top
                'storeflex_enable_scroll_top'			 => true,

                //hover effect
                'storeflex_hover_effect_option'         => 'one',

                //site logo width
                'storeflex_logo_width'                   => 234,
                'storeflex_logo_width_tablet'            => 200,
                'storeflex_logo_width_mobile'            => 175,

                //site title tab
                'storeflex_site_title_tabs'              => 'general',

                //site title
                'storeflex_site_title_font_family'       => 'Jost',
                'storeflex_site_title_font_weight'       => '400',

                //site tagline
                'storeflex_site_tagline_font_family'     => 'Jost',
                'storeflex_site_tagline_font_weight'     => '400',

                //social icons
                'storeflex_enable_social_icons'           => true,
                'storeflex_social_icons'                  => '',
                'storeflex_enable_social_icons_in_new_tab'=> true,

                //search
                'storeflex_advance_search_option'         => 'live-search',

                //banner layout
                'storeflex_banner_layout'                   => 'one',

                //body typography
                'storeflex_body_font_family'                      => 'Jost',
                'storeflex_body_font_weight'                      => '400',
                'storeflex_body_font_style'                       => 'normal',
                'storeflex_body_font_transform'                   => 'inherit',
                'storeflex_body_font_decoration'                  => 'inherit',

                //Heading
                'storeflex_heading_font_family'                   => 'Jost',
                'storeflex_heading_font_weight'                   => '700',
                'storeflex_heading_font_style'                    => 'normal',
                'storeflex_heading_font_transform'                => 'inherit',
                'storeflex_heading_font_decoration'               => 'inherit',

                //products
                'storeflex_products_font_family'                   => 'Jost',
                'storeflex_products_font_weight'                   => '700',
                'storeflex_products_font_style'                    => 'normal',
                'storeflex_products_font_transform'                => 'inherit',
                'storeflex_products_font_decoration'               => 'inherit',

                //sidebar
                'storeflex_archive_and_blog_sidebar_layout'  => 'right-sidebar',
                'storeflex_post_sidebar_layout'              => 'right-sidebar',
                'storeflex_page_sidebar_layout'              => 'right-sidebar',

                //top header
                'storeflex_top_header_text_field'            => 'Opening hours - Mon-Fri: 8am - 8pm',

                //woocommerce header
                'storeflex_enable_woo_cart'			         => true,
                'storeflex_enable_yith_wishlist'		     => true,

                //header items
                'storeflex_enable_sticky_header'             => true,
                'storeflex_enable_search_bar'                => true,

                //primary menu description
                'storeflex_enable_primary_menu_description'  => true,

                //testimonial area
                'storeflex_enable_testimonial'               => true,
                'storeflex_testimonial_title'                => 'Testimonial',
                'storeflex_testimonial_display_choices'      => 'front-page',
                'storeflex_testimonial'                      => '',

                //footer top area
                'storeflex_enable_info_on_footer'            => true,
                'storeflex_info_on_footer'                   => '',

                //footer main area
                'storeflex_enable_widget_area' 		         => true,
                'storeflex_widget_area_layout'			     => 'column-two',
                'storeflex_enable_bottom_widget_in_footer'   => true,

                //footer bottom area
                'storeflex_bottom_footer_field'            => 'Copyright © StoreFlex {year}',
                'storeflex_enable_social_icon_in_footer'   => true,

                //banner area
                'storeflex_enable_banner_section'          => true,
                'storeflex_slider_post'                    => '',
                'storeflex_feature_post'                   => '',

                //category area
                'storeflex_enable_category_section'        => true,

                //product area
                'storeflex_products'                        => '',

                //frontpage fullwidth
                'front_fullwidth_blocks' => json_encode(
                    array(
                        array(
                            'type'          => 'ad-block',
                            'option'        => true,
                            'imgSrc'        => '',
                            'imgUrl'        => '',
                            'newTab'        => true,
                        ),

                        array(
                            'type'              => 'category-block',
                            'option'            => true,
                            'blockTitle'        => __( 'Categories', 'storeflex' ),
                            'postOrderby'       => 'asc',
                            'postCount'         => 5,
                            'productCount'      => true,
                        ),
                        array(
                            'type'              => 'product-grid',
                            'option'            => true,
                            'category'          => 'all',
                            'postOrderby'       => 'date-desc',
                            'postCount'         => 8,
                            'blockTitle'        => __( '', 'storeflex' ),
                            'buttonTitle'       => __( 'Shop Now', 'storeflex' ),
                        ),
                        array(
                            'type'              => 'product-carousel',
                            'option'            => true,
                            'category'          => 'all',
                            'postOrderby'       => 'date-desc',
                            'postCount'         => 6,
                            'blockTitle'        => __( '', 'storeflex' ),
                        ),
                        array(
                            'type'          => 'call-to-action',
                            'option'        => true,
                            'imgSrc'        => '',
                            'imgUrl'        => '',
                            'newTab'        => true,
                            'sectionContent' => __( '50% Off Summer Collection', 'storeflex' ),
                            'sectionButton' => __( 'Shop Now', 'storeflex' ),
                            'buttonUrl'     => __('#', 'storeflex'),
                        ),
                    )
                ),

                //home page content
                'storeflex_homepage_content_status'   => true,

                //archive settings
                'storeflex_archive_post_layout'       => 'grid',

                //single post settings
                'storeflex_enable_author_box'         => true,
                'storeflex_enable_related_post'       => true,

                //404 error page
                'storeflex_enable_homepage_button'    => true,
                'storeflex_enable_error_search_bar'   => true,

                //shop setting
                'storeflex_enable_display_sale_badge'                 => true,
                'storeflex_enable_display_product_gallery'            => true,

            )
		);

	return  $default_values[$setting_id];

	}

endif;