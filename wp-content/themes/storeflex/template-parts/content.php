<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StoreFlex
 */


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( has_post_thumbnail() ) {
    $article_post_class = 'has-img-post';
} else {
    $article_post_class = 'no-img-post';
}

?>

<article id="post-<?php the_ID(); ?>" <?php  post_class( $article_post_class ); ?>>

	<div class = "storeflex-single-post-wrap ">

		<div class="post-thumbnail-wrap">
	    	<figure class="post-image <?php storeflex_image_hover_effect(); ?>" <?php storeflex_schema_markup( 'image' ); ?>>
		        <a href="<?php echo esc_url( get_the_permalink() ); ?>" <?php storeflex_schema_markup( 'url' ); ?>><?php storeflex_post_thumbnail(); ?></a>
		    </figure>
	    </div><!-- post-thumbnail-wrap -->

	    <div class="storeflex-post-content-wrap">

			<div class="storeflex-post-date">
	            <span class="date-mth-yr"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
	            <span class="date-day"><?php echo esc_html( get_the_date( 'd' ) ); ?></span>
			</div>

			<div class="article-cat-item">
		    	<?php storeflex_the_post_categories_list( get_the_ID(), 2 ); ?>
	        </div><!-- .article-cat-item -->
	        
		    <header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php storeflex_posted_by(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content" <?php storeflex_schema_markup('entry_content'); ?>>
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'storeflex' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'storeflex' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

		</div> <!-- storeflex-post-content-wrap -->

		<footer class="entry-footer">
			<?php storeflex_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div> <!-- storeflex-single-post-wrap -->

</article><!-- #post-<?php the_ID(); ?> -->
