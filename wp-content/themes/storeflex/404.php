<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

?>
	<main id="primary" class="site-main">

		<section class="error-404 not-found">
		<span class="page-caption"><?php esc_html_e( '404' , 'storeflex' ); ?></span>
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'storeflex' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">

				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'storeflex' ); ?></p>

				<?php
					$get_search_form = storeflex_get_customizer_option_value( 'storeflex_enable_error_search_bar' );
					$get_home_button = storeflex_get_customizer_option_value( 'storeflex_enable_homepage_button' );

					if ( $get_search_form == true ) :
						get_search_form();
					endif;

					if ( $get_home_button == true ) :
						echo '<a class="button-back-home" href="' . esc_url( get_home_url() ) . '">' . esc_html( 'Back to Home', 'storeflex' ) . '</a>';
					endif;
				?>

			</div><!-- .page-content -->

		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php

get_footer();
