<?php
if(!function_exists('stockholm_qode_verticalsplitslider_options_map')) {
    /**
     * Vertical Split Slider options page
     */
    function stockholm_qode_verticalsplitslider_options_map()
    {

        $verticalSplitSliderPage = new StockholmQodeAdminPage("_vertical_split_slider", esc_html__('Vertical Split Slider', 'stockholm'), "fa fa-arrows-v");
        stockholm_qode_framework()->qodeOptions->addAdminPage("verticalSplitSlider", $verticalSplitSliderPage);

        // General Style

        $panel10 = new StockholmQodePanel(esc_html__('General Style', 'stockholm'), "general_style");
        $verticalSplitSliderPage->addChild("panel10", $panel10);

        $group1 = new StockholmQodeGroup(esc_html__('Navigation Style', 'stockholm'), esc_html__('Define style for navigation bullets', 'stockholm'));
        $panel10->addChild("group1", $group1);

        $row1 = new StockholmQodeRow();
        $group1->addChild("row1", $row1);

        $vss_navigation_inactive_color = new StockholmQodeField("colorsimple", "vss_navigation_inactive_color", "", esc_html__('Navigation Color', 'stockholm'), esc_html__('Define color for navigation dots', 'stockholm'));
        $row1->addChild("vss_navigation_inactive_color", $vss_navigation_inactive_color);

        $vss_navigation_inactive_border_color = new StockholmQodeField("colorsimple", "vss_navigation_inactive_border_color", "", esc_html__('Navigation Border Color', 'stockholm'), esc_html__('Define border color for navigation dots', 'stockholm'));
        $row1->addChild("vss_navigation_inactive_border_color", $vss_navigation_inactive_border_color);

        $vss_navigation_color = new StockholmQodeField("colorsimple", "vss_navigation_color", "", esc_html__('Navigation Active Color', 'stockholm'), esc_html__('Define active color for navigation dots', 'stockholm'));
        $row1->addChild("vss_navigation_color", $vss_navigation_color);

        $vss_navigation_border_color = new StockholmQodeField("colorsimple", "vss_navigation_border_color", "", esc_html__('Navigation Active Border Color', 'stockholm'), esc_html__('Define active border color for navigation dots', 'stockholm'));
        $row1->addChild("vss_navigation_border_color", $vss_navigation_border_color);

        $vss_navigation_size = new StockholmQodeField("text", "vss_navigation_size", "", esc_html__('Navigation Size (px)', 'stockholm'), esc_html__('Define size for navigation dots', 'stockholm'), array(), array("col_width" => 1));
        $panel10->addChild("vss_navigation_size", $vss_navigation_size);

        $vss_left_panel_size = new StockholmQodeField("text", "vss_left_panel_size", "", esc_html__('Left Slide Panel size (%)', 'stockholm'), esc_html__('Define size for left slide panel. Note that sum of left and right slide panel should be 100.', 'stockholm'), array(), array("col_width" => 1));
        $panel10->addChild("vss_left_panel_size", $vss_left_panel_size);

        $vss_right_panel_size = new StockholmQodeField("text", "vss_right_panel_size", "", esc_html__('Right Slide Panel size (%)', 'stockholm'), esc_html__('Define size for right slide panel. Note that sum of left and right slide panel should be 100.', 'stockholm'), array(), array("col_width" => 1));
        $panel10->addChild("vss_right_panel_size", $vss_right_panel_size);

        stockholm_qode_add_admin_field(
            array(
                'name'              => 'vss_responsive_advanced',
                'type'              => 'yesno',
                'label'             => esc_html__('Advanced Responsive', 'stockholm'),
                'description'       => esc_html__('Enable this option for advanced responsive on smaller devices', 'stockholm'),
                'default_value'     => 'no',
                'parent'            => $panel10,
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#qodef_qode_vss_responsive_advanced_options_container'
                )
            )
        );

        $qode_vss_responsive_advanced_options_container = stockholm_qode_add_admin_container(
            array(
                'parent'          => $panel10,
                'name'            => 'qode_vss_responsive_advanced_options_container',
                'hidden_property' => 'vss_responsive_advanced',
                'hidden_value'    => 'no'
            )
        );

        stockholm_qode_add_admin_field( array(
            'type'          => 'select',
            'name'          => 'vss_responsive_advanced_width',
            'default_value' => '768',
            'label'         => esc_html__('Advanced Responsive Breakpoint', 'stockholm'),
            'description'   => esc_html__('Choose a width at which advanced responsive options will take effect.', 'stockholm'),
            'parent'        => $qode_vss_responsive_advanced_options_container,
            'options'       => array(
                '1000'  => esc_html__('1000px', 'stockholm'),
                '768'   => esc_html__('768px', 'stockholm'),
                '600'   => esc_html__('600px', 'stockholm')
            )
        ) );
    }
    add_action('stockholm_qode_action_options_map','stockholm_qode_verticalsplitslider_options_map',120);
}
