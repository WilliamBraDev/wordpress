<?php
/**
 * File to handle the fullwidth product carousel.
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

$product_carousel_custom_class[] = 'storeflex-front-page-block';
$product_carousel_custom_class[] = 'storeflex-'.$block_options->type.'-block';

?>

<section class="<?php echo esc_attr( implode( ' ', $product_carousel_custom_class ) ); ?>">

    <div class="storeflex-container">

    <?php
    	if ( $block_options->blockTitle == null ) {
			if ( $block_options->category == 'all' ) {
			    echo '<h2 class="storeflex-title">' . esc_html__( 'All Products', 'storeflex' ) . '</h2>';
			} else {
			    echo '<h2 class="storeflex-title">' . esc_html( $block_options->category ) . '</h2>';
			}
		} else {
			echo '<h2 class="storeflex-title">' . esc_html( $block_options->blockTitle ) . '</h2>';	
		}
	?>

        <div id="product-carousel" class="storeflex-product-carousel-wrapper">

		<?php
			$order_by           = explode( '-', $block_options->postOrderby );
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

    	</div><!-- .storeflex-product-carousel-wrapper -->

	</div> <!-- storeflex-container -->

</section><!-- .testimonail-block -->