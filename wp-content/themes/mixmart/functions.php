<?php
/**
 * Describe child theme functions
 *
 * @package StoreFlex
 * @subpackage MixMart
 * @since 1.0.0
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'mixmart_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mixmart_setup() {

        $mixmart_theme_info = wp_get_theme();
        $GLOBALS['mixmart_version'] = $mixmart_theme_info->get( 'Version' );
    }

endif;
add_action( 'after_setup_theme', 'mixmart_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed the theme customizer
 */
if( ! function_exists( 'mixmart_customize_register' ) ) :

    function mixmart_customize_register( $wp_customize ) {

        global $wp_customize;

        /**
         * Mixmart Default Primary Color.
         *
         * @since 1.0.0
         */ 
        $wp_customize->get_setting( 'storeflex_primary_theme_color' )->default = '#ff5722';

         /**
         * Heading Toggle field for Primary Menu
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'mixmart_primary_menu_heading_toggle',
            array(
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        $wp_customize->add_control( new StoreFlex_Control_Heading_Toggle(
            $wp_customize, 'mixmart_primary_menu_heading_toggle',
                array(
                    'priority'    => 25,
                    'label'       => __( 'Primary Menu Color', 'mixmart' ),
                    'section'     => 'storeflex_section_header_main_area',
                )
            )
        );

         /**
         * Primary menu font color
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'mixmart_primary_menu_font_color',
            array(
                'default'           => '#000',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'mixmart_primary_menu_font_color',
                array(
                     'priority'  => 30,
                    'label'      => __( 'Font Color', 'mixmart' ),
                    'section'    => 'storeflex_section_header_main_area',
                    'settings'   => 'mixmart_primary_menu_font_color',
                )
            )
        );

         /**
         * Primary menu link color
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'mixmart_primary_menu_active_color',
            array(
                'default'           => '#ff5722',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'mixmart_primary_menu_active_color',
                array(
                     'priority'  => 35,
                    'label'      => __( 'Active Color', 'mixmart' ),
                    'section'    => 'storeflex_section_header_main_area',
                    'settings'   => 'mixmart_primary_menu_active_color',
                )
            )
        );

        /**
         * Primary menu hover color
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'mixmart_primary_menu_hover_color',
            array(
                'default'           => '#ff5722',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );

        $wp_customize->add_control( new WP_Customize_Color_Control(
            $wp_customize, 'mixmart_primary_menu_hover_color',
                array(
                     'priority'  => 35,
                    'label'      => __( 'Hover Color', 'mixmart' ),
                    'section'    => 'storeflex_section_header_main_area',
                    'settings'   => 'mixmart_primary_menu_hover_color',
                )
            )
        );

    }

endif;

add_action( 'customize_register', 'mixmart_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'mixmart_scripts', 99 );

function mixmart_scripts() {

    global $mixmart_version;

    wp_dequeue_style( 'storeflex-style' );

    wp_dequeue_style( 'storeflex-responsive-style' );

    wp_enqueue_style( 'storeflex-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $mixmart_version ) );

    wp_enqueue_style( 'storeflex-parent-responsive', get_template_directory_uri() . '/assets/css/storeflex-responsive.css', array(), esc_attr( $mixmart_version ) );

    wp_enqueue_style( 'mixmart-style', get_stylesheet_uri(), array(), esc_attr( $mixmart_version ) );

    wp_enqueue_style( 'mixmart-responsive', get_stylesheet_directory_uri() . '/assets/css/mixmart-responsive.css', array(), esc_attr( $mixmart_version ) );

}

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Mixmart General Css.
 */
if ( ! function_exists( 'mixmart_general_css' ) ) :

    function mixmart_general_css( $output_css ) {

        $primary_theme_color        = get_theme_mod( 'storeflex_primary_theme_color', '#ff5722');

        $primary_menu_font_color    = get_theme_mod( 'mixmart_primary_menu_font_color', '#000' );
        $primary_menu_active_color  = get_theme_mod( 'mixmart_primary_menu_active_color', '#ff5722' );
        $primary_menu_hover_color   = get_theme_mod( 'mixmart_primary_menu_hover_color', '#ff5722' );

        //define variable for custom css
        $custom_css = '';

        $custom_css = ".button-back-home, .navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover, input[type='submit'], input[type='submit']:hover,.storeflex-title:before,.storeflex-title:after,#site-navigation .menu-item-description,.storeflex-cart-wrapper a.checkout-button.button.alt,.woocommerce-cart .cart .button,.storeflex-wave .sf-rect,.storeflex-three-bounce .sf-child,.storeflex-folding-cube .sf-cube:before,.woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:hover,.woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled,.woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled[disabled],.woocommerce-active li.product a.added_to_cart , .woocommerce-active ul.products li.product a.added_to_cart,.woocommerce-active ul.products li.product .button:hover,.woocommerce-active li.product .button:hover,.single.woocommerce-active .out-of-stock,.single .yith-wcwl-wishlistexistsbrowse a, .single .yith-wcwl-wishlistaddedbrowse a,.woocommerce-active .storeflex-product-btns-icons> a span,.woocommerce-active ul.products li.product span.onsale,.woocommerce-active li.product span.onsale,.widget li.wc-block-product-categories-list-item:hover,.wc-block-active-filters__clear-all span,.wc-block-components-filter-reset-button span,.storeflex-call-block-wrapper:hover .storeflex-call-to-action-button,.single .storeflex-container .single_add_to_cart_button.button.alt,.single .woocommerce-noreviews,.woocommerce-wishlist .wishlist_table .product-add-to-cart a,.archive-style--grid .storeflex-content-wrapper .no-img-post .article-cat-item,.storeflex-content-wrapper .article-cat-item,.archive-style--classic .storeflex-content-wrapper .no-img-post .article-cat-item,.archive-style--list .storeflex-content-wrapper .article-cat-item,.single-product .add_to_wishlist.single_add_to_wishlist,.woocommerce .storeflex-login-form-wrapper .woocommerce-form-login .woocommerce-form-login__submit,.woocommerce-account .woocommerce-info,.woocommerce-account .woocommerce-info::before,.woocommerce-checkout .woocommerce-info,.woocommerce-checkout .woocommerce-info::before,.woocommerce-cart .woocommerce-info,.woocommerce-cart .woocommerce-info::before,.woocommerce .storeflex-post-sidebar-wrapper span.onsale,.widget .wc-block-grid__product-onsale span,.wc-block-grid__product:hover  .add_to_cart_button:hover,.woocommerce-cart .cart .button,.woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled, .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled[disabled],.woocommerce-account .woocommerce-Address .title .edit,.woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit,.woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button,.woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button,.woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button,:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit,:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button,:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button,:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button,.woocommerce-checkout .wc-block-components-checkout-return-to-cart-button,.woocommerce-checkout .wc-block-components-totals-coupon-link,button,.woocommerce-active ul.products li.product .storeflex-out-of-stock-message,.woocommerce-active li.product .storeflex-out-of-stock-message,.woocommerce-checkout:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt, .woocommerce-message, .woocommerce-info, .woocommerce-error, .woocommerce-noreviews, p.no-comments, .wp-block-button__link ,.editor-styles-wrapper .wp-block-button__link, .wc-block-components-button:not(.is-link), .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,         .woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link :hover,         .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link:hover,  .cart-icon .cart-count, .storeflex-wishlist .storeflex-wl-counter, .related.products> h2::before,.related.products> h2::after, .widget.widget_product_categories li.cat-item:hover,.widget.widget_product_tag_cloud a.tag-cloud-link:hover,         .navigation .nav-links a.page-numbers:hover, .storeflex-scrollup:hover, .navigation .nav-links .page-numbers.current, body.storeflex-site-layout--boxed-layout, .widget .wc-block-grid__product-onsale span {background-color: ". esc_attr( $primary_theme_color ) ."}";

        $custom_css .= " #site-navigation ul li.current-menu-item>a,#site-navigation ul li.current-page-item>a,.storeflex-product-btns-icons a.add_to_wishlist i,#site-navigation ul li.current-menu-ancestor>a, #site-navigation ul.sub-menu li:hover>a,#site-navigation ul.children:hover ,entry-summary a,.wc-block-components-formatted-money-amount,#site-navigation ul li:hover>a, #site-navigation ul li.focus>a,.wc-block-grid__product:hover  .add_to_cart_button,.widget .wp-block-woocommerce-customer-account .label,.widget .woocommerce .woocommerce-breadcrumb a,.woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce-cart .woocommerce .product-quantity .quantity .qty,.woocommerce-cart .wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,.woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,.woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,.woocommerce nav.woocommerce-pagination ul li a, .storeflex-scrollup, .woocommerce nav.woocommerce-pagination ul li span,  .woocommerce .storeflex-breadcrumb-container .woocommerce-breadcrumb a,.storeflex-product-btns-icons a.add_to_wishlist:hover i::before,.storeflex-product-grid-button a{color: ". esc_attr( $primary_theme_color ) ."}";

        $custom_css .= ".navigation .nav-links a:hover,button,.bttn:hover,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.widget li.wc-block-product-categories-list-item:hover,.wc-block-components-quantity-selector,.wc-block-components-notice-banner.is-error,.wc-block-components-notice-banner.is-error>svg,.wc-block-grid__product:hover  .add_to_cart_button,.woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,.button-back-home, input[type='submit'] {border-color: ". esc_attr( $primary_theme_color ) ."}";

        $custom_css .= ".woocommerce-account .woocommerce-info,.woocommerce-account .woocommerce-info::before,.woocommerce-checkout .woocommerce-info,.woocommerce-checkout .woocommerce-info::before,.woocommerce-cart .woocommerce-info,.woocommerce-cart .woocommerce-info::before, .woocommerce-message,#site-navigation .menu-item-description::after {border-top-color: ". esc_attr(  $primary_theme_color ) ."}";

        $custom_css .= ".woocommerce-active .storeflex-product-btns-icons>a span::before  {border-left-color: ". esc_attr(  $primary_theme_color ) ."}";

        $custom_css .= ".storeflex-banner-wrapper .feature-content-wrap .buy-now-button a {border-bottom-color: ". esc_attr(  $primary_theme_color ) ."}";

        $custom_css .= ".woocommerce-active .storeflex-product-btns-icons>a i{ color: ". esc_attr( $primary_theme_color ) ."}\n";
        $custom_css .= "#site-navigation ul li a{ color: ". esc_attr( $primary_menu_font_color ) ."}\n";
        $custom_css .= "#site-navigation ul li.current-menu-item>a, #site-navigation ul li.current-page-item>a, #site-navigation ul li.current-menu-ancestor>a{ color: ". esc_attr( $primary_menu_active_color ) ."}\n";
        $custom_css .= "#site-navigation ul li:hover>a, #site-navigation ul li.focus>a{ color: ". esc_attr( $primary_menu_hover_color ) ."}\n";

        if ( ! empty( $custom_css ) ) {
            $output_css .= $custom_css;
        }

        return $output_css;

    }

endif;

add_filter( 'storeflex_head_css', 'mixmart_general_css', 999 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Check if Quick View is activated.
 */
if ( !function_exists ( 'mixmart_is_active_quick_view' ) ) :

    function mixmart_is_active_quick_view() {
        if ( class_exists( 'YITH_WCQV_Frontend' ) ) {
            return true;
        } else {
            return false;
        }
    }

endif;

if ( ! function_exists ( 'mixmart_quick_view_button_html' ) ):

    function mixmart_quick_view_button_html() {

        global $product;

        $product_id = $product->get_id();

        $button = '<a href="#" class="mixmart-quick-btn yith-wcqv-button" data-product_id="' . esc_attr( $product_id ) . '" aria-label="'. esc_attr__( 'Quick View', 'mixmart' ) .'"><i class= "bx bx-show" ></i><span>'. esc_html__( 'Quick View', 'mixmart' ) .' </span></a>';

        return $button;
    }

    add_filter( 'yith_add_quick_view_button_html', 'mixmart_quick_view_button_html' );

endif;

if ( ! function_exists ( 'mixmart_product_quick_view_btn' ) ):

    function mixmart_product_quick_view_btn() {

        /**
         * Adds quick view button Product List
         */
        if ( mixmart_is_active_quick_view() ) {
            $quick_view = new YITH_WCQV_Frontend();
            $quick_view->yith_add_quick_view_button();
        }

    }

endif;

add_action( 'storeflex_product_hover_button_icons', 'mixmart_product_quick_view_btn', 10 );
