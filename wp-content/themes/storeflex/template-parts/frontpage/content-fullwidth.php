<?php
/**
 * Partial template to display full width on the homepage
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( storeflex_is_active_woocommerce () ) :

$front_fullwidth_blocks = storeflex_get_customizer_option_value( 'front_fullwidth_blocks' );

if ( empty ( $front_fullwidth_blocks ) ) {
    return;
}

$front_fullwidth_blocks = json_decode($front_fullwidth_blocks);

if ( ! in_array( true, array_column( $front_fullwidth_blocks , 'option' ) ) ) {
    return;
}
?>

<div id="frontpage-fullwidth-section" class="frontpage-section storeflex-clearfix">
    <?php
        foreach ( $front_fullwidth_blocks as $block ) :

            if ( $block->option == true ) :

                $block_type = $block->type;

                switch ( $block_type ) {

                    case 'ad-block' :

                        $block_args = array(
                            'block_options' => $block
                        );

                         /**
                         * require file to display ad block in fullwidth.
                         *
                         * @since 1.0.0
                         */
                        get_template_part( 'template-parts/frontpage/partials/content', 'ad-block', $block_args );

                        break;


                    case 'category-block' :

                        $block_args = array(
                            'block_options' => $block
                        );

                        /**
                         * require file to display category block in fullwidth.
                         *
                         * @since 1.0.0
                         */
                        get_template_part( 'template-parts/frontpage/partials/content', 'category-block', $block_args );

                        break;

                    case 'product-grid' :

                        $block_args = array(
                            'block_options' => $block
                        );

                        /**
                         * require file to display product grid block in fullwidth.
                         *
                         * @since 1.0.0
                         */
                        get_template_part( 'template-parts/frontpage/partials/content', 'product-grid', $block_args );

                        break;

                    case 'product-carousel' :
                        
                         $block_args = array(
                            'block_options' => $block
                        );

                         /**
                         * require file to display product carousel block in fullwidth.
                         *
                         * @since 1.0.0
                         */
                        get_template_part( 'template-parts/frontpage/partials/content', 'product-carousel', $block_args );

                        break;

                    case 'call-to-action' :

                        $block_args = array(
                            'block_options' => $block
                        );

                        /**
                         * require file to display call to action block in fullwidth.
                         *
                         * @since 1.0.0
                         */
                        get_template_part( 'template-parts/frontpage/partials/content', 'call-to-action', $block_args );

                        break;
                }
    
            endif;

        endforeach;
    ?>
</div><!-- #frontpage-fullwidth-section -->

<?php endif; ?>