<?php
/**
 * Partial template to display  social icons
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$social_icons_display = storeflex_get_customizer_option_value( 'storeflex_enable_social_icons' );

if ( $social_icons_display == false ) {
    return;
}

$gets_social_icons        = storeflex_get_customizer_option_value( 'storeflex_social_icons' );
$social_icons_array       = json_decode( $gets_social_icons );

$social_link_target = storeflex_get_customizer_option_value( 'storeflex_enable_social_icons_in_new_tab' );
$target = ( 'true' == $social_link_target ) ? '_blank' : '_self';

if ( ! empty ( $social_icons_array ) ) :

?>
<div class="storeflex-social-icons-wrapper">

<?php 
    foreach( $social_icons_array as $key => $value ) {
        $icon_class = $value->item_icon;
        $icon_link  = $value->item_link;
?>

        <div class="single-icon-wrap">
            <a href="<?php echo esc_url( $icon_link ); ?>" target="<?php echo $target ?>" <?php storeflex_schema_markup( 'url' ); ?>><i class="<?php echo esc_attr( $icon_class ); ?>"></i> </a>
        </div><!-- .single-icon-wrap -->

<?php 
    }
?>

</div><!-- storeflex-social-icons-wrapper -->

<?php  endif;  ?>