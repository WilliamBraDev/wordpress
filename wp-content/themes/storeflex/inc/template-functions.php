<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package StoreFlex
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function storeflex_body_classes( $classes ) {
    
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( ! is_active_sidebar( 'sidebar-right' ) && ! is_active_sidebar( 'sidebar-left' ) ) {
        $classes[] = 'no-sidebar';
    }

    // site layout
    $site_layout =  storeflex_get_customizer_option_value( 'storeflex_site_layout' );
    $classes[]   = 'storeflex-site-layout--'. esc_attr( $site_layout );

    // sitemode
    $site_mode_switcher_option = storeflex_get_customizer_option_value( 'storeflex_site_mode_switcher_option' );
    if( false == $site_mode_switcher_option) {
        $site_mode_option = storeflex_get_customizer_option_value( 'storeflex_site_mode_option' );
        $classes[] = 'site-mode--'.esc_attr( $site_mode_option);
    }

    // archive page style
    if ( ! is_page() && ! is_singular() && ! is_single() ) {
        $archive_page_style = storeflex_get_customizer_option_value( 'storeflex_archive_post_layout' );
        $classes[] = 'archive-style--'.esc_attr( $archive_page_style );
    }

    // sidebar layout
    $storeflex_archieve_and_blog_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_archive_and_blog_sidebar_layout' );
    $storeflex_post_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_post_sidebar_layout' );
    $storeflex_page_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_page_sidebar_layout' );

    if ( is_page() ) {
        if ( storeflex_is_active_woocommerce() ) {
            if ( ! is_cart() && ! is_checkout() && ! is_account_page() ) {
                $classes[] = 'sidebar-layout--'.esc_attr( $storeflex_page_sidebar_layout );
            }
        } else {
            $classes[] = 'sidebar-layout--'.esc_attr( $storeflex_page_sidebar_layout );   
        }
    } elseif ( is_single() || is_singular() ) {
        $classes[] = 'sidebar-layout--'.esc_attr( $storeflex_post_sidebar_layout );
    } elseif ( is_archive() || is_search() ) {
        $classes[] = 'sidebar-layout--'.esc_attr( $storeflex_archieve_and_blog_sidebar_layout );
    } elseif ( is_home() || is_front_page() ) {
        $classes[] = 'sidebar-layout--'.esc_attr( $storeflex_archieve_and_blog_sidebar_layout );
    }

	return $classes;
}
add_filter( 'body_class', 'storeflex_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function storeflex_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'storeflex_pingback_header' );

function storeflex_custom_scripts() {

    wp_enqueue_style( 'storeflex-fonts', storeflex_google_font_callback(), array(), null );

    wp_enqueue_style( 'storeflex-style', get_stylesheet_uri(), array(), STOREFLEX_VERSION );

	wp_enqueue_style( 'box-icons', get_template_directory_uri() . '/assets/library/box-icons/css/boxicons.css', array(), STOREFLEX_VERSION );

	wp_enqueue_style( 'storeflex-responsive-style', get_template_directory_uri() . '/assets/css/storeflex-responsive.css', array(), STOREFLEX_VERSION );

    wp_enqueue_style( 'storeflex-preloader-style', get_template_directory_uri() . '/assets/css/storeflex-preloader.css', array(), STOREFLEX_VERSION );

	wp_enqueue_script( 'storeflex-custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array( 'jquery'), STOREFLEX_VERSION, true );

	wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/css/lightslider.css', array(), '1.1.6' );

	wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.js', array(), '1.1.6', true );	

    wp_enqueue_script( 'storeflex-sticky', get_template_directory_uri() . '/assets/library/sticky/jquery.sticky.min.js', array( 'jquery' ), STOREFLEX_VERSION, true );

    wp_enqueue_script( 'jquery-sticky-sidebar', get_template_directory_uri() . '/assets/library/sticky-sidebar/theia-sticky-sidebar.min.js', array(), STOREFLEX_VERSION, true );

	wp_enqueue_script( 'storeflex-custom-woocommerce-scripts', get_template_directory_uri() . '/assets/js/custom-woocommerce-scripts.js', array( 'jquery'), STOREFLEX_VERSION, true );

    wp_enqueue_script( 'storeflex-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), STOREFLEX_VERSION, true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    $header_sticky_option = storeflex_get_customizer_option_value( 'storeflex_enable_sticky_header' );
    $header_sticky        = ( $header_sticky_option == true ) ? 'true' : 'false';
    $sidebar_sticky       = apply_filters('storeflex_sidebar_sticky_filter', 'true');
    $live_search_option   = storeflex_get_customizer_option_value( 'storeflex_advance_search_option' ); 
    $live_search          = ($live_search_option == 'live-search') ? 'true' : 'false';

    wp_localize_script( 'storeflex-custom-scripts', 'MT_JSObject',
        array(
            'header_sticky'     => $header_sticky,
            'sidebar_sticky'    => $sidebar_sticky,
            'live_search'       => $live_search,
            'ajaxUrl'           => admin_url('admin-ajax.php'),
            '_wpnonce'          => wp_create_nonce('storeflex-nonce')

        )
    );
}

add_action( 'wp_enqueue_scripts' , 'storeflex_custom_scripts' );

if ( ! function_exists( 'storeflex_icon_array' ) ) :

    /**
     * Define font awesome icons
     *
     * @return array();
     * @since 1.0.0
     */
    function storeflex_icon_array() {

       $icon_array = array(
    		// Social Media Icons
		    "mt mt-threads","mt mt-square-threads","mt mt-square-x-twitter","mt mt-x-twitter","bx bxl-facebook", "bx bxl-facebook-circle", "bx bxl-facebook-square", "bx bxl-twitter", "bx bxl-google", "bx bxl-google-plus", "bx bxl-google-plus-circle", "bx bxl-google-cloud", "bx bxl-instagram", "bx bxl-instagram-alt", "bx bxl-skype", "bx bxl-whatsapp", "bx bxl-whatsapp-square", "bx bxl-tiktok", "bx bxl-airbnb", "bx bxl-deviantart", "bx bxl-linkedin", "bx bxl-linkedin-square", "bx bxl-pinterest", "bx bxl-pinterest-alt", "bx bxl-adobe", "bx bxl-flickr", "bx bxl-flickr-square", "bx bxl-tumblr", "bx bxl-slack", "bx bxl-reddit", "bx bxl-messenger", "bx bxl-wordpress", "bx bxl-behance", "bx bxl-dribbble", "bx bxl-yahoo", "bx bxl-blogger", "bx bxl-snapchat", "bx bxl-wix", "bx bxl-meta", "bx bxl-baidu", "bx bxl-discord", "bx bxl-twitch", "bx bxl-discord-alt", "bx bxl-vk", "bx bxl-trip-advisor", "bx bxl-telegram", "bx bxl-quora", "bx bxl-ok-ru", "bx bxl-microsoft-teams", "bx bxl-foursquare", "bx bxl-soundcloud", "bx bxl-vimeo", "bx bxl-digg", "bx bxl-periscope", "bx bxl-xing", "bx bxl-youtube", "bx bxl-imdb", "bx bx-cart", "bx bx-basket", "bx bx-bag", "bx bx-package", "bx bx-shopping", "bx bx-store", "bx bx-receipt-alt", "bx bx-credit-card-alt", "bx bx-wallet", "bx bx-dollar", "bx bx-euro", "bx bx-pound", "bx bx-yen", "bx bx-bitcoin", "bx bx-coin-stack", "bx bx-credit-card-front", "bx bx-credit-card-back", "bx bx-gift", "bx bx-gift-card", "bx bx-barcode", "bx bx-barcode-reader", "bx bx-tag", "bx bx-tags", "bx bx-time", "bx bx-alarm", "bx bx-stopwatch", "bx bx-calendar-event", "bx bx-timer", "bx bx-hourglass", "bx bx-history", "bx bx-calendar-check", "bx bx-calendar-star", "bx bx-calendar-heart", "bx bx-calendar-edit", "bx bx-calendar-exclamation", "bx bx-calendar-plus", "bx bx-calendar-minus", "bx bx-calendar-week", "bx bx-calendar-cross", "bx bx-tachometer", "bx bx-watch", "bx bx-stopwatch", "bx bx-time", "bx bx-alarm", "bx bx-timer", "bx bx-calendar-alt", "bx bx-calendar", "bx bx-clock", "bx bx-world", "bx bx-cloud", "bx bx-flower", "bx bx-wifi", "bx bx-cut", "bx bx-copy", "bx bx-paper", "bx bx-book", "bx bx-spreadsheet", "bx bx-paint", "bx bx-image", "bx bx-film", "bx bx-music", "bx bx-headphone", "bx bx-battery", "bx bx-hourglass", "bx bx-key", "bx bx-coin", "bx bx-credit-card", "bx bx-shopping-bag", "bx bx-tag", "bx bx-lock", "bx bx-briefcase", "bx bx-calendar",
        );

        return $icon_array;
    }

endif;

if ( ! function_exists( 'storeflex_social_icon_array' ) ) :

    /**
     * Define font awesome social icons
     *
     * @return array();
     * @since 1.0.0
     */
    function storeflex_social_icon_array() {
        return array(
            "mt mt-threads","mt mt-square-threads","mt mt-square-x-twitter","mt mt-x-twitter","bx bxl-facebook", "bx bxl-facebook-circle", "bx bxl-facebook-square", "bx bxl-twitter", "bx bxl-google", "bx bxl-google-plus", "bx bxl-google-plus-circle", "bx bxl-google-cloud", "bx bxl-instagram", "bx bxl-instagram-alt", "bx bxl-skype", "bx bxl-whatsapp", "bx bxl-whatsapp-square", "bx bxl-tiktok", "bx bxl-airbnb", "bx bxl-deviantart", "bx bxl-linkedin", "bx bxl-linkedin-square", "bx bxl-pinterest", "bx bxl-pinterest-alt", "bx bxl-adobe", "bx bxl-flickr", "bx bxl-flickr-square", "bx bxl-tumblr", "bx bxl-slack", "bx bxl-reddit", "bx bxl-messenger", "bx bxl-wordpress", "bx bxl-behance", "bx bxl-dribbble", "bx bxl-yahoo", "bx bxl-blogger", "bx bxl-snapchat", "bx bxl-wix", "bx bxl-meta", "bx bxl-baidu", "bx bxl-discord", "bx bxl-twitch", "bx bxl-discord-alt", "bx bxl-vk", "bx bxl-trip-advisor", "bx bxl-telegram", "bx bxl-quora", "bx bxl-ok-ru", "bx bxl-microsoft-teams", "bx bxl-foursquare", "bx bxl-soundcloud", "bx bxl-vimeo", "bx bxl-digg", "bx bxl-periscope", "bx bxl-xing", "bx bxl-youtube", "bx bxl-imdb",
        );
    }
    
endif;

/**
 *  Menu items - Add "Custom sub-menu" in menu item render output
 *  if menu item has class "menu-item-target"
 */
add_filter( 'walker_nav_menu_start_el', 'storeflex_nav_description', 10, 4 );

if ( ! function_exists( 'storeflex_nav_description' ) ) :

    function storeflex_nav_description( $item_output, $item, $depth, $args ) {

        $primary_menu_description = storeflex_get_customizer_option_value( 'storeflex_enable_primary_menu_description' );

        if ( ! empty( $item->description ) && false !== $primary_menu_description ) {
            $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
        }
        return $item_output;
    }

endif;

if ( ! function_exists( 'storeflex_get_right_sidebar' ) ) :

    /**
     * Function define about page/post/archive sidebar
     */
    function storeflex_get_right_sidebar() {

        $storeflex_archieve_and_blog_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_archive_and_blog_sidebar_layout' );
        $storeflex_post_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_post_sidebar_layout' );
        $storeflex_page_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_page_sidebar_layout' );

        if ( is_page() )
        {    
            if ( storeflex_is_active_woocommerce() ) {
                if ( ! is_cart() && ! is_checkout() && !is_account_page() ) { 
                    $sidebar_layout = $storeflex_page_sidebar_layout;
                    switch ( $sidebar_layout ) {
                        case 'right-sidebar':
                            get_sidebar();
                            break;

                        case 'no-sidebar' || 'no-sidebar-center':
                            break;
                    }
                }
            } else {
                $sidebar_layout = $storeflex_page_sidebar_layout;
                switch ( $sidebar_layout ) {
                    case 'right-sidebar':
                        get_sidebar();
                        break;

                    case 'no-sidebar' || 'no-sidebar-center':
                        break;
                }
            }

        }
        elseif ( is_single() || is_singular() )
        {
            $sidebar_layout = $storeflex_post_sidebar_layout;
            switch ( $sidebar_layout ) {
                case 'right-sidebar':
                    get_sidebar();
                    break;

                case 'no-sidebar' || 'no-sidebar-center':
                    break;
            }

        }
        elseif( is_archive() || is_search() || is_home() )
        {
            $sidebar_layout = $storeflex_archieve_and_blog_sidebar_layout;
            switch ( $sidebar_layout ) {
                case 'right-sidebar':
                    get_sidebar();
                    break;

                case 'no-sidebar' || 'no-sidebar-center':
                    break;
            }

        }
    }
endif;

if ( ! function_exists( 'storeflex_get_left_sidebar' ) ) :

    /**
     * Function define about page/post/archive sidebar
     */
    function storeflex_get_left_sidebar() {

        $storeflex_archieve_and_blog_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_archive_and_blog_sidebar_layout' );
        $storeflex_post_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_post_sidebar_layout' );
        $storeflex_page_sidebar_layout = storeflex_get_customizer_option_value( 'storeflex_page_sidebar_layout' );

        if( is_page() )
        {   
            if ( storeflex_is_active_woocommerce() ) {
                if ( ! is_cart() && ! is_checkout() && !is_account_page() ) { 
                    $sidebar_layout = $storeflex_page_sidebar_layout;
                    switch ( $sidebar_layout ) {
                        case 'left-sidebar':
                            get_sidebar( 'left' );
                            break;

                        case 'no-sidebar' || 'no-sidebar-center':
                            break;
                    }
                }
            } else {
                $sidebar_layout = $storeflex_page_sidebar_layout;
                switch ( $sidebar_layout ) {
                    case 'left-sidebar':
                        get_sidebar( 'left' );
                        break;

                    case 'no-sidebar' || 'no-sidebar-center':
                        break;
                }
            }

        }
        elseif( is_single() || is_singular())
        {
            $sidebar_layout = $storeflex_post_sidebar_layout;
             switch ( $sidebar_layout ) {
                case 'left-sidebar':
                    get_sidebar( 'left' );
                    break;

                case 'no-sidebar' || 'no-sidebar-center':
                    break;
            }

        }
        elseif(is_archive() || is_search() || is_home() )
        {
            $sidebar_layout = $storeflex_archieve_and_blog_sidebar_layout;
             switch ( $sidebar_layout ) {
                case 'left-sidebar':
                    get_sidebar( 'left' );
                    break;

                case 'no-sidebar' || 'no-sidebar-center':
                    break;
            }

        }
    }

endif;

if ( ! function_exists( 'storeflex_minify_css' ) ) {

    /**
     * Minify CSS
     *
     * @since 1.0.0
     */
    function storeflex_minify_css( $css = '' ) {

        // Return if no CSS
        if ( ! $css ) return;

        // Normalize whitespace
        $css = preg_replace( '/\s+/', ' ', $css );

        // Remove ; before }
        $css = preg_replace( '/;(?=\s*})/', '', $css );

        // Remove space after , : ; { } */ >
        $css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

        // Remove space before , ; { }
        $css = preg_replace( '/ (,|;|\{|})/', '$1', $css );

        // Strips leading 0 on decimal values (converts 0.5px into .5px)
        $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

        // Strips units if value is 0 (converts 0px to 0)
        $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

        // Trim
        $css = trim( $css );

        // Return minified CSS
        return $css;

    }

}

if ( ! function_exists( 'storeflex_get_google_font_variants' ) ) :

    /**
     * get Google font variants
     *
     * @since 1.0.0
     */
    function storeflex_get_google_font_variants() {
        $storeflex_font_list = get_option( 'storeflex_google_font' );

        $font_family = $_REQUEST['font_family'];

        $variants_array = $storeflex_font_list[$font_family]['0'];

        $options_array = '<option value="inherit">'. __( 'Inherit', 'storeflex' ) .'</option>';
        foreach ( $variants_array as $variant ) {
            $variant_html = storeflex_convert_font_variants( $variant );
            $options_array .= '<option value="'.esc_attr( $variant ).'">'. esc_html( $variant_html ).'</option>';
        }
        echo $options_array;
        die();
    }

endif;

add_action( "wp_ajax_get_google_font_variants", "storeflex_get_google_font_variants" );

if ( ! function_exists( 'storeflex_convert_font_variants' ) ) :

    /**
     * function to manage the variant name according to their value.
     *
     * @param $value  - string
     * @return string - variant name
     * @since 1.0.0
     */
    function storeflex_convert_font_variants( $value ) {
        switch ( $value ) {
            case '100':
                return __( 'Thin 100', 'storeflex' );
                break;

            case '100italic':
                return __( 'Thin 100 Italic', 'storeflex' );
                break;

            case '200':
                return __( 'Extra-Light 200', 'storeflex' );
                break;

            case '200italic':
                return __( 'Extra-Light 200 Italic', 'storeflex' );
                break;

            case '300':
                return __( 'Light 300', 'storeflex' );
                break;

            case '300italic':
                return __( 'Light 300 Italic', 'storeflex' );
                break;

            case '400':
                return __( 'Normal 400', 'storeflex' );
                break;

            case 'italic':
                return __( 'Normal 400 Italic', 'storeflex' );
                break;

            case '400italic':
                return __( 'Normal 400 Italic', 'storeflex' );
                break;

            case '500':
                return __( 'Medium 500', 'storeflex' );
                break;

            case '500italic':
                return __( 'Medium 500 Italic', 'storeflex' );
                break;

            case '600':
                return __( 'Semi-Bold 600', 'storeflex' );
                break;

            case '600italic':
                return __( 'Semi-Bold 600 Italic', 'storeflex' );
                break;

            case '700':
                return __( 'Bold 700', 'storeflex' );
                break;

            case '700italic':
                return __( 'Bold 700 Italic', 'storeflex' );
                break;

            case '800':
                return __( 'Extra-Bold 800', 'storeflex' );
                break;

            case '800italic':
                return __( 'Extra-Bold 800 Italic', 'storeflex' );
                break;

            case '900':
                return __( 'Ultra-Bold 900', 'storeflex' );
                break;

            case '900italic':
                return __( 'Ultra-Bold 900 Italic', 'storeflex' );
                break;

            case 'inherit':
                return __( 'Inherit', 'storeflex' );
                break;

            default:
                break;
        }
    }

endif;

if ( ! function_exists( 'storeflex_google_font_callback' ) ) :

    /**
     * Load google fonts api link
     *
     * @since 1.0.0
     */
    function storeflex_google_font_callback() {

        $storeflex_get_font_list = get_option( 'storeflex_google_font' );

        $storeflex_body_font_family    = storeflex_get_customizer_option_value( 'storeflex_body_font_family' );
        $storeflex_body_font_weight    = implode( ',', $storeflex_get_font_list[$storeflex_body_font_family]['0'] );
        $body_typo_combo               = $storeflex_body_font_family.":".$storeflex_body_font_weight;

        $storeflex_heading_font_family     = storeflex_get_customizer_option_value( 'storeflex_heading_font_family' );
        $storeflex_heading_font_weight     = implode( ',', $storeflex_get_font_list[$storeflex_heading_font_family]['0'] );
        $heading_typo_combo                = $storeflex_heading_font_family.":".$storeflex_heading_font_weight;

        $storeflex_products_font_family     = storeflex_get_customizer_option_value( 'storeflex_products_font_family' );
        $storeflex_products_font_weight     = implode( ',', $storeflex_get_font_list[$storeflex_products_font_family]['0'] );
        $products_typo_combo                = $storeflex_products_font_family.":".$storeflex_products_font_weight;

        $storeflex_site_title_font_family     = storeflex_get_customizer_option_value( 'storeflex_site_title_font_family' );
        $storeflex_site_title_font_weight     = implode( ',', $storeflex_get_font_list[$storeflex_site_title_font_family]['0'] );
        $site_title_typo_combo                = $storeflex_site_title_font_family.":".$storeflex_site_title_font_weight;

        $storeflex_site_tagline_font_family     = storeflex_get_customizer_option_value( 'storeflex_site_tagline_font_family' );
        $storeflex_site_tagline_font_weight     = implode( ',', $storeflex_get_font_list[$storeflex_site_tagline_font_family]['0'] );
        $site_tagline_typo_combo                = $storeflex_site_tagline_font_family.":".$storeflex_site_tagline_font_weight;

        $get_fonts          = array( $body_typo_combo, $heading_typo_combo, $products_typo_combo, $site_title_typo_combo, $site_tagline_typo_combo );

        $final_font_string = implode( '|', $get_fonts );

        $google_fonts_url = '';

        if ( $final_font_string ) {
            $query_args = array(
                'family' => urlencode( $final_font_string ),
                'subset' => urlencode( 'latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic,khmer,devanagari,arabic,hebrew,telugu' )
            );

            $google_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $google_fonts_url;
    }

endif;

if ( ! function_exists( 'storeflex_get_actual_font_weight' ) ) :

    /**
     * get font weight in integer
     */
    function storeflex_get_actual_font_weight( $font_weight ) {

        if ( 'regular' == $font_weight ) {
            $font_weight = '400';
        } elseif ( 'italic' == $font_weight ) {
            $font_weight = '400italic';
        }

        return $font_weight;

    }

endif;

if (!function_exists('storeflex_search_posts_content')) :

    /**
     * Ajax call for live search
     *
     * @return array
     * @since 1.0.0
     */
    function storeflex_search_posts_content() {

        check_ajax_referer('storeflex-nonce', 'security');

        $search_key = isset( $_POST['search_key'] ) ? sanitize_text_field( $_POST['search_key'] ) : '' ;

        $query_vars = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            's' => $search_key,
        );

        $n_posts = new WP_Query( $query_vars );
        $res['loaded'] = false;

        ob_start();
        echo '<div class="storeflex-search-results-wrap">';
        echo '<div class="storeflex-search-posts-wrap">';

        if ( $n_posts->have_posts() ) {
            $res['loaded'] = true; 

            while ( $n_posts->have_posts() ) :
                $n_posts->the_post();
        ?>
                <div class="storeflex-item">

                    <?php if (  has_post_thumbnail() ) { ?> 

                    <figure class="storeflex-post-thumb-wrap" <?php storeflex_schema_markup( 'image' ); ?>>

                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" <?php storeflex_schema_markup( 'url' ); ?>>
        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'thumbnail', array(
                                    'title' => the_title_attribute(array(
                                        'echo' => false
                                    ))
                                ));
                            }
                            ?>
                        </a>
                    </figure>

                    <?php } ?>

                    <div class="storeflex-post-element">
                        <h4 class="storeflex-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" <?php storeflex_schema_markup( 'url' ); ?>><?php the_title(); ?></a></h4>
                        <?php storeflex_posted_on(); ?>
                    </div> <!-- storeflex-post-element -->

                </div><!-- storeflex-item -->
    <?php
            endwhile;

        } else {

            echo 'No Results Found'; 

            $all_product_categories = get_terms(
                array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,          
                )
            );

            if ( ! empty( $all_product_categories ) ) {
                
                echo '<div class="storeflex-search-suggestion-category"> #Suggestion ';

                foreach ($all_product_categories as $product_category) {
                    echo '<li><a href="' . esc_url(get_term_link($product_category->term_id, 'product_cat')) . '">' . esc_html($product_category->name) . '</a></li>';
                }

                echo '</div>';
            }

        }
        echo '</div>';
        echo '</div>';

        $res['posts'] = ob_get_clean();
        
        echo json_encode($res);
        wp_die();
    }

    add_action('wp_ajax_storeflex_search_posts_content', 'storeflex_search_posts_content');

    add_action('wp_ajax_nopriv_storeflex_search_posts_content', 'storeflex_search_posts_content');

