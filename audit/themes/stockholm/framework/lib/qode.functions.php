<?php

if ( ! function_exists( 'stockholm_qode_gallery_upload_get_images' ) ) {
	function stockholm_qode_gallery_upload_get_images() {
		check_ajax_referer( 'stockholm_qode_update_portfolio_images', 'upload_gallery_nonce' );
		
		if ( ! empty( $_POST['ids'] ) ) {
			foreach($_POST['ids'] as $id):
				$image = wp_get_attachment_image_src( intval( $id ), 'thumbnail', true );
				echo '<li class="qode-gallery-image-holder"><img src="' . esc_url( $image[0] ) . '"/></li>';
			endforeach;
		}
		exit;
	}
	
	add_action( 'wp_ajax_stockholm_qode_action_gallery_upload_get_images', 'stockholm_qode_gallery_upload_get_images' );
}

if ( ! function_exists( 'stockholm_qode_get_attachment_meta' ) ) {
	/**
	 * Function that returns attachment meta data from attachment id
	 *
	 * @param $attachment_id
	 * @param array $keys sub array of attachment meta
	 *
	 * @return array|mixed
	 */
	function stockholm_qode_get_attachment_meta( $attachment_id, $keys = array() ) {
		$meta_data = array();
		
		//is attachment id set?
		if ( ! empty( $attachment_id ) ) {
			//get all post meta for given attachment id
			$meta_data = get_post_meta( $attachment_id, '_wp_attachment_metadata', true );
			
			//is subarray of meta array keys set?
			if ( is_array( $keys ) && count( $keys ) && ! empty( $meta_data ) ) {
				$sub_array = array();
				
				//for each defined key
				foreach ( $keys as $key ) {
					//check if that key exists in all meta array
					if ( array_key_exists( $key, $meta_data ) ) {
						//assign key from meta array for current key to meta subarray
						$sub_array[ $key ] = $meta_data[ $key ];
					}
				}
				
				//we want meta array to be subarray because that is what used whants to get
				$meta_data = $sub_array;
			}
		}
		
		//return meta array
		return $meta_data;
	}
}

if ( ! function_exists( 'stockholm_qode_get_attachment_id_from_url' ) ) {
	/**
	 * Function that retrieves attachment id for passed attachment url
	 *
	 * @param $attachment_url
	 *
	 * @return null|string
	 */
	function stockholm_qode_get_attachment_id_from_url( $attachment_url ) {
		global $wpdb;
		$attachment_id = '';
		
		//is attachment url set?
		if ( $attachment_url !== '' ) {
			//prepare query
			
			$query = $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid=%s", $attachment_url );
			
			//get attachment id
			$attachment_id = $wpdb->get_var( $query );

			// Additional check for undefined reason when guid is not image src
			if ( empty( $attachment_id ) ) {
				$modified_url = substr( $attachment_url, strrpos( $attachment_url, '/' ) + 1 );
				$query = $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_wp_attached_file' AND meta_value LIKE %s", '%' . $modified_url . '%' );

				//get attachment id
				$attachment_id = $wpdb->get_var( $query );
			}
		}
		
		//return id
		return $attachment_id;
	}
}

if ( ! function_exists( 'stockholm_qode_get_attachment_meta_from_url' ) ) {
	/**
	 * Function that returns meta array for give attachment url
	 *
	 * @param $attachment_url
	 * @param array $keys sub array of attachment meta
	 *
	 * @return array|mixed
	 *
	 * @see stockholm_qode_get_attachment_id_from_url()
	 * @see stockholm_qode_get_attachment_meta()
	 *
	 * @version 0.1
	 */
	function stockholm_qode_get_attachment_meta_from_url( $attachment_url, $keys = array() ) {
		$attachment_meta = array();
		
		//get attachment id for attachment url
		$attachment_id = stockholm_qode_get_attachment_id_from_url( $attachment_url );
		
		//is attachment id set?
		if ( ! empty( $attachment_id ) ) {
			//get post meta
			$attachment_meta                  = stockholm_qode_get_attachment_meta( $attachment_id, $keys );
			$attachment_meta['attachment_id'] = $attachment_id;
		}
		
		//return post meta
		return $attachment_meta;
	}
}

