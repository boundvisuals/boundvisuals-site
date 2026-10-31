<?php

/*
   Interface: iStockholmQodeLayoutNode
   A interface that implements Layout Node methods
*/
interface iStockholmQodeLayoutNode {
	public function hasChidren();
	
	public function getChild( $key );
	
	public function addChild( $key, $value );
}

/*
   Interface: iStockholmQodeRender
   A interface that implements Render methods
*/
interface iStockholmQodeRender {
	public function render( $factory );
}

/*
   Class: StockholmQodePanel
   A class that initializes Qode Panel
*/
class StockholmQodePanel implements iStockholmQodeLayoutNode, iStockholmQodeRender {
	public $children;
	public $title;
	public $name;
	public $hidden_property;
	public $hidden_value;
	
	function __construct( $title_label = "", $name = "", $hidden_property = "", $hidden_value = "" ) {
		$this->children        = array();
		$this->title           = $title_label;
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
	}
	
	public function hasChidren() {
		return ( is_array( $this->children ) && count( $this->children ) > 0 ) ? true : false;
	}
	
	public function getChild( $key ) {
		return $this->children[ $key ];
	}
	
	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}
	
	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( stockholm_qode_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			}
		}
		?>
		<div class="qodef-page-form-section-holder" id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<h3 class="qodef-page-section-title"><?php echo esc_html( $this->title ); ?></h3>
			<?php foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			} ?>
		</div>
		<?php
	}
	
	public function renderChild( iStockholmQodeRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: StockholmQodeContainer
   A class that initializes Qode Container
*/
class StockholmQodeContainer implements iStockholmQodeLayoutNode, iStockholmQodeRender {
	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;
	
	function __construct( $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children        = array();
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
		$this->hidden_values   = $hidden_values;
	}
	
	public function hasChidren() {
		return ( is_array( $this->children ) && count( $this->children ) > 0 ) ? true : false;
	}
	
	public function getChild( $key ) {
		return $this->children[ $key ];
	}
	
	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}
	
	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( stockholm_qode_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			} else {
				foreach ( $this->hidden_values as $value ) {
					if ( stockholm_qode_option_get_value( $this->hidden_property ) == $value ) {
						$hidden = true;
					}
					
				}
			}
		}
		?>
		<div class="qodef-page-form-container-holder" id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<?php foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			} ?>
		</div>
		<?php
	}
	
	public function renderChild( iStockholmQodeRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: StockholmQodeContainerNoStyle
   A class that initializes Qode Container without css classes
*/
class StockholmQodeContainerNoStyle implements iStockholmQodeLayoutNode, iStockholmQodeRender {
	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;
	
	function __construct( $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children        = array();
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
		$this->hidden_values   = $hidden_values;
	}
	
	public function hasChidren() {
		return ( is_array( $this->children ) && count( $this->children ) > 0 ) ? true : false;
	}
	
	public function getChild( $key ) {
		return $this->children[ $key ];
	}
	
	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}
	
	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( stockholm_qode_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			} else {
				foreach ( $this->hidden_values as $value ) {
					if ( stockholm_qode_option_get_value( $this->hidden_property ) == $value ) {
						$hidden = true;
					}
					
				}
			}
		}
		?>
		<div id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<?php foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			} ?>
		</div>
		<?php
	}
	
	public function renderChild( iStockholmQodeRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: StockholmQodeGroup
   A class that initializes Qode Group
*/
class StockholmQodeGroup implements iStockholmQodeLayoutNode, iStockholmQodeRender {
	public $children;
	public $title;
	public $description;
	
	function __construct( $title_label = "", $description = "" ) {
		$this->children    = array();
		$this->title       = $title_label;
		$this->description = $description;
	}
	
	public function hasChidren() {
		return ( is_array( $this->children ) && count( $this->children ) > 0 ) ? true : false;
	}
	
	public function getChild( $key ) {
		return $this->children[ $key ];
	}
	
	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}
	
	public function render( $factory ) {?>
		<div class="qodef-page-form-section">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $this->title ); ?></h4>
				<p><?php echo esc_html( $this->description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<?php foreach ( $this->children as $child ) {
						$this->renderChild( $child, $factory );
					} ?>
				</div>
			</div>
		</div>
		<?php
	}
	
	public function renderChild( iStockholmQodeRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: StockholmQodeNotice
   A class that initializes Qode Notice
*/
class StockholmQodeNotice implements iStockholmQodeRender {
	public $children;
	public $title;
	public $description;
	public $notice;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;
	
	function __construct( $title_label = "", $description = "", $notice = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children        = array();
		$this->title           = $title_label;
		$this->description     = $description;
		$this->notice          = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
		$this->hidden_values   = $hidden_values;
	}
	
	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( stockholm_qode_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			} else {
				foreach ( $this->hidden_values as $value ) {
					if ( stockholm_qode_option_get_value( $this->hidden_property ) == $value ) {
						$hidden = true;
					}
					
				}
			}
		}
		?>
		<div class="qodef-page-form-section"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $this->title ); ?></h4>
				<p><?php echo esc_html( $this->description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="alert alert-warning">
						<?php echo esc_html( $this->notice ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

/*
   Class: StockholmQodeRow
   A class that initializes Qode Row
*/
class StockholmQodeRow implements iStockholmQodeLayoutNode, iStockholmQodeRender {
	public $children;
	public $next;
	
	function __construct( $next = false ) {
		$this->children = array();
		$this->next     = $next;
	}
	
	public function hasChidren() {
		return ( is_array( $this->children ) && count( $this->children ) > 0 ) ? true : false;
	}
	
	public function getChild( $key ) {
		return $this->children[ $key ];
	}
	
	public function addChild( $key, $value ) {
		$this->children[ $key ] = $value;
	}
	
	public function render( $factory ) { ?>
		<div class="row<?php if ( $this->next ) { echo " next-row"; } ?>">
			<?php foreach ( $this->children as $child ) {
				$this->renderChild( $child, $factory );
			} ?>
		</div>
		<?php
	}
	
	public function renderChild( iStockholmQodeRender $child, $factory ) {
		$child->render( $factory );
	}
}

/*
   Class: StockholmQodeTitle
   A class that initializes Qode Title
*/
class StockholmQodeTitle implements iStockholmQodeRender {
	private $name;
	private $title;
	public $hidden_property;
	public $hidden_values = array();
	
	function __construct( $name = "", $title_label = "", $hidden_property = "", $hidden_value = "" ) {
		$this->title           = $title_label;
		$this->name            = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value    = $hidden_value;
	}
	
	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( stockholm_qode_option_get_value( $this->hidden_property ) == $this->hidden_value ) {
				$hidden = true;
			}
		}
		?>
		<h5 class="qodef-page-section-subtitle" id="qodef_<?php echo esc_attr( $this->name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>><?php echo esc_html( $this->title ); ?></h5>
		<?php
	}
}

/*
   Class: StockholmQodeField
   A class that initializes Qode Field
*/
class StockholmQodeField implements iStockholmQodeRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();
	
	function __construct( $type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array() ) {
		global $stockholm_qode_framework;
		$this->type            = $type;
		$this->name            = $name;
		$this->default_value   = $default_value;
		$this->label           = $label;
		$this->description     = $description;
		$this->options         = $options;
		$this->args            = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values   = $hidden_values;
		$stockholm_qode_framework->qodeOptions->addOption( $this->name, $this->default_value );
	}
	
	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			foreach ( $this->hidden_values as $value ) {
				if ( stockholm_qode_option_get_value( $this->hidden_property ) == $value ) {
					$hidden = true;
				}
			}
		}
		
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

