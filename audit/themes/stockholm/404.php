<?php get_header(); ?>
<div class="container">
	<div class="container_inner q_404_page default_template_holder">
		<div class="page_not_found">
			<h2><?php if ( stockholm_qode_options()->getOptionValue( '404_title' ) ) : echo wp_kses_post( stockholm_qode_options()->getOptionValue( '404_title' ) ); else: ?><?php esc_html_e( 'Page you are looking is Not Found', 'stockholm' ); ?><?php endif; ?></h2>
			<h4><?php if ( stockholm_qode_options()->getOptionValue( '404_text' ) ) : echo wp_kses_post( stockholm_qode_options()->getOptionValue( '404_text' ) ); else: ?><?php esc_html_e( 'The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site’s homepage and see if you can find what you are looking for.', 'stockholm' ); ?><?php endif; ?></h4>
			<a class="qbutton with-shadow" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( stockholm_qode_options()->getOptionValue( '404_backlabel' ) ): echo esc_html( stockholm_qode_options()->getOptionValue( '404_backlabel' ) ); else: ?><?php esc_html_e( 'Back to homepage', 'stockholm' ); ?><?php endif; ?></a>
		</div>
	</div>
</div>
<?php get_footer(); ?>