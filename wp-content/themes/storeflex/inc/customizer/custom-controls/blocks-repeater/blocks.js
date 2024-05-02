jQuery(document).ready(function($) {

    // collect repeater control field value
    function repeater_value_refresh() {
        var controlValue = [], container = $(".blocks-repeater-control-wrap");
        container.find(" > .storeflex-block").each(function() {
            var newValue = {}, blockName = $(this).attr("block-name");
            newValue['type'] = blockName;
            $(this).find(".block-repeater-control-field").each(function() {
                var fieldValue, fieldName = $(this).data("name");
                if ($(this).attr("type") === 'checkbox') {
                    if ($(this).is(":checked")) {
                        fieldValue = true;
                    } else {
                        fieldValue = false;
                    }
                } else {
                    fieldValue = $(this).val();
                }
                newValue[fieldName] = fieldValue;
            });
            controlValue.push(newValue);
        })
        container.next(".blocks-repeater-control").val(JSON.stringify(controlValue)).trigger("change");
    }

    // collect repeater field values
    $(".blocks-repeater-control-wrap").on("change keyup", ".storeflex-block .block-repeater-control-field", function() {
        repeater_value_refresh();
    });

    // display icon field
    $(".blocks-repeater-control-wrap").on("click", ".block-option", function() {
        var _this = $(this);
        $(this).toggleClass("dashicons-visibility dashicons-hidden");
        _this.parents(".storeflex-block").toggleClass("storeflex-hide");
        $(this).next("input[type='checkbox']").trigger('click');
        if (_this.hasClass('dashicons-hidden')) {
            _this.parents(".storeflex-block").find(".block-content-wrap").slideUp("normal");
        }
        repeater_value_refresh();
    });

    // radio image field
    $(".blocks-repeater-control-wrap").on("click", ".customize-radio-image-field label", function() {
        var _this = $(this), val = _this.data("value");
        _this.addClass("selected").siblings("label").removeClass("selected");
        _this.siblings(".block-repeater-control-field").val(val);
        repeater_value_refresh();
    });

    // toggle field
    $(".blocks-repeater-control-wrap").on("click", ".customize-toggle-field label.toggle-label", function() {
        $(this).parents(".toggle-wrapper").find("input[type='checkbox']").toggleClass("click");
        $(this).parents(".toggle-wrapper").find("input[type='checkbox']").trigger("click");
        repeater_value_refresh();
    });

    // multicheckbox field
    $(".customize-multicheckbox-field").on("click, change", ".multicheckbox-content input", function() {
        var _this = $(this), parent = _this.parents(".customize-multicheckbox-field"), currentVal, currentFieldVal = parent.find(".block-repeater-control-field").val();
        currentFieldVal = JSON.parse(currentFieldVal);
        currentVal = _this.val();
        if (_this.is(":checked")) {
            if (currentFieldVal != 'null') {
                currentFieldVal.push(currentVal);
            }
        } else {
            if (currentFieldVal != 'null') {
                currentFieldVal.splice($.inArray(currentVal, currentFieldVal), 1);
            }
        }
        parent.find(".block-repeater-control-field").val(JSON.stringify(currentFieldVal));
        repeater_value_refresh();
    });

    // trigger block content - block content show/hide
    $(".blocks-repeater-control-wrap").on("click", ".block-settings", function() {
        var _this = $(this), blockOption = _this.parents(".block-header").find('.block-option');
        if (blockOption.hasClass('dashicons-visibility')) {
            _this.parents(".storeflex-block").find(".block-content-wrap").slideToggle();
        }
    });

    $(".blocks-repeater-control-wrap").on("click", ".storeflex-block .close-block", function() {
        var _this = $(this);
        _this.parents(".storeflex-block").find(".block-content-wrap").slideUp("normal");
    });

    // remove block
    $(".blocks-repeater-control-wrap").on("click", ".storeflex-block .remove-block", function() {
        var _this = $(this), blockelement = _this.parents(".storeflex-block");
        blockelement.find(".block-content-wrap").slideUp("normal", function() {
            $(this).parent().remove();
            repeater_value_refresh();
        });
        _this.parents(".storeflex-block").find(".block-header-icon i").toggleClass("bx-chevron-up bx-chevron-down");
    });

    // group wrapper
    $(".blocks-repeater-control-wrap").on("click", ".block-query-group span", function() {
        var _this = $(this);
        _this.toggleClass("dashicons-edit dashicons-no-alt");
        _this.parents('.group-toggle-wrapper').find('.field-group-wrapper').toggle();
    });

    // sortable blocks 
    $(".blocks-repeater-control-wrap").sortable({
        orientation: "vertical",
        items: "> .storeflex-block",
        update: function (event, ui) {
            repeater_value_refresh();
        }
    });

    // Upload image
    $(".blocks-repeater-control-wrap").on("click", ".img-upload-button", function() {
        var _this = $(this), parent = _this.parents('.customize-upload-image-field'), imgContainer = parent.find('.thumbnail-image'), placeholder = parent.find('.placeholder'), imgIdInput = parent.find('.block-repeater-control-field');

        frame = wp.media({
            title: 'Select or Upload Image',
            button: {
                text: 'Use Image'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            imgContainer.html('<img src="'+attachment.url+'" style="max-width:100%;"/>');
            placeholder.addClass('hidden');
            imgIdInput.val(attachment.url).trigger('change');
        });

        frame.open();
    });

    // Delete image
    $('.blocks-repeater-control-wrap').on('click', '.img-delete-button', function() {
        var _this = $(this), parent = _this.parents('.customize-upload-image-field'), imgContainer = parent.find('.thumbnail-image'), placeholder = parent.find('.placeholder'), imgIdInput = parent.find('.block-repeater-control-field');
        imgContainer.find('img').remove();
        placeholder.removeClass('hidden');
        imgIdInput.val('').trigger('change');
    });

});
