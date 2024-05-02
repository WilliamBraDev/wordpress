/**
 * Custom scripts for Toggle Control
 *
 * @package StoreFlex
 * @since 1.0.0
 */

jQuery(document).ready(function($) {
	
    var upgradeImgSrc = npcontrolsJSObject.imgPath;
    $('.customize-control-mt-upgrade .hover-img').each(function(){
        var reqFile = $(this).attr('data-src'), imgSrc = upgradeImgSrc + reqFile;
        $(this).find('.hover-icon').after('<img src='+imgSrc+' />');
    });

    $('.customize-control-mt-upgrade .hover-img').hover(function(){
        $(this).find('img').toggle();
    });

});