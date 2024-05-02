<?php
/**
 * Managed the theme's dynamic styles.
 *
 * @package StoreFlex
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*---------------------- Custom CSS ----------------------------*/

if ( ! function_exists( 'storeflex_custom_css' ) ) :

    /**
     * function to handle storeflex_head_css filter where all the css relation functions are hooked.
     *
     * @since 1.0.0
     */
    function storeflex_custom_css( $output_css = NULL ) {

        // Add filter storeflex_head_css for adding custom css via other functions.
        $output_css = apply_filters( 'storeflex_head_css', $output_css );

        if ( ! empty( $output_css ) ) {
            $output_css = wp_strip_all_tags( storeflex_minify_css( $output_css ) );
            echo "<!--StoreFlex CSS -->\n<style type=\"text/css\">\n". $output_css ."\n</style>";
        }
    }

endif;

add_action( 'wp_head', 'storeflex_custom_css', 9999 );


/*---------------------- General CSS-------------------------*/

/**
 * function to handle the general css.
 *
 * @since 1.0.0
 */


if ( ! function_exists( 'storeflex_general_css' ) ) :

    /**
     * function to handle the genral css for all sections.
     *
     * @since 1.0.0
     */
    function storeflex_general_css( $output_css ) {

        $custom_css =  '';

        $site_logo_width        = storeflex_get_customizer_option_value( 'storeflex_logo_width' );
        $site_logo_width_tablet = storeflex_get_customizer_option_value( 'storeflex_logo_width_tablet' );
        $site_logo_width_mobile = storeflex_get_customizer_option_value( 'storeflex_logo_width_mobile' );

        $primary_theme_color = storeflex_get_customizer_option_value( 'storeflex_primary_theme_color' );
        $text_color          = storeflex_get_customizer_option_value( 'storeflex_text_color' );
        $link_color          = storeflex_get_customizer_option_value( 'storeflex_link_color' );
        $link_hover_color    = storeflex_get_customizer_option_value( 'storeflex_link_hover_color' );

        //Primary theme color
        $custom_css = ".button-back-home, .navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover, input[type='submit'], input[type='submit']:hover,.storeflex-title:before,
        .storeflex-title:after,#site-navigation .menu-item-description,
        .storeflex-cart-wrapper a.checkout-button.button.alt,
        .woocommerce-cart .cart .button,.storeflex-wave .sf-rect,.storeflex-three-bounce .sf-child,.storeflex-folding-cube .sf-cube:before,
        .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:hover,
        .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled,
        .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled[disabled],
        .woocommerce-active li.product a.added_to_cart , .woocommerce-active ul.products li.product a.added_to_cart,
        .woocommerce-active ul.products li.product .button:hover,
        .woocommerce-active li.product .button:hover,
        .single.woocommerce-active .out-of-stock,
        .single .yith-wcwl-wishlistexistsbrowse a, .single .yith-wcwl-wishlistaddedbrowse a,
        .woocommerce-active .storeflex-product-btns-icons> a span,
        .woocommerce-active ul.products li.product span.onsale,
        .woocommerce-active li.product span.onsale,
        .widget li.wc-block-product-categories-list-item:hover,
        .wc-block-active-filters__clear-all span,
        .wc-block-components-filter-reset-button span,
        .storeflex-call-block-wrapper:hover .storeflex-call-to-action-button,
        .single .storeflex-container .single_add_to_cart_button.button.alt,
        .single .woocommerce-noreviews,
        .woocommerce-wishlist .wishlist_table .product-add-to-cart a,
        .archive-style--grid .storeflex-content-wrapper .no-img-post .article-cat-item,
        .storeflex-content-wrapper .article-cat-item,
        .archive-style--classic .storeflex-content-wrapper .no-img-post .article-cat-item,
        .archive-style--list .storeflex-content-wrapper .article-cat-item,
        .single-product .add_to_wishlist.single_add_to_wishlist,
        .woocommerce .storeflex-login-form-wrapper .woocommerce-form-login .woocommerce-form-login__submit,
        .woocommerce-account .woocommerce-info,
        .woocommerce-account .woocommerce-info::before,
        .woocommerce-checkout .woocommerce-info,
        .woocommerce-checkout .woocommerce-info::before,
        .woocommerce-cart .woocommerce-info,
        .woocommerce-cart .woocommerce-info::before,
        .woocommerce .storeflex-post-sidebar-wrapper span.onsale,
        .widget .wc-block-grid__product-onsale span,
        .wc-block-grid__product:hover  .add_to_cart_button:hover,.woocommerce-cart .cart .button,.woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled, .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled[disabled],
        .woocommerce-account .woocommerce-Address .title .edit,
        .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit,
        .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button,
        .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button,
        .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button,
        :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit,
        :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button,
        :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button,
        :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button,
        .woocommerce-checkout .wc-block-components-checkout-return-to-cart-button,
        .woocommerce-checkout .wc-block-components-totals-coupon-link,button,
        .woocommerce-active ul.products li.product .storeflex-out-of-stock-message,
        .woocommerce-active li.product .storeflex-out-of-stock-message,
        .woocommerce-checkout:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt,
         .woocommerce-message, .woocommerce-info, .woocommerce-error, .woocommerce-noreviews, p.no-comments, .wp-block-button__link ,
         .editor-styles-wrapper .wp-block-button__link, .wc-block-components-button:not(.is-link), .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,         .woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link :hover,
         .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link:hover,  .cart-icon .cart-count, .storeflex-wishlist .storeflex-wl-counter, .related.products> h2::before,.related.products> h2::after, .widget.widget_product_categories li.cat-item:hover,.widget.widget_product_tag_cloud a.tag-cloud-link:hover,
         .navigation .nav-links a.page-numbers:hover, .storeflex-scrollup:hover, .navigation .nav-links .page-numbers.current, body.storeflex-site-layout--boxed-layout, .widget .wc-block-grid__product-onsale span {background-color: ". esc_attr( $primary_theme_color ) ."}\n";

           //primary theme Color
         $custom_css .= " #site-navigation ul li.current-menu-item>a,
          #site-navigation ul li.current-page-item>a,
         .storeflex-product-btns-icons a.add_to_wishlist i,
         #site-navigation ul li.current-menu-ancestor>a, #site-navigation ul.sub-menu li:hover>a,
         #site-navigation ul.children:hover ,entry-summary a,
        .wc-block-components-formatted-money-amount,
         #site-navigation ul li:hover>a, #site-navigation ul li.focus>a,
         .wc-block-grid__product:hover  .add_to_cart_button,
         .widget .wp-block-woocommerce-customer-account .label,
         .widget .woocommerce .woocommerce-breadcrumb a,
         .woocommerce nav.woocommerce-pagination ul li span.current,
         .woocommerce-cart .woocommerce .product-quantity .quantity .qty,
         .woocommerce-cart .wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,
         .woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
         .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
         .woocommerce nav.woocommerce-pagination ul li a, .storeflex-scrollup, .woocommerce nav.woocommerce-pagination ul li span,  .woocommerce .storeflex-breadcrumb-container .woocommerce-breadcrumb a,
         .storeflex-product-btns-icons a.add_to_wishlist:hover i::before,.storeflex-product-grid-button a{color: ". esc_attr( $primary_theme_color ) ."}\n";

        // Border Color
        $custom_css .= ".navigation .nav-links a:hover,button,
        .bttn:hover,
        input[type='button']:hover,
        input[type='reset']:hover,
        input[type='submit']:hover,
        .widget li.wc-block-product-categories-list-item:hover,
        .wc-block-components-quantity-selector,
        .wc-block-components-notice-banner.is-error,
        .wc-block-components-notice-banner.is-error>svg,
        .wc-block-grid__product:hover  .add_to_cart_button,
        .woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
         .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,.button-back-home, input[type='submit'] {border-color: ". esc_attr( $primary_theme_color ) ."}\n";

         // border-top Color
        $custom_css .= ".woocommerce-account .woocommerce-info,
        .woocommerce-account .woocommerce-info::before,
        .woocommerce-checkout .woocommerce-info,
        .woocommerce-checkout .woocommerce-info::before,
        .woocommerce-cart .woocommerce-info,
        .woocommerce-cart .woocommerce-info::before, .woocommerce-message,#site-navigation .menu-item-description::after {border-top-color: ". esc_attr(  $primary_theme_color ) ."}\n";

        // border-left Color
        $custom_css .= ".woocommerce-active .storeflex-product-btns-icons>a span::before  {border-left-color: ". esc_attr(  $primary_theme_color ) ."}\n";

        //border bottom color
        $custom_css .= ".storeflex-banner-wrapper .feature-content-wrap .buy-now-button a {border-bottom-color: ". esc_attr(  $primary_theme_color ) ."}\n";

        // Text Color
        $custom_css .= " a, .storeflex-footer .footer-info-wrap i::before, .storeflex-footer .storeflex-bottom-footer a, .storeflex-footer .storeflex-bottom-footer span, .storeflex-middle-header .site-header-cart .woocommerce ul.cart_list li a, .storeflex-middle-header .site-header-cart .woocommerce ul.product_list_widget li a, .widget span.wc-block-product-categories-list-item-count, .entry-content a, #site-navigation ul li.focus>a,
        .woocommerce-wishlist .woocommerce-Price-amount.amount,
        .widget li.wc-block-product-categories-list-item:hover,
       .storeflex-footer .footer-info-wrap,.storeflex-footer .storeflex-footer-info-description,
       .entry-content p, p ,.author-description ,.author-website , .top-header-text, .site-branding, .testimonial-avatar-description, .wc-block-grid__product .wc-block-grid__product-image:not(.wc-block-components-product-image),
       .wc-block-grid__product .wc-block-grid__product-title{color: ". esc_attr( $text_color ) ."}\n";


        // Link Color
        $custom_css .= ".author-website a {color: ". esc_attr( $link_color ) ."}\n";

        // Link Hover Color
        $custom_css .= ".wp-block-woocommerce-empty-cart-block .wc-block-grid__product .wc-block-grid__product-title:hover, a:hover, .byline:hover a, .byline:hover, .comments-link:hover a, .comments-link:hover, footer.wp-block-latest-comments__comment-meta:hover,  footer.wp-block-latest-comments__comment-meta:hover a, .cat-links:hover a, .cat-links:hover, .storeflex-single-category-wrapper .category-title a:hover, .woocommerce-loop-product__title:hover, ul.products li.product .woocommerce-loop-product__title:hover,.widget a:hover, .widget a:hover::before, .widget li:hover::before{color: ". esc_attr(  $link_hover_color ) ."}\n";

        if ( storeflex_is_active_woocommerce () ) :

            $front_fullwidth_blocks = storeflex_get_customizer_option_value( 'front_fullwidth_blocks' );

            $front_fullwidth_blocks = json_decode($front_fullwidth_blocks);

             foreach ( $front_fullwidth_blocks as $block ) :

                if ( $block->type == 'call-to-action' ) :

                    if( $block->option == true ) :

                        $call_to_action_img = $block->imgSrc;

                        if ( ! empty ( $call_to_action_img ) ) :

                            $custom_css .=".storeflex-call-block-wrapper {background-image:url(". esc_url( $call_to_action_img ) .")}\n";

                        endif;

                    endif;

                endif;

            endforeach;

        endif;

         // Site logo max width
        if ( ! empty( $site_logo_width ) ) {
            $custom_css .= ".site-branding a img {max-width:". esc_attr( $site_logo_width ) ."px;}";
        }

        // site logo max width in tablet
        if ( ! empty( $site_logo_width_tablet ) ) {
            $custom_css .= "@media (max-width: 1100px) and (min-width: 768px) { .site-branding a img{ max-width: ". esc_attr( $site_logo_width_tablet ) ."px;}}\n";
        }

        // site logo max width in tablet
        if ( ! empty( $site_logo_width_mobile ) ) {
            $custom_css .= "@media (max-width: 767px) { .site-branding a img{ max-width: ". esc_attr( $site_logo_width_mobile ) ."px;}}\n";
        }


        if ( ! empty( $custom_css ) ) {
            $output_css .= $custom_css;
        }

        return $output_css;

    }

