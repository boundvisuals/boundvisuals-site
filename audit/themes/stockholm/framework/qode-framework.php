<?php
require_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode.layout.php';
require_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode.optionsapi.php';
require_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode.framework.php';
require_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode.functions.php';
require_once QODE_FRAMEWORK_ROOT_DIR . '/lib/qode.icons/qode.icons.php';
require_once QODE_FRAMEWORK_ROOT_DIR . '/admin/options/qode-options-setup.php';
require_once QODE_FRAMEWORK_ROOT_DIR . '/admin/meta-boxes/qode-meta-boxes-setup.php';
include_once QODE_FRAMEWORK_ROOT_DIR . '/lib/google-fonts.php';
require_once QODE_FRAMEWORK_ROOT_DIR . '/modules/qode-modules-loader.php';

/**
 * Register styles and scripts
 */
function stockholm_qode_admin_scripts_init() {
	wp_register_style( 'stockholm-admin-bootstrap', QODE_FRAMEWORK_ROOT . '/admin/assets/css/qodef-custom-bootstrap.css' );
	wp_register_style( 'stockholm-admin-page', QODE_FRAMEWORK_ROOT . '/admin/assets/css/qodef-page.css' );
	wp_register_style( 'stockholm-admin-options', QODE_FRAMEWORK_ROOT . '/admin/assets/css/qodef-options.css' );
	wp_register_style( 'stockholm-admin-meta-boxes', QODE_FRAMEWORK_ROOT . '/admin/assets/css/qodef-meta-boxes.css' );
	wp_register_style( 'stockholm-admin-ui', QODE_FRAMEWORK_ROOT . '/admin/assets/css/qodef-ui/qodef-ui.css' );
	wp_register_style( 'stockholm-admin-forms', QODE_FRAMEWORK_ROOT . '/admin/assets/css/qodef-forms.css' );
	wp_register_style( 'font-awesome', QODE_FRAMEWORK_ROOT . '/admin/assets/css/font-awesome/css/font-awesome.min.css' );
	
	wp_register_script( 'bootstrap.min', QODE_FRAMEWORK_ROOT . '/admin/assets/js/bootstrap.min.js' );
	wp_register_script( 'stockholm-admin-ui', QODE_FRAMEWORK_ROOT . '/admin/assets/js/qodef-ui/qodef-ui.js' );
	wp_register_script( 'stockholm-admin-twitter', QODE_FRAMEWORK_ROOT . '/admin/assets/js/qodef-twitter-connect.js' );
	wp_register_script( 'stockholm-admin-instagram', QODE_FRAMEWORK_ROOT . '/admin/assets/js/qodef-instagram-disconnect.js' );
}

add_action( 'admin_init', 'stockholm_qode_admin_scripts_init' );

/**
 * Enqueue styles and scripts for admin page
 */
function stockholm_qode_enqueue_admin_styles() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style( 'stockholm-admin-bootstrap' );
	wp_enqueue_style( 'stockholm-admin-page' );
	wp_enqueue_style( 'stockholm-admin-options' );
	wp_enqueue_style( 'stockholm-admin-ui' );
	wp_enqueue_style( 'stockholm-admin-forms' );
	wp_enqueue_style( 'font-awesome-admin' );
}

function stockholm_qode_enqueue_admin_scripts() {
	wp_enqueue_script( 'wp-color-picker' ); //colorpicker
	wp_enqueue_script( 'bootstrap.min' );
	wp_enqueue_media();
	wp_enqueue_script( 'stockholm-admin-ui' );
	wp_enqueue_script( 'stockholm-admin-twitter' );
	wp_enqueue_script( 'stockholm-admin-instagram' );
}

function stockholm_qode_enqueue_meta_box_styles() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style( 'stockholm-admin-bootstrap' );
	wp_enqueue_style( 'stockholm-admin-page' );
	wp_enqueue_style( 'stockholm-admin-meta-boxes' );
	wp_enqueue_style( 'stockholm-admin-ui' );
	wp_enqueue_style( 'stockholm-admin-forms' );
	wp_enqueue_style( 'font-awesome' );
}

