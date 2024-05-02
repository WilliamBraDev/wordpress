/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	// typography for site title
	wp.customize( 'storeflex_site_title_font_weight', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).css( 'font-weight', to );
		});
	});

	// typography for site tagline
	wp.customize( 'storeflex_site_tagline_font_weight', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).css( 'font-weight', to );
		});
	});


	// Top header text field
	wp.customize( 'storeflex_top_header_text_field', function( value ) {
		value.bind( function( to ) {
			$( '.top-header-text span' ).text( to );
		} );
	} );

	// typography for body
	wp.customize( 'storeflex_body_font_weight', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-weight', to );
		});
	});
	wp.customize( 'storeflex_body_font_style', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'font-style', to );
		});
	});
	wp.customize( 'storeflex_body_font_transform', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'text-transform', to );
		});
	});
	wp.customize( 'storeflex_body_font_decoration', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'text-decoration', to );
		});
	});

	// typography for heading
	wp.customize( 'storeflex_heading_font_weight', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'font-weight', to );
		});
	});
	wp.customize( 'storeflex_heading_font_style', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'font-style', to );
		});
	});
	wp.customize( 'storeflex_heading_font_transform', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'text-transform', to );
		});
	});
	wp.customize( 'storeflex_heading_font_decoration', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'text-decoration', to );
		});
	});

	// typography for products
	wp.customize('storeflex_products_font_weight', function (value) {
	    value.bind(function (to) {
	        $('.woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title').css('font-weight', to);
	    });
	});
	wp.customize('storeflex_products_font_style', function (value) {
	    value.bind(function (to) {
	        $('.woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title').css('font-style', to);
	    });
	});
	wp.customize('storeflex_products_font_transform', function (value) {
	    value.bind(function (to) {
	        $('.woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title').css('text-transform', to);
	    });
	});
	wp.customize('storeflex_products_font_decoration', function (value) {
	    value.bind(function (to) {
	        $('.woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title').css('text-decoration', to);
	    });
	});

	// Bottom area text field
	wp.customize( 'storeflex_bottom_footer_field', function( value ) {
		value.bind( function( to ) {
			$( '.storeflex-footer-text span' ).text( to );
		} );
	} );	

	wp.customize('storeflex_primary_theme_color', function (value) {
    	value.bind(function (to) {
	        $(
	            '.button-back-home, .navigation .nav-links a:hover, .bttn:hover, button, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"], input[type="submit"]:hover, .storeflex-title:before, .storeflex-title:after, #site-navigation .menu-item-description, .storeflex-cart-wrapper a.checkout-button.button.alt, .woocommerce-cart .cart .button, .storeflex-wave .sf-rect, .storeflex-three-bounce .sf-child, .storeflex-folding-cube .sf-cube:before, .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:hover, .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled, .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled[disabled], .product:hover .add_to_cart_button:hover, .product:hover .product_type_grouped:hover, .product:hover .product_type_external:hover, .product:hover .product_type_variable:hover, .product:hover .product_type_simple:hover, .woocommerce ul.products li.product:hover .add_to_cart_button:hover, .woocommerce ul.products li.product:hover .product_type_grouped:hover, .woocommerce ul.products li.product:hover .product_type_external:hover, .woocommerce ul.products li.product:hover .product_type_simple:hover, .woocommerce-page ul.products li.product:hover .add_to_cart_button:hover, .woocommerce-page ul.products li.product:hover .product_type_grouped:hover, .woocommerce-page ul.products li.product:hover .product_type_external:hover, .woocommerce-page ul.products li.product:hover .product_type_simple:hover, a.added_to_cart, .single .yith-wcwl-wishlistexistsbrowse a, .single .yith-wcwl-wishlistaddedbrowse a, .storeflex-product-btns-icons a.add_to_wishlist::after, .woocommerce-active ul.products li.product span.onsale, .woocommerce-active li.product span.onsale, .widget li.wc-block-product-categories-list-item:hover, .wc-block-active-filters__clear-all span, .wc-block-components-filter-reset-button span, .storeflex-call-block-wrapper:hover .storeflex-call-to-action-button, .single .storeflex-container .single_add_to_cart_button.button.alt, .single .woocommerce-noreviews, .woocommerce-wishlist .wishlist_table .product-add-to-cart a, .archive-style--grid .storeflex-content-wrapper .no-img-post .article-cat-item, .storeflex-content-wrapper .article-cat-item, .single.archive-style--list .storeflex-content-wrapper .article-cat-item, .archive-style--classic .storeflex-content-wrapper .no-img-post .article-cat-item .archive-style--list .storeflex-content-wrapper .article-cat-item, .single-product .add_to_wishlist.single_add_to_wishlist, .woocommerce .storeflex-login-form-wrapper .woocommerce-form-login .woocommerce-form-login__submit, .woocommerce-account .woocommerce-info, .woocommerce-account .woocommerce-info::before, .woocommerce-checkout .woocommerce-info, .woocommerce-checkout .woocommerce-info::before, .woocommerce-cart .woocommerce-info, .woocommerce-cart .woocommerce-info::before, .woocommerce .storeflex-post-sidebar-wrapper span.onsale, .widget .wc-block-grid__product-onsale span, .wc-block-grid__product:hover .add_to_cart_button:hover, .storeflex-product-grid-block .storeflex-product-grid-button:hover, .woocommerce-cart .cart .button, .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled, .woocommerce-cart:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:disabled[disabled], .woocommerce-account .woocommerce-Address .title .edit, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button, :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button, .woocommerce-checkout .wc-block-components-checkout-return-to-cart-button, .woocommerce-checkout .wc-block-components-totals-coupon-link, button, .woocommerce-active ul.products li.product .storeflex-out-of-stock-message, .woocommerce-active li.product .storeflex-out-of-stock-message, .woocommerce-checkout:where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt, .woocommerce-message, .woocommerce-info, .woocommerce-error, .woocommerce-noreviews, p.no-comments, .wp-block-button__link, .editor-styles-wrapper .wp-block-button__link, .wc-block-components-button:not(.is-link), .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, .woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link :hover, .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link:hover, .cart-icon .cart-count, .storeflex-wishlist .storeflex-wl-counter, .related.products> h2::before, .related.products> h2::after, .widget.widget_product_categories li.cat-item:hover, .widget.widget_product_tag_cloud a.tag-cloud-link:hover, .navigation .nav-links a.page-numbers:hover, .storeflex-scrollup:hover, .navigation .nav-links .page-numbers.current, body.storeflex-site-layout--boxed-layout, .storeflex-banner-wrapper .slider-single-post-wrap .buy-now-button:hover'
	        ).css('background-color', to);
	    });
	});

	wp.customize('storeflex_primary_theme_color', function(value) {
	    value.bind(function(to) {
	        $(
	            '#site-navigation ul li.current-menu-item>a, .product:hover .add_to_cart_button, .product:hover .product_type_grouped, .product:hover .product_type_external, .product:hover .product_type_variable, .product:hover .product_type_simple, .woocommerce ul.products li.product:hover .add_to_cart_button, .woocommerce ul.products li.product:hover .product_type_grouped, .woocommerce ul.products li.product:hover .product_type_external, .woocommerce ul.products li.product:hover .product_type_variable, .woocommerce ul.products li.product:hover .product_type_simple, .woocommerce-page ul.products li.product:hover .add_to_cart_button, .woocommerce-page ul.products li.product:hover .product_type_grouped, .woocommerce-page ul.products li.product:hover .product_type_external, .woocommerce-page ul.products li.product:hover .product_type_variable, .woocommerce-page ul.products li.product:hover .product_type_simple, #site-navigation ul li.current-page-item>a, .storeflex-product-btns-icons a.add_to_wishlist i, #site-navigation ul li.current-menu-ancestor>a, #site-navigation ul.sub-menu li:hover>a, #site-navigation ul.children:hover, .woocommerce-Price-amount.amount ,entry-summary a, .wc-block-components-formatted-money-amount, #site-navigation ul li:hover>a, #site-navigation ul li.focus>a, .wc-block-grid__product:hover .add_to_cart_button, .widget .wp-block-woocommerce-customer-account .label, .widget .woocommerce .woocommerce-breadcrumb a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-cart .woocommerce .product-quantity .quantity .qty, .woocommerce-cart .wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input, .woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, .woocommerce nav.woocommerce-pagination ul li a, .storeflex-scrollup, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce .storeflex-breadcrumb-container .woocommerce-breadcrumb a, .storeflex-product-btns-icons a.add_to_wishlist:hover i::before, .storeflex-product-grid-button a, .storeflex-banner-wrapper .feature-content-wrap .buy-now-button a, .storeflex-banner-wrapper .feature-content-wrap .buy-now-button a:after, .storeflex-banner-wrapper .slider-single-post-wrap .buy-now-button a'
	        ).css('color', to);
	    });
	});

	wp.customize('storeflex_primary_theme_color', function(value) {
	    value.bind(function(to) {
	        $(
	            '.navigation .nav-links a:hover, button, .bttn:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .product:hover .add_to_cart_button, .product:hover .product_type_grouped, .product:hover .product_type_external, .product:hover .product_type_variable, .product:hover .product_type_simple, .woocommerce ul.products li.product:hover .add_to_cart_button, .woocommerce ul.products li.product:hover .product_type_grouped, .woocommerce ul.products li.product:hover .product_type_external, .woocommerce ul.products li.product:hover .product_type_variable, .woocommerce ul.products li.product:hover .product_type_simple, .woocommerce-page ul.products li.product:hover .add_to_cart_button, .woocommerce-page ul.products li.product:hover .product_type_grouped, .woocommerce-page ul.products li.product:hover .product_type_external, .woocommerce-page ul.products li.product:hover .product_type_variable, .woocommerce-page ul.products li.product:hover .product_type_simple, .widget li.wc-block-product-categories-list-item:hover, .wc-block-components-quantity-selector, .wc-block-components-notice-banner.is-error, .wc-block-components-notice-banner.is-error>svg, .wc-block-grid__product:hover .add_to_cart_button, .woocommerce-cart .editor-styles-wrapper table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, .woocommerce-cart table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link, .storeflex-banner-wrapper .buy-now-button:hover, .button-back-home, input[type="submit"]'
	        ).css('border-color', to);
	    });
	});

	wp.customize('storeflex_primary_theme_color', function(value) {
	    value.bind(function(to) {
	        $(
	            '.woocommerce-account .woocommerce-info, .woocommerce-account .woocommerce-info::before, .woocommerce-checkout .woocommerce-info, .woocommerce-checkout .woocommerce-info::before, .woocommerce-cart .woocommerce-info, .woocommerce-cart .woocommerce-info::before, .woocommerce-message, #site-navigation .menu-item-description::after'
	        ).css('border-top-color', to);
	    });
	});

	wp.customize('storeflex_primary_theme_color', function(value) {
	    value.bind(function(to) {
	        $(
	            '.storeflex-product-btns-icons .add_to_wishlist::before').css('border-left-color', to);
	    });
	});

	wp.customize('storeflex_primary_theme_color', function(value) {
	    value.bind(function(to) {
	        $(
	            '.storeflex-banner-wrapper .feature-content-wrap .buy-now-button a').css('border-bottom-color', to);
	    });
	});

	wp.customize('storeflex_text_color', function(value) {
	    value.bind(function(to) {
	        $(
	            ' .storeflex-footer .footer-info-wrap i::before, .storeflex-footer .storeflex-bottom-footer a, .storeflex-footer .storeflex-bottom-footer span, .storeflex-middle-header .site-header-cart .woocommerce ul.cart_list li a, .storeflex-middle-header .site-header-cart .woocommerce ul.product_list_widget li a, .widget span.wc-block-product-categories-list-item-count, .entry-content a, #site-navigation ul li.focus>a, .woocommerce-wishlist .woocommerce-Price-amount.amount, .widget li.wc-block-product-categories-list-item:hover, .storeflex-footer .footer-info-wrap, .storeflex-footer .storeflex-footer-info-description, .entry-content p, p, .author-description, .author-website, .top-header-text, .site-branding, .testimonial-avatar-description, .wc-block-grid__product .wc-block-grid__product-image:not(.wc-block-components-product-image), .wc-block-grid__product .wc-block-grid__product-title'
	        ).css('color', to);
	    });
	});

	wp.customize( 'storeflex_link_color', function( value ) {
		value.bind( function( to ) {
			$(
				'.author-website a'
			).css( 'color', to );
		});
	});

}( jQuery ) );


