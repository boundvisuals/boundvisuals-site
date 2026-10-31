<?php if ( stockholm_qode_is_search_enabled() && stockholm_qode_get_search_type() == "from_window_top" ) { ?>
	<form role="search" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qode_search_form" method="get">
		<?php if ( stockholm_qode_get_header_in_grid() ){ ?>
		<div class="container">
			<div class="container_inner clearfix">
				<?php } ?>
				<i class="fa fa-search"></i>
				<input type="text" placeholder="<?php esc_attr_e( 'Search', 'stockholm' ); ?>" name="s" class="qode_search_field" autocomplete="off"/>
				<input type="submit" value="<?php esc_attr_e( 'Import', 'stockholm' ) ?>"/>
				<div class="qode_search_close">
					<a href="#"><i class="fa fa-times"></i></a>
				</div>
				<?php if ( stockholm_qode_get_header_in_grid() ){ ?>
			</div>
		</div>
	<?php } ?>
	</form>
<?php } ?>