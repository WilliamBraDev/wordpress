<?php
/**
 * File to define functions and hooks related to preloader
 *
 * @package StoreFlex
 */

$storeflex_enable_preloader = storeflex_get_customizer_option_value( 'storeflex_enable_preloader' );
	
if ( false == $storeflex_enable_preloader ) :
	return;
endif;


if ( ! function_exists( 'storeflex_preloader_items' ) ) :

	/**
	 * function to manage the requested preloader items
	 *
	 * @since 1.0.0
	 */
	function storeflex_preloader_items() {

		$preloader_choices = storeflex_get_customizer_option_value( 'storeflex_preloader_choices' );

		if ( $preloader_choices == 'default-style' ) {

			$storeflex_preloader =  storeflex_get_customizer_option_value( 'storeflex_preloader' );

			?>
				<div id="storeflex-preloader" class="preloader-background">
					<div class="preloader-wrapper">
						<?php
							switch ( $storeflex_preloader ) {
								case 'three_bounce':
						?>
									<div class="storeflex-three-bounce">
			                            <div class="sf-child sf-bounce1"></div>
			                            <div class="sf-child sf-bounce2"></div>
			                            <div class="sf-child sf-bounce3"></div>
			                        </div>
						<?php
									break;

								case 'wave':
						?>
									<div class="storeflex-wave">
			                            <div class="sf-rect sf-rect1"></div>
			                            <div class="sf-rect sf-rect2"></div>
			                            <div class="sf-rect sf-rect3"></div>
			                            <div class="sf-rect sf-rect4"></div>
			                            <div class="sf-rect sf-rect5"></div>
			                        </div>
						<?php
									break;

								case 'folding_cube':
						?>
									<div class="storeflex-folding-cube">
			                            <div class="sf-cube1 sf-cube"></div>
			                            <div class="sf-cube2 sf-cube"></div>
			                            <div class="sf-cube4 sf-cube"></div>
			                            <div class="sf-cube3 sf-cube"></div>
			                        </div>
						<?php
									break;

								default:
						?>
									<div class="storeflex-three-bounce">
			                            <div class="sf-child sf-bounce1"></div>
			                            <div class="sf-child sf-bounce2"></div>
			                            <div class="sf-child sf-bounce3"></div>
			                        </div>
						<?php
									break;
							}
						?>
					</div><!-- .preloader-wrapper -->
				</div><!-- #storeflex-preloader -->
	<?php
		} else {

			$storeflex_preloader =  storeflex_get_customizer_option_value( 'storeflex_preloader_image' );
	?>

			<div id="storeflex-preloader"  class="preloader-background">
				<div class="preloader-wrapper">
                	<img src="<?php echo esc_url( $storeflex_preloader ); ?>">
            	</div> <!-- preloader-wrapper -->
	        </div><!-- .storeflex-block-wrapper -->
	<?php 				

		}
	}

endif;

add_action( 'storeflex_before_page', 'storeflex_preloader_items', 5 );