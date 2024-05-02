<?php
/**
 * Partial template to display scroll up
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$enable_scroll_top = storeflex_get_customizer_option_value( 'storeflex_enable_scroll_top' );

if ( $enable_scroll_top == false ) {
    return;
}

?>

<div class="storeflex-scrollup">
    <i class="bx bx-up-arrow-alt"> </i>
</div> <!-- storeflex-scrollup -->