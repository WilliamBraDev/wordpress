<?php
/**
 * Partial template to display banner in homepage
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$banner_section = storeflex_get_customizer_option_value( 'storeflex_enable_banner_section' );

if ( $banner_section == false ) {
    return;
}

$banner_layouts = storeflex_get_customizer_option_value( 'storeflex_banner_layout' );
$banner_custom_class[] = 'storeflex-banner-wrapper';
$banner_custom_class[] = 'storeflex-banner-layout-'.$banner_layouts;
?>

<div id="storeflex-banner-section" class="<?php echo esc_attr( implode( ' ', $banner_custom_class ) ); ?>">

    <div class=" storeflex-container">
   
    <?php
        /**
         * require file to display banner slider
         *
         * @since 1.0.0
         */
        get_template_part('template-parts/frontpage/partials/content', 'banner-slider');

         /**
         * require file to display banner feature post
         *
         * @since 1.0.0
         */
        get_template_part('template-parts/frontpage/partials/content', 'banner-feature');
    ?> 

    </div> <!-- storeflex-container  -->

</div> <!--storeflex-banner-wrapper -->