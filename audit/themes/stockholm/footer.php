<?php get_template_part( 'framework/modules/footer/content-bottom' ); ?>
</div>
</div>
<?php if ( stockholm_qode_is_footer_top_enabled() || stockholm_qode_is_footer_bottom_enabled() ) { ?>
	<footer class="qodef-page-footer <?php echo esc_attr( stockholm_qode_get_footer_holder_classes() ); ?>">
		<div class="footer_inner clearfix">
			<?php get_template_part( 'framework/modules/footer/footer-top' ); ?>
			<?php get_template_part( 'framework/modules/footer/footer-bottom' ); ?>
		</div>
	</footer>
<?php } ?>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>