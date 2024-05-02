/**
 * Combine scripts for Customizer Controls.
 *
 * @package StoreFlex
 */

( function( api ) {

/*--------------- Tab Control ------------------------*/

    api.Tabs = [];
    api.Tab = api.Control.extend({
        ready: function () {
            var control = this;
            control.container.find('li.section-tab-button').click(function (e) {
                var key = jQuery(this).data('tab');
                e.preventDefault();
                control.container.find('li.section-tab-button').removeClass('active');
                jQuery(this).addClass('active');
                control.toggleActiveControls(key);
            });
            api.Tabs.push(control.id);
        },
        toggleActiveControls: function (key) {
            var control = this,
                currentFields = control.params.choices[key].fields;

            _.each(control.params.fields, function (id) {
                var tabControl = api.control(id);
                if (undefined !== tabControl) {
                    if (tabControl.active() && jQuery.inArray(id, currentFields) >= 0) {
                        tabControl.toggle(true);
                    } else {
                        tabControl.toggle(false);
                    }
                }
            });
        }
    });
    jQuery.extend(api.controlConstructor, {
        'mt-tabs': api.Tab
    });

    api.bind('ready', function () {
        _.each(api.Tabs, function (id) {
            var control = api.control(id);
            var iniID = control.container.find('li.active').data('tab');
            control.toggleActiveControls(iniID);
        });
    });

/*--------------- Typography Control------------------------*/
    
    api.controlConstructor['mt-typography'] = api.Control.extend( {
        ready: function() {
            var control = this;
            control.container.on( 'change', '.typography-font-style select', function() {
                control.settings['style'].set( jQuery( this ).val() );
            });
            control.container.on( 'click', '.typography-font-transform input', function() {
                control.settings['transform'].set( jQuery( this ).val() );
            });
            control.container.on( 'change', '.typography-text-decoration select', function() {
                control.settings['text_decoration'].set( jQuery( this ).val() );
            });
        }
    } );

/*--------------- Dimensions -------------------------------*/

    api.controlConstructor['dimensions'] = api.Control.extend({
        ready: function () {
            var control = this;
            control.container.on('change keyup paste', '.mt-dimension-desktop_top', function () {
                control.settings['desktop_top'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-desktop_right', function () {
                control.settings['desktop_right'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-desktop_bottom', function () {
                control.settings['desktop_bottom'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-desktop_left', function () {
                control.settings['desktop_left'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-tablet_top', function () {
                control.settings['tablet_top'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-tablet_right', function () {
                control.settings['tablet_right'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-tablet_bottom', function () {
                control.settings['tablet_bottom'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-tablet_left', function () {
                control.settings['tablet_left'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-mobile_top', function () {
                control.settings['mobile_top'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-mobile_right', function () {
                control.settings['mobile_right'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-mobile_bottom', function () {
                control.settings['mobile_bottom'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mt-dimension-mobile_left', function () {
                control.settings['mobile_left'].set(jQuery(this).val());
            });
        }
    });


    api.sectionConstructor['mt-upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );

jQuery(document).ready(function($) {

/*--------------- Custom controls extra -----------*/

    $('.customize-control-select2').select2({
        allowClear: true
    });

/*---------------------- Responsive Switcher -----------------*/

    $( '.customize-control .responsive-switchers button:not(.mt-processed)' ).on( 'click', function( event ) {

        $(this).addClass('mt-processed');
        // Set up variables
        var $this       = $( this ),
            $devices    = $( '.responsive-switchers' ),
            $device     = $( event.currentTarget ).data( 'device' ),
            $control    = $( '.customize-control.has-switchers' ),
            $body       = $( '.wp-full-overlay' ),
            $footer_devices = $( '.wp-full-overlay-footer .devices' );

        // Button class
        $devices.find( 'button' ).removeClass( 'active' );
        $devices.find( 'button.preview-' + $device ).addClass( 'active' );

        // Control class
        $control.find( '.control-wrap' ).removeClass( 'active' );
        $control.find( '.control-wrap.' + $device ).addClass( 'active' );
        $control.removeClass( 'control-device-desktop control-device-tablet control-device-mobile' ).addClass( 'control-device-' + $device );

        // Wrapper class
        $body.removeClass( 'preview-desktop preview-tablet preview-mobile' ).addClass( 'preview-' + $device );

        // Panel footer buttons
        $footer_devices.find( 'button' ).removeClass( 'active' ).attr( 'aria-pressed', false );
        $footer_devices.find( 'button.preview-' + $device ).addClass( 'active' ).attr( 'aria-pressed', true );

        // Open switchers
        if ( $this.hasClass( 'preview-desktop' ) ) {
            $control.toggleClass( 'responsive-switchers-open' );
        }

    } );

    // If panel footer buttons clicked
    $( '.wp-full-overlay-footer .devices button:not(.mt-processed)' ).on( 'click', function( event ) {

        $(this).addClass('mt-processed');
        // Set up variables
        var $this       = $( this ),
            $devices    = $( '.customize-control.has-switchers .responsive-switchers' ),
            $device     = $( event.currentTarget ).data( 'device' ),
            $control    = $( '.customize-control.has-switchers' );

        // Button class
        $devices.find( 'button' ).removeClass( 'active' );
        $devices.find( 'button.preview-' + $device ).addClass( 'active' );

        // Control class
        $control.find( '.control-wrap' ).removeClass( 'active' );
        $control.find( '.control-wrap.' + $device ).addClass( 'active' );
        $control.removeClass( 'control-device-desktop control-device-tablet control-device-mobile' ).addClass( 'control-device-' + $device );

        // Open switchers
        if ( ! $this.hasClass( 'preview-desktop' ) ) {
            $control.addClass( 'responsive-switchers-open' );
        } else {
            $control.removeClass( 'responsive-switchers-open' );
        }

    } );

/*--------------- Color Tab -----------------------*/

    $('.color-tab-toggle').on('click', function () {
        $(this).find('span').toggleClass( 'dashicons-edit dashicons-no-alt' );
        $(this).closest('.customize-control').find('.color-tab-wrap').slideToggle();
    });

    $('.color-tab-switchers li').on('click', function () {
        if ($(this).hasClass('active')) {
            return false;
        }
        var clicked = $(this).attr('data-tab');
        $(this).parent('.color-tab-switchers').find('li').removeClass('active');
        $(this).addClass('active');
        $(this).closest('.color-tab-wrap').find('.color-tab-contents > div').hide();
        $(this).closest('.color-tab-wrap').find('.' + clicked).fadeIn();
    });

/*---------------------- Dimensions --------------------------*/
    
    // Linked button
    $('.mt-linked').on('click', function () {
        // Set up variables
        var $this = $(this);
        // Remove linked class
        $this.parent().parent('.mt-dimension-wrap').prevAll().slice(0, 4).find('input').removeClass('linked').attr('data-element', '');
        // Remove class
        $this.parent('.mt-link-dimensions').removeClass('unlinked');
    });

    // Unlinked button
    $('.mt-unlinked').on('click', function () {
        // Set up variables
        var $this = $(this),
                $element = $this.data('element');
        // Add linked class
        $this.parent().parent('.mt-dimension-wrap').prevAll().slice(0, 4).find('input').addClass('linked').attr('data-element', $element);
        // Add class
        $this.parent('.mt-link-dimensions').addClass('unlinked');
    });

    // Values linked inputs
    $('.mt-dimension-wrap').on('input', '.linked', function () {
        var $data = $(this).attr('data-element'),
                $val = $(this).val();
        $('.linked[ data-element="' + $data + '" ]').each(function (key, value) {
            $(this).val($val).change();
        });
    });

});
/*--------------- Buttonset Control ------------------------*/
    
    wp.customize.controlConstructor['mt-buttonset'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Change the value
            this.container.on( 'click', 'input', function() {
                control.setting.set( jQuery( this ).val() );
            });
        }
    });

/*--------------- Dropdown categories Control ------------------------*/

    wp.customize.controlConstructor['mt-dropdown-categories'] = wp.customize.Control.extend({

        ready: function() {

            'use strict';

            var control = this;

            jQuery('.dropdown-cats-select2').select2({
                multiple: true,
                allwoClear: true,
            });

            control.container.on( 'change', 'select', function() {
                control.setting.set( jQuery( this ).val() );
            } );

        }

    });

/*--------------- Radio Icons Control ------------------------*/

    wp.customize.controlConstructor['mt-radio-icons'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Change the value
            this.container.on( 'change', 'input', function() {
                control.setting.set( jQuery( this ).val() );
            });
        }
    });

/*--------------- Radio Images Control ------------------------*/

    wp.customize.controlConstructor['mt-radio-image'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;

            // Change the value
            this.container.on( 'click', 'input', function() {
                control.setting.set( jQuery( this ).val() );
            });
        }
    });

/*--------------- Range Control ------------------------*/

    wp.customize.controlConstructor['mt-range'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Update the text value
            jQuery("input[type=range]")
                .off()
                .on("input", function () {
                    var range = jQuery(this);
                    var value = range.val();
                    range.siblings("input.mt-range-input").val(value);
                });
            // Change the text value
            jQuery("input.mt-range-input")
                .off()
                .on("input", function () {
                    var rangeInput = jQuery(this);
                    var value = rangeInput.val();
                    rangeInput.siblings("input[type=range]").val(value).trigger("input");
                });
            jQuery(".mt-reset-slider")
                .off()
                .on("click", function () {
                    var range = jQuery(this).parents('.control-wrap').find("input[type=range]");
                    var resetValue = range.data("reset_value");
                    range.val(resetValue).trigger("input");
                });
            // Change the value
            this.container.on("input", "input[type=range]", function () {
                control.setting.set(jQuery(this).val());
            });
        }
    });

/*--------------- Redirect Control ------------------------*/

    wp.customize.controlConstructor['mt-redirect'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            control.container.find('.redirect-item').each(function(){
                var singleItem = jQuery(this);
                singleItem.on('click', function(e){
                    e.preventDefault();
                    var type    = jQuery(this).data('type'),
                        type_id = jQuery(this).data('id');
                    switch( type ) {
                        case 'section' :
                            wp.customize.section(type_id).focus();
                            break;
                        default :
                            wp.customize.control(type_id).focus();
                            break;
                    }
                });
            });
        }
    });

/*--------------- Sortable Control ------------------------*/

    wp.customize.controlConstructor['mt-sortable'] = wp.customize.Control.extend({
        ready: function() {
            'use strict';
            var control = this;
            // Set the sortable container.
            control.sortableContainer = control.container.find( 'ul.sortable' ).first();
            // Init sortable.
            control.sortableContainer.sortable({
                // Update value when we stop sorting.
                stop: function() {
                    control.updateValue();
                }
            }).disableSelection().find( 'li' ).each( function() {
                // Enable/disable options when we click on the eye of Thundera.
                jQuery( this ).find( 'i.visibility' ).click( function() {
                    jQuery( this ).toggleClass( 'dashicons-visibility dashicons-hidden' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
                });
            }).click( function() {
                // Update value on click.
                control.updateValue();
            });
        },

        /**
         * Updates the sorting list
         */
        updateValue: function() {
            'use strict';
            var control = this,
                newValue = [];
            this.sortableContainer.find( 'li' ).each( function() {
                if ( ! jQuery( this ).is( '.invisible' ) ) {
                    newValue.push( jQuery( this ).data( 'value' ) );
                }
            });
            control.setting.set( newValue );
        }
    });

/*--------------- Toggle Control ------------------------*/

    wp.customize.controlConstructor['mt-toggle'] = wp.customize.Control.extend({
        ready: function(){
            'use strict';
            var control = this,
                checkboxValue = control.setting._value;
            // Save the value
            this.container.on( 'change', 'input', function() {
                checkboxValue = ( jQuery( this ).is( ':checked' ) ) ? true : false;
                control.setting.set( checkboxValue );
            });
        }
    });




/*--------------- Slider Control ------------------------*/
    
    wp.customize.controlConstructor['mt-slider'] = wp.customize.Control.extend({

        ready: function() {

            'use strict';

            var control = this,
                desktop_slider          = control.container.find( '.mt-slider.desktop-slider' ),
                desktop_slider_input    = desktop_slider.next( '.mt-slider-input' ).find( 'input.desktop-input' ),
                tablet_slider           = control.container.find( '.mt-slider.tablet-slider' ),
                tablet_slider_input     = tablet_slider.next( '.mt-slider-input' ).find( 'input.tablet-input' ),
                mobile_slider           = control.container.find( '.mt-slider.mobile-slider' ),
                mobile_slider_input     = mobile_slider.next( '.mt-slider-input' ).find( 'input.mobile-input' ),
                slider_input,
                $this,
                val;

            // Desktop slider
            desktop_slider.slider( {
                range: 'min',
                value: desktop_slider_input.val(),
                min: +desktop_slider_input.attr( 'min' ),
                max: +desktop_slider_input.attr( 'max' ),
                step: +desktop_slider_input.attr( 'step' ),
                slide: function( event, ui ) {
                    desktop_slider_input.val( ui.value ).keyup();
                },
                change: function( event, ui ){
                    control.settings['desktop'].set( ui.value );
                }
            } );

            // Tablet slider
            tablet_slider.slider( {
                range: 'min',
                value: tablet_slider_input.val(),
                min: +tablet_slider_input.attr( 'min' ),
                max: +tablet_slider_input.attr( 'max' ),
                step: +desktop_slider_input.attr( 'step' ),
                slide: function( event, ui ) {
                    tablet_slider_input.val( ui.value ).keyup();
                },
                change: function( event, ui ){
                    control.settings['tablet'].set( ui.value );
                }
            } );

            // Mobile slider
            mobile_slider.slider( {
                range: 'min',
                value: mobile_slider_input.val(),
                min: +mobile_slider_input.attr( 'min' ),
                max: +mobile_slider_input.attr( 'max' ),
                step: +desktop_slider_input.attr( 'step' ),
                slide: function( event, ui ) {
                    mobile_slider_input.val( ui.value ).keyup();
                },
                change: function( event, ui ){
                    control.settings['mobile'].set( ui.value );
                }
            } );

            // Update the slider when the number value change
            jQuery( 'input.desktop-input' ).on( 'change keyup paste', function() {
                $this           = jQuery( this );
                val             = $this.val();
                slider_input    = $this.parent().prev( '.mt-slider.desktop-slider' );

                slider_input.slider( 'value', val );
            } );

            jQuery( 'input.tablet-input' ).on( 'change keyup paste', function() {
                $this           = jQuery( this );
                val             = $this.val();
                slider_input    = $this.parent().prev( '.mt-slider.tablet-slider' );

                slider_input.slider( 'value', val );
            } );

            jQuery( 'input.mobile-input' ).on( 'change keyup paste', function() {
                $this           = jQuery( this );
                val             = $this.val();
                slider_input    = $this.parent().prev( '.mt-slider.mobile-slider' );

                slider_input.slider( 'value', val );
            } );

            // Save the values
            control.container.on( 'change keyup paste', '.desktop input', function() {
                control.settings['desktop'].set( jQuery( this ).val() );
            } );

            control.container.on( 'change keyup paste', '.tablet input', function() {
                control.settings['tablet'].set( jQuery( this ).val() );
            } );

            control.container.on( 'change keyup paste', '.mobile input', function() {
                control.settings['mobile'].set( jQuery( this ).val() );
            } );

        }

    });

/*--------------- Icon Checkbox Control ------------------------*/

    wp.customize.controlConstructor['mt-icon-checkbox'] = wp.customize.Control.extend({

    // When we're finished loading continue processing.
    ready: function() {

        'use strict';

        var control = this;

        //console.log(control.container);

        control.container.find('input').each(function(){
            var primeCheckVal = jQuery(this).data('prime');
            if (true === primeCheckVal) {
                jQuery(this).attr('disabled',true);
            }
        });

        // Save the value
        control.container.on( 'change', 'input', function() {
            var value = [],
                i = 0;

            // Build the value as an object using the sub-values from individual checkboxes.
            jQuery.each( control.params.choices, function( key, subValue ) {
                if ( control.container.find( 'input[value="' + key + '"]' ).is( ':checked' ) ) {
                    value[ i ] = key;
                    i++;
                }
            });

            // Update the value in the customizer.
            control.setting.set( value );

        });

    }

});


