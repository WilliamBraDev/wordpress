<?php
/**
 * Partial template to display related post
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$related_post_display = storeflex_get_customizer_option_value( 'storeflex_enable_related_post' );

if ($related_post_display == false ) {
    return;
}

$categories = get_the_category();

if ( ! empty( $categories ) ) :
    $category_slugs = wp_list_pluck( $categories, 'slug' );

    $related_args = array(
        'category_name' => implode( ',', $category_slugs ),
        'posts_per_page' => apply_filters( 'storeflex_related_post_count', 3 ),
        'post__not_in' => array( get_the_ID() ),

    );

    $related_query = new WP_Query( $related_args );

    if ( $related_query->have_posts() ) :

        echo '<div class="storeflex-related-posts">';
        echo '<h2 class="storeflex-title">' . esc_html__( 'Related Posts', 'storeflex' ) . '</h2>';
        echo '<div class = "storeflex-related-posts-wrapper">';

        while ( $related_query->have_posts() ) :
            $related_query->the_post();
?>
            <div class= "related-post-wrap <?php if ( ! has_post_thumbnail() ){ echo esc_attr( 'no-img-post' ); } ?>">

                <div class="related-post-thumb" >
                    <figure class ="related-post-image" <?php storeflex_schema_markup( 'image' ); ?>>
                        <a class="related-post-thumb" href="<?php echo esc_url( get_the_permalink() ); ?>" <?php storeflex_schema_markup( 'url' ); ?>><?php the_post_thumbnail(); ?></a>
                    </figure>
                </div> <!-- related-post-thumb -->

                <div class="related-post-content-wrap">
                    <h3><a href="<?php the_permalink(); ?>" <?php storeflex_schema_markup( 'url' ); ?>><?php the_title(); ?></a></h3>
                </div> <!-- related-post-content-wrap -->

            </div> <!-- related-post-wrap -->

<?php
        endwhile;

    echo '</div>';
    echo '</div>';

    wp_reset_postdata();

    endif;

endif;

?>