<?php
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();
	//is current portfolio template full width?
	if ( ! in_array( stockholm_qode_get_portfolio_template(), stockholm_qode_get_portfolio_full_width_templates() ) ) {
		//load general portfolio structure which will load proper template
		get_template_part( 'templates/portfolio/portfolio-structure' );
	} else {
		//load custom full width template that doesn't have anything in common with other
		get_template_part( 'templates/portfolio/portfolio', stockholm_qode_get_portfolio_template() );
	}
endwhile; endif;

get_footer();