/*
   Class: StockholmQodeMetaField
   A class that initializes Qode Meta Field
*/
class StockholmQodeMetaField implements iStockholmQodeRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();
	
	function __construct( $type, $name, $default_value = "", $label = "", $description = "", $options = array(), $args = array(), $hidden_property = "", $hidden_values = array() ) {
		global $stockholm_qode_framework;
		$this->type            = $type;
		$this->name            = $name;
		$this->default_value   = $default_value;
		$this->label           = $label;
		$this->description     = $description;
		$this->options         = $options;
		$this->args            = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values   = $hidden_values;
		$stockholm_qode_framework->qodeMetaBoxes->addOption( $this->name, $this->default_value );
	}
	
	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			foreach ( $this->hidden_values as $value ) {
				if ( stockholm_qode_option_get_value( $this->hidden_property ) == $value ) {
					$hidden = true;
				}
			}
		}
		
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class StockholmQodeFieldType {
	abstract public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false );
}

class StockholmQodeFieldText extends StockholmQodeFieldType {
	
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 12;
		if ( isset( $args["col_width"] ) ) {
			$col_width = $args["col_width"];
		}
		?>
		
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr( $col_width ); ?>">
							<input type="text" class="form-control qodef-input qodef-form-element" name="<?php echo esc_attr( $name ); ?>" value="<?php echo htmlspecialchars( stockholm_qode_option_get_value( $name ) ); ?>"/></div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldTextSimple extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="col-lg-3" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
			<input type="text" class="form-control qodef-input qodef-form-element" name="<?php echo esc_attr( $name ); ?>" value="<?php echo htmlspecialchars( stockholm_qode_option_get_value( $name ) ); ?>"/></div>
		<?php
	}
}

class StockholmQodeFieldTextArea extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="qodef-page-form-section">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<textarea class="form-control qodef-form-element" name="<?php echo esc_attr( $name ); ?>" rows="5"><?php echo htmlspecialchars( stockholm_qode_option_get_value( $name ) ); ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldColor extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="qodef-page-form-section">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>" class="my-color-field"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldColorSimple extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="col-lg-3" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
			<input type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>" class="my-color-field"/>
		</div>
		<?php
	}
}

class StockholmQodeFieldImage extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="qodef-page-form-section">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="qodef-media-uploader">
								<div<?php if ( ! stockholm_qode_option_has_value( $name ) ) { ?> style="display: none"<?php } ?> class="qodef-media-image-holder">
									<img src="<?php if ( stockholm_qode_option_has_value( $name ) ) { echo stockholm_qode_get_attachment_thumb_url( stockholm_qode_option_get_value( $name ) ); } ?>" class="qodef-media-image img-thumbnail"/>
								</div>
								<div style="display: none" class="qodef-media-meta-fields">
									<input type="hidden" class="qodef-media-upload-url" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
									<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value=""/>
									<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value=""/>
								</div>
								<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
								<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFont extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $stockholm_fonts_array;
		?>
		<div class="qodef-page-form-section">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element" name="<?php echo esc_attr( $name ); ?>">
								<option value="-1"><?php esc_html_e( 'Default', 'stockholm' ); ?></option>
								<?php foreach ( $stockholm_fonts_array as $fontArray ) { ?>
									<option <?php if ( stockholm_qode_option_get_value( $name ) == str_replace( ' ', '+', $fontArray["family"] ) ) { echo "selected='selected'"; } ?> value="<?php echo str_replace( ' ', '+', $fontArray["family"] ); ?>"><?php echo esc_attr( $fontArray["family"] ); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFontSimple extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		global $stockholm_fonts_array;
		?>
		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
			<select class="form-control qodef-form-element" name="<?php echo esc_attr( $name ); ?>">
				<option value="-1"><?php esc_html_e( 'Default', 'stockholm' ); ?></option>
				<?php foreach ( $stockholm_fonts_array as $fontArray ) { ?>
					<option <?php if ( stockholm_qode_option_get_value( $name ) == str_replace( ' ', '+', $fontArray["family"] ) ) { echo "selected='selected'"; } ?> value="<?php echo str_replace( ' ', '+', $fontArray["family"] ); ?>"><?php echo esc_attr( $fontArray["family"] ); ?></option>
				<?php } ?>
			</select>
		</div>
		<?php
	}
}

