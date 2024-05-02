<?php
/**
 * Title: Home Banner
 * Slug: vw-furniture-shop/home-banner
 * Categories: template
 */
?>
<!-- wp:group {"tagName":"main","style":{"color":{"background":"#e4e1dc"}},"className":"alignfull p-0 main-banner-section"} -->
<main class="wp-block-group alignfull main-banner-section has-background  animated fadeInLeft" style="background-color:#e4e1dc"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"40%","className":"banner-box"} -->
<div class="wp-block-column is-vertically-aligned-center banner-box" style="flex-basis:40%"><!-- wp:group {"className":"banner-grp","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group banner-grp"><!-- wp:columns {"className":"banner-calender"} -->
<div class="wp-block-columns banner-calender"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph -->
<p><?php echo esc_html__('Collection', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
<p class="has-text-align-left" style="font-style:normal;font-weight:600"><?php echo esc_html__('2024', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:heading {"style":{"typography":{"textTransform":"uppercase"}}} -->
<h2 class="wp-block-heading" style="text-transform:uppercase"><?php echo esc_html__('Space.', 'vw-furniture-shop'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#1d1d1d"},"elements":{"link":{"color":{"text":"#1d1d1d"}}}},"className":"banner-box-para p-0"} -->
<p class="p-0 has-text-color has-link-color banner-box-para" style="color:#1d1d1d"><?php echo esc_html__('Chairs are essential pieces of furniture designed for comfort and support. From classic elegance to modern innovation, chairs serve as functional and stylish elements in homes, offices, and public spaces.', 'vw-furniture-shop'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"background","style":{"color":{"background":"#d1b7a0"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"is-style-fill","fontSize":"upper-heading"} -->
<div class="wp-block-button has-custom-font-size is-style-fill has-upper-heading-font-size"><a class="wp-block-button__link has-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="background-color:#d1b7a0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--70)"><?php echo esc_html__('Explore More', 'vw-furniture-shop'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-img.png","id":26,"dimRatio":0,"customOverlayColor":"#aba090","minHeight":750,"isDark":false,"className":"position-relative","layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light position-relative" style="min-height:750px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#aba090"></span><img class="wp-block-cover__image-background wp-image-26" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-img.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:image {"id":28,"sizeSlug":"full","linkDestination":"none","className":"banner-small-img"} -->
<figure class="wp-block-image size-full banner-small-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/banner-small-img.png" alt="" class="wp-image-28"/></figure>
<!-- /wp:image --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></main>
<!-- /wp:group -->
