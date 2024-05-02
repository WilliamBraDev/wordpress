<?php
/**
 * File to handle the fullwidth call to action block.
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

<section class="storeflex-front-page-block storeflex-call-to-action-block">
     <div class="storeflex-call-block-wrapper">
        <div class="storeflex-container">
            <div class="storeflex-call-action-content">
            <h2 class="cta-title"><?php echo esc_html( $block_options->sectionContent ); ?></h2>

            <a class="storeflex-cta-button" href="<?php echo esc_url( $block_options->imgUrl ); ?>" rel="nofollow" <?php if ( $block_options->newTab ) echo 'target="_blank"'; ?>> <span><?php echo esc_html( $block_options->sectionButton ); ?></span></a>

        </div> <!-- storeflex-call-action-content -->
    </div> <!-- storeflex-container -->
</div><!-- .storeflex-block-wrapper -->


</section><!-- .call-to-action-block -->
