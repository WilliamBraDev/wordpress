<?php
/**
 * File to handle the fullwidth category block.
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$storeflex_total_products = storeflex_get_product_count();
if ( $storeflex_total_products == 0 ) {
    return;
} 

extract( $args );

?>
<section class="storeflex-front-page-block storeflex-category-block">

    <div class="storeflex-container">

        <div class="storeflex-category-block-wrapper">

            <h2 class="storeflex-title"><?php echo esc_html( $block_options->blockTitle ); ?></h2>

            <div class="storeflex-single-category-wrapper storeflex-clearfix">
            <?php
                $taxonomy          = 'product_cat';
                $section_cat_slugs = get_terms( 
                    array(
                        'taxonomy' => $taxonomy,
                        'orderby'  => 'name',
                        'order'    => $block_options->postOrderby,
                    ) 
                );

                $counter = 0;

                foreach ( $section_cat_slugs as $section_cat_slug ) {
                    $cat_id        = $section_cat_slug->term_id;
                    $cat_name      = $section_cat_slug->name;
                    $cat_count     = $section_cat_slug->count;
                    $thumbnail_id  = get_term_meta( $cat_id, 'thumbnail_id', true );
                    $cat_link      = get_term_link( $cat_id, $taxonomy );

                    echo '<div class="single-category ' . ( empty( $thumbnail_id ) ? 'no-img' : '' ) . '">';

                        if ( ! empty( $thumbnail_id ) && $counter < storeflex_woocommerce_category_count( $block_options->postCount ) ) :
                        ?>
                  		<div class="category-image">
                            <a href="<?php echo esc_url( $cat_link ); ?>">
                                <?php echo wp_get_attachment_image( $thumbnail_id, 'thumbnail' ); ?>
                            </a>
                 		</div>
                        <?php endif; ?>

                        <?php if ( $block_options->productCount == true ) : ?>
                            <h4 class="category-title small-font">
                                <a href="<?php echo esc_url( $cat_link ); ?>" <?php storeflex_schema_markup( 'url' ); ?>>
                                    <?php echo esc_html( $cat_name ) . ' (' . $cat_count . ')'; ?>
                                </a>
                            </h4>
                        <?php else : ?>
                            <h4 class="category-title small-font">
                                <a href="<?php echo esc_url( $cat_link ); ?>" <?php storeflex_schema_markup( 'url' ); ?>>
                                    <?php echo esc_html( $cat_name ); ?>
                                </a>
                            </h4>
                        <?php
                            endif;

                    echo '</div><!-- single-category -->';

                    $counter++;

                    if ( $counter >= storeflex_woocommerce_category_count( $block_options->postCount ) ) {
                        break;
                    }
                }
            ?>
            </div><!-- storeflex-single-category-wrapper -->

        </div><!-- .storeflex-category-block-wrapper -->

    </div> <!-- storeflex-container -->

</section><!-- .storeflex-category-block -->