class StockholmQodeFieldSelect extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		?>
		<div class="qodef-page-form-section"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element<?php if ( $dependence ) { echo " dependence"; } ?>"
								<?php foreach ( $show as $key => $value ) { ?>
									data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
								<?php foreach ( $hide as $key => $value ) { ?>
									data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
								    name="<?php echo esc_attr( $name ); ?>">
								<?php foreach ( $options as $key => $value ) {
									if ( $key == "-1" ) {
										$key = "";
									} ?>
									<option <?php if ( stockholm_qode_option_get_value( $name ) == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldSelectBlank extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$show = array();
		if ( isset( $args["show"] ) ) {
			$show = $args["show"];
		}
		$hide = array();
		if ( isset( $args["hide"] ) ) {
			$hide = $args["hide"];
		}
		?>
		<div class="qodef-page-form-section"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element<?php if ( $dependence ) { echo " dependence"; } ?>"
								<?php foreach ( $show as $key => $value ) { ?>
									data-show-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
								<?php foreach ( $hide as $key => $value ) { ?>
									data-hide-<?php echo str_replace( ' ', '', $key ); ?>="<?php echo esc_attr( $value ); ?>"
								<?php } ?>
								    name="<?php echo esc_attr( $name ); ?>">
								<option <?php if ( stockholm_qode_option_get_value( $name ) == "" ) {
									echo "selected='selected'";
								} ?> value=""></option>
								<?php foreach ( $options as $key => $value ) {
									if ( $key == "-1" ) {
										$key = "";
									} ?>
									<option <?php if ( stockholm_qode_option_get_value( $name ) == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldSelectSimple extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
			<select class="form-control qodef-form-element" name="<?php echo esc_attr( $name ); ?>">
				<?php foreach ( $options as $key => $value ) {
					if ( $key == "-1" ) {
						$key = "";
					} ?>
					<option <?php if ( stockholm_qode_option_get_value( $name ) == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
				<?php } ?>
			</select>
		</div>
		<?php
	}
}

class StockholmQodeFieldSelectBlankSimple extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
			<select class="form-control qodef-form-element" name="<?php echo esc_attr( $name ); ?>">
				<option <?php if ( stockholm_qode_option_get_value( $name ) == "" ) { echo "selected='selected'"; } ?> value=""></option>
				<?php foreach ( $options as $key => $value ) { ?>
					<option <?php if ( stockholm_qode_option_get_value( $name ) == $key ) { echo "selected='selected'"; } ?> value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
				<?php } ?>
			</select>
		</div>
		<?php
	}
}

class StockholmQodeFieldYesNo extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "yes" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "no" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_yesno" value="yes"<?php if ( stockholm_qode_option_get_value( $name ) == "yes" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldYesNoSimple extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
			<p class="field switch">
				<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "yes" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
				<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "no" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
				<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_yesno" value="yes"<?php if ( stockholm_qode_option_get_value( $name ) == "yes" ) { echo " selected"; } ?>/>
				<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
			</p>
		</div>
		<?php
	}
}

class StockholmQodeFieldOnOff extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "on" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'On', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "off" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Off', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_onoff" value="on"<?php if ( stockholm_qode_option_get_value( $name ) == "on" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldPortfolioFollow extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "portfolio_single_follow" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "portfolio_single_no_follow" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_portfoliofollow" value="portfolio_single_follow"<?php if ( stockholm_qode_option_get_value( $name ) == "portfolio_single_follow" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldZeroOne extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "1" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "0" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_zeroone" value="1"<?php if ( stockholm_qode_option_get_value( $name ) == "1" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldImageVideo extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch switch-type">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "image" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Image', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "video" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Video', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_imagevideo" value="image"<?php if ( stockholm_qode_option_get_value( $name ) == "image" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldYesEmpty extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "yes" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_yesempty" value="yes"<?php if ( stockholm_qode_option_get_value( $name ) == "yes" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFlagPage extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "page" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_flagpage" value="page"<?php if ( stockholm_qode_option_get_value( $name ) == "page" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFlagPost extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "post" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_flagpost" value="post"<?php if ( stockholm_qode_option_get_value( $name ) == "post" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFlagMedia extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "attachment" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_flagmedia" value="attachment"<?php if ( stockholm_qode_option_get_value( $name ) == "attachment" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFlagPortfolio extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "portfolio_page" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox" name="<?php echo esc_attr( $name ); ?>_flagportfolio" value="portfolio_page"<?php if ( stockholm_qode_option_get_value( $name ) == "portfolio_page" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFlagProduct extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if ( isset( $args["dependence"] ) ) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if ( isset( $args["dependence_hide_on_yes"] ) ) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if ( isset( $args["dependence_show_on_yes"] ) ) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_show_on_yes ); ?>" class="cb-enable<?php if ( stockholm_qode_option_get_value( $name ) == "product" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence";} ?>"><span><?php esc_html_e( 'Yes', 'stockholm' ) ?></span></label>
								<label data-hide="<?php echo esc_attr( $dependence_show_on_yes ); ?>" data-show="<?php echo esc_attr( $dependence_hide_on_yes ); ?>" class="cb-disable<?php if ( stockholm_qode_option_get_value( $name ) == "" ) { echo " selected"; } ?><?php if ( $dependence ) { echo " dependence"; } ?>"><span><?php esc_html_e( 'No', 'stockholm' ) ?></span></label>
								<input type="checkbox" id="checkbox)" class="checkbox" name="<?php echo esc_attr( $name ); ?>_flagproduct" value="product"<?php if ( stockholm_qode_option_get_value( $name ) == "product" ) { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldRange extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$range_min      = 0;
		$range_max      = 1;
		$range_step     = 0.01;
		$range_decimals = 2;
		if ( isset( $args["range_min"] ) ) {
			$range_min = $args["range_min"];
		}
		if ( isset( $args["range_max"] ) ) {
			$range_max = $args["range_max"];
		}
		if ( isset( $args["range_step"] ) ) {
			$range_step = $args["range_step"];
		}
		if ( isset( $args["range_decimals"] ) ) {
			$range_decimals = $args["range_decimals"];
		}
		?>
		<div class="qodef-page-form-section">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="qodef-slider-range-wrapper">
								<div class="form-inline">
									<input type="text" class="form-control qodef-form-element qodef-form-element-xsmall pull-left qodef-slider-range-value" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
									<div class="qodef-slider-range small" data-step="<?php echo esc_attr( $range_step ); ?>" data-min="<?php echo esc_attr( $range_min ); ?>" data-max="<?php echo esc_attr( $range_max ); ?>" data-decimals="<?php echo esc_attr( $range_decimals ); ?>" data-start="<?php echo stockholm_qode_option_get_value( $name ); ?>"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldRangeSimple extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) { ?>
		<div class="col-lg-3" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<div class="qodef-slider-range-wrapper">
				<div class="form-inline">
					<em class="qodef-field-description"><?php echo esc_html( $label ); ?></em>
					<input type="text" class="form-control qodef-form-element qodef-form-element-xxsmall pull-left qodef-slider-range-value" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
					<div class="qodef-slider-range xsmall" data-step="0.01" data-max="1" data-start="<?php echo stockholm_qode_option_get_value( $name ); ?>"></div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldRadio extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$checked = "";
		if ( $default_value == $value ) {
			$checked = "checked";
		}
		$html = '<input type="radio" name="' . $name . '" value="' . $default_value . '" ' . $checked . ' /> ' . $label . '<br />';
		echo wp_kses( $html, array(
			'input' => array(
				'type'    => true,
				'name'    => true,
				'value'   => true,
				'checked' => true
			),
			'br'    => true
		) );
	}
}

class StockholmQodeFieldCheckBox extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$checked = "";
		if ( $default_value == $value ) {
			$checked = "checked";
		}
		$html = '<input type="checkbox" name="' . $name . '" value="' . $default_value . '" ' . $checked . ' /> ' . $label . '<br />';
		echo wp_kses( $html, array(
			'input' => array(
				'type'    => true,
				'name'    => true,
				'value'   => true,
				'checked' => true
			),
			'br'    => true
		) );
	}
}

