<?php

/**
 * Partial template to display header
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

?>

<header id="masthead" class="site-header" <?php storeflex_schema_markup( 'header' ); ?>>

    <div class="storeflex-top-header ">

        <div class="storeflex-container storeflex-clearfix storeflex-flex">

        <?php
            /**
             * require file to display social icons in header
             *
             * @since 1.0.0
             */
            get_template_part( 'template-parts/header/partials/content', 'social-icons' );

            $header_text = storeflex_get_customizer_option_value( 'storeflex_top_header_text_field' );

            if ( ! empty ( $header_text ) ) :

        ?>

                <div class="top-header-text">
                    <span><i class="bx bx-time"></i><?php echo $header_text ?></span>
                </div> <!-- top-header-text -->
        		
        <?php endif ; ?>
                <div class="header-elements-wrapper">
                <?php
                    /**
                     * require file to display site mode in header
                     *
                     * @since 1.0.0
                     */
                    get_template_part( 'template-parts/header/partials/content', 'site-mode' );

                    /**
                     * require file to display search in header
                     *
                     * @since 1.0.0
                     */
                    get_template_part( 'template-parts/header/partials/content', 'search' );

                ?>
        		</div><!-- .header-elements-wrapper -->

        </div> <!-- storeflex-container -->

    </div> <!-- storeflex-top-header -->

    <div class="storeflex-middle-header ">

        <div class="storeflex-container storeflex-clearfix storeflex-flex">

            <div class="storeflex-menu-wrapper">

                <nav id="site-navigation" class="main-navigation">
                    <button class="storeflex-menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( '', 'storeflex' ); ?> <i class="bx bx-menu"> </i> </button>
                        <div class="primary-menu-wrap">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                )
                            );
                            ?>
                        </div><!-- primary-menu-wrap -->
                </nav><!-- #site-navigation -->

            </div><!--  storeflex-menu-wrapper-->

             <div class="site-branding" <?php storeflex_schema_markup( 'logo' ); ?>>

                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" <?php storeflex_schema_markup( 'url' ); ?>><?php bloginfo('name'); ?></a></h1>
                <?php
                else :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" <?php storeflex_schema_markup( 'url' ); ?>><?php bloginfo('name'); ?></a></h1>
                <?php
                endif;
                $storeflex_description = get_bloginfo( 'description', 'display' );
                if ( $storeflex_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $storeflex_description; // phpcs:ignore  WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>

            </div><!-- .site-branding -->

            <div class="header-woo-links-wrap">
                <?php
                if ( storeflex_is_active_woocommerce() ) :

                    storeflex_woocommerce_header_cart();
                    storeflex_header_wishlist_link();

                endif;
                ?>
            </div><!-- .header-woo-links-wrap -->

        </div> <!-- storeflex-container -->

    </div> <!-- storeflex-middle-header -->

</header><!-- #masthead -->