function stockholm_qode_enqueue_meta_box_scripts() {
	wp_enqueue_script( 'wp-color-picker' ); //colorpicker
	wp_enqueue_script( 'bootstrap.min' );
	wp_enqueue_media();
	wp_enqueue_script( 'stockholm-admin-ui' );
}

if ( ! function_exists( 'stockholm_qode_init_theme_options_array' ) ) {
	function stockholm_qode_init_theme_options_array() {
		global $stockholm_qode_options, $stockholm_qode_framework;
		
		$db_options = get_option( 'qode_options_stockholm' );
		
		if ( ! empty( $db_options ) && is_array( $db_options ) ) {
			//merge with default options
			$stockholm_qode_options = array_merge( $stockholm_qode_framework->qodeOptions->options, $db_options );
		} else {
			//options don't exists in db, take default ones
			$stockholm_qode_options = $stockholm_qode_framework->qodeOptions->options;
		}
	}
	
	add_action( 'stockholm_qode_action_after_options_map', 'stockholm_qode_init_theme_options_array', 0 );
}

function stockholm_qode_init_theme_options() {
	global $stockholm_qode_options;
	global $stockholm_qode_framework;
	
	if ( isset( $stockholm_qode_options['reset_to_defaults'] ) && $stockholm_qode_options['reset_to_defaults'] == 'yes' ) {
		delete_option( "qode_options_stockholm" );
	}
	
	if ( ! get_option( "qode_options_stockholm" ) ) {
		add_option( "qode_options_stockholm", $stockholm_qode_framework->qodeOptions->options );
		
		$stockholm_qode_options = $stockholm_qode_framework->qodeOptions->options;
	}
}

function stockholm_qode_register_qode_theme_settings() {
	register_setting( 'qode_theme_menu', 'qode_options' );
}

add_action( 'admin_init', 'stockholm_qode_register_qode_theme_settings' );

function stockholm_qode_strafter( $string, $substring ) {
	$pos = strpos( $string, $substring );
	if ( $pos === false ) {
		return null;
	} else {
		return ( substr( $string, $pos + strlen( $substring ) ) );
	}
}

function stockholm_qode_get_admin_tab() {
	return isset( $_GET['page'] ) ? stockholm_qode_strafter( $_GET['page'], 'tab' ) : null;
}

function stockholm_qode_save_options() {
	global $stockholm_qode_options;
	global $stockholm_qode_framework;
	
	if ( current_user_can( 'edit_theme_options' ) ) {
		$_REQUEST = stripslashes_deep( $_REQUEST );
		
		check_ajax_referer( 'qode_ajax_save_nonce', 'qode_ajax_save_nonce' );
		
		foreach ( $stockholm_qode_framework->qodeOptions->options as $key => $value ) {
			if ( isset( $_REQUEST[ $key ] ) ) {
				$stockholm_qode_options[ $key ] = $_REQUEST[ $key ];
			}
		}
		
		update_option( 'qode_options_stockholm', $stockholm_qode_options );
		
		do_action( 'stockholm_qode_action_after_theme_option_save' );
		
		echo esc_html__( 'Saved', 'stockholm' );
		
		die();
	}
}

add_action('wp_ajax_stockholm_qode_action_save_options', 'stockholm_qode_save_options');

