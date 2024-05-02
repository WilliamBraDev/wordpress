<?php
 /**
 * StoreFlex Theme Customizer Sanitize functions
 *
 * @package StoreFlex
 */

if ( ! function_exists( 'storeflex_sanitize_checkbox' ) ) :

    /**
     * Sanitize checkbox.
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     *
     * @since 1.0.0
     */
    function storeflex_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }

endif;

if ( ! function_exists( 'storeflex_sanitize_select' ) ) :
    
    /**
     * Sanitize select.
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     *
     * @since 1.0.0
     */
    function storeflex_sanitize_select( $input, $setting ) {
        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

endif;

if ( ! function_exists( 'storeflex_sanitize_repeater' ) ) :
    /**
     * Sanitize repeater value
     *
     * @since 1.0.0
     */
    function storeflex_sanitize_repeater( $input, $setting ) {
        $input_decoded = json_decode( $input, true );
            
        if ( !empty( $input_decoded ) ) {
            foreach ( $input_decoded as $boxes => $box ) {
                foreach ( $box as $key => $value ) {
                    if ( $key == 'mt_select_pages' || $key == 'mt_select_field' ) {
                        $input_decoded[$boxes][$key] = sanitize_key( $value );
                    } elseif ( $key == 'url' || $key == 'mt_item_upload' || $key == 'mt_item_link' ) {
                        $input_decoded[$boxes][$key] = esc_url_raw( $value );
                    } else {
                        $input_decoded[$boxes][$key] = wp_kses_post( $value );
                    }
                }
            }
            return json_encode( $input_decoded );
        }
        
        return $input;
    }

endif;

if ( ! function_exists( 'storeflex_sanitize_number' ) ) :

    /**
     * Sanitize number.
     *
     * @param int $value
     * @return int
     *
     * @since 1.0.0
     */
    function storeflex_sanitize_number( $input ) {

        return is_numeric( $input ) ? $input : 0;

    }

endif;

if ( ! function_exists( 'storeflex_sanitize_image' ) ) :

    /**
     * Sanitize Image
     *
     * @since 1.0.0
     */
    function storeflex_sanitize_image( $image, $setting ) {

        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        
        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );

        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? esc_url_raw( $image ) : $setting->default );
        
    }

endif;