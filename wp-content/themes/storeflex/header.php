<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StoreFlex
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  <?php storeflex_schema_markup( 'html' ); ?>>

<?php
	wp_body_open(); 

	/**
	 * hook - storeflex_preloader_items - 5
	 * 
	 * @since 1.0.0
	 * 
	 */
	do_action( 'storeflex_before_page' );
?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'storeflex' ); ?></a>

<?php 
	/**
	 * hook - storeflex_main_header -10
	 * 
	 * @since 1.0.0
	 * 
	 */
	do_action( 'storeflex_header_section' );
?>

	<div id="content" class="site-content" <?php storeflex_schema_markup( 'creative_work' ); ?>>

<?php

	if ( is_front_page() ) {

		/**
		 * hook - storeflex_main_banner - 10
		 * hook - storeflex_fullwidth_section - 20
		 *
		 * @since 1.0.0
		 *
		 */
		do_action( 'storeflex_homepage_section' );
	}

	/**
	 * hook - storeflex_container_wrapper - 10
	 * 
	 * @since 1.0.0
	 * 
	 */
	do_action( 'storeflex_before_page_main_content' );
?>