function stockholm_qode_theme_display() {
	global $stockholm_qode_framework;
	$tab         = stockholm_qode_get_admin_tab();
	$active_page = $stockholm_qode_framework->qodeOptions->getAdminPageFromSlug( $tab );
	
	if ( $active_page == null ) {
		return;
	}
	?>
	<div class="qodef-options-page qodef-page">

		<div class="qodef-page-header page-header clearfix">
			<img src="<?php echo QODE_FRAMEWORK_ROOT . '/admin/assets/img/qode-logo.png' ?>" alt="<?php esc_attr_e( 'Logo image', 'stockholm' ); ?>" class="qodef-header-logo pull-left"/>
			<?php $current_theme = wp_get_theme(); ?>
			<h2 class="qodef-page-title pull-left">
				<?php echo esc_html( $current_theme->get( 'Name' ) ); ?>
				<small><?php echo esc_html( $current_theme->get( 'Version' ) ); ?></small>
			</h2>
			<?php if($active_page->slug != '_backupoptions') { ?>
				<div class="pull-right"> <input type="button" id="qode_top_save_button" class="btn btn-primary btn-sm pull-right" value="<?php esc_html_e('Save Changes', 'stockholm'); ?>"/></div>
			<?php } ?>
		</div>
		<div class="qodef-page-content-wrapper">
			<div class="qodef-page-content">
				<div class="qodef-page-navigation qodef-tabs-wrapper vertical left clearfix">
					<div class="qodef-tabs-navigation-wrapper">
						<ul class="nav nav-tabs">
							<?php
							foreach ($stockholm_qode_framework->qodeOptions->adminPages as $key=>$page ) {
								$slug = "";
								if (!empty($page->slug)) $slug = "_tab".$page->slug;
								$icon = "institution";
								switch ($page->slug) {
									case 1:
										$icon = 'coffee';
										break;
									case 2:
										$icon = 'header';
										break;
									case 3:
										$icon = 'sort-amount-asc';
										break;
									case 4:
										$icon = 'list-alt';
										break;
									case 5:
										$icon = 'font';
										break;
									case 6:
										$icon = 'flag-o';
										break;
									case 7:
										$icon = 'bars';
										break;
									case 8:
										$icon = 'files-o';
										break;
									case 9:
										$icon = 'camera-retro';
										break;
									case 10:
										$icon = 'sliders';
										break;	
									case 11:
										$icon = 'share-alt';
										break;
									case 12:
										$icon = 'times-circle-o';
										break;
									case 13:
										$icon = 'envelope-o';
										break;
									case 14:
										$icon = 'arrows-v';
										break;
									case 15:
										$icon = 'caret-square-o-down';
										break;
									case 16:
										$icon = 'shopping-cart';
										break;
									case 17:
										$icon = 'eraser';
										break;
									case 18:
										$icon = 'pencil-square-o';
										break;
									case '_backupoptions':
										$icon = 'database';
										break;
								}
								?>
								<li<?php if ($page->slug == $tab) echo " class=\"active\""; ?>><a href="<?php echo esc_url(get_admin_url().'admin.php?page=qode_theme_menu'.$slug); ?>"><i class="fa fa-<?php echo esc_attr($icon); ?> qodef-tooltip qodef-inline-tooltip left" data-placement="top" data-toggle="tooltip" title="<?php echo esc_attr($page->title); ?>"></i><span><?php echo esc_attr($page->title); ?></span></a></li>
							<?php
							}
							?>
						</ul>
					</div> <!-- close div.qodef-tabs-navigation-wrapper -->
					<div class="qodef-tabs-content">
						<div class="tab-content">
							<?php
							foreach ($stockholm_qode_framework->qodeOptions->adminPages as $key=>$page ) {
								if ($page->slug == $tab) {
									?>
									<div class="tab-pane fade<?php if ($page->slug == $tab) echo " in active"; ?>" id="<?php echo esc_attr($key); ?>">
										<div class="qodef-tab-content">
											<h2 class="qodef-page-title"><?php echo esc_html($page->title); ?></h2>
											<?php if($page->slug == '_backupoptions') { ?>
												<form method="post" class="qodef-backup-options-page-holder">
													<div class="qodef-page-form">
														<?php $page->render(); ?>
													</div>
												</form>
											<?php } else { ?>
											<form method="post" class="qode_ajax_form">
												<?php wp_nonce_field("qode_ajax_save_nonce","qode_ajax_save_nonce") ?>
												<div class="qodef-page-form">
													<?php $page->render(); ?>
													<div class="form-button-section clearfix">
														<div class="qodef-input-change"><?php esc_html_e( 'You should save your changes', 'stockholm' ); ?></div>
														<div class="qodef-changes-saved"><?php esc_html_e( 'All your changes are successfully saved', 'stockholm' ); ?></div>
														<div class="form-buttom-section-holder" id="anchornav">
															<div class="form-button-section-inner clearfix" >
																<div class="container-fluid">
																	<div class="row">
																		<div class="col-lg-10">
																			<ul class="pull-left">
																				<li><?php esc_html_e( 'Scroll To:', 'stockholm' ); ?></li>
																				<?php
																				foreach ($page->layout as $key=>$panel ) {
																					?>
																					<li><a href="#qodef_<?php echo esc_attr($panel->name); ?>"><?php echo esc_attr($panel->title); ?></a></li>
																				<?php
																				}
																				?>
																			</ul>
																		</div>
																		<div class="col-lg-2">
																			<input type="submit" class="btn btn-primary btn-sm pull-right" value="<?php esc_html_e('Save Changes', 'stockholm'); ?>"/>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
											<?php } ?>
										</div><!-- close qodef-tab-content -->
									</div>
								<?php
								}
							}
							?>
						</div>
					</div> <!-- close div.qodef-tabs-content -->
				</div> <!-- close div.qodef-page-navigation -->
			</div> <!-- close div.qodef-page-content -->
		</div> <!-- close div.qodef-page-content-wrapper -->
	</div> <!-- close div.qode-options-page -->
<?php }