endif;

if ( ! function_exists( 'storeflex_get_schema_markup' ) ) :

    /**
     * Return correct schema markup
     *
     * @since 1.0.0
     */
    function storeflex_get_schema_markup( $location ) {

        // Default
        $schema = $itemprop = $itemtype = '';

        // HTML
        if ( 'html' == $location ) {
            if ( is_home() || is_front_page() ) {
                $schema = 'itemscope=itemscope itemtype=https://schema.org/WebPage';
            } elseif ( is_category() || is_tag() || is_singular( 'post') ) {
                $schema = 'itemscope=itemscope itemtype=https://schema.org/Blog';
            } elseif ( is_page() ) {
                $schema = 'itemscope=itemscope itemtype=https://schema.org/WebPage';
            } else {
                $schema = 'itemscope=itemscope itemtype=https://schema.org/WebPage';
            }
        }

        // Creative work
        if ( 'creative_work' == $location ) {
            if ( is_single() ) {
                $schema = 'itemscope=itemscope itemtype=https://schema.org/creative_work';
            } elseif ( is_home() || is_archive() ) {
                $schema = 'itemscope=itemscope itemtype=https://schema.org/creative_work';
            }
        }

        // Header
        if ( 'header' == $location ) {
            $schema = 'itemscope=itemscope itemtype=https://schema.org/WPHeader';
        }

        // Logo
        if ( 'logo' == $location ) {
            $schema = 'itemscope itemtype=https://schema.org/Organization';
        }

        // Navigation
        if ( 'site_navigation' == $location ) {
            $schema = 'itemscope=itemscope itemtype=https://schema.org/SiteNavigationElement';
        }

        // Main
        if ( 'main' == $location ) {
            $itemtype = 'https://schema.org/WebPageElement';
            $itemprop = 'mainContentOfPage';
        }

        // Sidebar
        if ( 'sidebar' == $location ) {
            $schema = 'itemscope=itemscope itemtype=https://schema.org/WPSideBar';
        }

        // Footer widgets
        if ( 'footer' == $location ) {
            $schema = 'itemscope=itemscope itemtype=https://schema.org/WPFooter';
        }

        // Headings
        if ( 'headline' == $location ) {
            $schema = 'itemprop=headline';
        }

        // Posts
        if ( 'entry_content' == $location ) {
            $schema = 'itemprop=text';
        }

        // Publish date
        if ( 'publish_date' == $location ) {
            $schema = 'itemprop=datePublished';
        }

        // Modified date
        if ( 'modified_date' == $location ) {
            $schema = 'itemprop=dateModified';
        }

        // Author name
        if ( 'author_name' == $location ) {
            $schema = 'itemprop=name';
        }

        // Author link
        if ( 'author_link' == $location ) {
            $schema = 'itemprop=author itemscope=itemscope itemtype=https://schema.org/Person';
        }

        // Item
        if ( 'item' == $location ) {
            $schema = 'itemprop=item';
        }

        // Url
        if ( 'url' == $location ) {
            $schema = 'itemprop=url';
        }

        // Position
        if ( 'position' == $location ) {
            $schema = 'itemprop=position';
        }

        // Image
        if ( 'image' == $location ) {
            $schema = 'itemprop=image';
        }

        // Avatar
        if ( 'avatar' == $location ) {
            $schema = 'itemprop=avatar';
        }

        // Description
        if ( 'description' == $location ) {
            $schema = 'itemprop=description';
        }

        return ' ' . apply_filters( 'storeflex_schema_markup_items', $schema );

    }

endif;

if ( ! function_exists( 'storeflex_schema_markup' ) ) :

    /**
     * Outputs correct schema markup
     *
     * @since 1.0.0
     */
    function storeflex_schema_markup( $location ) {

        echo storeflex_get_schema_markup( $location );

    }

endif;

