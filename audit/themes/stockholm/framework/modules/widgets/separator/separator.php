<?php
if(class_exists('StockholmQodeWidget')) {
    class StockholmQodeSeparator extends StockholmQodeWidget 	{
        protected $params;

        public function __construct() {
            parent::__construct(
                'qodef_separator',
                esc_html__('Stockholm Separator', 'stockholm'),
                array('description' => esc_html__('Display Stockholm Separator', 'stockholm'),)
            );

            $this->setParams();
        }

        protected function setParams() {
            $this->params = array(
                array(
                    'name' => 'thickness',
                    'type' => 'textfield',
                    'title' => esc_html__('Thickness (px)', 'stockholm'),
                ),
            );
        }

        public function widget($args, $instance) {
            extract($args);
            $thickness = 0;
            $style = array();
            if( ! empty( $instance['thickness'] ) ){
                $thickness = stockholm_qode_filter_px( $instance['thickness'] );
            }
			$style[] = 'margin-bottom:' . $thickness . 'px';
            ?>

            <div id="<?php echo esc_attr($args['widget_id']); ?>" class="widget qodef-separator-widget" <?php stockholm_qode_inline_style($style); ?>></div>
        <?php
        }
    }
}