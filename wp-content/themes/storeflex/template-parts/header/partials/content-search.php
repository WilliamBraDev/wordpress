<?php
/**
 * Partial template to display search bar
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$search_bar = storeflex_get_customizer_option_value( 'storeflex_enable_search_bar' );
$advance_search_option = storeflex_get_customizer_option_value( 'storeflex_advance_search_option' );

if ( $search_bar == false ) {
    return;
}

if ( $advance_search_option == 'advance-product' ) {

    storeflex_get_advanced_product_search();

} else {
?>


<div class="header-search-wrapper storeflex-icon-elements">

    <span class="search-btn"><a href="javascript:void(0)"><i class="bx bx-search"></i></a></span>

    <div class="storeflex-search-overlay">
        <span id="close-btn"><a href="javascript:void(0)">
            <i class="bx close bx-x"></i></a></span>
        <div class="storeflex-container storeflex-flex">
            <div class="site-branding" <?php storeflex_schema_markup( 'logo' ); ?>>

                <?php 
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" <?php storeflex_schema_markup( 'url' ); ?>><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                else :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" <?php storeflex_schema_markup( 'url' ); ?>><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                endif; 
                ?>
            </div><!-- .site-branding -->
            <div class="storeflex-centered">
                <div id='search-box'>
                    <?php get_search_form(); ?>
                </div><!-- #search-box -->
            </div><!-- storeflex-centered -->

            <div class="header-woo-links-wrap">
                <?php
                    if ( storeflex_is_active_woocommerce() ) :

                        storeflex_woocommerce_search_cart();
                        storeflex_header_wishlist_link();

                    endif;
                ?>
            </div><!-- .header-woo-links-wrap -->
        </div><!-- storeflex-container -->
    </div><!-- #search-overlay -->

</div><!-- .header-search-wrapper -->

<?php } ?>