class StockholmQodeFieldDate extends StockholmQodeFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 2;
		if ( isset( $args["col_width"] ) ) {
			$col_width = $args["col_width"];
		}
		?>
		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr( $name ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr( $col_width ); ?>">
							<input type="text" id="portfolio_date" class="datepicker form-control qodef-input qodef-form-element" name="<?php echo esc_attr( $name ); ?>" value="<?php echo stockholm_qode_option_get_value( $name ); ?>"/>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

class StockholmQodeFieldFactory {
	public function render( $field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false ) {
		switch ( strtolower( $field_type ) ) {
			case 'text':
				$field = new StockholmQodeFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'textsimple':
				$field = new StockholmQodeFieldTextSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'textarea':
				$field = new StockholmQodeFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'color':
				$field = new StockholmQodeFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'colorsimple':
				$field = new StockholmQodeFieldColorSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'image':
				$field = new StockholmQodeFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'font':
				$field = new StockholmQodeFieldFont();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'fontsimple':
				$field = new StockholmQodeFieldFontSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'select':
				$field = new StockholmQodeFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'selectblank':
				$field = new StockholmQodeFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'selectsimple':
				$field = new StockholmQodeFieldSelectSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'selectblanksimple':
				$field = new StockholmQodeFieldSelectBlankSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'yesno':
				$field = new StockholmQodeFieldYesNo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'yesnosimple':
				$field = new StockholmQodeFieldYesNoSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'onoff':
				$field = new StockholmQodeFieldOnOff();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'portfoliofollow':
				$field = new StockholmQodeFieldPortfolioFollow();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'zeroone':
				$field = new StockholmQodeFieldZeroOne();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'imagevideo':
				$field = new StockholmQodeFieldImageVideo();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'yesempty':
				$field = new StockholmQodeFieldYesEmpty();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'flagpost':
				$field = new StockholmQodeFieldFlagPost();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'flagpage':
				$field = new StockholmQodeFieldFlagPage();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'flagmedia':
				$field = new StockholmQodeFieldFlagMedia();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'flagportfolio':
				$field = new StockholmQodeFieldFlagPortfolio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'flagproduct':
				$field = new StockholmQodeFieldFlagProduct();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'range':
				$field = new StockholmQodeFieldRange();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'rangesimple':
				$field = new StockholmQodeFieldRangeSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'radio':
				$field = new StockholmQodeFieldRadio();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'checkbox':
				$field = new StockholmQodeFieldCheckBox();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			case 'date':
				$field = new StockholmQodeFieldDate();
				$field->render( $name, $label, $description, $options, $args, $hidden );
				break;
			
			default:
				break;
		}
	}
}

/*
   Class: StockholmQodeMultipleImages
   A class that initializes Qode Multiple Images
*/
class StockholmQodeMultipleImages implements iStockholmQodeRender {
	private $name;
	private $label;
	private $description;
	
	function __construct( $name, $label = "", $description = "" ) {
		global $stockholm_qode_framework;
		$this->name        = $name;
		$this->label       = $label;
		$this->description = $description;
		$stockholm_qode_framework->qodeMetaBoxes->addOption( $this->name, "" );
	}
	
	public function render( $factory ) {
		global $post;
		?>
		<div class="qodef-page-form-section">
			<div class="qodef-field-desc">
				<h4><?php echo esc_html( $this->label ); ?></h4>
				<p><?php echo esc_html( $this->description ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="qode-gallery-images-holder clearfix">
								<?php
								$portfolio_image_gallery_val = get_post_meta( $post->ID, 'qode_portfolio-image-gallery', true );
								if ( $portfolio_image_gallery_val != '' ) {
									$portfolio_image_gallery_array = explode( ',', $portfolio_image_gallery_val );
								}
								
								if ( isset( $portfolio_image_gallery_array ) && count( $portfolio_image_gallery_array ) != 0 ):
									foreach ( $portfolio_image_gallery_array as $gimg_id ):
										$gimage_wp = wp_get_attachment_image_src( $gimg_id, 'thumbnail', true );
										echo '<li class="qode-gallery-image-holder"><img src="' . esc_url( $gimage_wp[0] ) . '"/></li>';
									endforeach;
								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr( $portfolio_image_gallery_val ); ?>" id="qode_portfolio-image-gallery" name="qode_portfolio-image-gallery">
							<div class="qodef-gallery-uploader">
								<a class="qodef-gallery-upload-btn btn btn-sm btn-primary" href="javascript:void(0)"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
								<a class="qodef-gallery-clear-btn btn btn-sm btn-default pull-right" href="javascript:void(0)"><?php esc_html_e( 'Remove All', 'stockholm' ); ?></a>
							</div>
							<?php wp_nonce_field( 'stockholm_qode_update_portfolio_images', 'stockholm_qode_update_portfolio_images' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

/*
   Class: StockholmQodeImagesVideos
   A class that initializes Qode Images Videos
*/
class StockholmQodeImagesVideos implements iStockholmQodeRender {
	private $label;
	private $description;
	
	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}
	
	public function render( $factory ) {
		global $post;
		?>
		<div class="qodef_hidden_portfolio_images" style="display: none">
			<div class="qodef-page-form-section">
				<div class="qodef-field-desc">
					<h4><?php echo esc_html( $this->label ); ?></h4>
					<p><?php echo esc_html( $this->description ); ?></p>
				</div>
				<div class="qodef-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
								<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x"/>
							</div>
							<div class="col-lg-10">
								<em class="qodef-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'stockholm' ); ?></em>
								<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_x" name="portfoliotitle_x"/>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="qodef-field-description"><?php esc_html_e( 'Image', 'stockholm' ); ?></em>
								<div class="qodef-media-uploader">
									<div style="display: none" class="qodef-media-image-holder">
										<img src="" class="qodef-media-image img-thumbnail"/>
									</div>
									<div style="display: none" class="qodef-media-meta-fields">
										<input type="hidden" class="qodef-media-upload-url" name="portfolioimg_x" id="portfolioimg_x"/>
										<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value=""/>
										<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value=""/>
									</div>
									<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="qodef-field-description"><?php esc_html_e( 'Video type', 'stockholm' ); ?></em>
								<select class="form-control qodef-form-element qodef-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube"><?php esc_html_e( 'Youtube', 'stockholm' ); ?></option>
									<option value="vimeo"><?php esc_html_e( 'Vimeo', 'stockholm' ); ?></option>
									<option value="self"><?php esc_html_e( 'Self hosted', 'stockholm' ); ?></option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="qodef-field-description"><?php esc_html_e( 'Video ID', 'stockholm' ); ?></em>
								<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x"/>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="qodef-field-description"><?php esc_html_e( 'Video image', 'stockholm' ); ?></em>
								<div class="qodef-media-uploader">
									<div style="display: none" class="qodef-media-image-holder">
										<img src="" class="qodef-media-image img-thumbnail"/>
									</div>
									<div style="display: none" class="qodef-media-meta-fields">
										<input type="hidden" class="qodef-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x"/>
										<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value=""/>
										<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value=""/>
									</div>
									<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'stockholm' ); ?></em>
								<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x"/>
							</div>
							<div class="col-lg-4">
								<em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'stockholm' ); ?></em>
								<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x"/>
							</div>
							<div class="col-lg-4">
								<em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'stockholm' ); ?></em>
								<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x"/>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="qodef_remove_image btn btn-sm btn-primary" href="/"
								   onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'stockholm' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$no               = 1;
		$portfolio_images = get_post_meta( $post->ID, 'qode_portfolio_images', true );
		if ( is_array( $portfolio_images ) && count( $portfolio_images ) > 1 ) {
			usort( $portfolio_images, "stockholm_qode_compare_portfolio_images" );
		}
		while ( isset( $portfolio_images[ $no - 1 ] ) ) {
			$portfolio_image = $portfolio_images[ $no - 1 ];
			?>
			<div class="qodef_portfolio_image" rel="<?php echo esc_attr( $no ); ?>" style="display: block;">
				<div class="qodef-page-form-section">
					<div class="qodef-field-desc">
						<h4><?php echo esc_html( $this->label ); ?></h4>
						<p><?php echo esc_html( $this->description ); ?></p>
					</div>
					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? stripslashes( $portfolio_image['portfolioimgordernumber'] ) : ""; ?>"/>
								</div>
								<div class="col-lg-10">
									<em class="qodef-field-description"><?php esc_html_e( 'Image/Video title (only for gallery layout - Portfolio Style 6)', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_<?php echo esc_attr( $no ); ?>" name="portfoliotitle[]" value="<?php echo isset( $portfolio_image['portfoliotitle'] ) ? stripslashes( $portfolio_image['portfoliotitle'] ) : ""; ?>"/>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description"><?php esc_html_e( 'Image', 'stockholm' ); ?></em>
									<div class="qodef-media-uploader">
										<div<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == false ) { ?> style="display: none"<?php } ?> class="qodef-media-image-holder">
											<img src="<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) {
												echo stockholm_qode_get_attachment_thumb_url( stripslashes( $portfolio_image['portfolioimg'] ) );
											} ?>" class="qodef-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr( $no ); ?>" value="<?php echo esc_url( stripslashes( $portfolio_image['portfolioimg'] ) ); ?>"/>
											<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value=""/>
											<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value=""/>
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="qodef-field-description"><?php esc_html_e( 'Video type', 'stockholm' ); ?></em>
									<select class="form-control qodef-form-element qodef-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>">
										<option value=""></option>
										<option <?php if ( $portfolio_image['portfoliovideotype'] == "youtube" ) { echo "selected='selected'"; } ?> value="youtube"><?php esc_html_e( 'Youtube', 'stockholm' ); ?></option>
										<option <?php if ( $portfolio_image['portfoliovideotype'] == "vimeo" ) { echo "selected='selected'"; } ?> value="vimeo"><?php esc_html_e( 'Vimeo', 'stockholm' ); ?></option>
										<option <?php if ( $portfolio_image['portfoliovideotype'] == "self" ) { echo "selected='selected'"; } ?> value="self"><?php esc_html_e( 'Self hosted', 'stockholm' ); ?></option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="qodef-field-description"><?php esc_html_e( 'Video ID', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoid_<?php echo esc_attr( $no ); ?>" name="portfoliovideoid[]" value="<?php echo isset( $portfolio_image['portfoliovideoid'] ) ? stripslashes( $portfolio_image['portfoliovideoid'] ) : ""; ?>"/>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description"><?php esc_html_e( 'Video image', 'stockholm' ); ?></em>
									<div class="qodef-media-uploader">
										<div<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == false ) { ?> style="display: none"<?php } ?> class="qodef-media-image-holder">
											<img src="<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == true ) {
												echo stockholm_qode_get_attachment_thumb_url( stripslashes( $portfolio_image['portfoliovideoimage'] ) );
											} ?>" class="qodef-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>" value="<?php echo esc_url( stripslashes( $portfolio_image['portfoliovideoimage'] ) ); ?>"/>
											<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value=""/>
											<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value=""/>
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideowebm_<?php echo esc_attr( $no ); ?>" name="portfoliovideowebm[]" value="<?php echo isset( $portfolio_image['portfoliovideowebm'] ) ? stripslashes( $portfolio_image['portfoliovideowebm'] ) : ""; ?>"/>
								</div>
								<div class="col-lg-4">
									<em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>" name="portfoliovideomp4[]" value="<?php echo isset( $portfolio_image['portfoliovideomp4'] ) ? stripslashes( $portfolio_image['portfoliovideomp4'] ) : ""; ?>"/>
								</div>
								<div class="col-lg-4">
									<em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoogv_<?php echo esc_attr( $no ); ?>" name="portfoliovideoogv[]" value="<?php echo isset( $portfolio_image['portfoliovideoogv'] ) ? stripslashes( $portfolio_image['portfoliovideoogv'] ) : ""; ?>"/>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="qodef_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'stockholm' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no ++;
		}
		?>
		<br/>
		<a class="qodef_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html_e( 'Add portfolio image/video', 'stockholm' ); ?></a>
		<?php
	}
}

