<?php
/**
 * Active callback function.
 * 
 * @package StoreFlex
 */

if ( ! function_exists( 'storeflex_has_site_mode_switcher_enable' ) ) :

    /**
	 * Check site mode switcher has enabled or not.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function storeflex_has_site_mode_switcher_enable( $control ) {
        if (  false === $control->manager->get_setting( 'storeflex_site_mode_switcher_option' )->value()  ) {
            return true;
        } else {
            return false;
        }
    }
    
endif;

if ( ! function_exists( 'storeflex_has_enable_preloader' ) ) :

	/**
	 * check the settting preloader is enable or not.
	 * 
	 * @since 1.0.0
	 */
	function storeflex_has_enable_preloader( $control ) {
		if ( false !== $control->manager->get_setting( 'storeflex_enable_preloader' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'storeflex_has_select_default_preloader' ) ) :

    /**
     * Check if default preloader selected or not.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function storeflex_has_select_default_preloader( $control ) {
        if ( 'default-style' == $control->manager->get_setting( 'storeflex_preloader_choices' )->value() && false !== $control->manager->get_setting( 'storeflex_enable_preloader' )->value() ) {
            return true;
        } else {
            return false;
        }
    }

endif;

if ( ! function_exists( 'storeflex_has_select_logo_preloader' ) ) :

    /**
     * Check if logo preloader selected or not.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function storeflex_has_select_logo_preloader( $control ) {
        if ( 'logo' == $control->manager->get_setting( 'storeflex_preloader_choices' )->value() && false !== $control->manager->get_setting( 'storeflex_enable_preloader' )->value() ) {
            return true;
        } else {
            return false;
        }
    }

endif;


if ( ! function_exists( 'storeflex_has_search_enable' ) ) :

    /**
	 * Check site mode switcher has enabled or not.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function storeflex_has_search_enable( $control ) {
        if (  false !== $control->manager->get_setting( 'storeflex_enable_search_bar' )->value()  ) {
            return true;
        } else {
            return false;
        }
    }
    
endif;

if ( ! function_exists( 'storeflex_has_enable_basic_info_on_header' ) ) :

	/**
	 * check the setting basic info on heading enable or not.
	 * 
	 * @since 1.0.0
	 */
	function storeflex_has_enable_basic_info_on_header( $control ) {
		if ( false !== $control->manager->get_setting( 'storeflex_enable_basic_info_on_header' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;


if ( ! function_exists( 'storeflex_has_banner_section_enable' ) ) :

    /**
	 * Check site mode switcher has enabled or not.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function storeflex_has_banner_section_enable( $control ) {
        if (  false !== $control->manager->get_setting( 'storeflex_enable_banner_section' )->value()  ) {
            return true;
        } else {
            return false;
        }
    }
    
endif;


if ( ! function_exists( 'storeflex_has_enable_info_on_footer' ) ) :

	/**
	 * check the setting info on footer enable or not.
	 * 
	 * @since 1.0.0
	 */
	function storeflex_has_enable_info_on_footer( $control ) {
		if ( false !== $control->manager->get_setting( 'storeflex_enable_info_on_footer' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if ( ! function_exists( 'storeflex_has_enable_widget_area_layout' ) ) :

	/**
	 * check the setting widget area is enable or not.
	 * 
	 * @since 1.0.0
	 */
	function storeflex_has_enable_widget_area_layout( $control ) {
		if ( false !== $control->manager->get_setting( 'storeflex_enable_widget_area' )->value() ) {
			return true;
		} else {
			return false;
		}
	}

endif;