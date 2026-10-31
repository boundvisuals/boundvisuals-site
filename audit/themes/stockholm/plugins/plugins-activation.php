<?php

if(!function_exists('stockholm_qode_set_plugins_array_to_install')){
	function stockholm_qode_set_plugins_array_to_install(){
		global $default_plugins_array_to_install;

		$default_plugins_array_to_install = array(
			'js_composer',
			'elementor',
			'stockholm-core',
			'LayerSlider',
			'revslider',
			'envato-market',
			'select-twitter-feed',
			'select-instagram-feed',
			'qi-addons-for-elementor'
		);
	}

	add_action('stockholm_qode_action_before_options_map', 'stockholm_qode_set_plugins_array_to_install');
}

if ( ! function_exists( 'stockholm_qode_plugins_list' ) ) {
	/**
	 * Registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */
	function stockholm_qode_plugins_list($filter_array = array()) {
		
		$plugins = array(
			array(
				'name'               => esc_html__( 'Stockholm Core', 'stockholm' ),
				'slug'               => 'stockholm-core',
				'source'             => get_template_directory() . '/plugins/stockholm-core.zip',
				'version'            => '2.3.2',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'WPBakery Visual Composer', 'stockholm' ),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/plugins/js_composer.zip', // The plugin source
				'required'           => false,
				'version'            => '6.7.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
			),
			array(
				'name'               => esc_html__( 'LayerSlider WP', 'stockholm' ),
				'slug'               => 'LayerSlider',
				'source'             => get_template_directory() . '/plugins/LayerSlider.zip',
				'required'           => false,
				'version'            => '6.11.8',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'stockholm' ),
				'slug'               => 'revslider',
				'source'             => get_template_directory() . '/plugins/revslider.zip',
				'required'           => false,
				'version'            => '6.5.8',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'stockholm' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false
			),
			array(
				'name'               => esc_html__( 'Select Instagram Feed', 'stockholm' ),
				'slug'               => 'select-instagram-feed',
				'source'             => get_template_directory() . '/plugins/select-instagram-feed.zip',
				'required'           => false,
				'version'            => '2.0.2',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
			),
			array(
				'name'               => esc_html__( 'Select Twitter Feed', 'stockholm' ),
				'slug'               => 'select-twitter-feed',
				'source'             => get_template_directory() . '/plugins/select-twitter-feed.zip',
				'required'           => false,
				'version'            => '2.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
			array(
				'name'               => esc_html__( 'Select Restaurant', 'stockholm' ),
				'slug'               => 'select-restaurant',
				'source'             => get_template_directory() . '/plugins/select-restaurant.zip',
				'required'           => false,
				'version'            => '2.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
			array(
				'name'               => esc_html__( 'Select Membership', 'stockholm' ),
				'slug'               => 'select-membership',
				'source'             => get_template_directory() . '/plugins/select-membership.zip',
				'required'           => false,
				'version'            => '1.1.4',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => ''
			),
			array(
				'name'         => esc_html__( 'WooCommerce', 'stockholm' ),
				'slug'         => 'woocommerce',
				'external_url' => 'https://wordpress.org/plugins/woocommerce/',
				'required'     => false
			),
			array(
				'name'         => esc_html__( 'YITH WooCommerce Quick View', 'stockholm' ),
				'slug'         => 'yith-woocommerce-quick-view',
				'required'     => false
			),
			array(
				'name'         => esc_html__( 'YITH WooCommerce Wishlist', 'stockholm' ),
				'slug'         => 'yith-woocommerce-wishlist',
				'required'     => false
			),
			array(
				'name'         => esc_html__( 'Contact Form 7', 'stockholm' ),
				'slug'         => 'contact-form-7',
				'external_url' => 'https://wordpress.org/plugins/contact-form-7/',
				'required'     => false
			),
			array(
				'name'         => esc_html__( 'Elementor', 'stockholm' ),
				'slug'         => 'elementor',
				'external_url' => 'https://wordpress.org/plugins/elementor/',
				'required'     => false
			),
			array(
				'name'         => esc_html__( 'QI Addons for Elementor', 'stockholm' ),
				'slug'         => 'qi-addons-for-elementor',
				'required'     => false
			),
			array(
				'name'     				=> esc_html__('Timetable Responsive Schedule For WordPress', 'stockholm'),
				'slug'     				=> 'timetable',
				'source'   				=> get_template_directory() . '/plugins/timetable.zip',
				'version' 				=> '6.4',
			)
		);
		
		$config = array(
			'domain'       => 'stockholm',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'stockholm' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'stockholm' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'stockholm' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'stockholm' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'stockholm' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'stockholm' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'stockholm' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'stockholm' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'stockholm' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'stockholm' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'stockholm' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'stockholm' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'stockholm' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'stockholm' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'stockholm' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'stockholm' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'stockholm' ),
				'nag_type'                        => 'updated'
			)
		);
		if(!empty($filter_array)){
			$filtered_plugins = array();
			foreach($filter_array as $k1 => $val1) {
				foreach ($plugins as $k2 => $val2) {
					if ($plugins[$k2]['slug'] == $val1) {
						$filtered_plugins[$plugins[$k2]['slug']] = $plugins[$k2]['name'];
					}
				}
			}
			return $filtered_plugins;
		} else{
			return $plugins;
		}
	}
	
}