/*
   Class: StockholmQodeImagesVideos
   A class that initializes Qode Images Videos
*/
class StockholmQodeImagesVideosFramework implements iStockholmQodeRender {
	private $label;
	private $description;
	
	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}
	
	public function render( $factory ) {
		global $post;
		?>
		<div class="qodef-hidden-portfolio-images" style="display: none">
			<div class="qodef-portfolio-toggle-holder">
				<div class="qodef-portfolio-toggle qodef-toggle-desc">
					<span class="number">1</span><span class="qodef-toggle-inner"><?php esc_html_e( 'Image - ', 'stockholm' ); ?><em><?php esc_html_e( '(Order Number, Image Title)', 'stockholm' ); ?></em></span>
				</div>
				<div class="qodef-portfolio-toggle qodef-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="qodef-portfolio-toggle-content">
				<div class="qodef-page-form-section">
					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="qodef-media-uploader">
										<em class="qodef-field-description"><?php esc_html_e( 'Image ', 'stockholm' ); ?></em>
										<div style="display: none" class="qodef-media-image-holder">
											<img src="" class="qodef-media-image img-thumbnail">
										</div>
										<div class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value="">
											<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value="">
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
								</div>
								<div class="col-lg-8">
									<em class="qodef-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_x" name="portfoliotitle_x">
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--Video Hidden Start-->
		<div class="qodef-hidden-portfolio-videos" style="display: none">
			<div class="qodef-portfolio-toggle-holder">
				<div class="qodef-portfolio-toggle qodef-toggle-desc">
					<span class="number">2</span><span class="qodef-toggle-inner"><?php esc_html_e( 'Video - ', 'stockholm' ); ?><em><?php esc_html_e( '(Order Number, Video Title)', 'stockholm' ); ?></em></span>
				</div>
				<div class="qodef-portfolio-toggle qodef-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="qodef-portfolio-toggle-content">
				<div class="qodef-page-form-section">
					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="qodef-media-uploader">
										<em class="qodef-field-description"><?php esc_html_e( 'Cover Video Image ', 'stockholm' ); ?></em>
										<div style="display: none" class="qodef-media-image-holder">
											<img src="" class="qodef-media-image img-thumbnail">
										</div>
										<div style="display: none" class="qodef-media-meta-fields">
											<input type="hidden" class="qodef-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value="">
											<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value="">
										</div>
										<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
										</div>
										<div class="col-lg-10">
											<em class="qodef-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected)', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_x" name="portfoliotitle_x">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="qodef-field-description"><?php esc_html_e( 'Video type', 'stockholm' ); ?></em>
											<select class="form-control qodef-form-element qodef-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube"><?php esc_html_e( 'Youtube', 'stockholm' ); ?></option>
												<option value="vimeo"><?php esc_html_e( 'Vimeo', 'stockholm' ); ?></option>
												<option value="self"><?php esc_html_e( 'Self hosted', 'stockholm' ); ?></option>
											</select>
										</div>
										<div class="col-lg-2 qodef-video-id-holder">
											<em class="qodef-field-description" id="videoId"><?php esc_html_e( 'Video ID', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x">
										</div>
									</div>
									
									<div class="row next-row qodef-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x">
										</div>
										<div class="col-lg-4">
											<em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x">
										</div>
										<div class="col-lg-4">
											<em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x">
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Video Hidden End-->
		<?php
		$no               = 1;
		$portfolio_images = get_post_meta( $post->ID, 'qode_portfolio_images', true );
		if ( is_array( $portfolio_images ) && count( $portfolio_images ) > 1 ) {
			usort( $portfolio_images, "stockholm_qode_compare_portfolio_images" );
		}
		while ( isset( $portfolio_images[ $no - 1 ] ) ) {
			$portfolio_image = $portfolio_images[ $no - 1 ];
			if ( isset( $portfolio_image['portfolioimgtype'] ) ) {
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			} else {
				if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) {
					$portfolio_img_type = "image";
				} else {
					$portfolio_img_type = "video";
				}
			}
			if ( $portfolio_img_type == "image" ) { ?>
				<div class="qodef-portfolio-images qodef-portfolio-media" rel="<?php echo esc_attr( $no ); ?>">
					<div class="qodef-portfolio-toggle-holder">
						<div class="qodef-portfolio-toggle qodef-toggle-desc">
							<span class="number"><?php echo esc_html( $no ); ?></span><span class="qodef-toggle-inner"><?php esc_html_e( 'Image - ', 'stockholm' ); ?><em>(<?php echo esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ); ?>, <?php echo esc_attr( stripslashes( $portfolio_image['portfoliotitle'] ) ); ?>)</em></span>
						</div>
						<div class="qodef-portfolio-toggle qodef-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="qodef-portfolio-toggle-content" style="display: none">
						<div class="qodef-page-form-section">
							<div class="qodef-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="qodef-media-uploader">
												<em class="qodef-field-description"><?php esc_html_e( 'Image ', 'stockholm' ); ?></em>
												<div<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == false ) { ?> style="display: none"<?php } ?> class="qodef-media-image-holder">
													<img src="<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) {
														echo stockholm_qode_get_attachment_thumb_url( stripslashes( $portfolio_image['portfolioimg'] ) );
													} ?>"  class="qodef-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="qodef-media-meta-fields">
													<input type="hidden" class="qodef-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr( $no ); ?>" value="<?php echo esc_url( stripslashes( $portfolio_image['portfolioimg'] ) ); ?>"/>
													<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
											</div>
										</div>
										<div class="col-lg-2">
											<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_<?php echo esc_html( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? stripslashes( $portfolio_image['portfolioimgordernumber'] ) : ""; ?>">
										</div>
										<div class="col-lg-8">
											<em class="qodef-field-description"><?php esc_html_e( 'Image Title (works only for Gallery portfolio type selected) ', 'stockholm' ); ?></em>
											<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_<?php echo esc_html( $no ); ?>" name="portfoliotitle[]" value="<?php echo isset( $portfolio_image['portfoliotitle'] ) ? stripslashes( $portfolio_image['portfoliotitle'] ) : ""; ?>">
										</div>
									</div>
									<input type="hidden" id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>" name="portfoliovideoimage[]">
									<input type="hidden" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>" name="portfoliovideotype[]">
									<input type="hidden" id="portfoliovideoid_<?php echo esc_attr( $no ); ?>" name="portfoliovideoid[]">
									<input type="hidden" id="portfoliovideowebm_<?php echo esc_attr( $no ); ?>" name="portfoliovideowebm[]">
									<input type="hidden" id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>" name="portfoliovideomp4[]">
									<input type="hidden" id="portfoliovideoogv_<?php echo esc_attr( $no ); ?>" name="portfoliovideoogv[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr( $no ); ?>" name="portfolioimgtype[]" value="image">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			} else {
				?>
				<div class="qodef-portfolio-videos qodef-portfolio-media" rel="<?php echo esc_attr( $no ); ?>">
					<div class="qodef-portfolio-toggle-holder">
						<div class="qodef-portfolio-toggle qodef-toggle-desc">
							<span class="number"><?php echo esc_html( $no ); ?></span><span class="qodef-toggle-inner"><?php esc_html_e( 'Video - ', 'stockholm' ); ?><em>(<?php echo esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ); ?>, <?php echo esc_attr( stripslashes( $portfolio_image['portfoliotitle'] ) ); ?></em>) </span>
						</div>
						<div class="qodef-portfolio-toggle qodef-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="qodef-portfolio-toggle-content" style="display: none">
						<div class="qodef-page-form-section">
							<div class="qodef-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="qodef-media-uploader">
												<em class="qodef-field-description"><?php esc_html_e( 'Cover Video Image ', 'stockholm' ); ?></em>
												<div<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == false ) { ?> style="display: none"<?php } ?> class="qodef-media-image-holder">
													<img src="<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == true ) {
														echo stockholm_qode_get_attachment_thumb_url( stripslashes( $portfolio_image['portfoliovideoimage'] ) );
													} ?>"  class="qodef-media-image img-thumbnail"/>
												</div>
												<div style="display: none" class="qodef-media-meta-fields">
													<input type="hidden" class="qodef-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>" value="<?php echo stripslashes( $portfolio_image['portfoliovideoimage'] ); ?>"/>
													<input type="hidden" class="qodef-media-upload-height" name="qode_options_theme[media-upload][height]" value=""/>
													<input type="hidden" class="qodef-media-upload-width" name="qode_options_theme[media-upload][width]" value=""/>
												</div>
												<a class="qodef-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>" data-frame-button-text="<?php esc_attr_e( 'Select Image', 'stockholm' ); ?>"><?php esc_html_e( 'Upload', 'stockholm' ); ?></a>
												<a style="display: none;" href="javascript: void(0)" class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'stockholm' ); ?></a>
											</div>
										</div>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? stripslashes( $portfolio_image['portfolioimgordernumber'] ) : ""; ?>">
												</div>
												<div class="col-lg-10">
													<em class="qodef-field-description"><?php esc_html_e( 'Video Title (works only for Gallery portfolio type selected) ', 'stockholm' ); ?></em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliotitle_<?php echo esc_attr( $no ); ?>" name="portfoliotitle[]" value="<?php echo isset( $portfolio_image['portfoliotitle'] ) ? stripslashes( $portfolio_image['portfoliotitle'] ) : ""; ?>">
												</div>
											</div>
											<div class="row next-row">
												<div class="col-lg-2">
													<em class="qodef-field-description"><?php esc_html_e( 'Video Type', 'stockholm' ); ?></em>
													<select class="form-control qodef-form-element qodef-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>">
														<option value=""></option>
														<option <?php if ( $portfolio_image['portfoliovideotype'] == "youtube" ) { echo "selected='selected'"; } ?> value="youtube"><?php esc_html_e( 'Youtube', 'stockholm' ); ?></option>
														<option <?php if ( $portfolio_image['portfoliovideotype'] == "vimeo" ) { echo "selected='selected'"; } ?> value="vimeo"><?php esc_html_e( 'Vimeo', 'stockholm' ); ?></option>
														<option <?php if ( $portfolio_image['portfoliovideotype'] == "self" ) { echo "selected='selected'"; } ?> value="self"><?php esc_html_e( 'Self hosted', 'stockholm' ); ?></option>
													</select>
												</div>
												<div class="col-lg-2 qodef-video-id-holder">
													<em class="qodef-field-description"><?php esc_html_e( 'Video ID', 'stockholm' ); ?></em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoid_<?php echo esc_attr( $no ); ?>" name="portfoliovideoid[]" value="<?php echo isset( $portfolio_image['portfoliovideoid'] ) ? stripslashes( $portfolio_image['portfoliovideoid'] ) : ""; ?>"/>
												</div>
											</div>
											<div class="row next-row qodef-video-self-hosted-path-holder">
												<div class="col-lg-4">
													<em class="qodef-field-description"><?php esc_html_e( 'Video webm', 'stockholm' ); ?></em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideowebm_<?php echo esc_attr( $no ); ?>" name="portfoliovideowebm[]" value="<?php echo isset( $portfolio_image['portfoliovideowebm'] ) ? stripslashes( $portfolio_image['portfoliovideowebm'] ) : ""; ?>"/>
												</div>
												<div class="col-lg-4">
													<em class="qodef-field-description"><?php esc_html_e( 'Video mp4', 'stockholm' ); ?></em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>" name="portfoliovideomp4[]" value="<?php echo isset( $portfolio_image['portfoliovideomp4'] ) ? stripslashes( $portfolio_image['portfoliovideomp4'] ) : ""; ?>"/>
												</div>
												<div class="col-lg-4">
													<em class="qodef-field-description"><?php esc_html_e( 'Video ogv', 'stockholm' ); ?></em>
													<input type="text" class="form-control qodef-input qodef-form-element" id="portfoliovideoogv_<?php echo esc_attr( $no ); ?>" name="portfoliovideoogv[]" value="<?php echo isset( $portfolio_image['portfoliovideoogv'] ) ? stripslashes( $portfolio_image['portfoliovideoogv'] ) : ""; ?>"/>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" id="portfolioimg_<?php echo esc_attr( $no ); ?>" name="portfolioimg[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr( $no ); ?>" name="portfolioimgtype[]" value="video">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			$no ++;
		}
		?>
		<div class="qodef-portfolio-add">
			<a class="qodef-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e( ' Add Image', 'stockholm' ); ?></a>
			<a class="qodef-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e( ' Add Video', 'stockholm' ); ?></a>
			<a class="qodef-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'stockholm' ); ?></a>
		</div>
		<?php
	}
}

