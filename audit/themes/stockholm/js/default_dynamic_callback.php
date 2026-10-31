<?php
$root = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} else {
	$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
	if ( file_exists( $root.'/wp-load.php' ) ) {
    	require_once( $root.'/wp-load.php' );
	}
}
header('Content-type: application/x-javascript');
$stockholm_options = stockholm_qode_return_global_options();
?>
function ajaxSubmitCommentForm(){
	"use strict";

	var options = { 
		success: function(){
			$j("#commentform textarea").val("");
			$j("#commentform .success p").text("<?php esc_html_e('Comment has been sent!','stockholm'); ?>");
		}
	}; 
	
	$j('#commentform').submit(function() {
		$j(this).find('input[type="submit"]').next('.success').remove();
		$j(this).find('input[type="submit"]').after('<div class="success"><p></p></div>');
		$j(this).ajaxSubmit(options); 
		return false; 
	}); 
}
var header_height = 100;
var min_header_height_scroll = 57;
var min_header_height_fixed_hidden = 50;
var min_header_height_sticky = 60;
var scroll_amount_for_sticky = 85;
var content_line_height = 60;
var header_bottom_border_weight = 1;
var scroll_amount_for_fixed_hiding = 200;
var paspartu_width_init = 0.02;
var search_header_height = 50;

<?php if(isset($stockholm_options['header_height'])){
	if (!empty($stockholm_options['header_height'])) { ?>
	header_height = <?php echo intval($stockholm_options['header_height']); ?>;
<?php } } ?>
<?php if(isset($stockholm_options['header_height_scroll'])){
	if (!empty($stockholm_options['header_height_scroll'])) { ?>
	min_header_height_scroll = <?php echo intval($stockholm_options['header_height_scroll']); ?>;
<?php } } ?>
<?php if(isset($stockholm_options['header_height_sticky'])){
	if (!empty($stockholm_options['header_height_sticky'])) { ?>
	min_header_height_sticky = <?php echo intval($stockholm_options['header_height_sticky']); ?>;
<?php } } ?>
<?php if(isset($stockholm_options['scroll_amount_for_sticky'])){
	if (!empty($stockholm_options['scroll_amount_for_sticky'])) { ?>
	scroll_amount_for_sticky = <?php echo intval($stockholm_options['scroll_amount_for_sticky']); ?>;
<?php } } ?>
<?php if(isset($stockholm_options['content_menu_lineheight'])){
if($stockholm_options['content_menu_lineheight'] != ""){ ?>
	content_line_height = <?php echo intval($stockholm_options['content_menu_lineheight']); ?>
<?php } } ?>
<?php if(isset($stockholm_options['scroll_amount_for_fixed_hiding'])){
    if (!empty($stockholm_options['scroll_amount_for_fixed_hiding'])) { ?>
        scroll_amount_for_fixed_hiding = <?php echo intval($stockholm_options['scroll_amount_for_fixed_hiding']); ?>;
<?php } } ?>
var logo_height = 130; // stockholm logo height
var logo_width = 280; // stockholm logo width
<?php if ( isset( $stockholm_options['logo_image'] ) && ! empty( $stockholm_options['logo_image'] ) ) {
	$image_dimension = stockholm_qode_get_image_dimensions( $stockholm_options['logo_image'] );
	
	if ( ! empty( $image_dimension ) ) { ?>
		logo_height  = <?php echo intval( $image_dimension['height'] ); ?>;
		logo_width = <?php echo intval( $image_dimension['width'] ); ?>;
	<?php }
} ?>
header_top_height = <?php echo intval( stockholm_qode_return_top_header_height() ); ?>;

<?php if(isset($stockholm_options['paspartu_width']) && $stockholm_options['paspartu_width'] !== ""){ ?>
	paspartu_width_init = <?php echo esc_attr($stockholm_options['paspartu_width'])/100; ?>;
<?php } ?>

<?php if(isset($stockholm_options['search_text_line_height']) && $stockholm_options['search_text_line_height'] !== ""){ ?>
	search_header_height = <?php echo intval($stockholm_options['search_text_line_height']) + 15 + 15 ; ?>; //15 is margin top and margin bottom
<?php } ?>

