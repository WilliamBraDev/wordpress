<?php
/**
 * Title: Product Section
 * Slug: vw-furniture-shop/product-section
 * Categories: template
 */

$pluginsList = get_option( 'active_plugins' );
$vw_furniture_shop_plugin = 'woocommerce/woocommerce.php';
$results = in_array( $vw_furniture_shop_plugin , $pluginsList);
if ( $results )  {
?>
<!-- wp:group {"className":"product-section py-md-3 py-lg-3 py-3 wow zoomIn delay-1000","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group product-section py-md-3 py-lg-3 py-3 wow zoomIn delay-1000"><!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"32px","fontStyle":"normal","fontWeight":"600"}}} -->
<h3 class="wp-block-heading has-text-align-left" style="font-size:32px;font-style:normal;font-weight:600">Sale</h3>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:query {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false,"__woocommerceAttributes":[],"__woocommerceStockStatus":["instock","outofstock","onbackorder"]},"namespace":"woocommerce/product-query"} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"products-block-post-template","layout":{"type":"grid","columnCount":3},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"300px"} /-->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"linkTarget":"_blank","style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-query/product-title"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:woocommerce/product-button {"textAlign":"right","isDescendentOfQueryLoop":true,"fontSize":"medium","style":{"color":{"background":"#d1b7a0"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|70","right":"var:preset|spacing|70"}}}} /-->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->


<?php } else { ?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"25px","right":"25px"},"margin":{"top":"0","bottom":"0"}}},"className":"animated fadeInUp product-sale-section","layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group animated fadeInUp product-sale-section" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:25px;padding-bottom:var(--wp--preset--spacing--50);padding-left:25px"><!-- wp:heading {"textAlign":"left","level":3,"style":{"typography":{"fontSize":"32px","fontStyle":"normal","fontWeight":"600"}}} -->
<h3 class="wp-block-heading has-text-align-left" style="font-size:32px;font-style:normal;font-weight:600"><?php echo esc_html__('Sale', 'vw-furniture-shop'); ?></h3>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns product-section-columns"><!-- wp:column {"width":"","className":" product-col"} -->
<div class="wp-block-column product-col"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:image {"id":1945,"sizeSlug":"full","linkDestination":"none","className":"product-col-img"} -->
<figure class="wp-block-image size-full product-col-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product1.png" alt="" class="wp-image-1945" title="s"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"13px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":null} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:heading {"level":4,"style":{"color":{"text":"#1d1d1d"},"elements":{"link":{"color":{"text":"#1d1d1d"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
<h4 class="wp-block-heading has-text-color has-link-color" style="color:#1d1d1d;font-style:normal;font-weight:600"><?php echo esc_html__('Charcoal Grey sofa', 'vw-furniture-shop'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%","className":"product-col-price"} -->
<div class="wp-block-column product-col-price" style="flex-basis:40%"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right","style":{"color":{"text":"#1d1d1d"},"elements":{"link":{"color":{"text":"#1d1d1d"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"upper-heading"} -->
<p class="has-text-align-right has-text-color has-link-color has-upper-heading-font-size" style="color:#1d1d1d;font-style:normal;font-weight:600"><?php echo esc_html__('$320', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right","style":{"color":{"text":"#b4b4b4"},"elements":{"link":{"color":{"text":"#b4b4b4"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"product-col-price-para","fontSize":"upper-heading"} -->
<p class="has-text-align-right product-col-price-para has-text-color has-link-color has-upper-heading-font-size" style="color:#b4b4b4;font-style:normal;font-weight:600"><?php echo esc_html__('$580.00', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"60%","className":"product-star-rating"} -->
<div class="wp-block-column is-vertically-aligned-center product-star-rating" style="flex-basis:60%"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":31,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full product-col-img2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/stars.png" alt="" class="wp-image-31"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"color":{"text":"#b4b4b4"},"elements":{"link":{"color":{"text":"#b4b4b4"}}}}} -->
<p class="has-text-color has-link-color" style="color:#b4b4b4"><?php echo esc_html__('(1,409)', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"align":"right","id":33,"sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image alignright size-full product-col-img3"><a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/arrow.png" alt="" class="wp-image-33"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","className":"product-col"} -->
<div class="wp-block-column product-col"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:image {"id":1945,"sizeSlug":"full","linkDestination":"none","className":"product-col-img"} -->
<figure class="wp-block-image size-full product-col-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product2.png" alt="" class="wp-image-1945" title="s"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"13px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":null} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:heading {"level":4,"style":{"color":{"text":"#1d1d1d"},"elements":{"link":{"color":{"text":"#1d1d1d"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
<h4 class="wp-block-heading has-text-color has-link-color" style="color:#1d1d1d;font-style:normal;font-weight:600"><?php echo esc_html__('Brown sofa', 'vw-furniture-shop'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%","className":"product-col-price"} -->
<div class="wp-block-column product-col-price" style="flex-basis:40%"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right","style":{"color":{"text":"#1d1d1d"},"elements":{"link":{"color":{"text":"#1d1d1d"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"upper-heading"} -->
<p class="has-text-align-right has-text-color has-link-color has-upper-heading-font-size" style="color:#1d1d1d;font-style:normal;font-weight:600"><?php echo esc_html__('$300', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right","style":{"color":{"text":"#b4b4b4"},"elements":{"link":{"color":{"text":"#b4b4b4"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"product-col-price-para","fontSize":"upper-heading"} -->
<p class="has-text-align-right product-col-price-para has-text-color has-link-color has-upper-heading-font-size" style="color:#b4b4b4;font-style:normal;font-weight:600"><?php echo esc_html__('$480.00', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"60%","className":"product-star-rating"} -->
<div class="wp-block-column is-vertically-aligned-center product-star-rating" style="flex-basis:60%"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":31,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full product-col-img2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/stars.png" alt="" class="wp-image-31"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"color":{"text":"#b4b4b4"},"elements":{"link":{"color":{"text":"#b4b4b4"}}}}} -->
<p class="has-text-color has-link-color" style="color:#b4b4b4"><?php echo esc_html__('(1,409)', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"align":"right","id":33,"sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image alignright size-full product-col-img3"><a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/arrow.png" alt="" class="wp-image-33"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"","className":"product-col"} -->
<div class="wp-block-column product-col"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--10);padding-right:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:image {"id":1945,"sizeSlug":"full","linkDestination":"none","className":"product-col-img"} -->
<figure class="wp-block-image size-full product-col-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/product3.png" alt="" class="wp-image-1945" title="s"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"13px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":null} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:heading {"level":4,"style":{"color":{"text":"#1d1d1d"},"elements":{"link":{"color":{"text":"#1d1d1d"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
<h4 class="wp-block-heading has-text-color has-link-color" style="color:#1d1d1d;font-style:normal;font-weight:600"><?php echo esc_html__('Beige Sofa', 'vw-furniture-shop'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%","className":"product-col-price"} -->
<div class="wp-block-column product-col-price" style="flex-basis:40%"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right","style":{"color":{"text":"#1d1d1d"},"elements":{"link":{"color":{"text":"#1d1d1d"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"upper-heading"} -->
<p class="has-text-align-right has-text-color has-link-color has-upper-heading-font-size" style="color:#1d1d1d;font-style:normal;font-weight:600"><?php echo esc_html__('$280', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"right","style":{"color":{"text":"#b4b4b4"},"elements":{"link":{"color":{"text":"#b4b4b4"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"className":"product-col-price-para","fontSize":"upper-heading"} -->
<p class="has-text-align-right product-col-price-para has-text-color has-link-color has-upper-heading-font-size" style="color:#b4b4b4;font-style:normal;font-weight:600"><?php echo esc_html__('$300.00', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"60%","className":"product-star-rating"} -->
<div class="wp-block-column is-vertically-aligned-center product-star-rating" style="flex-basis:60%"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":31,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full product-col-img2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/stars.png" alt="" class="wp-image-31"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"color":{"text":"#b4b4b4"},"elements":{"link":{"color":{"text":"#b4b4b4"}}}}} -->
<p class="has-text-color has-link-color" style="color:#b4b4b4"><?php echo esc_html__('(1,409)', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"align":"right","id":33,"sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image alignright size-full product-col-img3"><a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/arrow.png" alt="" class="wp-image-33"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
<?php } ?>