/*
   Class: StockholmQodeImagesVideos
   A class that initializes Qode Images Videos
*/
class StockholmQodeOptionsFramework implements iStockholmQodeRender {
	private $label;
	private $description;
	
	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}
	
	public function render( $factory ) {
		global $post;
		?>
		<div class="qodef-portfolio-additional-item-holder" style="display: none">
			<div class="qodef-portfolio-toggle-holder">
				<div class="qodef-portfolio-toggle qodef-toggle-desc">
					<span class="number">1</span><span class="qodef-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item ', 'stockholm' ); ?><em><?php esc_html_e( '(Order Number, Item Title)', 'stockholm' ); ?></em></span>
				</div>
				<div class="qodef-portfolio-toggle qodef-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="qodef-portfolio-toggle-content">
				<div class="qodef-page-form-section">
					<div class="qodef-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x">
								</div>
								<div class="col-lg-10">
									<em class="qodef-field-description"><?php esc_html_e( 'Item Title ', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="optionLabel_x" name="optionLabel_x">
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description"><?php esc_html_e( 'Item Text', 'stockholm' ); ?></em>
									<textarea class="form-control qodef-input qodef-form-element" id="optionValue_x" name="optionValue_x"></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="qodef-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'stockholm' ); ?></em>
									<input type="text" class="form-control qodef-input qodef-form-element" id="optionUrl_x" name="optionUrl_x">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$no         = 1;
		$portfolios = get_post_meta( $post->ID, 'qode_portfolios', true );
		if ( is_array( $portfolios ) && count( $portfolios ) > 1 ) {
			usort( $portfolios, "stockholm_qode_compare_portfolio_options" );
		}
		while ( isset( $portfolios[ $no - 1 ] ) ) {
			$portfolio = $portfolios[ $no - 1 ];
			?>
			<div class="qodef-portfolio-additional-item" rel="<?php echo esc_attr( $no ); ?>">
				<div class="qodef-portfolio-toggle-holder">
					<div class="qodef-portfolio-toggle qodef-toggle-desc">
						<span class="number"><?php echo esc_html( $no ); ?></span><span class="qodef-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item - ', 'stockholm' ); ?><em>(<?php echo esc_attr( stripslashes( $portfolio['optionlabelordernumber'] ) ); ?>, <?php echo esc_attr( stripslashes( $portfolio['optionLabel'] ) ); ?>)</em></span>
					</div>
					<div class="qodef-portfolio-toggle qodef-portfolio-control">
						<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
						<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="qodef-portfolio-toggle-content" style="display: none">
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-2">
										<em class="qodef-field-description"><?php esc_html_e( 'Order Number', 'stockholm' ); ?></em>
										<input type="text" class="form-control qodef-input qodef-form-element" id="optionlabelordernumber_<?php echo esc_attr( $no ); ?>" name="optionlabelordernumber[]" value="<?php echo isset( $portfolio['optionlabelordernumber'] ) ? esc_attr( stripslashes( $portfolio['optionlabelordernumber'] ) ) : ""; ?>">
									</div>
									<div class="col-lg-10">
										<em class="qodef-field-description"><?php esc_html_e( 'Item Title ', 'stockholm' ); ?></em>
										<input type="text" class="form-control qodef-input qodef-form-element" id="optionLabel_<?php echo esc_attr( $no ); ?>" name="optionLabel[]" value="<?php echo esc_attr( stripslashes( $portfolio['optionLabel'] ) ); ?>">
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="qodef-field-description"><?php esc_html_e( 'Item Text', 'stockholm' ); ?></em>
										<textarea class="form-control qodef-input qodef-form-element" id="optionValue_<?php echo esc_attr( $no ); ?>" name="optionValue[]"><?php echo esc_attr( stripslashes( $portfolio['optionValue'] ) ); ?></textarea>
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="qodef-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'stockholm' ); ?></em>
										<input type="text" class="form-control qodef-input qodef-form-element" id="optionUrl_<?php echo esc_attr( $no ); ?>" name="optionUrl[]" value="<?php echo esc_attr( stripslashes( $portfolio['optionUrl'] ) ); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no ++;
		}
		?>
		<div class="qodef-portfolio-add">
			<a class="qodef-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e( ' Add New Item', 'stockholm' ); ?></a>
			<a class="qodef-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( ' Expand All', 'stockholm' ); ?></a>
		</div>
		<?php
	}
}

