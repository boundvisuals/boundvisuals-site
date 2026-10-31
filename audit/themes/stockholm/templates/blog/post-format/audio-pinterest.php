<?php if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail( 'full' ); ?>
		<span class="post_overlay"></span>
	</a>
<?php } ?>
<audio class="blog_audio" src="<?php echo esc_url( get_post_meta( get_the_ID(), "audio_link", true ) ); ?>" controls="controls">
	<?php esc_html_e( "Your browser don't support audio player", "stockholm" ); ?>
</audio>