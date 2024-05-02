<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * hook - storeflex_container_wrapper_end - 10
 * 
 * @since 1.0.0
 * 
 */
do_action( 'storeflex_after_page_main_content' );

/**
 * hook - storeflex_testimonial - 10
 * 
 * @since 1.0.0
 * 
 */
do_action( 'storeflex_testimonial_section' );

?>

</div><!-- #content -->

	<footer id="colophon" class="site-footer" <?php storeflex_schema_markup( 'footer' ); ?>>
		
		<?php 
			/**
			 * hook - storeflex_main_footer - 10 
			 * 
			 * @since 1.0.0
			 * 
			 */
			do_action( 'storeflex_footer_section' );
		?>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php 

/**
 * hook - storeflex_scroll_top - 10
 * 
 * @since 1.0.0
 * 
 */

do_action ( 'storeflex_scroll_top_section' );

wp_footer(); 

?>

</body>
</html>
