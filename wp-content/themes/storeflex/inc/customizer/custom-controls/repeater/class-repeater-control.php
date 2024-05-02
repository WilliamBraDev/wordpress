<?php
/**
 * Customizer Repeater Control.
 * 
 * @package StoreFlex
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'storeflex_Control_Repeater' ) ) {
    
    /**
     * Repeater control
    */
    class storeflex_Control_Repeater extends WP_Customize_Control {

        /**
         * The control type.
         *
         * @access public
         * @var string
         */
        public $type = 'mt-repeater';

        public $storeflex_box_label = '';

        public $storeflex_box_add_control = '';

        /**
         * The fields that each container row will contain.
         *
         * @access public
         * @var array
         */
        public $fields = array();

        /**
         * Repeater drag and drop controller
         *
         * @since  1.0.0
         */
        public function __construct( $manager, $id, $args = array(), $fields = array() ) {
            
            $this->fields = $fields;
            $this->storeflex_box_label = $args['storeflex_box_label_text'] ;
            $this->storeflex_box_add_control = $args['storeflex_box_add_control_text'];
            parent::__construct( $manager, $id, $args );
        }

        public function enqueue() {            
            wp_enqueue_style( 'storeflex-repeater-style', get_template_directory_uri() . '/inc/customizer/custom-controls/repeater/repeater.css', null );
            wp_enqueue_script( 'storeflex-repeater-script', get_template_directory_uri() . '/inc/customizer/custom-controls/repeater/repeater.js', array( 'jquery' ), false, true );
        }

        protected function render_content() {

            $values = json_decode( $this->value() );
            $repeater_id = $this->id;
            $field_count = count( $values );
        ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

            <?php if ( $this->description ) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post( $this->description ); ?>
                </span>
            <?php } ?>

            <ul class="mt-repeater-field-control-wrap">
                <?php $this->storeflex_get_fields(); ?>
            </ul>

            <input type="hidden" <?php $this->link(); ?> class="mt-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
            <input type="hidden" name="<?php echo esc_attr( $repeater_id ).'_count'; ?>" class="field-count" value="<?php echo absint( $field_count ); ?>">
            <input type="hidden" name="field_limit" class="field-limit" value="6">
            <button type="button" class="button mt-repeater-add-control-field"><i class="bx bx-plus"></i><?php echo esc_html( $this->storeflex_box_add_control ); ?></button>
    <?php
        }

        private function storeflex_get_fields() {
            $fields = $this->fields;
            $values = json_decode( $this->value() );

            if ( is_array( $values ) ) {
                foreach( $values as $value ) {
        ?>
                <li class="mt-repeater-field-control">
                <h3 class="mt-repeater-field-title"><?php echo esc_html( $this->storeflex_box_label ); ?></h3>
                
                <div class="mt-repeater-fields">
                <?php
                    foreach ( $fields as $key => $field ) {
                    $class = isset( $field['class'] ) ? $field['class'] : '';
                ?>
                    <div class="mt-repeater-field mt-repeater-type-<?php echo esc_attr( $field['type'] ).' '.esc_attr( $class ); ?>">

                    <?php 
                        $label = isset( $field['label'] ) ? $field['label'] : '';
                        $description = isset( $field['description'] ) ? $field['description'] : '';
                        if ( $field['type'] != 'checkbox' ) { 
                    ?>
                            <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                            <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                    <?php 
                        }

                        $new_value = isset( $value->$key ) ? $value->$key : '';
                        $default = isset( $field['default'] ) ? $field['default'] : '';

                        switch ( $field['type'] ) {

                            /**
                             * Text field
                             */
                            case 'text':
                                echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_attr( $new_value ).'"/>';
                                break;

                            /**
                             * Textarea field
                             */
                            case 'textarea':
                                echo '<textarea data-name="'. esc_attr( $key ) .'">'. wp_kses_post( $new_value ) .'</textarea>';
                                break;
                            
                            /**
                             * URL field
                             */
                            case 'url':
                                echo '<input data-default="'.esc_attr( $default ).'" data-name="'.esc_attr( $key ).'" type="text" value="'.esc_url( $new_value ).'"/>';
                                break;
                                
                            /**
                             * Social Icon field
                             */
                            case 'social_icon':
                                $storeflex_social_icon_array = storeflex_social_icon_array();
                                echo '<div class="mt-repeater-selected-icon"><i class="'.esc_attr( $new_value ).'"></i><span><i class="fa fa-angle-down"></i></span></div><ul class="mt-repeater-icon-list mt-clearfix">';
                                foreach ( $storeflex_social_icon_array as $storeflex_font_awesome_icon ) {
                                    $icon_class = $new_value == $storeflex_font_awesome_icon ? 'icon-active' : '';
                                    echo '<li class='.esc_attr( $icon_class ).'><i class="'.esc_attr( $storeflex_font_awesome_icon ).'"></i></li>';
                                }
                                echo '</ul><input data-default="'.esc_attr( $default ).'" type="hidden" value="'.esc_attr( $new_value ).'" data-name="'.esc_attr( $key ).'"/>';
                                break;

                            /**
                             * Upload field
                             */
                            case 'upload':
                                $image_class = "";
                                $upload_btn_label = esc_html__( 'Select Image', 'storeflex' );
                                $remove_btn_label = esc_html__( 'Remove', 'storeflex' );
                                if ( $new_value ) { 
                                    $image_class = ' hidden';
                                }
                                echo '<div class="mt-fields-wrap"><div class="attachment-media-view"><div class="placeholder'. esc_attr( $image_class ).'">';
                                esc_html_e( 'No image selected', 'storeflex' );
                                echo '</div><div class="thumbnail thumbnail-image"><img src="'.esc_url( $new_value ).'" style="max-width:100%;"/></div><div class="actions clearfix"><button type="button" class="button mt-delete-button align-left">'. esc_html( $remove_btn_label ) .'</button><button type="button" class="button mt-upload-button alignright">'. esc_html( $upload_btn_label ) .'</button><input data-default="'.esc_attr( $default ).'" class="upload-id" data-name="'.esc_attr( $key ).'" type="hidden" value="'.esc_attr( $new_value ).'"/></div></div></div>';
                                break;

                            default:
                                break;
                        }
                    ?>
                    </div>
            <?php
                }
            ?>
                    <div class="mt-clearfix mt-repeater-footer">
                        <div class="alignright">
                        <a class="mt-repeater-field-remove" href="#remove"><?php esc_html_e( 'Delete', 'storeflex' ) ?></a> |
                        <a class="mt-repeater-field-close" href="#close"><?php esc_html_e( 'Close', 'storeflex' ) ?></a>
                        </div>
                    </div><!-- .mt-repeater-footer -->
                </div><!-- .mt-repeater-fields-->
                </li>
        <?php   
                }
            }
        }

    }

}