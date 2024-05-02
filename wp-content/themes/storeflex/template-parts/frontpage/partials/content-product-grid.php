<?php
/**
 * File to handle the fullwidth product grid block.
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

$product_grid_custom_class[] = 'storeflex-front-page-block';
$product_grid_custom_class[] = 'storeflex-'.$block_options->type.'-block';

if ($block_options->category == 'all') {
    $button_url   = get_permalink( wc_get_page_id( 'shop' ) );
} else {
    $category     = get_term_by( 'slug', $block_options->category, 'product_cat' );
	$button_url   = get_term_link( $category, 'product_cat' );
}

?>

<section class="<?php echo esc_attr( implode( ' ', $product_grid_custom_class ) ); ?>">

    <div class="storeflex-container">

    <?php
    	if ( $block_options->blockTitle == null ) {
			if ($block_options->category == 'all') {
			    echo '<h2 class="storeflex-title">' . esc_html__( 'All Products', 'storeflex' ) . '</h2>';
			} else {
			    echo '<h2 class="storeflex-title">' . esc_html( $block_options->category ) . '</h2>';
			}
		} else {
			echo '<h2 class="storeflex-title">' . esc_html( $block_options->blockTitle ) . '</h2>';	
		}
	?>

        <div class="storeflex-product-grid-wrapper">
		<?php
			$order_by = explode( '-', $block_options->postOrderby );

        	$products_args = array(
			    'post_type'      => 'product',
			    'orderby'        => esc_attr( $order_by[0] ),
			    'order'          => esc_attr( $order_by[1] ),
			    'posts_per_page' => esc_attr( storeflex_woocommerce_product_count( $block_options->postCount ) ),
			);

			if ( $block_options->category !== 'all' ) {
			    $products_args['tax_query'] = array(
			        array(
			            'taxonomy' => 'product_cat',
			            'field'    => 'slug',
			            'terms'    => esc_attr( $block_options->category ),
			        ),
			    );
			}

			$product_query = new WP_Query( $products_args );

            if ( $product_query -> have_posts() ) :
                while ( $product_query -> have_posts() ) : $product_query -> the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;
            endif;
            wp_reset_postdata();
	?>

    	</div><!-- .storeflex-block-wrapper -->

    	<?php if ( ! empty ( $block_options->buttonTitle ) ) : ?>
                <div class="storeflex-product-grid-btn-wrapper">
    			    <a class="storeflex-product-grid-button" href="<?php echo esc_url( $button_url ); ?>" <?php storeflex_schema_markup( 'url' ); ?>>
    			        <?php echo esc_html( $block_options->buttonTitle ) ?>
    			    </a> <!-- storeflex-product-grid-btn-wrapper -->
			     </div>
		<?php endif; ?>

	</div> <!-- storeflex-container -->

</section><!-- .testimonail-block -->