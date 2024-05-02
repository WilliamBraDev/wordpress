<?php
/**
 * Flossy Above Header Second
 */
if ( ! function_exists( 'flossy_abv_hdr_group_2' ) ) {
	function flossy_abv_hdr_group_2() {		
	$social_icons 				= get_theme_mod('social_icons',flossy_get_social_icon_default());
		
		// Social ?>
		<aside class="widget widget_social_widget">
			<ul>
				<?php
					$social_icons = json_decode($social_icons);
					if( $social_icons!='' )
					{
					foreach($social_icons as $social_item){	
					$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'flossy_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
					$social_link = ! empty( $social_item->link ) ? apply_filters( 'flossy_translate_single_string', $social_item->link, 'Header section' ) : '';
				?>
					<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
				<?php }} ?>
			</ul>
		</aside>	
	
		<?php		
	}
}
add_action( 'flossy_abv_hdr_group_2', 'flossy_abv_hdr_group_2' );


/*
 *
 * Social Icon
 */
function flossy_get_social_icon_default() {
	return apply_filters(
		'flossy_get_social_icon_default', json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'open_new_tab'	  =>  esc_html__( 'yes', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'open_new_tab'	  =>  esc_html__( 'yes', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'open_new_tab'	  =>  esc_html__( 'yes', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'open_new_tab'	  =>  esc_html__( 'yes', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-behance', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'open_new_tab'	  =>  esc_html__( 'yes', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_header_social_005',
				)
			)
		)
	);
}

	
/*
 *
 * Slider Default
 */
 function flossy_get_slider_default() {
	return apply_filters(
		'flossy_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/slider/item01.png',
					'title'           => esc_html__( 'Save Up to', 'ecommerce-companion' ),
					'subtitle'         => esc_html__( '$700', 'ecommerce-companion' ),
					'subtitle2'         => esc_html__( 'on the Newest', 'ecommerce-companion' ),
					'subtitle3'         => esc_html__( 'iPhone', 'ecommerce-companion' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elited do veniam.', 'ecommerce-companion' ),
					'text2'	  =>  esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ),
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/slider/item02.png',
					'title'           => esc_html__( 'Save Up to', 'ecommerce-companion' ),
					'subtitle'         => esc_html__( '$800', 'ecommerce-companion' ),
					'subtitle2'         => esc_html__( 'on the Newest', 'ecommerce-companion' ),
					'subtitle3'         => esc_html__( 'iPhone X2', 'ecommerce-companion' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elited do veniam.', 'ecommerce-companion' ),
					'text2'	  =>  esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ), 
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/slider/item03.png',
					'title'           => esc_html__( 'Save Up to', 'ecommerce-companion' ),
					'subtitle'         => esc_html__( '$1000', 'ecommerce-companion' ),
					'subtitle2'         => esc_html__( 'on the Newest', 'ecommerce-companion' ),
					'subtitle3'         => esc_html__( 'iPhone X3', 'ecommerce-companion' ),
					'text'            => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipiscing elited do veniam.', 'ecommerce-companion' ),
					'text2'	  =>  esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'	  =>  esc_html__( '#', 'ecommerce-companion' ), 
					'id'              => 'customizer_repeater_slider_003',
				),
			)
		)
	);
}


/*
 *
 * Banner Info 1 Default
 */
 function flossy_get_banner_info_1_default() {
	return apply_filters(
		'flossy_get_banner_info_1_default', json_encode(
			array(
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/bannerinfo/banner11.jpg',
					'title'           => esc_html__( 'Sale 30% off', 'ecommerce-companion' ),
					'subtitle'            => esc_html__( 'New Collection', 'ecommerce-companion' ),
					'text2'            => esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'            => '#',
					'id'              => 'customizer_repeater_banner_info_1_001',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/bannerinfo/banner12.jpg',
					'title'           => esc_html__( 'Collection', 'ecommerce-companion' ),
					'subtitle'            => esc_html__( 'Women', 'ecommerce-companion' ),
					'text2'            => esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'            => '#',
					'id'              => 'customizer_repeater_banner_info_1_002',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/bannerinfo/banner13.jpg',
					'title'           => esc_html__( 'Couple Clothes', 'ecommerce-companion' ),
					'subtitle'            => esc_html__( 'Luxury', 'ecommerce-companion' ),
					'text2'            => esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'            => '#',
					'id'              => 'customizer_repeater_banner_info_1_003',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/bannerinfo/banner14.jpg',
					'title'           => esc_html__( 'Direct To You', 'ecommerce-companion' ),
					'subtitle'            => esc_html__( 'Quality', 'ecommerce-companion' ),
					'text2'            => esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'            => '#',
					'id'              => 'customizer_repeater_banner_info_1_004',
				),
				array(
					'image_url'       => ECOMMERCE_COMP_PLUGIN_URL . 'inc/themes/flossy/assets/images/bannerinfo/banner15.jpg',
					'title'           => esc_html__( '20% OFF', 'ecommerce-companion' ),
					'subtitle'            => esc_html__( 'Sale', 'ecommerce-companion' ),
					'text2'            => esc_html__( 'Shop Now', 'ecommerce-companion' ),
					'link'            => '#',
					'id'              => 'customizer_repeater_banner_info_1_005',
				),				
			)
		)
	);
}