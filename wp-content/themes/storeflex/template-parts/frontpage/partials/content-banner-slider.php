<?php
/**
 * Partial template to display banner slider in homepage
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$gets_slider_post    = storeflex_get_customizer_option_value( 'storeflex_slider_post' );
$sliders_post_array  = json_decode( $gets_slider_post );

$allImageNull = true;

if ( ! empty ( $sliders_post_array ) ) :
    foreach ( $sliders_post_array as $slider_post ) {
         if ( $slider_post->slider_post_image != null ) {
            $allImageNull = false;
            break;
        }
    }

endif;

if ( $allImageNull == true ) {
    return;
}

?>
<div class="storeflex-slider" id="slider-single-post">
<?php
    foreach( $sliders_post_array as $key => $value ) {
        $slider_heading      = $value->slider_post_heading;
        $slider_description  = $value->slider_post_description;
        $slider_link         = $value->slider_post_link;
        $slider_image        = $value->slider_post_image;
        $slider_button       = $value->slider_post_button;
?>

    <div class="slider-single-post-wrap">
        <div class="post-thumbnail-wrap">
            <?php if ( ! empty ( $slider_image ) ) : ?>
                <a href="<?php echo esc_url( $slider_link ); ?>" <?php storeflex_schema_markup( 'url' ); ?>>
                    <figure class="slider-image <?php storeflex_image_hover_effect(); ?>" <?php storeflex_schema_markup( 'image' ); ?>>
                        <img src="<?php echo esc_url( $slider_image ); ?>" />
                    </figure>
                </a>
            <?php endif; ?>

            <div class="slider-content-wrap">
                <h3 class="slider-title"><?php echo esc_html( $slider_heading ); ?></h3>
                <div class="slider-desc"><?php echo esc_html( $slider_description ); ?></div>

                <?php if ( ! empty ( $slider_button ) ) : ?>
                    <button class="buy-now-button">
                        <a href="<?php echo esc_url( $slider_link ); ?>"<?php storeflex_schema_markup( 'url' ); ?>>
                            <?php echo esc_html( $slider_button ); ?>
                        </a>
                    </button>
                <?php endif; ?>
            </div> <!-- slider-content-wrap -->
        </div> <!-- post-thumbnail-wrap  -->
    </div> <!-- slider-single-post-wrap  -->
<?php
    }
?>

</div> <!-- storeflex-slider -->