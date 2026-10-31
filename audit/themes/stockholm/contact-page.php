<?php 
/*
Template Name: Contact Page
*/

get_header();

$google_map_is_enabled    = stockholm_qode_options()->getOptionValue( 'enable_google_map' ) == "yes";
$google_maps_scroll_wheel = stockholm_qode_options()->getOptionValue( 'google_maps_scroll_wheel' ) == "yes";
$google_map_position      = stockholm_qode_options()->getOptionValue( 'google_map_position' ) ? stockholm_qode_options()->getOptionValue( 'google_map_position' ) : 'bottom_position';

$container_classes = array();
if ( $google_map_is_enabled ) {
	$container_classes[] = "full_map";
}

if ( $google_map_is_enabled && ( $google_map_position == "right_position" || $google_map_position == "left_position" ) ) {
	$container_classes[] = 'map_lr map_' . $google_map_position;
}

$show_section = "yes";
if ( stockholm_qode_options()->getOptionValue( 'section_between_map_form' ) ) {
	$show_section = stockholm_qode_options()->getOptionValue( 'section_between_map_form' );
}
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php if ( $google_map_is_enabled && $google_map_position == "top_position" ) { ?>
		<div class="google_map_holder">
			<?php if ( ! $google_maps_scroll_wheel ) { ?>
				<div class="google_map_ovrlay"></div>
			<?php } ?>
			<div class="q_google_map" id="map_canvas"></div>
		</div>
	<?php } ?>

    <div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
        <div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
            <div class="contact_info">
				<?php the_content(); ?>
			</div>
        </div>
    </div>

	<?php if ( $show_section == "yes" || stockholm_qode_options()->getOptionValue( 'enable_contact_form' ) == "yes" ) { ?>
		<div class="container" <?php stockholm_qode_inline_page_background_style(); ?>>
			<div class="container_inner clearfix q_contact_page default_template_holder <?php echo esc_attr( implode( ' ', $container_classes ) ); ?>">
				<div class="contact_detail">
					<?php if ( $show_section == "yes" ) { ?>
						<div class="contact_section <?php if ( stockholm_qode_options()->getOptionValue( 'contact_section_text_align' ) !== '' ) { echo esc_attr( stockholm_qode_options()->getOptionValue( 'contact_section_text_align' ) ); } ?>">
							<?php if ( stockholm_qode_options()->getOptionValue( 'contact_section_above_form_subtitle' ) !== "" ) { ?>
								<h4><?php echo wp_kses_post( stockholm_qode_options()->getOptionValue( 'contact_section_above_form_subtitle' ) ); ?></h4>
							<?php } ?>
							
							<?php if ( stockholm_qode_options()->getOptionValue( 'contact_section_above_form_title' ) !== "" ) { ?>
								<h2><?php echo wp_kses_post( stockholm_qode_options()->getOptionValue( 'contact_section_above_form_title' ) ); ?></h2>
							<?php } ?>
						</div>
					<?php } ?>
					<?php do_action('stockholm_qode_action_contact_page_above_map') ?>
				</div>
				<!-- Contact form right/left -->
				<?php if ( $google_map_is_enabled == "yes" && ( $google_map_position == "right_position" || $google_map_position == "left_position" ) ) { ?>
					<div class="google_map_holder">
						<?php if ( ! $google_maps_scroll_wheel ) { ?>
							<div class="google_map_ovrlay"></div>
						<?php } ?>
						<div class="q_google_map" id="map_canvas"></div>
					</div>
				<?php } ?>
			</div>	
	    </div>
	    <?php } ?>
		<?php if ( $google_map_is_enabled && $google_map_position == "bottom_position" ) { ?>
			<div class="google_map_holder">
				<?php if ( ! $google_maps_scroll_wheel ) { ?>
					<div class="google_map_ovrlay"></div>
				<?php } ?>
				<div class="q_google_map" id="map_canvas"></div>
			</div>
		<?php } ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>