if(!function_exists('stockholm_qode_register_theme_included_plugins')) {

	/**
	 * Registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */

	function stockholm_qode_register_theme_included_plugins()	{
		global $default_plugins_array_to_install;
		$plugins = stockholm_qode_plugins_list();
		$plugins_to_load = array();

		//if this option is already set (ie someone is updating theme) than update current option with new array entries
		if(!add_option("stockholm_qode_required_plugins", $default_plugins_array_to_install)) {
			$former_options = get_option("stockholm_qode_required_plugins");

			if(is_array($default_plugins_array_to_install) && count($default_plugins_array_to_install) > 0) {
				foreach ($default_plugins_array_to_install as $default_plugin) {
					if (!in_array($default_plugin, $former_options)) {
						array_push($former_options, $default_plugin);
					}
				}
			}

			update_option("stockholm_qode_required_plugins", $former_options);

		}

		$stockholm_qode_required_plugins = get_option("stockholm_qode_required_plugins");
		if(empty($stockholm_qode_required_plugins)) {
			$stockholm_qode_required_plugins = array();
		}

		$filtered_plugins = apply_filters('stockholm_qode_filter_required_plugins', $stockholm_qode_required_plugins);

		foreach($filtered_plugins as $k1 => $val1) {
			foreach($plugins as $k2 => $val2) {
				if($plugins[$k2]['slug'] == $val1) {
					array_push($plugins_to_load, $plugins[$k2]);
				}
			}
		}

		$config = array(
			'domain'			=> 'stockholm',
			'default_path'		=> '',
			'parent_slug'		=> 'themes.php',
			'capability'		=> 'edit_theme_options',
			'menu'				=> 'install-required-plugins',
			'has_notices'		=> true,
			'is_automatic'		=> false,
			'message'			=> '',
			'strings'			=> array(
				'page_title'						=> esc_html__('Install Required Plugins', 'stockholm'),
				'menu_title'						=> esc_html__('Install Plugins', 'stockholm'),
				'installing'						=> esc_html__('Installing Plugin: %s', 'stockholm'),
				'oops'								=> esc_html__('Something went wrong with the plugin API.', 'stockholm'),
				'notice_can_install_required'		=> _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'stockholm'),
				'notice_can_install_recommended'	=> _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'stockholm'),
				'notice_cannot_install'				=> _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'stockholm'),
				'notice_can_activate_required'		=> _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'stockholm'),
				'notice_can_activate_recommended'	=> _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'stockholm'),
				'notice_cannot_activate'			=> _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'stockholm'),
				'notice_ask_to_update'				=> _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'stockholm'),
				'notice_cannot_update'				=> _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'stockholm'),
				'install_link'						=> _n_noop('Begin installing plugin', 'Begin installing plugins', 'stockholm'),
				'activate_link'						=> _n_noop('Activate installed plugin', 'Activate installed plugins', 'stockholm'),
				'return'							=> esc_html__('Return to Required Plugins Installer', 'stockholm'),
				'plugin_activated'					=> esc_html__('Plugin activated successfully.', 'stockholm'),
				'complete'							=> esc_html__('All plugins installed and activated successfully. %s', 'stockholm'),
				'nag_type'							=> 'updated'
			)
		);

		tgmpa($plugins_to_load, $config);
	}
	add_action( 'tgmpa_register', 'stockholm_qode_register_theme_included_plugins' );
}
