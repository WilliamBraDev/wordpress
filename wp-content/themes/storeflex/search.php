<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

    <?php if ( have_posts() ) : ?>

    <header class="page-header">
        <h1 class="page-title">
            <?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'storeflex' ), '<span>' . get_search_query() . '</span>' );
			?>
        </h1>
    </header><!-- .page-header -->

    	<div class="storeflex-content-wrapper">

        <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_pagination();
		?>

		</div><!--storeflex-content-wrapper-->

		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

</main><!-- #main -->

<?php

storeflex_get_right_sidebar();

get_footer();