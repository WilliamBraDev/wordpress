<?php
/**
 * Partial template to display banner feature in homepage
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$gets_feature_post   = storeflex_get_customizer_option_value( 'storeflex_feature_post' );
$feature_post_array  = json_decode( $gets_feature_post );

$allImageNull = true;

if ( ! empty ( $feature_post_array ) ) :
    foreach ( $feature_post_array as $feature_post ) {
        if ( $feature_post->feature_post_image != null ) {
            $allImageNull = false;
            break;
        }
    }

endif;

if ( $allImageNull == true ) {
    return;
}

?>

<div class="storeflex-feature">
    
<?php
    foreach( $feature_post_array as $key => $value ) {
        $feature_link        = $value->feature_post_link;
        $feature_image       = $value->feature_post_image;
        $feature_heading     = $value->feature_post_heading;
        $feature_button      = $value->feature_post_button;
?>
    <?php if ( ! empty ( $feature_image ) ) : ?>
        <div class="feature-single-post-wrap">
            <div class="post-thumbnail-wrap">
                <a href="<?php echo esc_url( $feature_link ); ?>" target="_blank" <?php storeflex_schema_markup( 'url' ); ?>>
                    <figure class="feature-image <?php storeflex_image_hover_effect(); ?>" <?php storeflex_schema_markup( 'image' ); ?>>
                        <img src="<?php echo esc_url( $feature_image ); ?>" />
                    </figure>
                </a>

                <div class="feature-content-wrap">

                    <?php if( ! empty ( $feature_heading ) ) : ?>
                    <h4 class="feature-title"><?php echo esc_html( $feature_heading ); ?></h4>
                    <?php endif; ?>

                    <?php if( ! empty ( $feature_button ) ) : ?>
                    <button class="buy-now-button">
                        <a href="<?php echo esc_url( $feature_link ); ?>" <?php storeflex_schema_markup( 'url' ); ?>>
                            <?php echo esc_html( $feature_button ); ?>
                        </a>
                    </button>
                    <?php endif; ?>

                </div><!-- feature-content-wrap -->
            </div> <!-- post-thumbnail-wrap  -->
        </div> <!-- slider-single-post-wrap  -->
    <?php
        endif;
    }
?>

</div> <!-- storeflex-feature -->