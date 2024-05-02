<?php
/**
 * Hooks for handling woocommerce hooks.
 *
 * @package StoreFlex
 */

if ( ! function_exists( 'storeflex_remove_wc_sidebar' ) ) :

     /**
     *  Removing default sidebar from woo commerce
     *
     * @since 1.0.0
     *
     * */
    function storeflex_remove_wc_sidebar() {

        if ( class_exists ( 'WooCommerce' ) ) {

            remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
        }
    }

    add_action( 'init', 'storeflex_remove_wc_sidebar' );

endif;

if ( ! function_exists( 'storeflex_cart_before_form' ) ) :

   /**
     * Adding div class before cart page
     *
     * @since 1.0.0
     *
     */
    function storeflex_cart_before_form() {

        echo '<div class="storeflex-cart-wrapper">';
    }

endif;

add_action( 'woocommerce_before_cart', 'storeflex_cart_before_form', 10 );

if ( ! function_exists( 'storeflex_cart_after_form' ) ) :

   /**
     *
     * Closing div class after cart page
     *
     * @since 1.0.0
     *
     */
    function storeflex_cart_after_form() {

        echo '</div> <!--storeflex-cart-form -->';
    }

endif;

add_action( 'woocommerce_after_cart', 'storeflex_cart_after_form', 10 );

if ( ! function_exists( 'storeflex_checkout_before_form' ) ) :

    /**
     * Adding div class before checkout page
     *
     * @since 1.0.0
     */
    function storeflex_checkout_before_form() {

        echo '<div class="storeflex-checkout-wrapper">';
    }

endif;

add_action( 'woocommerce_before_checkout_form', 'storeflex_checkout_before_form', 10 );


if ( ! function_exists( 'storeflex_checkout_after_form' ) ) :

     /**
     *
     * Closing div class after checkout page
     *
     * @since 1.0.0
     */
    function storeflex_checkout_after_form() {

        echo '</div> <!-- storeflex-checkout-wrapper -->';
    }

endif;

add_action( 'woocommerce_after_checkout_form', 'storeflex_checkout_after_form', 10 );

if ( ! function_exists( 'storeflex_container_before_main_content' ) ) :

    /**
     *
     * Adding div class before main content
     *
     * @since 1.0.0
     */
    function storeflex_container_before_main_content() {

        echo '<div class="storeflex-woocommerce-wrapper storeflex-clearfix">';
    }

endif;

add_action('woocommerce_before_main_content', 'storeflex_container_before_main_content', 5);

if ( ! function_exists( 'storeflex_container_after_main_content' ) ) :

    /**
     *
     * Closing div class after main content
     *
     * @since 1.0.0
     */
    function storeflex_container_after_main_content() {

        echo '</div><!-- .storeflex-woocommerce-wrapper -->';
    }

endif;

add_action('woocommerce_after_main_content', 'storeflex_container_after_main_content', 10);

if ( ! function_exists ( 'storeflex_thumb_wrapper_open' ) ):

    /**
     *
     * Adding div class for thumbs in shop loop
     *
     * @since 1.0.0
     */
    function storeflex_thumb_wrapper_open() {

        echo '<div class="storeflex-thumbs-wrapper">';

    }

endif;

add_action( 'woocommerce_before_shop_loop_item_title', 'storeflex_thumb_wrapper_open', 5 );

/**
 *
 * Adding add to cart action on thumbs div
 *
 * @since 1.0.0
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20 );

if ( ! function_exists ('storeflex_thumb_wrapper_close') ):

    /**
     *
     * Closing div class for thumbs in shop loop
     *
     * @since 1.0.0
     */
    function storeflex_thumb_wrapper_close() {

        echo '</div> <!-- storeflex-thumbs-wrapper -->';

    }
endif;

add_action( 'woocommerce_before_shop_loop_item_title', 'storeflex_thumb_wrapper_close', 25 );

if ( ! function_exists( 'storeflex_before_shop_loop' ) ) :

    /**
     *
     * Adding div class and sidebar before shop loop
     *
     * @since 1.0.0
     */
    function storeflex_before_shop_loop() {

        echo '<div class="storeflex-shop-sidebar-wrapper">';

        $storeflex_archieve_and_blog_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_archive_and_blog_sidebar_layout' );

        if ( $storeflex_archieve_and_blog_sidebar_layout == 'left-sidebar'  ) {
            get_template_part( 'sidebar' , 'shop' );
        }

        echo '<div id="primary"  class="storeflex-shop-wrapper">';

    }

endif;

