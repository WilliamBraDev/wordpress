<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

storeflex_get_left_sidebar();

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			echo '<div class="storeflex-content-wrapper" >';

			get_template_part( 'template-parts/content', get_post_type() );

			echo '</div> <!-- storeflex-content-wrapper -->';

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			/**
             * require file to display author box
             *
             * @since 1.0.0
             */
            get_template_part( 'template-parts/innerpage/partials/content' , 'author-box' );

		endwhile; // End of the loop.

		/**
         * require file to display related post
         *
         * @since 1.0.0
         */
        get_template_part( 'template-parts/innerpage/partials/content', 'related-post' );

		?>

	</main><!-- #main -->

<?php
storeflex_get_right_sidebar();

get_footer();