var loading_text;
loading_text = '<?php esc_attr_e('Loading new posts...', 'stockholm'); ?>';
var finished_text;
finished_text = '<?php esc_attr_e('No more posts', 'stockholm'); ?>';
<?php
if($stockholm_options['enable_google_map'] != ""){
?>

var piechartcolor;
piechartcolor	= "#e6ae48";
<?php
if(isset($stockholm_options['first_color']) && !empty($stockholm_options['first_color'])){ ?>
	piechartcolor = "<?php echo esc_attr($stockholm_options['first_color']); ?>";
<?php } ?>

var geocoder;
var map;

function initialize() {
	"use strict";
  // Create an array of styles.
<?php
$google_maps_color = "#393939";
if(isset($stockholm_options['google_maps_color'])){
	if (!empty($stockholm_options['google_maps_color']))
		$google_maps_color = $stockholm_options['google_maps_color'];
}
$google_maps_saturation = "-100";
if(isset($stockholm_options['google_maps_saturation'])){
	if (!empty($stockholm_options['google_maps_saturation']))
		$google_maps_saturation = $stockholm_options['google_maps_saturation'];
}
$google_maps_lightness = "-60";
if(isset($stockholm_options['google_maps_lightness'])){
	if (!empty($stockholm_options['google_maps_lightness']))
		$google_maps_lightness = $stockholm_options['google_maps_lightness'];
}
?>
  var mapStyles = [
    {
      stylers: [
				{hue: "<?php echo esc_attr($google_maps_color); ?>" },
				{saturation: "<?php echo esc_attr($google_maps_saturation); ?>"},
				{lightness: "<?php echo esc_attr($google_maps_lightness); ?>"},
				{gamma: 1}
			]
    }
  ];
  var qodeMapType = new google.maps.StyledMapType(mapStyles,
    {name: "Qode Map"});

	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(-34.397, 150.644);
	var myOptions = {
<?php
$google_maps_scroll_wheel = false;
if(isset($stockholm_options['google_maps_scroll_wheel'])){
	if ($stockholm_options['google_maps_scroll_wheel'] == "yes")
		$google_maps_scroll_wheel = true;
}
$google_maps_zoom = 12;
if(isset($stockholm_options['google_maps_zoom'])){
	if (intval($stockholm_options['google_maps_zoom']) > 0)
		$google_maps_zoom = intval($stockholm_options['google_maps_zoom']);
}
?>
		zoom: <?php echo esc_attr($google_maps_zoom); ?>,
		<?php if (!$google_maps_scroll_wheel) { ?>
		scrollwheel: false,
		<?php } ?>
		center: latlng,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.RIGHT_CENTER
		},
		scaleControl: false,
			scaleControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		streetViewControl: false,
			streetViewControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		panControl: false,
		panControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		mapTypeControl: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'qode_style'],
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
<?php
	$google_maps_style = true;
	if ( isset( $stockholm_options['google_maps_style'] ) && $stockholm_options['google_maps_style'] == "no" ) {
		$google_maps_style = false;
	}
?>
		<?php if ($google_maps_style) { ?>
		mapTypeId: 'qode_style'
		<?php } else { ?>
		mapTypeId: google.maps.MapTypeId.ROADMAP
		<?php } ?>
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	<?php if ($google_maps_style) { ?>
  map.mapTypes.set('qode_style', qodeMapType);
	<?php } ?>
}

function codeAddress(data) {
	"use strict";
	
	if (data === '')
		return;

	var contentString = '<div id="content"><div id="siteNotice"></div><div id="bodyContent"><p>'+data+'</p></div></div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	geocoder.geocode( { 'address': data}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: map, 
				position: results[0].geometry.location,
				<?php if(isset($stockholm_options['google_maps_pin_image'])){ ?>
				icon:  '<?php echo esc_url($stockholm_options['google_maps_pin_image']); ?>',
				<?php } ?>
				title: data['store_title']
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
		}
	});
}

var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

	showContactMap();
});
<?php
}
?>

function showContactMap() {
	"use strict";

	if($j("#map_canvas").length > 0 && typeof google === 'object'){
		initialize();
		codeAddress("<?php if(isset($stockholm_options['google_maps_address5'])) { echo esc_attr($stockholm_options['google_maps_address5']); } ?>");
		codeAddress("<?php if(isset($stockholm_options['google_maps_address4'])) { echo esc_attr($stockholm_options['google_maps_address4']); } ?>");
		codeAddress("<?php if(isset($stockholm_options['google_maps_address3'])) { echo esc_attr($stockholm_options['google_maps_address3']); } ?>");
		codeAddress("<?php if(isset($stockholm_options['google_maps_address2'])) { echo esc_attr($stockholm_options['google_maps_address2']); } ?>");
		codeAddress("<?php if(isset($stockholm_options['google_maps_address'])) { echo esc_attr($stockholm_options['google_maps_address']); } ?>");
	}
}

var no_ajax_pages = [];
var qode_root = '<?php echo esc_url(home_url('/')); ?>';
var theme_root = '<?php echo QODE_ROOT; ?>';
<?php if(stockholm_qode_get_header_style_class() != ''){ ?>
var header_style_admin = "<?php echo esc_attr(stockholm_qode_get_header_style_class()); ?>";
<?php }else{ ?>
var header_style_admin = "";
<?php } ?>
if(typeof no_ajax_obj !== 'undefined') {
	no_ajax_pages = no_ajax_obj.no_ajax_pages;
}