add_action( 'woocommerce_before_shop_loop', 'storeflex_before_shop_loop', 15 );


if ( ! function_exists( 'storeflex_after_shop_loop' ) ) :

    /**
     *
     * Closing div class and adding sidebar after shop loop
     *
     * @since 1.0.0
     */
    function storeflex_after_shop_loop() {

        echo '</div> <!-- storeflex-shop-wrapper -->';

        $storeflex_archieve_and_blog_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_archive_and_blog_sidebar_layout' );

        if ( $storeflex_archieve_and_blog_sidebar_layout == 'right-sidebar'  ) {
            get_template_part( 'sidebar' , 'shop' );
        }

        echo '</div> <!-- storeflex-shop-sidebar-wrapper -->';

    }

endif;

add_action( 'woocommerce_after_shop_loop', 'storeflex_after_shop_loop', 15 );

if ( ! function_exists( 'storeflex_woocommerce_add_to_cart_text' ) ) :

    /**
     * Function link modified for add to cart
     *
     * @since 1.0.0
     */
    function storeflex_woocommerce_add_to_cart_text( $link, $product, $args ) {

        if ( ! $product->is_in_stock() ) {
            $modified_link = sprintf(
                '<a href="%s" class="%s out-of-stock" %s> <i class="bx bx-book-reader"></i><span>%s</span></a>',
                esc_url( get_permalink( $product->get_id() ) ),
                esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                esc_html__( 'Read More', 'storeflex' )
            );
        } else {
            $modified_link = sprintf(
                '<a href="%s" data-quantity="%s" class="%s" %s><i class="bx bx-cart"></i><span>%s</span></a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                esc_html__( 'Add to cart', 'storeflex' )
            );
        }

        return $modified_link;
    }

endif;

add_filter( 'woocommerce_loop_add_to_cart_link', 'storeflex_woocommerce_add_to_cart_text', 10, 3 );

if ( ! function_exists( 'storeflex_before_single_product' ) ) :
    /**
     *
     * Adding div class before single product and adding sidebar
     *
     * @since 1.0.0
     *
     */
    function storeflex_before_single_product() {

        echo '<div class="storeflex-shop-sidebar-wrapper storeflex-clearfix">';

        $storeflex_post_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_post_sidebar_layout' );

        if ( $storeflex_post_sidebar_layout == 'left-sidebar'  ) {
            get_template_part( 'sidebar' , 'shop' );
        }

        if ( $storeflex_post_sidebar_layout ) {

           echo '<div id="primary">';

        }

    }

endif;

add_action( 'woocommerce_before_single_product', 'storeflex_before_single_product', 15 );

if ( ! function_exists( 'storeflex_after_single_product' ) ) :

    /**
     *
     *  Closing div class on single product and adding right sidebar
     *
     *  @since 1.0.0
     */
    function storeflex_after_single_product() {

        $storeflex_post_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_post_sidebar_layout' );

        if ( $storeflex_post_sidebar_layout == 'right-sidebar'  ) {

            echo '</div> <!-- #primary -->';

            get_template_part( 'sidebar' , 'shop' );
        }

        if ( $storeflex_post_sidebar_layout != 'right-sidebar'  ) {

            echo '</div> <!-- #primary -->';
        }

        echo '</div> <!-- storeflex-shop-sidebar-wrapper -->';
    }

endif;

add_action( 'woocommerce_after_single_product', 'storeflex_after_single_product', 15 );

if ( ! function_exists( 'storeflex_before_breadcrumb_container' ) ) :

    /**
     *
     * Adding div class before woo commerce breadcrumb
     *
     * @since 1.0.0
     */
    function storeflex_before_breadcrumb_container() {

        echo '<div class="storeflex-breadcrumb-container">';
    }

endif;

add_action( 'woocommerce_before_main_content' , 'storeflex_before_breadcrumb_container' , 1 );

/**
  * Adding breadcrumb action on woocommerce breadcrumb hooked 2
  *
  * @hooked woocommerce_breadcrumb - 2
  *
  * @since 1.0.0
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 2 );

if ( ! function_exists( 'storeflex_after_breadcrumb_container' ) ) :

    /**
     *
     *  Closing div class on breadcrumb
     *
     *  @since 1.0.0
     */
    function storeflex_after_breadcrumb_container() {

        echo '</div> <!-- storeflex-breadcrumb-container -->';
    }

endif;

add_action( 'woocommerce_before_main_content' , 'storeflex_after_breadcrumb_container' , 3 );

