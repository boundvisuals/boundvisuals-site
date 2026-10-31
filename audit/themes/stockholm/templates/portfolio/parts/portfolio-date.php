<?php

//get portfolio date value
$portfolio_hide_date = "";
if ( stockholm_qode_options()->getOptionValue( 'portfolio_hide_date' ) ) {
	$portfolio_hide_date = stockholm_qode_options()->getOptionValue( 'portfolio_hide_date' );
}

if ( $portfolio_hide_date != "yes" ) { ?>
	<div class="info portfolio_single_custom_date">
		<h6 class="info_section_title"><?php esc_html_e( 'Date', 'stockholm' ); ?></h6>
		<p><?php the_time( get_option( 'date_format' ) ); ?></p>
	</div>
<?php } ?>