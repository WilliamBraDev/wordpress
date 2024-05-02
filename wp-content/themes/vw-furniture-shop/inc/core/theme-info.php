<?php
/**
 * Add theme page
 */

function vw_furniture_shop_menu() {
	add_theme_page( esc_html__( 'VW Furniture Shop', 'vw-furniture-shop' ), esc_html__( 'VW Furniture Shop Theme', 'vw-furniture-shop' ), 'edit_theme_options', 'vw-furniture-shop-info', 'vw_furniture_shop_theme_page_display' );
}
add_action( 'admin_menu', 'vw_furniture_shop_menu' );

function vw_furniture_shop_admin_theme_style() {
	wp_enqueue_style('vw-furniture-shop-custom-admin-style', esc_url(get_template_directory_uri()) . '/css/admin-style.css');
	wp_enqueue_script('vw-furniture-shop-tabs', esc_url(get_template_directory_uri()) . '/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_furniture_shop_admin_theme_style');

/**
 * Display About page
 */
function vw_furniture_shop_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	} ?>

	<div class="wrapper-info">
	    <div class="col-left">
	    	<h2><?php esc_html_e( 'Welcome to VW Furniture Shop Theme', 'vw-furniture-shop' ); ?> <span class="version"><?php esc_html_e('Version:','vw-furniture-shop'); ?> <?php echo esc_html($theme['Version']);?></span></h2>
	    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-furniture-shop'); ?></p>
	    </div>
	    <div class="col-right">
	    	<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/final-logo.png" alt="" />
			</div>
			<div class="update-now">
				<h4><?php esc_html_e('VW Furniture Shop Pro Theme','vw-furniture-shop'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','vw-furniture-shop'); ?> ( <span><?php esc_html_e('vwpro20','vw-furniture-shop'); ?></span> ) </h4>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_FURNITURE_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-furniture-shop' ); ?></a>
				</div>
			</div>
	    </div>

	    <div class="tab-sec">
			<div class="tab">
				<button class="tablinks" onclick="vw_furniture_shop_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Free Setup', 'vw-furniture-shop' ); ?></button>
			  	<button class="tablinks" onclick="vw_furniture_shop_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'vw-furniture-shop' ); ?></button>
			  	<button class="tablinks" onclick="vw_furniture_shop_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-furniture-shop' ); ?></button>
			</div>

			<div id="lite_theme" class="tabcontent open">
				<div class="lite-theme-tab">
					<h3><?php esc_html_e( 'Lite Theme Information', 'vw-furniture-shop' ); ?></h3>
					<hr class="h3hr">
				  	<p><?php esc_html_e('VW Furniture Shop is a versatile and feature-rich WordPress theme designed specifically for furniture stores, interior designers, and home decor businesses. With its sleek design, intuitive features, and robust functionality, this theme provides the perfect platform to showcase furniture collections, highlight design expertise, and drive sales. At the heart of the VW Furniture Shop theme is its modern and stylish design, crafted to captivate visitors and inspire confidence in your brand. With clean lines, elegant typography, and tasteful color schemes, the theme creates a visually appealing backdrop for showcasing furniture products and interior design services. Customization options abound with the VW Furniture Shop WordPress Theme, empowering users to personalize their websites to reflect their unique brand identity and style preferences. From customizable headers and footers to versatile layout options and widgetized areas, users have full control over the look and feel of their site without the need for coding knowledge. The theme also boasts seamless integration with popular e-commerce plugins like WooCommerce, enabling users to effortlessly set up online stores and start selling furniture products directly from their websites. With features like product galleries, shopping carts, and secure payment gateways, the VW Furniture Shop theme provides everything needed to create a seamless and enjoyable shopping experience for customers.','vw-furniture-shop'); ?></p>
				  	<div class="col-left-inner">
						<div class="pro-links">
					    	<a href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site', 'vw-furniture-shop'); ?></a>
							<a href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site', 'vw-furniture-shop'); ?></a>
						</div>
						<div class="support-forum-col-section">
							<div class="support-forum-col">
								<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-furniture-shop'); ?></h4>
								<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-furniture-shop'); ?></p>
								<div class="info-link">
									<a href="<?php echo esc_url( VW_FURNITURE_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-furniture-shop'); ?></a>
								</div>
							</div>
							<div class="support-forum-col">
								<h4><?php esc_html_e('Reviews & Testimonials', 'vw-furniture-shop'); ?></h4>
								<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-furniture-shop'); ?>  </p>
								<div class="info-link">
									<a href="<?php echo esc_url( VW_FURNITURE_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-furniture-shop'); ?></a>
								</div>
							</div>
							<div class="support-forum-col">
								<h4><?php esc_html_e('Theme Documentation', 'vw-furniture-shop'); ?></h4>
								<p> <?php esc_html_e('If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-furniture-shop'); ?>  </p>
								<div class="info-link">
									<a href="<?php echo esc_url( VW_FURNITURE_SHOP_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Free Theme Documentation', 'vw-furniture-shop'); ?></a>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="pro_theme" class="tabcontent">
			  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-furniture-shop' ); ?></h3>
				<hr class="h3hr">
			    <div class="col-left-pro">
			    	<p><?php esc_html_e('VW Furniture Shop is a versatile and feature-rich WordPress theme designed specifically for furniture stores, interior designers, and home decor businesses. With its sleek design, intuitive features, and robust functionality, this theme provides the perfect platform to showcase furniture collections, highlight design expertise, and drive sales. At the heart of the VW Furniture Shop theme is its modern and stylish design, crafted to captivate visitors and inspire confidence in your brand. With clean lines, elegant typography, and tasteful color schemes, the theme creates a visually appealing backdrop for showcasing furniture products and interior design services. Customization options abound with the VW Furniture Shop WordPress Theme, empowering users to personalize their websites to reflect their unique brand identity and style preferences. From customizable headers and footers to versatile layout options and widgetized areas, users have full control over the look and feel of their site without the need for coding knowledge. The theme also boasts seamless integration with popular e-commerce plugins like WooCommerce, enabling users to effortlessly set up online stores and start selling furniture products directly from their websites. With features like product galleries, shopping carts, and secure payment gateways, the VW Furniture Shop theme provides everything needed to create a seamless and enjoyable shopping experience for customers.','vw-furniture-shop'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( VW_FURNITURE_SHOP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-furniture-shop'); ?></a>
						<a href="<?php echo esc_url( VW_FURNITURE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-furniture-shop'); ?></a>
						<a href="<?php echo esc_url( VW_FURNITURE_SHOP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-furniture-shop'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/pro.png" alt="" />
			    </div>
			  <div class="featurebox">
				    <h3 class="theme-features"><?php esc_html_e( 'Theme Features', 'vw-furniture-shop' ); ?></h3>
					<hr class="h3hr1">
					<div class="table-image">
						<table class="tablebox">
							<thead>
								<tr>
									<th><?php esc_html_e('Features', 'vw-furniture-shop'); ?></th>
									<th><?php esc_html_e('Free Themes', 'vw-furniture-shop'); ?></th>
									<th><?php esc_html_e('Premium Themes', 'vw-furniture-shop'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php esc_html_e('Easy Setup', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Responsive Design', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('SEO Friendly', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Banner Settings', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Template Pages', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('14', 'vw-furniture-shop'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Home Page Template', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'vw-furniture-shop'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Theme sections', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('2', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('12', 'vw-furniture-shop'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Contact us Page Template', 'vw-furniture-shop'); ?></td>
									<td class="table-img">0</td>
									<td class="table-img"><?php esc_html_e('1', 'vw-furniture-shop'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Blog Templates & Layout', 'vw-furniture-shop'); ?></td>
									<td class="table-img">0</td>
									<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-furniture-shop'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Section Reordering', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Demo Importer', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Full Documentation', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Secure and Optimized Code', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Exclusive Functionalities', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Section Enable / Disable', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Section Google Font Choices', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Gallery', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Shortcodes', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Premium Membership', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Budget Friendly Value', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Priority Error Fixing', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Custom Feature Addition', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('All Access Theme Pass', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Seamless Customer Support', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('WordPress 6.4 or later', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('PHP 8.2 or 8.3', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Influence Registration', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Detailed Influencer Portfolio', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Premium Pricing Plan', 'vw-furniture-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_FURNITURE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-furniture-shop'); ?></a></td>
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>

			<div id="free_pro" class="tabcontent">
				<div class="support-sec">
				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-furniture-shop'); ?></h4>
						<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-furniture-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_FURNITURE_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-furniture-shop'); ?></a>
						</div>
				  	</div>
				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-furniture-shop'); ?></h4>
						<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-furniture-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_FURNITURE_SHOP_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-furniture-shop'); ?></a>
						</div>
				  	</div>

				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-furniture-shop'); ?></h4>
						<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-furniture-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_FURNITURE_SHOP_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-furniture-shop'); ?></a>
						</div>
				  	</div>

				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-furniture-shop'); ?></h4>
						<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-furniture-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( VW_FURNITURE_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-furniture-shop'); ?></a>
						</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>
<?php }?>