if ( ! function_exists( 'stockholm_qode_get_image_dimensions' ) ) {
	/**
	 * Function that returns image sizes array. First looks in post_meta table if attachment exists in the database,
	 * if it does not than it uses getimagesize PHP function to get image sizes
	 *
	 * @param $url string url of the image
	 *
	 * @return array array of image sizes that contains height and width
	 *
	 * @see  stockholm_qode_get_attachment_meta_from_url()
	 * @uses getimagesize
	 *
	 * @version 0.1
	 */
	function stockholm_qode_get_image_dimensions( $url ) {
		$image_sizes = array();
		
		//is url passed?
		if ( $url !== '' ) {
			//get image sizes from posts meta if attachment exists
			$image_sizes = stockholm_qode_get_attachment_meta_from_url( $url, array( 'width', 'height' ) );
			
			//image does not exists in post table, we have to use PHP way of getting image size
			if ( ! count( $image_sizes ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				
				//can we open file by url?
				if ( ini_get( 'allow_url_fopen' ) == 1 && file_exists( $url ) ) {
					list( $width, $height, $type, $attr ) = getimagesize( $url );
				} else {
					//we can't open file directly, have to locate it with relative path.
					$image_obj           = parse_url( $url );
					$image_relative_path = rtrim( get_home_path(), '/' ) . $image_obj['path'];
					
					if ( file_exists( $image_relative_path ) ) {
						list( $width, $height, $type, $attr ) = getimagesize( $image_relative_path );
					}
				}
				
				//did we get width and height from some of above methods?
				if ( isset( $width ) && isset( $height ) ) {
					//set them to our image sizes array
					$image_sizes = array(
						'width'  => $width,
						'height' => $height
					);
				}
			}
		}
		
		return $image_sizes;
	}
}

function stockholm_qode_option_has_value( $name ) {
	global $stockholm_qode_options;
	global $stockholm_qode_framework;
	if ( array_key_exists( $name, $stockholm_qode_framework->qodeOptions->options ) ) {
		if ( isset( $stockholm_qode_options[ $name ] ) ) {
			return true;
		} else {
			return false;
		}
	} else {
		global $post;
		$value = get_post_meta( $post->ID, $name, true );
		if ( isset( $value ) && $value !== "" ) {
			return true;
		} else {
			return false;
		}
	}
}

function stockholm_qode_option_get_value( $name ) {
	global $stockholm_qode_options;
	global $stockholm_qode_framework;
	if ( array_key_exists( $name, $stockholm_qode_framework->qodeOptions->options ) ) {
		if ( isset( $stockholm_qode_options[ $name ] ) ) {
			return $stockholm_qode_options[ $name ];
		} else {
			return $stockholm_qode_framework->qodeOptions->getOption( $name );
		}
	} else {
		global $post;
		$value = is_object( $post ) ? get_post_meta( $post->ID, $name, true ) : '';
		
		if ( isset( $value ) && $value !== "" ) {
			return $value;
		} else {
			return $stockholm_qode_framework->qodeMetaBoxes->getOption( $name );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_get_meta_field_intersect' ) ) {
	/**
	 * @param $name
	 * @param $post_id
	 *
	 * @return bool|mixed|void
	 */
	function stockholm_qode_get_meta_field_intersect( $name, $post_id = '' ) {
		global $stockholm_qode_options;
		global $stockholm_qode_framework;

		$post_id = ! empty( $post_id ) ? $post_id : get_the_ID();

		if ( stockholm_qode_is_woocommerce_installed() && (stockholm_qode_is_woocommerce_shop() || is_singular( 'product' ) ) ) {
			$post_id = stockholm_qode_get_woo_shop_page_id();
		}

		if ( array_key_exists( $name, $stockholm_qode_framework->qodeOptions->options ) ) {
			if ( isset( $stockholm_qode_options[ $name ] ) ) {
				$value = $stockholm_qode_options[ $name ];
			} else {
				$value = $stockholm_qode_framework->qodeOptions->getOption( $name );
			}
		}

		if ( $post_id !== - 1 ) {
			$meta_field = get_post_meta( $post_id, 'qode_' . $name , true );
			if ( $meta_field !== '' && $meta_field !== false ) {
				$value = $meta_field;
			}
		}

		$value = apply_filters( 'qodef_fn_themename_meta_field_intersect_' . $name, $value );

		return $value;
	}
}

function stockholm_qode_get_attachment_thumb_url( $attachment_url ) {
	$attachment_id = stockholm_qode_get_attachment_id_from_url( $attachment_url );
	
	if ( ! empty( $attachment_id ) ) {
		return wp_get_attachment_thumb_url( $attachment_id );
	} else {
		return $attachment_url;
	}
}

if ( ! function_exists( 'stockholm_qode_inline_style' ) ) {
	/**
	 * Function that echoes generated style attribute
	 *
	 * @param $value string | array attribute value
	 *
	 * @see stockholm_qode_get_inline_style()
	 */
	function stockholm_qode_inline_style( $value ) {
		echo stockholm_qode_get_inline_style( $value );
	}
}

if ( ! function_exists( 'stockholm_qode_get_inline_style' ) ) {
	/**
	 * Function that generates style attribute and returns generated string
	 *
	 * @param $value string | array value of style attribute
	 *
	 * @return string generated style attribute
	 *
	 * @see stockholm_qode_get_inline_attr()
	 */
	function stockholm_qode_get_inline_style( $value ) {
		return stockholm_qode_get_inline_attr( $value, 'style', ';' );
	}
}

if ( ! function_exists( 'stockholm_qode_class_attribute' ) ) {
	/**
	 * Function that echoes class attribute
	 *
	 * @param $value string value of class attribute
	 *
	 * @see stockholm_qode_get_class_attribute()
	 */
	function stockholm_qode_class_attribute( $value ) {
		echo stockholm_qode_get_class_attribute( $value );
	}
}

if ( ! function_exists( 'stockholm_qode_get_class_attribute' ) ) {
	/**
	 * Function that returns generated class attribute
	 *
	 * @param $value string value of class attribute
	 *
	 * @return string generated class attribute
	 *
	 * @see stockholm_qode_get_inline_attr()
	 */
	function stockholm_qode_get_class_attribute( $value ) {
		return stockholm_qode_get_inline_attr( $value, 'class' );
	}
}

if ( ! function_exists( 'stockholm_qode_get_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 *
	 * @return string generated html attribute
	 */
	function stockholm_qode_get_inline_attr( $value, $attr, $glue = ' ' ) {
		if ( ! empty( $value ) ) {
			if ( is_array( $value ) && count( $value ) ) {
				$properties = implode( $glue, $value );
			} elseif ( $value !== '' ) {
				$properties = $value;
			}
			
			return $attr . '="' . esc_attr( $properties ) . '"';
		}
		
		return '';
	}
}

if ( ! function_exists( 'stockholm_qode_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 *
	 * @return string generated html attribute
	 */
	function stockholm_qode_inline_attr( $value, $attr, $glue = '' ) {
		echo stockholm_qode_get_inline_attr( $value, $attr, $glue );
	}
}

if ( ! function_exists( 'stockholm_qode_get_inline_attrs' ) ) {
	/**
	 * Generate multiple inline attributes
	 *
	 * @param $attrs
	 *
	 * @return string
	 */
	function stockholm_qode_get_inline_attrs( $attrs ) {
		$output = '';
		
		if ( is_array( $attrs ) && count( $attrs ) ) {
			foreach ( $attrs as $attr => $value ) {
				$output .= ' ' . stockholm_qode_get_inline_attr( $value, $attr );
			}
		}
		
		$output = ltrim( $output );
		
		return $output;
	}
}

if ( ! function_exists( 'stockholm_qode_string_ends_with' ) ) {
	/**
	 * Checks if $haystack ends with $needle and returns proper bool value
	 *
	 * @param $haystack string to check
	 * @param $needle string with which $haystack needs to end
	 *
	 * @return bool
	 */
	function stockholm_qode_string_ends_with( $haystack, $needle ) {
		if ( $haystack !== '' && $needle !== '' ) {
			return ( substr( $haystack, - strlen( $needle ), strlen( $needle ) ) == $needle );
		}
		
		return true;
	}
}

if(!function_exists('stockholm_qode_filter_px')) {
	/**
	 * Removes px in provided value if value ends with px
	 * @param $value
	 * @return string
	 */
	function stockholm_qode_filter_px($value) {
		if($value !== '' && stockholm_qode_string_ends_with($value, 'px')) {
			$value = substr($value, 0, strpos($value, 'px'));
		}

		return $value;
	}
}

if(!function_exists('stockholm_qode_string_starts_with')) {
	/**
	 * Checks if $haystack starts with $needle and returns proper bool value
	 * @param $haystack string to check
	 * @param $needle string with which $haystack needs to start
	 * @return bool
	 */
	function stockholm_qode_string_starts_with($haystack, $needle) {
		if($haystack !== '' && $needle !== '') {
			return (substr($haystack, 0, strlen($needle)) == $needle);
		}

		return true;
	}
}

if ( ! function_exists( 'stockholm_qode_get_template_part' ) ) {
	/**
	 * Loads template part with parameters. If file with slug parameter added exists it will load that file, else it will load file without slug added.
	 * Child theme friendly function
	 *
	 * @param string $template name of the template to load without extension
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 */
	function stockholm_qode_get_template_part( $template, $slug = '', $params = array() ) {
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$templates = array();
		
		if ( $template !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$template}-{$slug}.php";
			}
			
			$templates[] = $template . '.php';
		}
		
		$located = stockholm_qode_find_template_path( $templates );
		
		if ( $located ) {
			include( $located );
		}
	}
}

if ( ! function_exists( 'stockholm_qode_get_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @see stockholm_qode_get_template_part()
	 */
	function stockholm_qode_get_module_template_part( $template, $module, $slug = '', $params = array() ) {
		$template_path = 'framework/modules/' . $module;
		
		stockholm_qode_get_template_part( $template_path . '/' . $template, $slug, $params );
	}
}

if ( ! function_exists( 'stockholm_qode_find_template_path' ) ) {
	/**
	 * Find template path and return it
	 *
	 * @param $template_names
	 *
	 * @return string
	 */
	function stockholm_qode_find_template_path( $template_names, $plugin = false ) {
        $located = '';
        foreach((array) $template_names as $template_name) {

            if(!$template_name) {
                continue;
            }
            if(file_exists(get_stylesheet_directory().'/'.$template_name)) {
                $located = get_stylesheet_directory().'/'.$template_name;
                break;
            } elseif(file_exists(get_template_directory().'/'.$template_name)) {
                $located = get_template_directory().'/'.$template_name;
                break;
            }elseif ( $plugin && file_exists( $template_name ) ) {

                $located = $template_name;
                break;
            }
        }

        return $located;
	}
}

if ( ! function_exists( 'stockholm_qode_dynamic_css' ) ) {
	/**
	 * Generates css based on selector and rules that are provided
	 *
	 * @param array|string $selector selector for which to generate styles
	 * @param array        $rules associative array of rules.
	 *
	 * Example of usage: if you want to generate this css:
	 *      header { width: 100%; }
	 * function call should look like this: qodef_fn_themename_dynamic_css('header', array('width' => '100%'));
	 *
	 * @return string
	 */
	function stockholm_qode_dynamic_css( $selector, $rules ) {
		$output = '';
		//check if selector and rules are valid data
		if ( ! empty( $selector ) && ( is_array( $rules ) && count( $rules ) ) ) {
			
			if ( is_array( $selector ) && count( $selector ) ) {
				$output .= implode( ', ', $selector );
			} else {
				$output .= $selector;
			}
			
			$output .= ' { ';
			foreach ( $rules as $prop => $value ) {
				if ( $prop !== '' ) {
					$output .= $prop . ': ' . esc_attr( $value ) . ';';
				}
			}
			
			$output .= '}' . "\n\n";
		}
		
		return $output;
	}
}

if ( ! function_exists( 'stockholm_qode_active_widget' ) ) {
	/**
	 * Whether widget is displayed on the front-end.
	 */
	function stockholm_qode_active_widget( $callback = false, $widget_id = false, $id_base = false, $skip_inactive = true ) {
		global $wp_registered_widgets;

		$sidebars_widgets = wp_get_sidebars_widgets();
		$sidebars_array   = array();

		if ( is_array( $sidebars_widgets ) ) {
			foreach ( $sidebars_widgets as $sidebar => $widgets ) {
				if ( $skip_inactive && ( 'wp_inactive_widgets' === $sidebar || 'orphaned_widgets' === substr( $sidebar, 0, 16 ) ) ) {
					continue;
				}
				if ( is_array( $widgets ) ) {
					foreach ( $widgets as $widget ) {
						if ( ( $callback && isset( $wp_registered_widgets[ $widget ]['callback'] ) && $wp_registered_widgets[ $widget ]['callback'] == $callback ) || ( $id_base && _get_widget_id_base( $widget ) == $id_base ) ) {
							if ( ! $widget_id || $widget_id == $wp_registered_widgets[ $widget ]['id'] ) {
								$sidebars_array[] = $sidebar;
							}
						}
					}
				}
			}

			return $sidebars_array;
		}

		return false;
	}
}

if ( ! function_exists( 'stockholm_qode_execute_shortcode' ) ) {
	/**
	 * @param      $shortcode_tag - shortcode base
	 * @param      $atts - shortcode attributes
	 * @param null $content - shortcode content
	 *
	 * @return mixed|string
	 */
	function stockholm_qode_execute_shortcode( $shortcode_tag, $atts, $content = null ) {
		global $shortcode_tags;
		
		if ( ! isset( $shortcode_tags[ $shortcode_tag ] ) ) {
			return;
		}
		
		if ( is_array( $shortcode_tags[ $shortcode_tag ] ) ) {
			$shortcode_array = $shortcode_tags[ $shortcode_tag ];
			
			return call_user_func( array(
				$shortcode_array[0],
				$shortcode_array[1]
			), $atts, $content, $shortcode_tag );
		}
		
		return call_user_func( $shortcode_tags[ $shortcode_tag ], $atts, $content, $shortcode_tag );
	}
}
