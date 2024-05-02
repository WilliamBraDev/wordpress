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

$storeflex_archieve_and_blog_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_archive_and_blog_sidebar_layout' );
$storeflex_post_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_post_sidebar_layout' );
$storeflex_page_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_page_sidebar_layout' );

$sidebar_layout = '';

if ( is_page() ) {
	$sidebar_layout = $storeflex_page_sidebar_layout;
} elseif ( is_single() || is_singular() ) {
	$sidebar_layout = $storeflex_post_sidebar_layout;
} elseif ( is_archive() || is_search() || is_home() ) {
	$sidebar_layout = $storeflex_archieve_and_blog_sidebar_layout;
}

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
?>

<aside id="left-secondary" class="widget-area sidebar-layout-<?php echo esc_attr( $sidebar_layout ); ?>" <?php storeflex_schema_markup( 'sidebar' ) ?>>
	<?php dynamic_sidebar( 'sidebar-left' ); ?>
</aside><!-- #secondary -->
