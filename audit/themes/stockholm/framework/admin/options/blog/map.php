<?php

if ( ! function_exists( 'stockholm_qode_blog_options_map' ) ) {
	/**
	 * Blog options page
	 */
	function stockholm_qode_blog_options_map() {
		
		$blogPage = new StockholmQodeAdminPage(
			"8",
			esc_html__( "Blog", 'stockholm' )
		);
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			"blogPage",
			$blogPage
		);
		
		// Blog List and Single
		
		$panel1 = new StockholmQodePanel(
			esc_html__( "General", 'stockholm' ),
			"blog_list_single_panel"
		);
		$blogPage->addChild(
			"panel1",
			$panel1
		);
		
		$blog_disable_text_box = new StockholmQodeField(
			"yesno",
			"blog_disable_text_box",
			"no",
			esc_html__( "Disable Text Box", 'stockholm' ),
			esc_html__( "Enabling this option will disable box around posts text.", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "#qodef_enable_blog_text_box_container",
				"dependence_show_on_yes" => ""
			)
		);
		$panel1->addChild(
			"blog_disable_text_box",
			$blog_disable_text_box
		);
		
		$enable_blog_text_box_container = new StockholmQodeContainer(
			"enable_blog_text_box_container",
			"blog_disable_text_box",
			"yes"
		);
		$panel1->addChild(
			"enable_blog_text_box_container",
			$enable_blog_text_box_container
		);
		
		$blog_box_background_color = new StockholmQodeField(
			"color",
			"blog_box_background_color",
			"",
			esc_html__( "Box Background Color", 'stockholm' ),
			esc_html__( "Default color is #ffffff.", 'stockholm' )
		);
		$enable_blog_text_box_container->addChild(
			"blog_box_background_color",
			$blog_box_background_color
		);
		
		$blog_box_border_color = new StockholmQodeField(
			"color",
			"blog_box_border_color",
			"",
			esc_html__( "Box Border Color", 'stockholm' ),
			esc_html__( "Default color is trasparent.", 'stockholm' )
		);
		$enable_blog_text_box_container->addChild(
			"blog_box_border_color",
			$blog_box_border_color
		);
		
		$blog_ql_background_color = new StockholmQodeField(
			"color",
			"blog_ql_background_color",
			"",
			esc_html__( "Quote/Link Box Background Color", 'stockholm' ),
			esc_html__( "Default color is #ffffff.", 'stockholm' )
		);
		$panel1->addChild(
			"blog_ql_background_color",
			$blog_ql_background_color
		);
		
		$blog_ql_hover_background_color = new StockholmQodeField(
			"color",
			"blog_ql_hover_background_color",
			"",
			esc_html__( "Quote/Link Box Background Hover Color", 'stockholm' ),
			esc_html__( "Default color is #e6ae48.", 'stockholm' )
		);
		$panel1->addChild(
			"blog_ql_hover_background_color",
			$blog_ql_hover_background_color
		);
		
		// Blog List
		
		$panel2 = new StockholmQodePanel(
			esc_html__( "Blog List", 'stockholm' ),
			"blog_list_panel"
		);
		$blogPage->addChild(
			"panel2",
			$panel2
		);
		
		$blog_style = new StockholmQodeField(
			"select",
			"blog_style",
			"1",
			esc_html__( "Archive and Category Layout", 'stockholm' ),
			esc_html__( "Choose a default blog layout for archived Blog Lists and Category Blog Lists", 'stockholm' ),
			array(
				"1" => esc_html__( "Blog Large Image", 'stockholm' ),
				"3" => esc_html__( "Blog Large Image Whole Post", 'stockholm' ),
				"2" => esc_html__( "Blog Masonry", 'stockholm' ),
				"5" => esc_html__( "Blog Masonry Full Width", 'stockholm' ),
				"4" => esc_html__( "Blog Chequered", 'stockholm' ),
				"6" => esc_html__( "Blog Animated", 'stockholm' ),
				"7" => esc_html__( "Blog Centered", 'stockholm' ),
				"8" => esc_html__( "Blog Pinterest Full Width", 'stockholm' )
			)
		);
		$panel2->addChild(
			"blog_style",
			$blog_style
		);
		
		$category_blog_sidebar = new StockholmQodeField(
			"select",
			"category_blog_sidebar",
			"default",
			esc_html__( "Archive and Category Sidebar", 'stockholm' ),
			esc_html__( "Choose a sidebar layout for archived Blog Lists and Category Blog Lists", 'stockholm' ),
			array(
				"default" => esc_html__( "No Sidebar", 'stockholm' ),
				"1"       => esc_html__( "Sidebar 1/3 right", 'stockholm' ),
				"2"       => esc_html__( "Sidebar 1/4 right", 'stockholm' ),
				"3"       => esc_html__( "Sidebar 1/3 left", 'stockholm' ),
				"4"       => esc_html__( "Sidebar 1/4 left", 'stockholm' )
			)
		);
		$panel2->addChild(
			"category_blog_sidebar",
			$category_blog_sidebar
		);
		
		$blog_hide_comments = new StockholmQodeField(
			"yesno",
			"blog_hide_comments",
			"no",
			esc_html__( "Hide Comments", 'stockholm' ),
			esc_html__( "Enabling this option will hide comments on Blog List", 'stockholm' )
		);
		$panel2->addChild(
			"blog_hide_comments",
			$blog_hide_comments
		);
		
		$blog_hide_author = new StockholmQodeField(
			"yesno",
			"blog_hide_author",
			"no",
			esc_html__( "Hide Author", 'stockholm' ),
			esc_html__( "Enabling this option will hide author name on Blog List and Blog Single", 'stockholm' )
		);
		$panel2->addChild(
			"blog_hide_author",
			$blog_hide_author
		);
		
		$qode_like = new StockholmQodeField(
			"onoff",
			"qode_like",
			"on",
			esc_html__( "Likes", 'stockholm' ),
			esc_html__( 'Enabling this option will turn on "Likes"', 'stockholm' )
		);
		$panel2->addChild(
			"qode_like",
			$qode_like
		);
		
		$wp_read_more = new StockholmQodeField(
			"onoff",
			"wp_read_more",
			"off",
			esc_html__( "Enable Wordpress Read More Tag", 'stockholm' ),
			esc_html__( 'Enabling this option will turn on WordPress read more functionality.', 'stockholm' )
		);
		$panel2->addChild(
			"wp_read_more",
			$wp_read_more
		);
		
		$disable_quote_link_mark = new StockholmQodeField(
			"yesno",
			"disable_quote_link_mark",
			"no",
			esc_html__( "Disable Quote/Link Icon", 'stockholm' ),
			esc_html__( "Enabling this option will disable icon mark for Quote and Link posts.", 'stockholm' )
		);
		$panel2->addChild(
			"disable_quote_link_mark",
			$disable_quote_link_mark
		);
		
		$blog_page_range = new StockholmQodeField(
			"text",
			"blog_page_range",
			"",
			esc_html__( "Pagination Page Range", 'stockholm' ),
			esc_html__( 'Enter the number of numerals to be displayed before the "..." (For example, enter "3" to get "1 2 3...")', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"blog_page_range",
			$blog_page_range
		);
		
		$number_of_chars = new StockholmQodeField(
			"text",
			"number_of_chars",
			"45",
			esc_html__( "Number of Words in Blog Listing", 'stockholm' ),
			esc_html__( 'Enter the number of words to be displayed per post in Blog List', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"number_of_chars",
			$number_of_chars
		);
		
		$number_of_chars_masonry = new StockholmQodeField(
			"text",
			"number_of_chars_masonry",
			"",
			esc_html__( "Number of Words in Masonry/Pinterest", 'stockholm' ),
			esc_html__( 'Enter the number of words to be displayed per post in "Masonry/Pinterest" Blog List (Note: this overrides "Word Number" above)', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"number_of_chars_masonry",
			$number_of_chars_masonry
		);
		
		$number_of_chars_large_image = new StockholmQodeField(
			"text",
			"number_of_chars_large_image",
			"",
			esc_html__( "Number of Words in Large Image", 'stockholm' ),
			esc_html__( 'Enter the number of words to be displayed per post in "Large Image" Blog List (Note: this overrides "Word Number" above)', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"number_of_chars_large_image",
			$number_of_chars_large_image
		);
		
		$number_of_chars_chequered = new StockholmQodeField(
			"text",
			"number_of_chars_chequered",
			"",
			esc_html__( "Number of Words in Chequered", 'stockholm' ),
			esc_html__( 'Enter the number of words to be displayed per post in "Chequered" Blog List (Note: this overrides "Word Number" above)', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"number_of_chars_chequered",
			$number_of_chars_chequered
		);
		
		$number_of_chars_animated = new StockholmQodeField(
			"text",
			"number_of_chars_animated",
			"",
			esc_html__( "Number of Words in Animated", 'stockholm' ),
			esc_html__( 'Enter the number of words to be displayed per post in "Animated" Blog List (Note: this overrides "Word Number" above)', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"number_of_chars_animated",
			$number_of_chars_animated
		);
		
		$number_of_chars_centered = new StockholmQodeField(
			"text",
			"number_of_chars_centered",
			"",
			esc_html__( "Number of Words in Centered", 'stockholm' ),
			esc_html__( 'Enter the number of words to be displayed per post in "Centered" Blog List (Note: this overrides "Word Number" above)', 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"number_of_chars_centered",
			$number_of_chars_centered
		);
		
		$pagination = new StockholmQodeField(
			"zeroone",
			"pagination",
			"1",
			esc_html__( "Pagination", 'stockholm' ),
			esc_html__( "Enabling this option will display pagination on bottom of Blog List", 'stockholm' )
		);
		$panel2->addChild(
			"pagination",
			$pagination
		);
		
		$pagination_masonry = new StockholmQodeField(
			"select",
			"pagination_masonry",
			"pagination",
			esc_html__( "Pagination on Masonry", 'stockholm' ),
			esc_html__( 'Choose a pagination style for "Masonry" Blog List', 'stockholm' ),
			array(
				"pagination"      => esc_html__( "Pagination", 'stockholm' ),
				"load_more"       => esc_html__( "Load More", 'stockholm' ),
				"infinite_scroll" => esc_html__( "Infinite Scroll", 'stockholm' )
			)
		);
		$panel2->addChild(
			"pagination_masonry",
			$pagination_masonry
		);
		
		$blog_masonry_filter = new StockholmQodeField(
			"yesno",
			"blog_masonry_filter",
			"no",
			esc_html__( "Show Category Filter on Masonry", 'stockholm' ),
			esc_html__( 'Enabling this option will display a Category Filter on "Masonry" Blog List', 'stockholm' )
		);
		$panel2->addChild(
			"blog_masonry_filter",
			$blog_masonry_filter
		);
		
		$blog_masonry_article_overlay_color = new StockholmQodeField(
			"color",
			"blog_masonry_article_overlay_color",
			"",
			esc_html__( "Masonry Image Hover Color", 'stockholm' ),
			esc_html__( "Default color is #e6ae48.", 'stockholm' )
		);
		$panel2->addChild(
			"blog_masonry_article_overlay_color",
			$blog_masonry_article_overlay_color
		);
		
		$blog_masonry_article_overlay_transparency = new StockholmQodeField(
			"text",
			"blog_masonry_article_overlay_transparency",
			"",
			esc_html__( "Masonry Image Hover Color Transparnecy", 'stockholm' ),
			esc_html__( "Choose a transparency for image hover color for blog masonry list and latest posts shortcode boxes type (0 = fully transparent, 1 = opaque). Note: If image hover color has not been chosen, transparency will not be displayed", 'stockholm' ),
			array(),
			array( "col_width" => 3 )
		);
		$panel2->addChild(
			"blog_masonry_article_overlay_transparency",
			$blog_masonry_article_overlay_transparency
		);
		
		$blog_masonry_icon_plus_color = new StockholmQodeField(
			"color",
			"blog_masonry_icon_plus_color",
			"",
			esc_html__( "Masonry Image Icon Color", 'stockholm' ),
			esc_html__( "Default color is #393939.", 'stockholm' )
		);
		$panel2->addChild(
			"blog_masonry_icon_plus_color",
			$blog_masonry_icon_plus_color
		);
		
		$blog_masonry_icon_plus_background_color = new StockholmQodeField(
			"color",
			"blog_masonry_icon_plus_background_color",
			"",
			esc_html__( "Masonry Image Icon Background Color", 'stockholm' ),
			esc_html__( "Default color is #fff.", 'stockholm' )
		);
		$panel2->addChild(
			"blog_masonry_icon_plus_background_color",
			$blog_masonry_icon_plus_background_color
		);
		
		$blog_loading_type = new StockholmQodeField(
			"select",
			"blog_loading_type",
			"",
			esc_html__( "Loading Type", 'stockholm' ),
			esc_html__( 'Choose a loading type  for "Masonry" and "Pinterest" Blog Lists (Note that Appear from Bottom loading type does not work with Infinite Scroll)', 'stockholm' ),
			array(
				""                        => esc_html__( "Default", 'stockholm' ),
				"blog_appear_from_bottom" => esc_html__( "Appear from Bottom", 'stockholm' )
			)
		);
		$panel2->addChild(
			"blog_loading_type",
			$blog_loading_type
		);
		
		// Blog Single
		
		$panel3 = new StockholmQodePanel(
			esc_html__( "Blog Single", 'stockholm' ),
			"blog_single_panel"
		);
		$blogPage->addChild(
			"panel3",
			$panel3
		);
		
		$blog_single_sidebar = new StockholmQodeField(
			"select",
			"blog_single_sidebar",
			"default",
			esc_html__( "Sidebar Layout", 'stockholm' ),
			esc_html__( "Choose a sidebar layout for Blog Single pages", 'stockholm' ),
			array(
				"default" => esc_html__( "No Sidebar", 'stockholm' ),
				"1"       => esc_html__( "Sidebar 1/3 right", 'stockholm' ),
				"2"       => esc_html__( "Sidebar 1/4 right", 'stockholm' ),
				"3"       => esc_html__( "Sidebar 1/3 left", 'stockholm' ),
				"4"       => esc_html__( "Sidebar 1/4 left", 'stockholm' )
			)
		);
		$panel3->addChild(
			"blog_single_sidebar",
			$blog_single_sidebar
		);
		
		$custom_sidebars = stockholm_qode_get_custom_sidebars();
		
		$blog_single_sidebar_custom_display = new StockholmQodeField(
			"selectblank",
			"blog_single_sidebar_custom_display",
			"",
			esc_html__( "Sidebar to Display", 'stockholm' ),
			esc_html__( "Choose a sidebar to display on Blog Single pages", 'stockholm' ),
			$custom_sidebars
		);
		$panel3->addChild(
			"blog_single_sidebar_custom_display",
			$blog_single_sidebar_custom_display
		);
		
		$blog_single_hide_date = new StockholmQodeField(
			"yesno",
			"blog_single_hide_date",
			"no",
			esc_html__( "Hide Date", 'stockholm' ),
			esc_html__( "Enabling this option will hide date on Blog Single posts", 'stockholm' )
		);
		$panel3->addChild(
			"blog_single_hide_date",
			$blog_single_hide_date
		);
		
		$blog_single_hide_category = new StockholmQodeField(
			"yesno",
			"blog_single_hide_category",
			"no",
			esc_html__( "Hide Category", 'stockholm' ),
			esc_html__( "Enabling this option will hide category/categories on Blog Single posts", 'stockholm' )
		);
		$panel3->addChild(
			"blog_single_hide_category",
			$blog_single_hide_category
		);
		
		$blog_author_info = new StockholmQodeField(
			"yesno",
			"blog_author_info",
			"no",
			esc_html__( "Show Blog Author", 'stockholm' ),
			esc_html__( "Enabling this option will display author name and descriptions on Blog Single pages", 'stockholm' ),
			array(),
			array(
				"dependence"             => true,
				"dependence_hide_on_yes" => "",
				"dependence_show_on_yes" => "#qodef_enable_blog_author_info_container"
			)
		);
		$panel3->addChild(
			"blog_author_info",
			$blog_author_info
		);
		
		$enable_blog_author_info_container = new StockholmQodeContainer(
			"enable_blog_author_info_container",
			"blog_author_info",
			"no"
		);
		$panel3->addChild(
			"enable_blog_author_info_container",
			$enable_blog_author_info_container
		);
		
		$disable_author_info_email = new StockholmQodeField(
			"yesno",
			"disable_author_info_email",
			"no",
			esc_html__( "Hide Author Email", 'stockholm' ),
			esc_html__( "Enabling this option will hide author email", 'stockholm' )
		);
		$enable_blog_author_info_container->addChild(
			"disable_author_info_email",
			$disable_author_info_email
		);
		
		$blog_single_hide_comments = new StockholmQodeField(
			"yesno",
			"blog_single_hide_comments",
			"no",
			esc_html__( "Hide Comments", 'stockholm' ),
			esc_html__( "Enabling this option will hide comments on Blog Single posts", 'stockholm' )
		);
		$panel3->addChild(
			"blog_single_hide_comments",
			$blog_single_hide_comments
		);
		
		$blog_single_audio_style = new StockholmQodeField(
			"select",
			"blog_single_audio_style",
			"no",
			esc_html__( "Audio Bar Style", 'stockholm' ),
			esc_html__( "Select style for audio bar on Blog Single posts", 'stockholm' ),
			array(
				""     => esc_html__( "Default", 'stockholm' ),
				"dark" => esc_html__( "Dark", 'stockholm' )
			)
		);
		$panel3->addChild(
			"blog_single_audio_style",
			$blog_single_audio_style
		);
		
		$group1 = new StockholmQodeGroup(
			esc_html__( "Elements Spacing", 'stockholm' ),
			esc_html__( "Define values for spacing between elements.", 'stockholm' )
		);
		$panel3->addChild(
			"group1",
			$group1
		);
		
		$row1 = new StockholmQodeRow();
		$group1->addChild(
			"row1",
			$row1
		);
		
		$blog_single_space_after_image = new StockholmQodeField(
			"textsimple",
			"blog_single_space_after_image",
			"",
			esc_html__( "Spacing after image (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_space_after_image",
			$blog_single_space_after_image
		);
		
		$blog_single_space_after_title = new StockholmQodeField(
			"textsimple",
			"blog_single_space_after_title",
			"",
			esc_html__( "Spacing after title (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_space_after_title",
			$blog_single_space_after_title
		);
		
		$blog_single_space_after_info = new StockholmQodeField(
			"textsimple",
			"blog_single_space_after_info",
			"",
			esc_html__( "Spacing after info (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_space_after_info",
			$blog_single_space_after_info
		);
		
		$group2 = new StockholmQodeGroup(
			esc_html__( "Social Share", 'stockholm' ),
			esc_html__( "Define social share layout.", 'stockholm' )
		);
		$panel3->addChild(
			"group2",
			$group2
		);
		
		$row1 = new StockholmQodeRow();
		$group2->addChild(
			"row1",
			$row1
		);
		
		$blog_single_social_share_type = new StockholmQodeField(
			"selectsimple",
			"blog_single_social_share_type",
			"no",
			esc_html__( "Social Share Type", 'stockholm' ),
			"",
			array(
				"circle"  => esc_html__( "Circle", 'stockholm' ),
				"regular" => esc_html__( "Regular", 'stockholm' )
			)
		);
		$row1->addChild(
			"blog_single_social_share_type",
			$blog_single_social_share_type
		);
		
		$blog_single_space_before_share = new StockholmQodeField(
			"textsimple",
			"blog_single_space_before_share",
			"",
			esc_html__( "Spacing before social share (px)", 'stockholm' )
		);
		$row1->addChild(
			"blog_single_space_before_share",
			$blog_single_space_before_share
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_blog_options_map', 100 );
}