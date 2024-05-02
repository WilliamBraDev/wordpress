<?php
/**
 * Partial template to display author box
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$author_box_display = storeflex_get_customizer_option_value( 'storeflex_enable_author_box' );

if ($author_box_display == false ) {
    return;
}

$author_id       = get_the_author_meta( 'ID' );
$author_avatar   = get_avatar( $author_id , 'thumbnail' );
$author_link     = get_author_posts_url( $author_id );
$author_url      = get_the_author_meta( 'user_url' );

?>

<div class="storeflex-author-container">

    <a href="<?php echo esc_url( $author_link ); ?>">
        <div class="storeflex-author-image" <?php storeflex_schema_markup( 'avatar' ); ?>>
            <?php echo wp_kses_post( $author_avatar ); ?>
        </div> <!-- storeflex-author-image -->
    </a>

    <div class="storeflex-author-info">

        <h3 class="author-nicename" <?php storeflex_schema_markup( 'author_name' ); ?>>
            <a href="<?php echo esc_url( $author_link ); ?>"><?php echo esc_html( get_the_author_meta( 'user_nicename', $author_id ) ); ?></a>
        </h3>

        <span class="author-website" <?php storeflex_schema_markup( 'author_link' ); ?>><?php esc_html_e( 'Website: ', 'storeflex' ); ?> <a href="<?php echo esc_url( $author_url ); ?>" target="_blank"> <?php echo esc_url( $author_url ); ?></a></span> <br>
        <span class="author-description" <?php storeflex_schema_markup( 'description' ); ?>><?php the_author_meta( 'description' , $author_id ); ?></span>

    </div> <!-- storeflex-author-info -->

</div><!-- storeflex-author-container -->