function stockholm_qode_meta_box_add() {
	global $stockholm_qode_framework;
	
	foreach ( $stockholm_qode_framework->qodeMetaBoxes->metaBoxes as $key => $box ) {
		$hidden = false;
		if ( ! empty( $box->hidden_property ) ) {
			foreach ( $box->hidden_values as $value ) {
				if ( stockholm_qode_option_get_value( $box->hidden_property ) == $value ) {
					$hidden = true;
				}
			}
		}
		
		stockholm_qode_create_meta_box_handler( $box, $key );
		
		if ( $hidden ) {
			add_filter( 'postbox_classes_' . $box->scope . '_qodef-meta-box-' . $key, 'stockholm_qode_meta_box_add_hidden_class' );
		}
	}
	
	if ( class_exists( 'WP_Block_Type' ) || ( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) ) {
		stockholm_qode_enqueue_meta_box_styles();
		stockholm_qode_enqueue_meta_box_scripts();
	} else {
		add_action( 'admin_enqueue_scripts', 'stockholm_qode_enqueue_meta_box_styles' );
		add_action( 'admin_enqueue_scripts', 'stockholm_qode_enqueue_meta_box_scripts' );
	}
}

function stockholm_qode_meta_box_save( $post_id, $post ) {
	global $stockholm_qode_framework;
	
	$nonces_array = array();
	$meta_boxes   = $stockholm_qode_framework->qodeMetaBoxes->getMetaBoxesByScope( $post->post_type );
	
	if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			$nonces_array[] = 'qode_meta_box_' . $meta_box->name . '_save';
		}
	}
	
	if ( is_array( $nonces_array ) && count( $nonces_array ) ) {
		foreach ( $nonces_array as $nonce ) {
			if ( ! isset( $_POST[ $nonce ] ) || ! wp_verify_nonce( $_POST[ $nonce ], $nonce ) ) {
				return;
			}
		}
	}
	
	$postTypes = apply_filters( 'stockholm_qode_filter_meta_box_post_types_save', array(
		"page",
		"post",
		"portfolio_page",
		"testimonials",
		"slides",
		"carousels"
	) );
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	if ( ! isset( $_POST['_wpnonce'] ) ) {
		return;
	}
	
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if ( ! in_array( $post->post_type, $postTypes ) ) {
		return;
	}
	
	foreach ( $stockholm_qode_framework->qodeMetaBoxes->options as $key => $box ) {
		
		if ( isset( $_POST[ $key ] ) && trim( $_POST[ $key ] !== '' ) ) {
			
			$value = $_POST[ $key ];
			// Auto-paragraphs for any WYSIWYG
			update_post_meta( $post_id, $key, $value );
		} else {
			delete_post_meta( $post_id, $key );
		}
	}
	
	$portfolios = false;
	if ( isset( $_POST['optionLabel'] ) ) {
		foreach ( $_POST['optionLabel'] as $key => $value ) {
			$portfolios_val[ $key ] = array(
				'optionLabel'            => $value,
				'optionValue'            => $_POST['optionValue'][ $key ],
				'optionUrl'              => $_POST['optionUrl'][ $key ],
				'optionlabelordernumber' => $_POST['optionlabelordernumber'][ $key ]
			);
			$portfolios             = true;
			
		}
	}
	
	if ( $portfolios ) {
		update_post_meta( $post_id, 'qode_portfolios', $portfolios_val );
	} else {
		delete_post_meta( $post_id, 'qode_portfolios' );
	}
	
	$portfolio_images = false;
	if ( isset( $_POST['portfolioimg'] ) ) {
		foreach ( $_POST['portfolioimg'] as $key => $value ) {
			$portfolio_images_val[ $key ] = array(
				'portfolioimg'            => $_POST['portfolioimg'][ $key ],
				'portfoliotitle'          => $_POST['portfoliotitle'][ $key ],
				'portfolioimgordernumber' => $_POST['portfolioimgordernumber'][ $key ],
				'portfoliovideotype'      => $_POST['portfoliovideotype'][ $key ],
				'portfoliovideoid'        => $_POST['portfoliovideoid'][ $key ],
				'portfoliovideoimage'     => $_POST['portfoliovideoimage'][ $key ],
				'portfoliovideowebm'      => $_POST['portfoliovideowebm'][ $key ],
				'portfoliovideomp4'       => $_POST['portfoliovideomp4'][ $key ],
				'portfoliovideoogv'       => $_POST['portfoliovideoogv'][ $key ],
				'portfolioimgtype'        => $_POST['portfolioimgtype'][ $key ]
			);
			$portfolio_images             = true;
		}
	}
	
	if ( $portfolio_images ) {
		update_post_meta( $post_id, 'qode_portfolio_images', $portfolio_images_val );
	} else {
		delete_post_meta( $post_id, 'qode_portfolio_images' );
	}
}

