document.addEventListener("DOMContentLoaded", function() {
  var modeSwitcher = document.getElementById("mode-switcher");
  var templateBodyClass = document.body;

  if ( !modeSwitcher ) {
    return;
  }

  function setSiteMode(mode) {
      localStorage.setItem("site-mode", mode);
  }

  function getSiteMode() {
      return localStorage.getItem("site-mode");
  }

  // Check if a site mode is stored in local storage and set the mode accordingly
  var modeStored = getSiteMode();
  if (modeStored) {
      if (modeStored === "dark-mode") {
          // Set dark mode
          modeSwitcher.classList.remove("light-mode");
          modeSwitcher.classList.add("dark-mode");
          modeSwitcher.setAttribute("data-site-mode", "dark-mode");
          templateBodyClass.classList.remove('site-mode--light');
          templateBodyClass.classList.add('site-mode--dark');
      } else {
          // Set light mode (or default)
          modeSwitcher.classList.remove("dark-mode");
          modeSwitcher.classList.add("light-mode");
          modeSwitcher.setAttribute("data-site-mode", "light-mode");
          templateBodyClass.classList.remove('site-mode--dark');
          templateBodyClass.classList.add('site-mode--light');
      }
  }

  // Add click event listener to mode switcher
  modeSwitcher.addEventListener("click", function(e) {
      e.preventDefault();
      var currentMode = modeSwitcher.getAttribute("data-site-mode");

      if (currentMode === "light-mode") {
          // Switch to dark mode
          setSiteMode("dark-mode");
          modeSwitcher.classList.remove("light-mode");
          modeSwitcher.classList.add("dark-mode");
          modeSwitcher.setAttribute("data-site-mode", "dark-mode");
          templateBodyClass.classList.remove('site-mode--light');
          templateBodyClass.classList.add('site-mode--dark');
      } else {
          // Switch to light mode
          setSiteMode("light-mode");
          modeSwitcher.classList.remove("dark-mode");
          modeSwitcher.classList.add("light-mode");
          modeSwitcher.setAttribute("data-site-mode", "light-mode");
          templateBodyClass.classList.remove('site-mode--dark');
          templateBodyClass.classList.add('site-mode--light');
      }
  });
});

