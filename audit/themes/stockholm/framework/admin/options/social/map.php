<?php
if ( ! function_exists( 'stockholm_qode_social_options_map' ) ) {
	/**
	 * Social options page
	 */
	function stockholm_qode_social_options_map() {
		
		$socialPage = new StockholmQodeAdminPage(
			"11",
			esc_html__( "Social Share", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"socialPage",
			$socialPage
		);
		
		//Social Share
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "Social Sharing", 'stockholm' ),
			"social_sharing_panel"
		);
		$socialPage->addChild(
			"panel1",
			$panel1
		);
		
		$enable_social_share = new StockholmQodeField(
			"yesno",
			"enable_social_share",
			"no",
			esc_html__( "Enable Social Share", 'stockholm' ),
			esc_html__( "Enabling this option will allow social share on networks of your choice", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_facebook_share_panel,#qodef_twitter_share_panel,#qodef_google_share_panel,#qodef_linked_share_panel,#qodef_tumblr_share_panel,#qodef_pinterest_share_panel,#qodef_vk_share_panel,#qodef_show_social_share_panel"
			)
		);
		$panel1->addChild(
			"enable_social_share",
			$enable_social_share
		);
		
		//Show Social Share
		
		$panel9 = new StockholmQodePanel(
			esc_html__( "Show Social Share", 'stockholm' ),
			"show_social_share_panel",
			"enable_social_share",
			"no"
		);
		$socialPage->addChild(
			"panel9",
			$panel9
		);
		
		$post_types_names_post = new StockholmQodeField(
			"flagpost",
			"post_types_names_post",
			"",
			esc_html__( "Posts", 'stockholm' ),
			esc_html__( "Show Social Share on Blog Posts", 'stockholm' )
		);
		$panel9->addChild(
			"post_types_names_post",
			$post_types_names_post
		);
		
		$post_types_names_page = new StockholmQodeField(
			"flagpage",
			"post_types_names_page",
			"",
			esc_html__( "Pages", 'stockholm' ),
			esc_html__( "Show Social Share on Pages", 'stockholm' )
		);
		$panel9->addChild(
			"post_types_names_page",
			$post_types_names_page
		);
		
		$post_types_names_attachment = new StockholmQodeField(
			"flagmedia",
			"post_types_names_attachment",
			"",
			esc_html__( "Media", 'stockholm' ),
			esc_html__( "Show Social Share for Images and Videos", 'stockholm' )
		);
		$panel9->addChild(
			"post_types_names_attachment",
			$post_types_names_attachment
		);
		
		$post_types_names_portfolio_page = new StockholmQodeField(
			"flagportfolio",
			"post_types_names_portfolio_page",
			"",
			esc_html__( "Portfolio Item", 'stockholm' ),
			esc_html__( "Show Social Share for Portfolio Items", 'stockholm' )
		);
		$panel9->addChild(
			"post_types_names_portfolio_page",
			$post_types_names_portfolio_page
		);
		
		if ( stockholm_qode_is_woocommerce_installed() ) {
			$post_types_names_product = new StockholmQodeField(
				"flagproduct",
				"post_types_names_product",
				"",
				esc_html__( "Product", 'stockholm' ),
				esc_html__( "Show Social Share for Product Items", 'stockholm' )
			);
			$panel9->addChild(
				"post_types_names_product",
				$post_types_names_product
			);
		}
		
		//Facebook
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Facebook Share Options", 'stockholm' ),
			"facebook_share_panel",
			"enable_social_share",
			"no"
		);
		$socialPage->addChild(
			"panel2",
			$panel2
		);
		
		$enable_facebook_share = new StockholmQodeField(
			"yesno",
			"enable_facebook_share",
			"no",
			esc_html__( "Enable Share", 'stockholm' ),
			esc_html__( "Enabling this option will allow sharing via Facebook", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_facebook_share_container"
			)
		);
		$panel2->addChild(
			"enable_facebook_share",
			$enable_facebook_share
		);
		$enable_facebook_share_container = new StockholmQodeContainer(
			"enable_facebook_share_container",
			"enable_facebook_share",
			"no"
		);
		$panel2->addChild(
			"enable_facebook_share_container",
			$enable_facebook_share_container
		);
		$facebook_icon = new StockholmQodeField(
			"image",
			"facebook_icon",
			"",
			esc_html__( "Upload Icon", 'stockholm' ),
			""
		);
		$enable_facebook_share_container->addChild(
			"facebook_icon",
			$facebook_icon
		);
		
		//Twitter
		
		$panel3 = new StockholmQodePanel(
			esc_html__( "Twitter Share Options", 'stockholm' ),
			"twitter_share_panel",
			"enable_social_share",
			"no"
		);
		$socialPage->addChild(
			"panel3",
			$panel3
		);
		
		$enable_twitter_share = new StockholmQodeField(
			"yesno",
			"enable_twitter_share",
			"no",
			esc_html__( "Enable Share", 'stockholm' ),
			esc_html__( "Enabling this option will allow sharing via Twitter", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_twitter_share_container"
			)
		);
		$panel3->addChild(
			"enable_twitter_share",
			$enable_twitter_share
		);
		$enable_twitter_share_container = new StockholmQodeContainer(
			"enable_twitter_share_container",
			"enable_twitter_share",
			"no"
		);
		$panel3->addChild(
			"enable_twitter_share_container",
			$enable_twitter_share_container
		);
		$twitter_icon = new StockholmQodeField(
			"image",
			"twitter_icon",
			"",
			esc_html__( "Upload Icon", 'stockholm' ),
			""
		);
		$enable_twitter_share_container->addChild(
			"twitter_icon",
			$twitter_icon
		);
		
		$twitter_via = new StockholmQodeField(
			"text",
			"twitter_via",
			"",
			esc_html__( "Via", 'stockholm' ),
			""
		);
		$enable_twitter_share_container->addChild(
			"twitter_via",
			$twitter_via
		);
		
		//LinkedIn
		
		$panel5 = new StockholmQodePanel(
			esc_html__( "LinkedIn Share Options", 'stockholm' ),
			"linked_share_panel",
			"enable_social_share",
			"no"
		);
		$socialPage->addChild(
			"panel5",
			$panel5
		);
		
		$enable_linkedin = new StockholmQodeField(
			"yesno",
			"enable_linkedin",
			"no",
			esc_html__( "Enable Share", 'stockholm' ),
			esc_html__( "Enabling this option will allow sharing via LinkedIn", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_linkedin_container"
			)
		);
		$panel5->addChild(
			"enable_linkedin",
			$enable_linkedin
		);
		$enable_linkedin_container = new StockholmQodeContainer(
			"enable_linkedin_container",
			"enable_linkedin",
			"no"
		);
		$panel5->addChild(
			"enable_linkedin_container",
			$enable_linkedin_container
		);
		$linkedin_icon = new StockholmQodeField(
			"image",
			"linkedin_icon",
			"",
			esc_html__( "Upload Icon", 'stockholm' ),
			""
		);
		$enable_linkedin_container->addChild(
			"linkedin_icon",
			$linkedin_icon
		);
		
		//Tumblr
		
		$panel6 = new StockholmQodePanel(
			esc_html__( "Tumblr Share Options", 'stockholm' ),
			"tumblr_share_panel",
			"enable_social_share",
			"no"
		);
		$socialPage->addChild(
			"panel6",
			$panel6
		);
		
		$enable_tumblr = new StockholmQodeField(
			"yesno",
			"enable_tumblr",
			"no",
			esc_html__( "Enable Share", 'stockholm' ),
			esc_html__( "Enabling this option will allow sharing via Tumblr", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_tumblr_container"
			)
		);
		$panel6->addChild(
			"enable_tumblr",
			$enable_tumblr
		);
		$enable_tumblr_container = new StockholmQodeContainer(
			"enable_tumblr_container",
			"enable_tumblr",
			"no"
		);
		$panel6->addChild(
			"enable_tumblr_container",
			$enable_tumblr_container
		);
		$tumblr_icon = new StockholmQodeField(
			"image",
			"tumblr_icon",
			"",
			esc_html__( "Upload Icon", 'stockholm' ),
			""
		);
		$enable_tumblr_container->addChild(
			"tumblr_icon",
			$tumblr_icon
		);
		
		// Pinterest
		
		$panel7 = new StockholmQodePanel(
			esc_html__( "Pinterest Share Options", 'stockholm' ),
			"pinterest_share_panel",
			"enable_social_share",
			"no"
		);
		$socialPage->addChild(
			"panel7",
			$panel7
		);
		
		$enable_pinterest = new StockholmQodeField(
			"yesno",
			"enable_pinterest",
			"no",
			esc_html__( "Enable Share", 'stockholm' ),
			esc_html__( "Enabling this option will allow sharing via Pinterest", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_pinterest_container"
			)
		);
		$panel7->addChild(
			"enable_pinterest",
			$enable_pinterest
		);
		$enable_pinterest_container = new StockholmQodeContainer(
			"enable_pinterest_container",
			"enable_pinterest",
			"no"
		);
		$panel7->addChild(
			"enable_pinterest_container",
			$enable_pinterest_container
		);
		$pinterest_icon = new StockholmQodeField(
			"image",
			"pinterest_icon",
			"",
			esc_html__( "Upload Icon", 'stockholm' ),
			""
		);
		$enable_pinterest_container->addChild(
			"pinterest_icon",
			$pinterest_icon
		);
		
		//VK
		
		$panel8 = new StockholmQodePanel(
			esc_html__( "VK Share Options", 'stockholm' ),
			"vk_share_panel",
			"enable_social_share",
			"no"
		);
		$socialPage->addChild(
			"panel8",
			$panel8
		);
		
		$enable_vk = new StockholmQodeField(
			"yesno",
			"enable_vk",
			"no",
			esc_html__( "Enable Share", 'stockholm' ),
			esc_html__( "Enabling this option will allow sharing via VK", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_vk_container"
			)
		);
		$panel8->addChild(
			"enable_vk",
			$enable_vk
		);
		$enable_vk_container = new StockholmQodeContainer(
			"enable_vk_container",
			"enable_vk",
			"no"
		);
		$panel8->addChild(
			"enable_vk_container",
			$enable_vk_container
		);
		$vk_icon = new StockholmQodeField(
			"image",
			"vk_icon",
			"",
			esc_html__( "Upload Icon", 'stockholm' ),
			""
		);
		$enable_vk_container->addChild(
			"vk_icon",
			$vk_icon
		);
		
		//Twitter pannel
		if ( defined( 'SELECT_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = new StockholmQodePanel(
				esc_html__( 'Twitter', 'stockholm' ),
				'twitter_panel'
			);
			$socialPage->addChild(
				"twitter_panel",
				$twitter_panel
			);
			
			$twitter_field = new StockholmQodeSelectTwitterFramework();
			$twitter_panel->addChild(
				'twitter_field',
				$twitter_field
			);
		}
		
		if ( defined( 'SELECT_INSTAGRAM_FEED_VERSION' ) ) {
			//Instagram pannel
			
			$instagram_panel = new StockholmQodePanel(
				esc_html__( 'Instagram', 'stockholm' ),
				'instagram_panel'
			);
			$socialPage->addChild(
				"instagram_panel",
				$instagram_panel
			);
			
			$instagram_field = new StockholmQodeSelectInstagramFramework();
			$instagram_panel->addChild(
				'instagram_field',
				$instagram_field
			);
		}
		
		/**
		 * Action for embedding social share option for custom post types
		 */
		do_action( 'stockholm_qode_action_social_options', 'socialPage' );
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_social_options_map', 130 );
}