add_action( 'save_post', 'stockholm_qode_meta_box_save', 1, 2 );

function stockholm_qodef_render_meta_box( $post, $metabox ) { ?>
	<div class="qodef-meta-box qodef-page">
		<div class="qodef-meta-box-holder">
			<?php $metabox['args']['box']->render(); ?>
			<?php wp_nonce_field( 'qode_meta_box_' . $metabox['args']['box']->name . '_save', 'qode_meta_box_' . $metabox['args']['box']->name . '_save' ); ?>
		</div>
	</div>
	<?php
}

function stockholm_qode_meta_box_add_hidden_class( $classes = array() ) {
	if ( ! in_array( 'qodef-meta-box-hidden', $classes ) ) {
		$classes[] = 'qodef-meta-box-hidden';
	}
	
	return $classes;
}

/**
 * Remove the default Custom Fields meta box
 */
function stockholm_qode_remove_default_custom_fields() {
	foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
		foreach ( apply_filters( 'stockholm_qode_filter_meta_box_post_types_remove', array( "page",	"post",	"portfolio_page", "testimonials", "slides",	"carousels"	) ) as $postType ) {
			remove_meta_box( 'postcustom', $postType, $context );
		}
	}
}

add_action( 'do_meta_boxes', 'stockholm_qode_remove_default_custom_fields' );

if ( ! function_exists( 'stockholm_qode_hook_twitter_request_ajax' ) ) {
	/**
	 * Wrapper function for obtaining twitter request token.
	 *
	 * @see StockholmQodeTwitterApi::obtainRequestToken()
	 */
	function stockholm_qode_hook_twitter_request_ajax() {
		check_ajax_referer( 'stockholm_qode_twitter_connect', 'stockholm_qode_twitter_connect' );
		
		StockholmQodeTwitterApi::getInstance()->obtainRequestToken();
	}
	
	add_action( 'wp_ajax_stockholm_qode_action_twitter_obtain_request_token', 'stockholm_qode_hook_twitter_request_ajax' );
}

if ( ! function_exists( 'stockholm_qode_hook_instagram_disconnect_ajax' ) ) {
	/**
	 * Wrapper function for disconnecting from instagram.
	 *
	 * @see StockholmQodeInstagramApi::obtainRequestToken()
	 */
	function stockholm_qode_hook_instagram_disconnect_ajax() {
		check_ajax_referer( 'stockholm_qode_disconnect_from_instagram', 'stockholm_qode_disconnect_from_instagram' );
		
		StockholmQodeInstagramApi::getInstance()->disconnectUser();
	}
	
	add_action( 'wp_ajax_stockholm_qode_action_instagram_disconnect', 'stockholm_qode_hook_instagram_disconnect_ajax' );
}

if ( ! function_exists( 'stockholm_qode_icon_collections' ) ) {
	function stockholm_qode_icon_collections() {
		return StockholmQodeIconCollections::getInstance();
	}
}
