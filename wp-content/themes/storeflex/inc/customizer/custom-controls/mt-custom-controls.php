<?php
/**
 * 
 * File to register custom controls.
 * 
 * @package StoreFlex
 */

// Load/Register control tabs.
require_once get_template_directory() . '/inc/customizer/custom-controls/tabs/class-tabs-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Tabs' );

 // register radio image control
require get_template_directory() . '/inc/customizer/custom-controls/radio-image/class-radio-image-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Radio_Image' );

require get_template_directory() . '/inc/customizer/custom-controls/toggle/class-toggle-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Toggle' );

// Load/Register control radio buttonset.
require get_template_directory() . '/inc/customizer/custom-controls/buttonset/class-buttonset-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Buttonset' );

// Load/Register control typography.
require get_template_directory() . '/inc/customizer/custom-controls/typography/class-typography-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Typography' );

// Load/Register control heading toggle.
require get_template_directory() . '/inc/customizer/custom-controls/heading-toggle/class-heading-toggle-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Heading_Toggle' );

// Load/Register control slider.
require_once get_template_directory() . '/inc/customizer/custom-controls/slider/class-slider-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Slider' );

require_once get_template_directory() . '/inc/customizer/custom-controls/theme-upsell/class-theme-upsell-section.php';
$wp_customize->register_section_type( 'StoreFlex_Section_Upsell' );

// Load/Register control  repeater.
require get_template_directory() . '/inc/customizer/custom-controls/repeater/class-repeater-control.php';

// Load/Register control banner repeater.
require get_template_directory() . '/inc/customizer/custom-controls/banner-repeater/class-banner-repeater-control.php';

// Load/Register control block repeater.
require get_template_directory() . '/inc/customizer/custom-controls/blocks-repeater/class-blocks-repeater-control.php';

// Load/Register control upgrade.
require_once get_template_directory() . '/inc/customizer/custom-controls/upgrade/class-upgrade-control.php';
$wp_customize->register_control_type( 'StoreFlex_Control_Upgrade' );