endif;
add_filter( 'storeflex_head_css', 'storeflex_general_css' );

/*---------------------- Typography CSS-------------------------*/

    if ( ! function_exists( 'storeflex_typography_css' ) ) :

    /**
     * function to handle the typography css.
     *
     * @since 1.0.0
     */
    function storeflex_typography_css( $output_css ) {

        $custom_css = '';

        /**
         * Body typography
         */
        $storeflex_body_font_family       = storeflex_get_customizer_option_value( 'storeflex_body_font_family' );
        $storeflex_body_font_weight       = storeflex_get_actual_font_weight( storeflex_get_customizer_option_value( 'storeflex_body_font_weight' ) );
        $storeflex_body_font_style        = storeflex_get_customizer_option_value( 'storeflex_body_font_style' );
        $storeflex_body_font_transform    = storeflex_get_customizer_option_value( 'storeflex_body_font_transform' );
        $storeflex_body_font_decoration   = storeflex_get_customizer_option_value( 'storeflex_body_font_decoration' );

        $custom_css .= "body{
            font-family:        $storeflex_body_font_family;
            font-style:         $storeflex_body_font_style;
            font-weight:        $storeflex_body_font_weight;
            text-decoration:    $storeflex_body_font_decoration;
            text-transform:     $storeflex_body_font_transform;
        }\n";

         /**
         * H1 to H6 typography
         */
        $storeflex_heading_font_family       = storeflex_get_customizer_option_value( 'storeflex_heading_font_family' );
        $storeflex_heading_font_weight       = storeflex_get_customizer_option_value( 'storeflex_heading_font_weight' );
        $storeflex_heading_font_style        = storeflex_get_customizer_option_value( 'storeflex_heading_font_style' );
        $storeflex_heading_font_transform    = storeflex_get_customizer_option_value( 'storeflex_heading_font_transform' );
        $storeflex_heading_font_decoration   = storeflex_get_customizer_option_value( 'storeflex_heading_font_decoration' );

        $custom_css .= "h1, h2, h3, h4, h5, h6 {
            font-family:        $storeflex_heading_font_family;
            font-style:         $storeflex_heading_font_style;
            font-weight:        $storeflex_heading_font_weight;
            text-decoration:    $storeflex_heading_font_decoration;
            text-transform:     $storeflex_heading_font_transform;
        }\n";

         /**
         * Product typography
         */
        $storeflex_products_font_family       = storeflex_get_customizer_option_value( 'storeflex_products_font_family' );
        $storeflex_products_font_weight       = storeflex_get_customizer_option_value( 'storeflex_products_font_weight' );
        $storeflex_products_font_style        = storeflex_get_customizer_option_value( 'storeflex_products_font_style' );
        $storeflex_products_font_transform    = storeflex_get_customizer_option_value( 'storeflex_products_font_transform' );
        $storeflex_products_font_decoration   = storeflex_get_customizer_option_value( 'storeflex_products_font_decoration' );

        $custom_css .= " .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title {
            font-family:        $storeflex_products_font_family;
            font-style:         $storeflex_products_font_style;
            font-weight:        $storeflex_products_font_weight;
            text-decoration:    $storeflex_products_font_decoration;
            text-transform:     $storeflex_products_font_transform;
        }\n";

         /**
         * Site title typography
         */
        $storeflex_site_title_font_family       = storeflex_get_customizer_option_value( 'storeflex_site_title_font_family' );
        $storeflex_site_title_font_weight       = storeflex_get_customizer_option_value( 'storeflex_site_title_font_weight' );

        $custom_css .= " .site-title {
            font-family:        $storeflex_site_title_font_family;
            font-weight:        $storeflex_site_title_font_weight;
        }\n";

         /**
         * Site tagline typography
         */
        $storeflex_site_tagline_font_family       = storeflex_get_customizer_option_value( 'storeflex_site_tagline_font_family' );
        $storeflex_site_tagline_font_weight       = storeflex_get_customizer_option_value( 'storeflex_site_tagline_font_weight' );

        $custom_css .= " .site-description {
            font-family:        $storeflex_site_tagline_font_family;
            font-weight:        $storeflex_site_tagline_font_weight;
        }\n";

        if ( ! empty( $custom_css ) ) {
            $output_css .= '/*/ Typography CSS /*/'. $custom_css;
        }

        return $output_css;
    }

endif;

add_filter( 'storeflex_head_css', 'storeflex_typography_css' );