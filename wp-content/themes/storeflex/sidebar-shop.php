<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}

?>
 
<aside id="shop-secondary" class="widget-area sidebar" <?php storeflex_schema_markup( 'sidebar' ) ?>>
     <?php dynamic_sidebar( 'sidebar-shop' ); ?>
</aside><!-- #shop-secondary -->

