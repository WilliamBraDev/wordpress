<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package StoreFlex
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function storeflex_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'storeflex_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function storeflex_woocommerce_scripts() {
	wp_enqueue_style( 'storeflex-woocommerce-style', get_template_directory_uri() . '/inc/woocommerce/woocommerce.css', array(), STOREFLEX_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'storeflex-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'storeflex_woocommerce_scripts' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function storeflex_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'storeflex_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function storeflex_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'storeflex_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


/**
 * Add permalink at product title
 */
function woocommerce_template_loop_product_title() {
    echo '<a href="'. esc_url( get_permalink() ) .'"><h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2> </a>';
}

if ( ! function_exists( 'storeflex_woocommerce_cart_link' ) ) :
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function storeflex_woocommerce_cart_link() {
		$storeflex_cart_icon_title = apply_filters( 'storeflex_cart_icon_title', __( 'View your shopping cart', 'storeflex' ) );
?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr( $storeflex_cart_icon_title ); ?>">
			<div class="cart-icon">
				<i class ="bx bx-cart"></i>
				<?php $item_count_text = WC()->cart->get_cart_contents_count(); ?>
				<span class ="cart-count"><?php echo esc_html( $item_count_text ); ?></span>
				<span class ="cart-title"> <?php echo esc_html( 'Cart', 'storeflex' ); ?> </span>
				<span class ="cart-amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
			</div>
		</a>
<?php
	}

endif;

/**
* Display Header Cart.
*
* @return void
*/
if ( ! function_exists( 'storeflex_woocommerce_header_cart' ) ) :

	function storeflex_woocommerce_header_cart() {

		$storeflex_cart_link_option = storeflex_get_customizer_option_value( 'storeflex_enable_woo_cart' );
		if ( true == $storeflex_cart_link_option ) :
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
	?>
			<ul id="site-header-cart" class="site-header-cart">
				<li class="<?php echo esc_attr( $class ); ?>">
					<?php storeflex_woocommerce_cart_link(); ?>
				</li>
				<li>
					<?php
						$instance = array(
							'title' => '',
						);

						the_widget( 'WC_Widget_Cart', $instance );
					?>
				</li>
			</ul>
<?php
		endif;
	}
endif;

/**
 * Cart Fragments.
 *
 * Ensure cart contents update when products are added to the cart via AJAX.
 *
 * @param array $fragments Fragments to refresh via AJAX.
 * @return array Fragments to refresh via AJAX.
 */
if ( ! function_exists( 'storeflex_woocommerce_cart_link_fragment' ) ) {
	
	function storeflex_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		storeflex_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

add_filter( 'woocommerce_add_to_cart_fragments', 'storeflex_woocommerce_cart_link_fragment' );

/**
* Display Cart in Search.
*
* @return void
*/
if ( ! function_exists( 'storeflex_woocommerce_search_cart' ) ) :

	function storeflex_woocommerce_search_cart() {

		$storeflex_cart_link_option = storeflex_get_customizer_option_value( 'storeflex_enable_woo_cart' );
		if ( true == $storeflex_cart_link_option ) :
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
	?>
			<ul id="site-header-cart" class="site-header-cart">
				<li class="<?php echo esc_attr( $class ); ?>">
					<?php storeflex_woocommerce_cart_link(); ?>
				</li>
			</ul>
<?php
		endif;
	}
endif;

/**
*  Header Wishlist Link function
*
*/
if ( ! function_exists( 'storeflex_header_wishlist_link' ) ) :

    function storeflex_header_wishlist_link() {

    	$storeflex_wishlist_link_option =  storeflex_get_customizer_option_value( 'storeflex_enable_yith_wishlist' );

    	if ( ! storeflex_is_active_wishlist() || ( $storeflex_wishlist_link_option ) == false  ) {
    		return;
    	}

		$wishlist_url = YITH_WCWL()->get_wishlist_url();
?>
		<div class="storeflex-wishlist">
			<a href="<?php echo esc_url( $wishlist_url ); ?>" <?php storeflex_schema_markup( 'url' ); ?>>
				<i class="bx bx-heart"></i>
				<span class="storeflex-wl-counter">
					<?php printf( esc_html( '%s', 'storeflex' ), esc_attr( yith_wcwl_count_products() ) ); ?>
				</span>
			</a>
		</div>
<?php
	}

endif;

/**
 * Adds Add to wishlist button Product List
 *
 */
if ( ! function_exists( 'storeflex_product_wishlist_btn' ) ) :

	/**
	 * Adds Add to wishlist button Product List
	 */
	function storeflex_product_wishlist_btn() {
		if ( ! storeflex_is_active_wishlist() ) {
			return;
		}
		global $product;
		$product_id         = yit_get_product_id( $product );
		$current_product    = wc_get_product( $product_id );
		$product_type       = $current_product->get_type();
		$whishlist_url      = YITH_WCWL()->get_wishlist_url();
	?>
		<a class="storeflex-wishlist-button add_to_wishlist" href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', intval( $product_id ) ) )?>" rel="nofollow" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-product-type="<?php echo esc_attr( $product_type ); ?>" aria-label="Add To Wishlist">
		 <i class="bx bx-heart"></i><span> <?php esc_html_e( 'Add to Wishlist', 'storeflex' ); ?> </span>
		</a> <!-- .whishlist-button -->
	<?php
	}

endif;

add_action( 'storeflex_product_hover_button_icons', 'storeflex_product_wishlist_btn', 5 );

if ( ! function_exists( 'storeflex_product_button_icons' ) ) :

	/**
	 * Function to display the required product buttons on hover
	 *
	 * @param YITH_WCQV_Frontend
	 * @param YITH_WCWL
	 */
	function storeflex_product_button_icons() {
?>
		<div class="storeflex-product-btns-icons">
			<?php

				/**
				 * hook- storeflex_product_hover_button_icons
				 *
				 * @hooked - storeflex_product_wishlist_btn - 5
				 */
				do_action( 'storeflex_product_hover_button_icons' );

			?>
		</div><!-- storeflex-product-btns-icons -->
<?php
	}

endif;

add_action( 'woocommerce_before_shop_loop_item_title', 'storeflex_product_button_icons', 15 );

/**
 * Wishlist update
 *
 */
if ( defined( 'YITH_WCWL' ) && ! function_exists( 'storeflex_yith_wcwl_ajax_update_count' ) ) :

	function storeflex_yith_wcwl_ajax_update_count() {

		wp_send_json(
			array(
				'count' => yith_wcwl_count_all_products()
			)
		);
	}

    add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'storeflex_yith_wcwl_ajax_update_count' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'storeflex_yith_wcwl_ajax_update_count' );

endif;

if ( ! function_exists('storeflex_get_product_count') ):
	/**
	 * Product count in woocommerce
	*/
	function storeflex_get_product_count() {

	    $product_count = wp_count_posts('product');
	    return $product_count->publish;

	}
	
endif;

if ( ! function_exists( 'storeflex_woocommerce_product_count' ) ) :

	function storeflex_woocommerce_product_count( $arg ) {
		/**
		 * Product count in product loop 
		*/
		if ( $arg >= 11 && $arg <= 12 ) {
			$arg = $arg + 1 ;
		} elseif ( $arg > 13 ) {
			$arg = 13;
		} 
		return $arg;
	}

endif; 

if ( ! function_exists( 'storeflex_woocommerce_category_count' ) ) :

	function storeflex_woocommerce_category_count( $arg ) {
		/**
		 * Category count in full width
		*/
		if ( $arg <= 4 ) {
			$arg = 4;
		} elseif ( $arg > 10 ) {
			$arg = 10;
		}	 
		return $arg;
	}

endif; 

/**
 * Woocommerce Product search
 *
 */
if ( ! function_exists( 'storeflex_get_advanced_product_search' ) ) :

	function storeflex_get_advanced_product_search() {

		$args = array(
			'number'     => '',
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => true
		);

		$product_categories = get_terms( 'product_cat', $args );
		$categories_show = '<option value="">'.esc_html__( 'All Categories', 'storeflex' ).'</option>';
		$check = '';

		if ( is_search() ) {
			if ( isset( $_GET['term'] ) && $_GET['term'] != '' ) {
				$check = isset( $_GET['term'] ) ? sanitize_text_field( wp_unslash( $_GET['term'] ) ) : '';
			}
		}

		$checked = '';

		$categories_show .= '<optgroup class="sm-advance-search" label="'.esc_html__( 'All Categories', 'storeflex' ).'">';
		foreach( $product_categories as $category ) {
			if ( isset ( $category->slug ) ) {
				if ( trim( $category->slug ) == trim( $check ) ) {
					$checked = 'selected="selected"';
				}
				$categories_show  .= '<option '.$checked.' value="'.esc_attr( $category->slug ).'">'.esc_html( $category->name ).'</option>';
				$checked = '';
			}
		}
		$categories_show .= '</optgroup>';
		?>

		 <div class="header-search-wrapper storeflex-icon-elements">

		    <span class="search-btn"><a href="javascript:void(0)"><i class="bx bx-search"></i></a></span>

		    <div class="storeflex-search-overlay">
			<span id="close-btn"><a href="javascript:void(0)">
			    <i class="bx close bx-x"></i></a></span>
			    <div class="storeflex-container storeflex-flex">
			        <div class="site-branding"  <?php storeflex_schema_markup( 'logo' ); ?>>
			            <?php
			            the_custom_logo();
			            if (is_front_page() && is_home()) :
	                    ?>
	                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
	                            rel="home" <?php storeflex_schema_markup( 'url' ); ?>><?php bloginfo('name'); ?></a></h1>
	                    <?php
	                    else :
	                    ?>
	                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
	                            rel="home" <?php storeflex_schema_markup( 'url' ); ?>><?php bloginfo('name'); ?></a></h1>
	                    <?php
	                    endif;
	                    ?>
			        </div><!-- .site-branding -->

			        <div class="storeflex-centered storeflex-header-search-wrap">
			            <div id='search-box'>
							<form role="search" method="get" class="woocommerce-product-search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="search-wrap">
									<div class="sm-search-wrap">
										<select class="mt-select-products false" name="term"><?php echo $categories_show; ?></select>
									</div> <!-- sm-search-wrap -->

									<div class="sm-search-form">
										<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="search-field" placeholder="<?php echo  esc_attr( 'Search products', 'storeflex' ); ?>" autocomplete="off" />
										<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
										<input type="hidden" name="post_type" value="product" />
										<input type="hidden" name="taxonomy" value="product_cat" />
									</div> <!--sm-search-form -->

									<div class="search-content"></div><!-- search-content -->

								</div> <!-- search-wrap -->

							</form><!-- .woocommerce-product-search -->

					 	</div><!-- #search-box -->

			        </div><!-- .storeflex-centered -->

			        <div class="header-woo-links-wrap">

			         <?php
			            if (storeflex_is_active_woocommerce()) :

			                storeflex_woocommerce_search_cart();
			                storeflex_header_wishlist_link();

			            endif;
			        ?>

			        </div><!-- .header-woo-links-wrap -->

			    </div><!-- storeflex-container -->

		    </div><!-- #storeflex-search-overlay -->

		</div><!-- .header-search-wrapper -->
<?php
	}
endif;

/**
 * Load cusotm hooks related to woocommerce.
 */
require get_template_directory() . '/inc/woocommerce/woocommerce-custom-hooks.php';