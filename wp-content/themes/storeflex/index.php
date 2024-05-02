<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$homepage_latest_post_content = storeflex_get_customizer_option_value( 'storeflex_homepage_content_status' );

	if ( $homepage_latest_post_content == true ) {

		storeflex_get_left_sidebar();
?>

	<main id="primary" class="site-main">

		<?php

		/**
		 * hook - storeflex_homepage_latest_post_section
		 *
		 * @since 1.0.0
		 *
		 */
		do_action( 'storeflex_homepage_post_section' );

		?>

	</main><!-- #main -->

<?php
		storeflex_get_right_sidebar();
	}

get_footer();
