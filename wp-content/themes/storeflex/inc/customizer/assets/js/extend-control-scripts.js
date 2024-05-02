/**
 * Script for Extended Custom Control
 *
 * @package StoreFlex
 */

(function($) {

	wp.customize.bind('ready', function () {
        const controlsArray = [
            'storeflex_archive_sidebar_heading_toggle',
            'storeflex_post_sidebar_heading_toggle',
            'store_post_feature_post_heading',
            'storeflex_banner_layout_heading',
        ];

        controlsArray.forEach(function (control) {
            if ( ! wp.customize.control(control).params.initial ) {
                var _this = wp.customize.control(control).container;
                _this.find(".toggle-button .dashicons").removeClass("dashicons-arrow-up-alt2").addClass("dashicons-arrow-down-alt2");
                _this.nextUntil(".customize-control-mt-heading-toggle").hide();
            }
        });
    });

})(jQuery);

