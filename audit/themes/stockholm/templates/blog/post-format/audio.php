<audio class="blog_audio" src="<?php echo esc_url( get_post_meta( get_the_ID(), "audio_link", true ) ); ?>" controls="controls">
	<?php esc_html_e( "Your browser don't support audio player", "stockholm" ); ?>
</audio>