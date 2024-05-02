<?php
/**
 * Required functions for woocommerce or its extensions.
 * 
 * @package StoreFlex
 */


/**
 * Check if woocommerce is activated.
 */
function storeflex_is_active_woocommerce() {
    if ( class_exists( 'WooCommerce' ) ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Check if wishlist is activated.
 */
function storeflex_is_active_wishlist() {
    if ( function_exists( 'YITH_WCWL' ) ) {
        return true;
    } else {
        return false;
    }
}