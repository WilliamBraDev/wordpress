<?php
/**
 * Partial template to display footer widget area
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$footer_widget_area = storeflex_get_customizer_option_value( 'storeflex_enable_widget_area' );

if ( $footer_widget_area == false ) {
    return;
}

$widget_area_layout  = storeflex_get_customizer_option_value( 'storeflex_widget_area_layout' );

switch ( $widget_area_layout ) {

    case 'column-one':
        
        if ( ! is_active_sidebar( 'footer-widget-column-one' )  ) {
            return;
        }
        break;

     case 'column-two':
        
        if ( ! is_active_sidebar( 'footer-widget-column-one' ) && ! is_active_sidebar( 'footer-widget-column-two' ) ) {
            return;
        }
        break; 

     case 'column-three':
        
        if ( ! is_active_sidebar( 'footer-widget-column-one' ) && ! is_active_sidebar( 'footer-widget-column-two' ) && ! is_active_sidebar( 'footer-widget-column-three' ) ) {
            return;
        }
        break; 

     case 'column-four':
        
        if ( ! is_active_sidebar( 'footer-widget-column-one' ) && ! is_active_sidebar( 'footer-widget-column-two' ) && ! is_active_sidebar( 'footer-widget-column-three' )  && ! is_active_sidebar( 'footer-widget-column-four' )) {
            return;
        }
        break; 
}
?>

<div id="footer-widget-area" class="widget-area footer-widget-<?php echo esc_attr( $widget_area_layout ); ?> ">
    <div class=" storeflex-container">
        <div class="footer-widget-wrapper storeflex-grid">
            <?php
                $widget_columns = array(
                    'column-one',
                    'column-two',
                    'column-three',
                    'column-four',
                );

                $selected_column_index = array_search( $widget_area_layout , $widget_columns );

                if ( $selected_column_index !== false ) {
                    for ( $i = 0; $i <= $selected_column_index; $i++ ) {
                        $column = $widget_columns[$i];

                        echo '<div class="footer-widget-'.$column.' ">';
                              dynamic_sidebar( 'footer-widget-' . $column );
                        echo '</div>';
                    }
                }
            ?>
        </div><!-- footer-widget-wrapper-->

    <?php
        $footer_bottom_widget = storeflex_get_customizer_option_value( 'storeflex_enable_bottom_widget_in_footer' );

        if ( $footer_bottom_widget == true ) :
    ?>
        <div class="bottom-footer-widget-area">
            <?php dynamic_sidebar( 'footer-bottom-widget' ); ?>
        </div>
    <?php
        endif;
    ?>
    </div> <!-- storeflex-container -->
</div><!-- footer-widget-area -->
