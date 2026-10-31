<section class="side_menu right">
	<?php if ( stockholm_qode_options()->getOptionValue( 'side_area_title' ) !== "" ) { ?>
		<div class="side_menu_title">
			<h5><?php echo wp_kses_post( stockholm_qode_options()->getOptionValue( 'side_area_title' )  ); ?></h5>
		</div>
	<?php } ?>
	<?php if ( stockholm_qode_options()->getOptionValue( 'sidearea_close_icon_type' ) == 'fold' ) { ?>
		<a href="#" class="close_side_menu_fold"><i class="line">&nbsp;</i></a>
	<?php } else { ?>
		<a href="#" class="close_side_menu"></a>
	<?php } ?>
	<?php dynamic_sidebar( 'sidearea' ); ?>
</section>