<?php
/**
 * Partial template to display footer info
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$footer_info_display = storeflex_get_customizer_option_value( 'storeflex_enable_info_on_footer' );

if ( $footer_info_display == false ) {
    return;
}

$gets_footer_info        = storeflex_get_customizer_option_value( 'storeflex_info_on_footer' );

$footer_info_array       = json_decode($gets_footer_info);

$allFooterInfoNull = true;

if ( ! empty ( $footer_info_array ) ):
    foreach ( $footer_info_array as $footer_info_item ) {
        if ( $footer_info_item->footer_info_icon != null ) {
            $allFooterInfoNull = false;
            break; 
        }
    }
endif;

if ( $allFooterInfoNull == true ) {
    return; 
} 

if ( ! empty ( $footer_info_array ) ) :
?>
<div class="storeflex-basic-info-wrapper">

    <div class="storeflex-container">
<?php
        foreach( $footer_info_array as $key => $value ) {
            $info_class        = $value->footer_info_icon;
            $info_text         = $value->footer_info_text;
            $info_description  = $value->footer_info_description;
?>
        <div class="footer-info-wrap">
            <i class="<?php echo esc_attr( $info_class ); ?>"></i>
            <div class="footer-info-content">
                <span class="storeflex-footer-info-heading"> <?php echo esc_html( $info_text ) ?> </span>
                <span class="storeflex-footer-info-description"> <?php echo esc_html( $info_description ) ?> </span>
            </div><!-- .footer-info-content -->
        </div><!-- .footer-info-wrap -->
<?php
        }
?>
    </div> <!-- storeflex-container -->
    
</div> <!-- storeflex-basic-info-wrapper -->

<?php
endif;