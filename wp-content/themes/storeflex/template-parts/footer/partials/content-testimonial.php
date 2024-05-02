<?php
/**
 * Partial template to display testimonial
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$testimonial_display = storeflex_get_customizer_option_value( 'storeflex_enable_testimonial' );

if ($testimonial_display == false ) {
    return;
}

$gets_testimonial         = storeflex_get_customizer_option_value( 'storeflex_testimonial' );
$testimonial_array        = json_decode( $gets_testimonial );

$allTestimonialNull = true;

if ( ! empty ( $testimonial_array ) ) :
    foreach ($testimonial_array as $testimonial_post) {
         if ( $testimonial_post->testimonial_image != null || $testimonial_post->testimonial_name != null || $testimonial_post->testimonial_description != null ) {
            $allTestimonialNull = false;
            break;
        }
    }
endif;

if ( $allTestimonialNull == true ) {
    return;
}

?>

<div id="storeflex-testimonial-section" class="storeflex-clearfix">
    
    <div class="storeflex-container">

    <?php
        $testimonial_title = storeflex_get_customizer_option_value( 'storeflex_testimonial_title' );

        if ( ! empty ( $testimonial_title ) ):
            echo '<h2 class="storeflex-title">' . esc_html( $testimonial_title ) . '</h2>';
        endif;
    ?>

        <div class='storeflex-testimonial-wrapper storeflex-testimonial-carousel'>

        <?php

        if ( ! empty( $testimonial_array ) ) :

            foreach( $testimonial_array as $key => $value ) {
                $testimonial_avatar_image = $value->testimonial_image;
                $testimonial_avatar_name = $value->testimonial_name;
                $testimonial_avatar_description  = $value->testimonial_description;
        ?>

                <div class="storeflex-testimonial-post-wrap <?php echo esc_attr( ( $testimonial_avatar_image == null ) ? 'no-img-post' : '' ); ?>">

                    <?php if ( ! empty ( $testimonial_avatar_description ) ) : ?>
                        <div class="testimonial-content-wrap">
                            <span class="testimonial-avatar-description"><?php echo esc_html( $testimonial_avatar_description ); ?></span>

                    <?php if ( ! empty ( $testimonial_avatar_image || $testimonial_avatar_name ) ) : ?>
                        <div class ="testimonial-thumbnail-wrap">
                            <figure class="testimonial-avatar-image">
                                <img src="<?php echo esc_url( $testimonial_avatar_image ); ?>" />
                            </figure>
                            <h3 class="testimonial-avatar-name"><?php echo esc_html( $testimonial_avatar_name ); ?></h3>
                        </div> <!-- testimonial-thumbnail-wrap -->
                    <?php endif;?>
                        </div> <!-- testimonial-content-wrap -->
                    <?php endif;?>

                </div> <!-- storeflex-testimonial-post-wrap -->

        <?php
            }
            
        endif;
        ?>

        </div> <!-- storeflex-testimonial-wrapper -->

    </div> <!-- storeflex-container-->

</div> <!-- storeflex-testimonial-section -->