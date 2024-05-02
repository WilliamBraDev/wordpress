<?php
/**
 * Partial template to display footer
 *
 * @package StoreFlex
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="storeflex-footer storeflex-clearfix">
    <?php
        /**
         * require file to display information in footer
         *
         * @since 1.0.0
         */

        get_template_part( 'template-parts/footer/partials/content', 'top-footer' );

    ?>

    <div class="bottom-footer-wrapper">
        <?php

         /**
         * require file to display footer widget area
         *
         * @since 1.0.0
         */

        get_template_part( 'template-parts/footer/partials/content', 'widget-area' );

         /**
         * require file to display footer widget area
         *
         * @since 1.0.0
         */

        get_template_part( 'template-parts/footer/partials/content', 'bottom-footer' );
    ?>

    </div><!-- bottom-footer-wrapper -->

</div> <!-- storeflex-footer -->