jQuery(document).ready(function($) {

    var liveSearch      = MT_JSObject.live_search,
        headerSticky    = MT_JSObject.header_sticky,
        sidebarSticky   = MT_JSObject.sidebar_sticky,
        ajaxUrl         = MT_JSObject.ajaxUrl,
        _wpnonce        = MT_JSObject._wpnonce,
        KEYCODE_TAB     = 9;

    var rtl = false;
    var dir = "left";
    if ($('body').hasClass("rtl")) {
        rtl = true;
        dir = "right";
    };

     /**
     * Scripts for Header Sticky Sidebar
     */
    $('.sidebar-menu-toggle').click(function() {
        $('.header-sidebar-toggle').toggleClass('isActive');
    });

    $('.sidebar-toggle-close,.header-sidebar-toggle-overlay').click(function() {
        $('.header-sidebar-toggle').removeClass('isActive');

    });

    /**
     * Sticky Header
     */
    if ('true' === headerSticky) {
        var windowWidth = $(window).width();

        if (windowWidth > 600) {
            var wpAdminBar = $('#wpadminbar');
            if (wpAdminBar.length) {
                $(".storeflex-middle-header ").sticky({
                    topSpacing: wpAdminBar.height()
                });
            } else {
                $(".storeflex-middle-header").sticky({
                    topSpacing: 0
                });
            }
        }

    }

    /**
     * Preloader
     */
    if ($('#storeflex-preloader').length > 0) {
        setTimeout(function() {
            $('#storeflex-preloader').hide();
        }, 600);
    }

    /**
     * Responsive menu toggle
     */
    $('.storeflex-menu-toggle').click(function(event) {
        $('#site-navigation .primary-menu-wrap').toggleClass('isActive').slideToggle('slow');
        var element = document.querySelector('.storeflex-menu-toggle');
        if (element) {
            $(document).on('keydown', function(e) {
                if (element.querySelectorAll('#site-navigation .primary-menu-wrap.isActive').length === 1) {
                    var focusable = element.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                    var firstFocusable = focusable[0];
                    var lastFocusable = focusable[focusable.length - 1];
                    storeflex_focus_trap(firstFocusable, lastFocusable, e);
                }
            })
        }
    });

     /**
     * Responsive sub menu toggle
     */
    $('<a class="storeflex-sub-toggle" href="javascript:void(0);"><i class="bx bx-chevron-down"></i></a>').insertAfter('#site-navigation .menu-item-has-children>a, #site-navigation .page_item_has_children>a');

    $('#site-navigation .storeflex-sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.bx-chevron-up').first().toggleClass('bx-chevron-down');
    });

    /**
     * Scroll Top.
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1000) {
            $('.storeflex-scrollup').fadeIn('slow');
        } else {
            $('.storeflex-scrollup').fadeOut('slow');
        }
    });
    $('.storeflex-scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    /**
    * Search toggle
    */
    $('.storeflex-search-overlay').on('keydown', function (e) {
        var element = this;
        var focusable = element.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
        var firstFocusable = focusable[0];
        var lastFocusable = focusable[focusable.length - 1];

        storeflex_focus_trap(firstFocusable, lastFocusable, e);
    });

    $('.header-search-wrapper .search-btn').click(function () {
        $('.search-form-wrap').toggleClass('active-search');
        $('.search-form-wrap .search-field').focus();
    });


    /**
    * LightSlider
    */
    $('#slider-single-post').lightSlider({
        adaptiveHeight:true,
        item:1,
        slideMargin:0,
        loop:true,
        rtl:rtl,
        enableDrag: true,
        pauseOnHover: true,
    });

    $(document).ready(function() {
        function initCarousel(selector, items) {
            $(selector).lightSlider({
                item: items,
                loop: false,
                slideMove: 2,
                easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                speed: 600,
                rtl: rtl,
                responsive: [
                    {
                        breakpoint: 800,
                        settings: {
                            item: 2,
                            slideMove: 1,
                            slideMargin: 6,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            item: 1,
                            slideMove: 1
                        }
                    }
                ]
            });
        }

        initCarousel('#product-carousel', 4 );
        initCarousel('.storeflex-testimonial-carousel', 3 );
    });

    /**
     * close search container
     */
    $(".search-btn").on('click', function() {
        $(".storeflex-search-overlay").addClass('blocks');
      });
      $("#close-btn").click(function(){
        $(".storeflex-search-overlay").removeClass('blocks');
    });

    $(document).mouseup(function (e) {
        var container = $(".storeflex-search-overlay");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.removeClass('blocks');
        }
    });

    /**
     * Live Search
     */
    if (liveSearch === 'true') {
        var searchContainer = $(".header-search-wrapper");

        if (searchContainer.length > 0) {
            var searchFormContainer = searchContainer.find("form");

            searchContainer.on('input', 'input[type="search"]', function() {
                var searchKey = $(this).val();

                if (searchKey) {
                    $.ajax({
                        method: 'post',
                        url: ajaxUrl,
                        data: {
                            action: 'storeflex_search_posts_content',
                            search_key: searchKey,
                            security: _wpnonce
                        },
                        beforeSend: function() {
                            searchFormContainer.addClass('retrieving-posts');
                            searchFormContainer.removeClass('results-loaded');
                        },
                        success: function(res) {
                            var parsedRes = JSON.parse(res);
                            searchContainer.find(".storeflex-search-results-wrap").remove();
                            searchFormContainer.after(parsedRes.posts);
                            searchFormContainer.removeClass('retrieving-posts').addClass('results-loaded');
                        },
                        complete: function() {
                            // Render search content here
                        }
                    });
                } else {
                    searchContainer.find(".storeflex-search-results-wrap").remove();
                    searchFormContainer.removeClass('results-loaded');
                }
            });
        }
    }

    /**
     * close live search
     */
    $(document).mouseup(function (e) {
        var container = $(".header-search-wrapper");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.find(".storeflex-search-results-wrap").remove();
            container.removeClass('results-loaded');
        }
    });

    /**
     * focus trap
     */
    function storeflex_focus_trap( firstFocusable, lastFocusable, e ) {
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
                if (document.activeElement === firstFocusable) {
                    lastFocusable.focus();
                    e.preventDefault();
                }
            } else /* tab */ {
                if ( document.activeElement === lastFocusable ) {
                    firstFocusable.focus();
                    e.preventDefault();
                }
            }
        }
    }

    /**
     * Sticky Sidebar
     */
    if ('true' === sidebarSticky) {
        const elements = [
            '#primary',
            '#right-secondary',
            '#left-secondary',
            '#shop-secondary',
        ];

        elements.forEach(element => {
            $(element).theiaStickySidebar({
                additionalMarginTop: 30
            });
        });
    }

});



