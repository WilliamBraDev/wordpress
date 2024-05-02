<?php
/**
 * VW Furniture Shop: Block Patterns
 *
 * @since VW Furniture Shop 1.0
 */

 /**
  * Get patterns content.
  *
  * @param string $file_name Filename.
  * @return string
  */
function vw_furniture_shop_get_pattern_content( $file_name ) {
	ob_start();
	include get_theme_file_path( '/patterns/' . $file_name . '.php' );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

/**
 * Registers block patterns and categories.
 *
 * @since VW Furniture Shop 1.0
 *
 * @return void
 */
function vw_furniture_shop_register_block_patterns() {

	$patterns = array(
		'header-default' => array(
			'title'      => __( 'Default header', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-headers' ),
			'blockTypes' => array( 'parts/header' ),
		),
		'footer-default' => array(
			'title'      => __( 'Default footer', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-footers' ),
			'blockTypes' => array( 'parts/footer' ),
		),
		'home-banner' => array(
			'title'      => __( 'Home Banner', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-banner' ),
		),
		'product-section' => array(
			'title'      => __( 'Product Sections', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-product-section' ),
		),
		'customize-section' => array(
			'title'      => __( 'Customize Section', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-customize-section' ),
		),
		'about-section' => array(
			'title'      => __( 'About Section', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-about-section' ),
		),
		'primary-sidebar' => array(
			'title'    => __( 'Primary Sidebar', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-sidebars' ),
		),
		'hidden-404' => array(
			'title'    => __( '404 content', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-pages' ),
		),
		'post-listing-single-column' => array(
			'title'    => __( 'Post Single Column', 'vw-furniture-shop' ),
			//'inserter' => false,
			'categories' => array( 'vw-furniture-shop-query' ),
		),
		'post-listing-two-column' => array(
			'title'    => __( 'Post Two Column', 'vw-furniture-shop' ),
			//'inserter' => false,
			'categories' => array( 'vw-furniture-shop-query' ),
		),
		'post-listing-three-column' => array(
			'title'    => __( 'Post Three Column', 'vw-furniture-shop' ),
			//'inserter' => false,
			'categories' => array( 'vw-furniture-shop-query' ),
		),
		'post-listing-four-column' => array(
			'title'    => __( 'Post Four Column', 'vw-furniture-shop' ),
			//'inserter' => false,
			'categories' => array( 'vw-furniture-shop-query' ),
		),
		'feature-post-column' => array(
			'title'    => __( 'Feature Post Column', 'vw-furniture-shop' ),
			//'inserter' => false,
			'categories' => array( 'vw-furniture-shop-query' ),
		),
		'comment-section-1' => array(
			'title'    => __( 'Comment Section 1', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-comment-sections' ),
		),
		'cover-with-post-title' => array(
			'title'    => __( 'Cover With Post Title', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-banner-sections' ),
		),
		'theme-button' => array(
			'title'    => __( 'Theme Button', 'vw-furniture-shop' ),
			'categories' => array( 'vw-furniture-shop-theme-button' ),
		),
	);

	$block_pattern_categories = array(
		'vw-furniture-shop-footers' => array( 'label' => __( 'Footers', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-headers' => array( 'label' => __( 'Headers', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-pages'   => array( 'label' => __( 'Pages', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-query'   => array( 'label' => __( 'Query', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-sidebars'   => array( 'label' => __( 'Sidebars', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-banner'   => array( 'label' => __( 'Banner Sections', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-product-section'   => array( 'label' => __( 'Product Section', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-customize-section'   => array( 'label' => __( 'Customize Sections', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-about-section'   => array( 'label' => __( 'About Section', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-comment-section'   => array( 'label' => __( 'Comment Sections', 'vw-furniture-shop' ) ),
		'vw-furniture-shop-theme-button'   => array( 'label' => __( 'Theme Button Sections', 'vw-furniture-shop' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since VW Furniture Shop 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'vw_furniture_shop_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @since VW Furniture Shop 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$patterns = apply_filters( 'vw_furniture_shop_block_patterns', $patterns );

	foreach ( $patterns as $block_pattern => $pattern ) {
		$pattern['content'] = vw_furniture_shop_get_pattern_content( $block_pattern );
		register_block_pattern(
			'vw-furniture-shop/' . $block_pattern,
			$pattern
		);
	}
}
add_action( 'init', 'vw_furniture_shop_register_block_patterns', 9 );
