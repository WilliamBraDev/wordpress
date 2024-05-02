<?php
/**
 * Partial template to display sitemode
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$site_mode_display = storeflex_get_customizer_option_value( 'storeflex_site_mode_switcher_option' );

if ( $site_mode_display == false ) {
    return;
}

?>

<div id="storeflex-site-mode-wrap" class="storeflex-icon-elements">
    <a id="mode-switcher" class="switch light-mode" data-site-mode="light-mode" href="#">
        <span class="site-mode-icon"><?php esc_html_e( 'site mode button', 'storeflex' ); ?></span>
    </a>
</div><!-- #storeflex-site-mode-wrap -->