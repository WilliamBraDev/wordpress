<?php
/**
 * Partial template to display bottom footer
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="storeflex-bottom-footer">
    <div class=" storeflex-container storeflex-flex">
        <div class="storeflex-footer-text">

            <span class="copyright-content">
                <?php
                    $bottom_footer_area =  storeflex_get_customizer_option_value( 'storeflex_bottom_footer_field' );
                    echo wp_kses_post( str_replace( '{year}', date('Y'), $bottom_footer_area ) );
                ?>
            </span>
            <a href="<?php echo esc_url( __( 'https://mysterythemes.com/', 'storeflex' ) ); ?>" target="_blank" <?php storeflex_schema_markup( 'url' ) ?>>
                <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf( esc_html__( 'Built with StoreFlex by %s', 'storeflex' ), 'Mystery Themes' );
                ?>
            </a>

        </div> <!-- storeflex-footer-text -->
        <?php

            $social_icons_in_footer = storeflex_get_customizer_option_value( 'storeflex_enable_social_icon_in_footer' );

            if ( $social_icons_in_footer == true ) :

                /**
                 * require file to display social icons in footer bottom area
                 *
                 * @since 1.0.0
                 */
                get_template_part( 'template-parts/header/partials/content', 'social-icons' );

            endif;

        ?>

    </div> <!-- storeflex-container -->
</div> <!-- storeflex-bottom-footer -->