if ( ! function_exists( 'storeflex_container_before_login_form' ) ) :

    /**
     *
     * Adding div class for login form
     *
     * @since 1.0.0
     *
     * */
    function storeflex_container_before_login_form() {

        echo '<div class="storeflex-login-form-wrapper">';
    }

endif;

add_action( 'woocommerce_before_customer_login_form', 'storeflex_container_before_login_form', 10 );


if ( ! function_exists( 'storeflex_container_after_login_form' ) ) :

    /**
     *
     * Closing div class for login page
     *
     * @since 1.0.0
     */
    function storeflex_container_after_login_form() {

        echo '</div> <!-- storeflex-login-form-wrapper -->';
    }

endif;

add_action('woocommerce_after_customer_login_form', 'storeflex_container_after_login_form', 10 );

if ( ! function_exists ( 'storeflex_show_out_of_stock_message') ) :

    /**
     * Display out of stock tag
     *
     * @since 1.0.0
     */
    function storeflex_show_out_of_stock_message() {
        global $product;

        if (!$product->is_in_stock()) {
            echo '<div class="storeflex-out-of-stock-message">';
            echo esc_html( 'Out of Stock', 'storeflex' );
            echo '</div> <!-- storeflex-out-of-stock-message -->';
        }
    }

endif;

add_action('woocommerce_before_shop_loop_item_title', 'storeflex_show_out_of_stock_message' , 22 );

if ( !function_exists( 'storeflex_myaccount_customer_avatar' ) ) :

    /**
     * Print the customer avatar and name in My Account page, after the welcome message
     *
     * @since 1.0.0
     */
    function storeflex_myaccount_customer_avatar() {
        $current_user = wp_get_current_user();

        echo '<div class="storeflex-myaccount-wrapper storeflex-clearfix">';
        echo '<div class="storeflex-myaccount-avatar">';
        echo get_avatar( $current_user->user_email, 72, '', $current_user->display_name );
        echo '</div> <!-- storeflex-myaccount-avatar -->';
        echo '</div> <!-- storeflex-myaccount-wrapper -->';
    }

endif;

add_action( 'woocommerce_account_navigation', 'storeflex_myaccount_customer_avatar', 5 );

if ( ! function_exists( 'storeflex_add_extra_product_thumbs' ) ) :

    /**
     *
     * Thumb from gallery on hover
     *
     * @since 1.0.0
     *
     */
    function storeflex_add_extra_product_thumbs() {

        $products_gallery = storeflex_get_customizer_option_value( 'storeflex_enable_display_product_gallery' );

        if ( $products_gallery  == true ) :

            global $product;

            $attachment_ids = $product->get_gallery_image_ids();

            if ( ! empty( $attachment_ids ) ) :

                echo '<div class="storeflex-product-thumbs">';

                foreach ( array_slice( $attachment_ids , 0, 1 ) as $attachment_id ) {
                    $thumbnail_info = wp_get_attachment_image_src( $attachment_id, 'full' );

                    if ( is_array( $thumbnail_info ) ) {
                        $thumbnail_url = $thumbnail_info[0];
                        $product_url = get_permalink( $product->get_id() );
                        echo '<a href="' . esc_url( $product_url ) . '"><img class="storeflex-gallery-thumb" src="' . $thumbnail_url . '"></a>';
                    }
                }

                echo '</div> <!-- storeflex-product-thumbs -->';

            endif;

        endif;
    }

endif;

add_action( 'woocommerce_shop_loop_item_title', 'storeflex_add_extra_product_thumbs', 5 );

if ( ! function_exists( 'storeflex_display_flash_badge_html' ) ) :

    /**
     * Display flash discount badge in product loop
     *
     * Woocommerce Product badge
     *
     * @since 1.0.0
     */
    function storeflex_display_flash_badge_html( $price, $product ) {

        $flash_badge = storeflex_get_customizer_option_value( 'storeflex_enable_display_sale_badge' );

        if ( true == $flash_badge ) :

            if ( $product->is_on_sale() && ! is_admin() && ! $product->is_type( 'variable' ) && ! $product->is_type( 'grouped' ) ) {

                $regular_price = (float) $product->get_regular_price();
                $sale_price = (float) $product->get_price();

                $precision = 1;
                $saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';

                $price .= sprintf( __('<div class="storeflex-sale-percentage-badge">%s OFF</div>', 'storeflex' ), $saving_percentage );
            }

        endif;

        return $price;
    }

endif;

add_filter( 'woocommerce_get_price_html', 'storeflex_display_flash_badge_html', 10, 2 );