class StockholmQodeSelectTwitterFramework implements iStockholmQodeRender {
	public function render( $factory ) {
		$twitterApi = StockholmQodeTwitterApi::getInstance();
		$message    = '';
		
		if ( ! empty( $_GET['oauth_token'] ) && ! empty( $_GET['oauth_verifier'] ) ) {
			if ( ! empty( $_GET['oauth_token'] ) ) {
				update_option( $twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token'] );
			}
			
			if ( ! empty( $_GET['oauth_verifier'] ) ) {
				update_option( $twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier'] );
			}
			
			$responseObj = $twitterApi->obtainAccessToken();
			if ( $responseObj->status ) {
				$message = esc_html__( 'You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'stockholm' );
			} else {
				$message = $responseObj->message;
			}
		}
		
		$buttonText = $twitterApi->hasUserConnected() ? esc_html__( 'Re-connect with Twitter', 'stockholm' ) : esc_html__( 'Connect with Twitter', 'stockholm' );
		?>
		<?php if ( $message !== '' ) { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html( $message ); ?></span>
			</div>
		<?php } ?>
		<div class="qodef-page-form-section" id="qodef_enable_social_share">
			<div class="qodef-field-desc">
				<h4><?php esc_html_e( 'Connect with Twitter', 'stockholm' ); ?></h4>
				<p><?php esc_html_e( 'Connecting with Twitter will enable you to show your latest tweets on your site', 'stockholm' ); ?></p>
			</div>
			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a id="qodef-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html( $buttonText ); ?></a>
							<input type="hidden" data-name="current-page-url" value="<?php echo esc_url( $twitterApi->buildCurrentPageURI() ); ?>"/>
							<?php wp_nonce_field( "stockholm_qode_twitter_connect", "stockholm_qode_twitter_connect" ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }
	
}

class StockholmQodeSelectInstagramFramework implements iStockholmQodeRender {
    public function render($factory) {
        $instagram_api = StockholmQodeInstagramApi::getInstance();
        $message = '';

        //check if code parameter and instagram parameter is set in URL
        if ( ! empty( $_GET['code'] ) && ! empty( $_GET['instagram'] ) ) {
            //update code option so we can use it later
            $instagram_api->setConnectionType( 'instagram' );
            $instagram_api->instagramStoreCode();
            $instagram_api->instagramExchangeCodeForToken();
            $message = esc_html__( 'You have successfully connected with your Instagram Personal account.', 'stockholm' );
        }

        //check if code parameter and instagram parameter is set in URL
        if ( ! empty( $_GET['access_token'] ) && ! empty( $_GET['facebook'] ) ) {
            //update code option so we can use it later
            $instagram_api->setConnectionType( 'facebook' );
            $instagram_api->facebookStoreToken();
            $message = esc_html__( 'You have successfully connected with your Instagram Business account.', 'stockholm' );
        }

        //check if code parameter and instagram parameter is set in URL
        if ( ! empty( $_GET['disconnect'] ) ) {
            //update code option so we can use it later
            $instagram_api->disconnect();
            $message = esc_html__( 'You have have been disconnected from all Instagram accounts.', 'stockholm' );

        }

        ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="qodef-page-form-section" id="qode_enable_social_share">

            <div class="qodef-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'stockholm'); ?></h4>

                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'stockholm'); ?></p>
            </div>
            <!-- close div.qodef-field-desc -->

            <div class="qodef-section-content">
                <div class="container-fluid">
                    <?php
                    $instagram_user_id = get_option($instagram_api::INSTAGRAM_USER_ID);
                    $connection_type   = get_option($instagram_api::CONNECTION_TYPE);

                    if ($instagram_user_id) { ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <p><?php echo esc_html__( 'You are currently connected to Instagram ID: ', 'stockholm' ); echo esc_attr($instagram_user_id) ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <?php if ( ! empty( $_GET['disconnect'] ) ) { ?>
                            <div class="col-lg-4">
                                <a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->reloadURL() ); ?>"><?php echo esc_html__( 'Reload Page', 'stockholm' ); ?></a>
                            </div>
                        <?php } else if ( empty( $connection_type ) ) { ?>
                            <div class="col-lg-4">
                                <a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->instagramRequestCode() ); ?>"><?php echo esc_html__( 'Connect with Instagram Personal account', 'stockholm' ); ?></a>
                            </div>
<!--                            <div class="col-lg-4">-->
<!--                                <a class="btn btn-primary" href="--><?php //echo esc_url( $instagram_api->facebookRequestCode() ); ?><!--">--><?php //echo esc_html__( 'Connect with Instagram Business account', 'stockholm' ); ?><!--</a>-->
<!--                            </div>-->
                        <?php } else { ?>
                            <div class="col-lg-4">
                                <a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->disconnectURL() ); ?>"><?php echo esc_html__( 'Disconnect Instagram account', 'stockholm' ) ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- close div.qodef-section-content -->

        </div>
    <?php }
}

class StockholmQodeImportExport implements iStockholmQodeRender {
	private $title;
	private $name;
	
	function __construct( $title_label = "", $name = "" ) {
		$this->title = $title_label;
		$this->name  = $name;
	}
	
	public function render( $factory ) { ?>
		<div id="qode-metaboxes-general" class="wrap qodef-page qodef-page-info">
			<div class="qodef-page-form">
				<div class="qodef-page-form-section-holder clearfix">
					<h3 class="qodef-page-section-title"><?php esc_html_e( 'Export/Import Options', 'stockholm' ); ?></h3>
					<div class="qodef-page-form-section">
						<div class="qodef-field-desc">
							<h4><?php esc_html_e( 'Export', 'stockholm' ); ?></h4>
							<p><?php esc_html_e( 'Copy the code from this field and save it to a textual file to export your options. Save that textual file somewhere so you can later use it to import options if necessary.', 'stockholm' ); ?></p>
						</div>
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<textarea name="export_theme_options" id="export_options" class="form-control qodef-form-element" rows="10" readonly><?php echo stockholm_qode_export_theme_options(); ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-field-desc">
							<h4><?php esc_html_e( 'Import', 'stockholm' ); ?></h4>
							<p><?php esc_html_e( 'To import options, just paste the code you previously saved from the "Export" field into this field, and then click the "Import" button.', 'stockholm' ); ?></p>
						</div>
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<textarea name="import_theme_options" id="import_theme_options" class="form-control qodef-form-element" rows="10"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<button type="button" class="btn btn-primary btn-sm " name="import" id="qodef-import-theme-options-btn" data-waiting-message="<?php esc_html_e( 'Please wait', 'stockholm' ); ?>" data-confirm-message="<?php esc_html_e( 'Are you sure, you want to import Options now?', 'stockholm' ); ?>"><?php esc_html_e( 'Import', 'stockholm' ); ?></button>
										<?php wp_nonce_field( 'qodef_import_theme_options_secret_value', 'qodef_import_theme_options_secret', false ); ?>
										<span class="qodef-bckp-message"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="alert alert-warning">
								<strong><?php esc_html_e( 'Important notes:', 'stockholm' ) ?></strong>
								<ul>
									<li><?php esc_html_e( 'Please note that import process will overide all your existing options.', 'stockholm' ); ?></li>
								</ul>
							</div>
						</div>
					</div>
				
				</div>
				<div class="qodef-page-form-section-holder clearfix">
					<h3 class="qodef-page-section-title"><?php esc_html_e( 'Export/Import Custom Sidebars', 'stockholm' ); ?></h3>
					<div class="qodef-page-form-section">
						<div class="qodef-field-desc">
							<h4><?php esc_html_e( 'Export', 'stockholm' ); ?></h4>
							<p><?php esc_html_e( 'Copy the code from this field and save it to a textual file to export your custom sidebars. Save that textual file somewhere so you can later use it to import custom sidebars if necessary.', 'stockholm' ); ?></p>
						</div>
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<textarea name="export_custom_sidebars" id="export_custom_sidebars" class="form-control qodef-form-element" rows="10" readonly><?php echo stockholm_qode_export_custom_sidebars(); ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-field-desc">
							<h4><?php esc_html_e( 'Import', 'stockholm' ); ?></h4>
							<p><?php esc_html_e( 'To import custom sidebars, just paste the code you previously saved from the "Export" field into this field, and then click the "Import" button.', 'stockholm' ); ?></p>
						</div>
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<textarea name="import_custom_sidebars" id="import_custom_sidebars" class="form-control qodef-form-element" rows="10"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<button type="button" class="btn btn-primary btn-sm " name="import" id="qodef-import-custom-sidebars-btn" data-waiting-message="<?php esc_html_e( 'Please wait', 'stockholm' ); ?>" data-confirm-message="<?php esc_html_e( 'Are you sure, you want to import Options now?', 'stockholm' ); ?>"><?php esc_html_e( 'Import', 'stockholm' ); ?></button>
										<?php wp_nonce_field( 'qodef_import_custom_sidebars_secret_value', 'qodef_import_custom_sidebars_secret', false ); ?>
										<span class="qodef-bckp-message"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="alert alert-warning">
								<strong><?php esc_html_e( 'Important notes:', 'stockholm' ) ?></strong>
								<ul>
									<li><?php esc_html_e( 'Please note that import process will overide all your existing custom sidebars.', 'stockholm' ); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="qodef-page-form-section-holder clearfix">
					<h3 class="qodef-page-section-title"><?php esc_html_e( 'Export/Import Widgets', 'stockholm' ); ?></h3>
					<div class="qodef-page-form-section">
						<div class="qodef-field-desc">
							<h4><?php esc_html_e( 'Export', 'stockholm' ); ?></h4>
							<p><?php esc_html_e( 'Copy the code from this field and save it to a textual file to export your widgets. Save that textual file somewhere so you can later use it to import widgets if necessary.', 'stockholm' ); ?></p>
						</div>
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<textarea name="export_theme_options" id="export_options" class="form-control qodef-form-element" rows="10" readonly><?php echo stockholm_qode_export_widgets_sidebars(); ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-field-desc">
							<h4><?php esc_html_e( 'Import', 'stockholm' ); ?></h4>
							<p><?php esc_html_e( 'To import widgets, just paste the code you previously saved from the "Export" field into this field, and then click the "Import" button.', 'stockholm' ); ?></p>
						</div>
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<textarea name="import_widgets" id="import_widgets" class="form-control qodef-form-element" rows="10"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
										<button type="button" class="btn btn-primary btn-sm " name="import" id="qodef-import-widgets-btn" data-waiting-message="<?php esc_html_e( 'Please wait', 'stockholm' ); ?>" data-confirm-message="<?php esc_html_e( 'Are you sure, you want to import Options now?', 'stockholm' ); ?>"><?php esc_html_e( 'Import', 'stockholm' ); ?></button>
										<?php wp_nonce_field( 'qodef_import_widgets_secret_value', 'qodef_import_widgets_secret', false ); ?>
										<span class="qodef-bckp-message"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="qodef-page-form-section">
						<div class="qodef-section-content">
							<div class="alert alert-warning">
								<strong><?php esc_html_e( 'Important notes:', 'stockholm' ) ?></strong>
								<ul>
									<li><?php esc_html_e( 'Please note that import process will overide all your existing widgets.', 'stockholm' ); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }
}