<?php
/**
 * Customizer Blocks Repeater Control
 * 
 * @package StoreFlex
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'storeflex_Control_Blocks_Repeater' ) ) :

     /**
     * Blocks Repeater control
     *
     * @since 1.0.0
     */
    class storeflex_Control_Blocks_Repeater extends WP_Customize_Control {
        
        /**
         * The control type.
         *
         * @access public
         * @var string
         * @since 1.0.0
         */
        public $type = 'storeflex-block-repeater';

        /**
         * constructor
         * 
         */
        public function __construct( $manager, $id, $args ) {
            parent::__construct( $manager, $id, $args );
        }

        public function enqueue() {            
            wp_enqueue_style( 'storeflex-blocks-repeater-style', get_template_directory_uri() . '/inc/customizer/custom-controls/blocks-repeater/blocks.css', null );
            wp_enqueue_script( 'storeflex-blocks-repeater-script', get_template_directory_uri() . '/inc/customizer/custom-controls/blocks-repeater/blocks.js', array( 'jquery' ), false, true );
        }

        /**
         * Render content
         * 
         */
        public function render_content() {
            $defaults = json_decode( $this->setting->default ); // defaults
            $values = json_decode( $this->value() ); // values
    ?>
            <div class="blocks-repeater-control-wrap">
                <?php
                    $categories = get_categories();

                    foreach ( $values as $control_key => $control ) :
                        if ( false === $control->option ) {
                            $dash_icon = 'hidden';
                            $item_wrap_class = ' storeflex-hide';
                        } else {
                            $dash_icon = 'visibility';
                            $item_wrap_class = '';
                        }
                        switch ( $control->type ) {
                            case 'ad-block' :

                ?>
                                <div class="storeflex-block ad-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="ad-block">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'Ad Block', 'storeflex' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * upload field for ad block image
                                             */
                                            $ad_img_arg = array(
                                                'title'         => __( 'Ad Block Image', 'storeflex' ),
                                                'name'          => 'imgSrc',
                                                'value'         => $control->imgSrc
                                            );
                                            self::render_field( 'upload', $ad_img_arg );

                                            /**
                                             * url field for ad image link
                                             */
                                            $img_link_arg = array(
                                                'title'         => __( 'Ad Block Image Link', 'storeflex' ),
                                                'name'          => 'imgUrl',
                                                'value'         => $control->imgUrl
                                            );
                                            self::render_field( 'url', $img_link_arg );

                                            /**
                                             * toggle field for link open in new tab.
                                             */
                                            $new_tab_args = array(
                                                'title'     => __( 'Open Link in New Tab', 'storeflex' ),
                                                'name'      => 'newTab',
                                                'value'     => $control->newTab,
                                            );
                                            self::render_field( 'toggle', $new_tab_args );
                                        ?>

                                        <div class="action-buttons ad-block">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'storeflex' ); ?></div>
                                            
                                        </div><!-- .action-buttons -->
                                        
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .ad-block-wrap -->
                        <?php
                                break;

                                case 'category-block' :
                        ?>
                                <div class="storeflex-block category-block-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="category-block">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'Category Block', 'storeflex' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Block Title', 'storeflex' ),
                                                'description'   => __( 'Leave blank to hide title.', 'storeflex' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                             /**
                                             * select field for category orderby
                                             */
                                            $category_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'storeflex' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'asc'     => __( 'A - Z', 'storeflex' ),
                                                    'desc'    => __( 'Z - A', 'storeflex' ),
                                                    'rand'    => __( 'Random', 'storeflex' ),
                                                )
                                            );
                                            self::render_field( 'select', $category_orderby_args );

                                             /**
                                             * number field for post count
                                             */
                                            $block_category_args = array(
                                                'title'         => __( 'Number of Category', 'storeflex' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 4,
                                                    'max'   => 10,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $block_category_args );

                                            /**
                                             * toggle field to display product count.
                                             */
                                            $count_args = array(
                                                'title'     => __( 'Enable Product Count', 'storeflex' ),
                                                'name'      => 'productCount',
                                                'value'     => $control->productCount,
                                            );
                                            self::render_field( 'toggle', $count_args );

                                        ?>

                                        <div class="action-buttons category-block">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'storeflex' ); ?></div>
                                            
                                        </div><!-- .action-buttons -->
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .category-block-block-wrap -->
                        <?php
                                break;

                                case 'product-grid' :
                        ?>
                                <div class="storeflex-block product-grid-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="product-grid">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'Product Grid', 'storeflex' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php

                                             /**
                                             * text field for block title
                                             */
                                            $button_title_arg = array(
                                                'title'         => __( 'Block Title', 'storeflex' ),
                                                'description'   => __( 'Leave blank to display category name.', 'storeflex' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $button_title_arg );

                                            /**
                                             * block query group
                                             */
                                            $block_query_group_arg = array(
                                                'title'         => __( 'Block Query', 'storeflex' ),
                                                'description'   => __( 'Click Icon to expand the fields.', 'storeflex' )
                                            );
                                            self::render_field( 'group_title', $block_query_group_arg );

                                            /**
                                             * block query wrap start
                                             */
                                            self::render_field( 'field_group_start' );

                                            /**
                                             * category dropdown field for block category
                                             */
                                            $block_cat_args = array(
                                                'title' => __( 'Block Category', 'storeflex' ),
                                                'name'  => 'category',
                                                'value' => $control->category
                                            );
                                            self::render_field( 'product_category_dropdown', $block_cat_args );

                                            /**
                                             * select field for posts orderby
                                             */
                                            $products_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'storeflex' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'date-desc'     => __( 'Newest - Oldest', 'storeflex' ),
                                                    'date-asc'      => __( 'Oldest - Newest', 'storeflex' ),
                                                    'title-asc'     => __( 'A - Z', 'storeflex' ),
                                                    'title-desc'    => __( 'Z - A', 'storeflex' ),
                                                    'rand-desc'     => __( 'Random', 'storeflex' ),
                                                )
                                            );
                                            self::render_field( 'select', $products_orderby_args );

                                            /**
                                             * number field for post count
                                             */
                                            $products_postcount_args = array(
                                                'title'         => __( 'Number of product', 'storeflex' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 1,
                                                    'max'   => 12,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $products_postcount_args );

                                            /**
                                             * block query wrap end
                                             */
                                            self::render_field( 'field_group_end' );

                                             /**
                                             * text field for button text
                                             */
                                            $button_arg = array(
                                                'title'         => __( 'Button Text', 'storeflex' ),
                                                'description'   => __( 'Leave blank to hide button.', 'storeflex' ),
                                                'name'          => 'buttonTitle',
                                                'value'         => $control->buttonTitle
                                            );
                                            self::render_field( 'text', $button_arg );

                                          
                                        ?>

                                        <div class="action-buttons product-grid">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'storeflex' ); ?></div>
                                            
                                        </div><!-- .action-buttons -->
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .product-listing-block-wrap -->
                        <?php
                            
                            break;

                            case 'product-carousel' :
                        ?>
                                <div class="storeflex-block product-carousel-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="product-carousel">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'Product Carousel', 'storeflex' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php

                                             /**
                                             * text field for block title
                                             */
                                            $button_title_arg = array(
                                                'title'         => __( 'Block Title', 'storeflex' ),
                                                'description'   => __( 'Leave blank to display category name.', 'storeflex' ),
                                                'name'          => 'blockTitle',
                                                'value'         => $control->blockTitle
                                            );
                                            self::render_field( 'text', $button_title_arg );


                                            /**
                                             * block query group
                                             */
                                            $block_query_group_arg = array(
                                                'title'         => __( 'Block Query', 'storeflex' ),
                                                'description'   => __( 'Click Icon to expand the fields.', 'storeflex' )
                                            );
                                            self::render_field( 'group_title', $block_query_group_arg );

                                            /**
                                             * block query wrap start
                                             */
                                            self::render_field( 'field_group_start' );

                                            /**
                                             * category dropdown field for block category
                                             */
                                            $block_cat_args = array(
                                                'title' => __( 'Block Category', 'storeflex' ),
                                                'name'  => 'category',
                                                'value' => $control->category
                                            );
                                            self::render_field( 'product_category_dropdown', $block_cat_args );

                                            /**
                                             * select field for posts orderby
                                             */
                                            $products_orderby_args = array(
                                                'title'     => __( 'Posts Order by', 'storeflex' ),
                                                'name'      => 'postOrderby',
                                                'value'     => $control->postOrderby,
                                                'options'   => array(
                                                    'date-desc'     => __( 'Newest - Oldest', 'storeflex' ),
                                                    'date-asc'      => __( 'Oldest - Newest', 'storeflex' ),
                                                    'title-asc'     => __( 'A - Z', 'storeflex' ),
                                                    'title-desc'    => __( 'Z - A', 'storeflex' ),
                                                    'rand-desc'     => __( 'Random', 'storeflex' ),
                                                )
                                            );
                                            self::render_field( 'select', $products_orderby_args );

                                            /**
                                             * number field for post count
                                             */
                                            $block_postcount_args = array(
                                                'title'         => __( 'Number of product', 'storeflex' ),
                                                'name'          => 'postCount',
                                                'value'         => $control->postCount,
                                                'input_attrs'   => array(
                                                    'min'   => 1,
                                                    'max'   => 12,
                                                    'step'  => 1
                                                )
                                            );
                                            self::render_field( 'number', $block_postcount_args );

                                            /**
                                             * block query wrap end
                                             */
                                            self::render_field( 'field_group_end' );

                                            
                                        ?>

                                        <div class="action-buttons product-carousel">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'storeflex' ); ?></div>
                                        </div><!-- .action-buttons -->
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .product-caruosel-block-wrap -->
                            <?php
                            
                            break;

                             case 'call-to-action' :

                ?>
                                <div class="storeflex-block ad-block-wrap<?php echo esc_attr( $item_wrap_class ); ?>" block-name="call-to-action">

                                    <div class="block-header content-trigger">
                                        <h2 class="block-header-title"><?php esc_html_e( 'Call to Action Block', 'storeflex' ); ?></h2>
                                        <span class="block-settings dashicons dashicons-admin-generic"></span>
                                        <div class="block-header-toggle">
                                            <span class="block-option dashicons dashicons-<?php echo esc_attr( $dash_icon ); ?>"></span>
                                            <input type="checkbox" class="block-repeater-control-field" data-name="option" <?php echo checked( $control->option, true ); ?>/>
                                        </div><!-- .block-header-toggle -->
                                    </div><!-- .block-header -->

                                    <div class="block-content-wrap">
                                        <?php
                                            /**
                                             * upload field for ad block image
                                             */
                                            $call_to_action_img_arg = array(
                                                'title'         => __( 'Call to Action Block Image', 'storeflex' ),
                                                'name'          => 'imgSrc',
                                                'value'         => $control->imgSrc
                                            );
                                            self::render_field( 'upload', $call_to_action_img_arg );

                                            /**
                                             * url field for ad image link
                                             */
                                            $img_link_arg = array(
                                                'title'         => __( 'Call to Block Image Link', 'storeflex' ),
                                                'name'          => 'imgUrl',
                                                'value'         => $control->imgUrl
                                            );
                                            self::render_field( 'url', $img_link_arg );

                                            /**
                                             * toggle field for link open in new tab.
                                             */
                                            $new_tab_args = array(
                                                'title'     => __( 'Open Link in New Tab', 'storeflex' ),
                                                'name'      => 'newTab',
                                                'value'     => $control->newTab,
                                            );
                                            self::render_field( 'toggle', $new_tab_args );

                                             /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Call to Action Title', 'storeflex' ),
                                                'description'   => __( 'Leave blank to hide title.', 'storeflex' ),
                                                'name'          => 'sectionContent',
                                                'value'         => $control->sectionContent
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                             /**
                                             * text field for block title
                                             */
                                            $block_title_arg = array(
                                                'title'         => __( 'Button Text', 'storeflex' ),
                                                'description'   => __( 'Leave blank to hide title.', 'storeflex' ),
                                                'name'          => 'sectionButton',
                                                'value'         => $control->sectionButton
                                            );
                                            self::render_field( 'text', $block_title_arg );

                                             /**
                                             * url field for ad image link
                                             */
                                            $img_link_arg = array(
                                                'title'         => __( 'Button link', 'storeflex' ),
                                                'name'          => 'buttonUrl',
                                                'value'         => $control->buttonUrl
                                            );
                                            self::render_field( 'url', $img_link_arg );

                                        ?>

                                        <div class="action-buttons call-to-action">
                                            <div class="close-block"><?php esc_html_e( 'Close', 'storeflex' ); ?></div>
                                        </div><!-- .action-buttons -->
                                        
                                    </div><!-- .block-content-wrap -->

                                </div><!-- .call-to-action-wrap -->
                        <?php
                                break;

                            default : esc_html_e( 'No block defined ', 'storeflex' );
                        }
                    endforeach;
                ?>
                
            </div><!-- .blocks-repeater-control-wrap -->

            <input type="hidden" <?php esc_attr( $this->link() ); ?> class="blocks-repeater-control" value="<?php echo esc_attr( $this->value() ); ?>" />
    <?php
        } // end function render_content

        public function render_field( $type, $field_args = array() ) {
            switch ( $type ) {

                case 'text' :
    ?>
                    <div class="customize-text-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <p class="description"><?php echo esc_html( $field_args['description'] ); ?></p>
                        <input type="text" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_attr( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-text-field -->
    <?php
                    break;

                case 'url' :
    ?>
                    <div class="customize-url-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <input type="url" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_url( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-url-field -->
    <?php
                    break;

                case 'number' :
    ?>
                    <div class="customize-number-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <input type="number" min="<?php echo absint( $field_args['input_attrs']['min'] ); ?>" max="<?php echo absint( $field_args['input_attrs']['max'] ); ?>" step="<?php echo absint( $field_args['input_attrs']['step'] ); ?>" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo absint( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-number-field -->
    <?php
                    break;
                    
                case 'toggle' :
    ?>
                    <div class="customize-toggle-field">
                        <div class="block-repeater-toggle">
                            <div class="toggle-wrapper">
                                <span class="toggle-title"><?php echo esc_html( $field_args['title'] ); ?></span>
                                <input type="checkbox" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" <?php checked( true, $field_args['value'] ); ?> >
                                <label class="toggle-label"></label>
                            </div><!-- .toggle-wrapper -->
                        </div><!-- .block-repeater-toggle -->
                    </div><!-- .customize-toggle-field -->
    <?php
                    break;

                case 'select' :
    ?>
                    <div class="customize-select-field select-<?php echo esc_attr( $field_args['name'] ); ?>">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <select class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>">
                            <?php
                                foreach ( $field_args['options'] as $key => $value ) {
                                    echo '<option value="'. esc_attr( $key ) .'" '. selected( $key, $field_args['value'] ) .'>'. esc_html( $value ) .'</option>';
                                }
                            ?>
                        </select>
                    </div><!-- .customize-select-field .select-<?php echo esc_attr( $field_args['name'] ); ?> -->
    <?php
                    break;

                case 'category_dropdown' :

                    $dropdown_categories = wp_dropdown_categories(
                        array(
                            'name'              => 'block-category',
                            'echo'              => 0,
                            'show_option_none'  => esc_html__( 'Choose atleast one category', 'storeflex' ),
                            'value_field'       => 'slug',
                            'option_none_value' => '',
                            'selected'          => esc_attr( $field_args['value'] ),
                            'show_count'        => 1,
                            'hierarchical'      => 1,
                            'hide_empty'        => 1
                        )
                    );

                    $replace_select = '<select class="block-repeater-control-field" data-name="'. esc_attr( $field_args['name'] ) .'"';

                    // Hackily add in the data link parameter.
                    $dropdown_categories = str_replace( '<select', $replace_select, $dropdown_categories );
    ?>
                    <div class="customize-select-field select-category">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <?php echo $dropdown_categories; ?>
                    </div><!-- .customize-select-field .select-category -->
    <?php
                    break;

                case 'product_category_dropdown' :

                    $dropdown_categories = wp_dropdown_categories(
                        array(
                            'taxonomy'          => 'product_cat',
                            'name'              => 'block-product-category',
                            'echo'              => 0,
                            'show_option_none'  => esc_html__( 'All Products', 'storeflex' ),
                            'value_field'       => 'slug',
                            'option_none_value' => 'all',
                            'selected'          => esc_attr( $field_args['value'] ),
                            'show_count'        => 1,
                            'hierarchical'      => 1,
                            'hide_empty'        => 1
                        )
                    );

                    $replace_select = '<select class="block-repeater-control-field" data-name="'. esc_attr( $field_args['name'] ) .'"';

                    // Hackily add in the data link parameter.
                    $dropdown_categories = str_replace( '<select', $replace_select, $dropdown_categories );
        ?>
                    <div class="customize-select-field select-product-category">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <?php echo $dropdown_categories; ?>
                    </div><!-- .customize-select-field .select-product-category -->
                    <?php

                    break;

                case 'selector':
    ?>
                    <div class="customize-radio-image-field">
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <p class="description"><?php echo esc_html( $field_args['description'] ); ?></p>
                        <?php
                            foreach( $field_args['choices'] as $layout_key => $layout ) :
                        ?>
                                <label class="radio-image-single <?php if ( $layout_key === $field_args['value'] ) echo 'selected'; ?>" data-value="<?php echo esc_attr( $layout_key ); ?>">
                                    <img src="<?php echo esc_url( $layout['img'] ); ?>"/>
                                    <span class="lbl-tooltip"><?php echo esc_html( $layout['label'] ); ?></span>
                                </label>
                        <?php
                            endforeach;
                        ?>
                        <input type="hidden" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_attr( $field_args['value'] ); ?>"/>
                    </div><!-- .customize-radio-image-field -->
    <?php
                    break;

                case 'upload' :
    ?>
                    <div class="customize-upload-image-field">
                        <?php
                            $image_html = $image_class = "";
                            if ( ! empty( $field_args['value'] ) ) {
                                $image_html = '<img src="'.esc_url( $field_args['value'] ).'" style="max-width:100%;"/>';
                                $image_class = ' hidden';
                            }
                        ?>
                        <label><?php echo esc_html( $field_args['title'] ); ?></label>
                        <div class="placeholder<?php echo esc_attr( $image_class ); ?>"><?php esc_html_e( 'No image selected', 'storeflex' ); ?></div>
                        <div class="field-thumbnail thumbnail-image"><?php echo $image_html; ?></div>
                        <div class="upload-actions clearfix">
                            <button type="button" class="storeflex-button img-delete-button align-left">
                                <?php esc_html_e( 'Remove', 'storeflex' ); ?>
                            </button>
                            <button type="button" class="storeflex-button img-upload-button alignright">
                                <?php esc_html_e( 'Select Image', 'storeflex' ); ?>
                            </button>
                        </div><!-- .upload-actions -->
                        <input type="hidden" class="block-repeater-control-field" data-name="<?php echo esc_attr( $field_args['name'] ); ?>" value="<?php echo esc_url( $field_args['value'] ); ?>">
                    </div><!-- .customize-upload-image-field -->
    <?php
                    break;

                case 'field_group_start';
                    echo '<div class="field-group-wrapper">';
                    break;

                case 'field_group_end';
                    echo '</div><!-- .field-group-wrapper --></div><!-- .group-toggle-wrapper -->';
                    break;

                case 'group_title';
                    echo '<div class="group-toggle-wrapper"><div class="block-query-group"><label>'. esc_html( $field_args['title'] ) .'</label><span class="group-trigger dashicons dashicons-edit"></span></div><!-- .block-query-group -->';
                    break;
                
                default:
                    // code...
                    break;
            }
        }
    }

endif;