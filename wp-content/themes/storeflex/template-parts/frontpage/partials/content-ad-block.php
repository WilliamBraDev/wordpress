<?php
/**
 * file to handle the fullwidth ad block.
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

extract( $args );

if ( ! isset( $block_options->imgSrc ) || empty( $block_options->imgSrc ) ) {
    return;
}
?>

<section class="storeflex-front-page-block storeflex-ad-block">
    <div class="storeflex-container">
        <div class="storeflex-ad-block-wrapper">
            <a href="<?php echo esc_url( $block_options->imgUrl ); ?>" rel="nofollow" <?php if ( $block_options->newTab ) echo 'target="_blank"'; ?> <?php storeflex_schema_markup( 'url' ); ?>>
                <img src="<?php echo esc_url( $block_options->imgSrc ); ?>">
            </a>
        </div><!-- .storeflex-block-wrapper -->
    </div> <!-- storeflex-container -->
</section><!-- .ad-block -->