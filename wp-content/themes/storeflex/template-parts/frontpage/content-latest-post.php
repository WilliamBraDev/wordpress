<?php
/**
 * Partial template to display lastest post on homepage
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$homepage_latest_post_content = storeflex_get_customizer_option_value( 'storeflex_homepage_content_status' );

if ( $homepage_latest_post_content == true ) :

	echo '<div class="storeflex-content-wrapper">';

	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_type() );

		endwhile;

		the_posts_pagination();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;

	echo '</div> <!-- storeflex-content-wrapper -->';

endif;

?>