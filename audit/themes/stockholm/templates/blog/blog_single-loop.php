<?php
$qode_post_classes = '';
$_post_format      = get_post_format();

if ( stockholm_qode_options()->getOptionValue( 'blog_single_audio_style' ) !== "" && $_post_format === 'audio' ) {
	$qode_post_classes = stockholm_qode_options()->getOptionValue( 'blog_single_audio_style' ) ;
}

	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_image">
					<?php get_template_part( 'templates/blog/post-format/video' ); ?>
				</div>
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
							<?php get_template_part( 'templates/blog/post-info/category' ); ?>
							<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
						</div>
						<div class="post_content">
							<?php get_template_part( 'templates/blog/post-info/title' ); ?>
							<?php the_content(); ?>
							<div class="clear"></div>
							<?php get_template_part( 'templates/blog/post-info/social-share', 'single' ); ?>
						</div>
					</div>
				</div>
			</div>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( $qode_post_classes ); ?>>
			<div class="post_content_holder">
				<div class="post_image">
					<?php get_template_part( 'templates/blog/post-format/audio' ); ?>
				</div>
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
							<?php get_template_part( 'templates/blog/post-info/category' ); ?>
							<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
						</div>
						<div class="post_content">
							<?php get_template_part( 'templates/blog/post-info/title' ); ?>
							<?php the_content(); ?>
							<div class="clear"></div>
							<?php get_template_part( 'templates/blog/post-info/social-share', 'single' ); ?>
						</div>
					</div>
				</div>
			</div>
	
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
							<?php get_template_part( 'templates/blog/post-info/category' ); ?>
							<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
						</div>
						<div class="post_title">
							<h3>
								<a href="<?php echo esc_url( get_post_meta( get_the_ID(), "title_link", true ) != '' ? get_post_meta( get_the_ID(), "title_link", true ) : '#' ); ?>" target="_blank"><?php the_title(); ?></a>
							</h3>
						</div>
					</div>
					<div class="post_content">
						<?php the_content(); ?>
						<div class="clear"></div>
						<?php get_template_part( 'templates/blog/post-info/social-share', 'single' ); ?>
					</div>
				</div>
			</div>
<?php
		break;
		case "gallery":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_image">
					<?php get_template_part( 'templates/blog/post-format/gallery' ); ?>
				</div>
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
							<?php get_template_part( 'templates/blog/post-info/category' ); ?>
							<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
						</div>
						<div class="post_content">
							<?php get_template_part( 'templates/blog/post-info/title' ); ?>
							<?php get_template_part( 'templates/blog/post-info/content', 'filtered-simple' ); ?>
							<?php get_template_part( 'templates/blog/post-info/social-share', 'single' ); ?>
						</div>
					</div>
				</div>
			</div>
		
<?php
		break;
		case "quote":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_content_holder">
					<div class="post_text">
						<div class="post_text_inner">
							<div class="post_info">
								<?php get_template_part( 'templates/blog/post-info/date' ); ?>
								<?php get_template_part( 'templates/blog/post-info/category' ); ?>
								<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
							</div>
							<div class="post_title">
								<h3>
									<?php echo get_post_meta(get_the_ID(), "quote_format", true); ?>
									<span class="quote_author">&mdash; <?php the_title(); ?></span>
								</h3>
							</div>		
						</div>
						<div class="post_content">
							<?php the_content(); ?>
							<div class="clear"></div>
							<?php get_template_part( 'templates/blog/post-info/social-share', 'single' ); ?>
						</div>
					</div>
				</div>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<?php if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
					get_template_part( 'templates/blog/post-format/image' );
				} ?>
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
							<?php get_template_part( 'templates/blog/post-info/category' ); ?>
							<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
						</div>
						<div class="post_content">
							<?php get_template_part( 'templates/blog/post-info/title' ); ?>
							<?php the_content(); ?>
							<div class="clear"></div>
							<?php get_template_part( 'templates/blog/post-info/social-share', 'single' ); ?>
						</div>
					</div>
				</div>
			</div>
<?php
}
?>
			<?php if ( has_tag() ) { ?>
				<div class="single_tags clearfix">
					<div class="tags_text">
						<h5><?php esc_html_e( 'Tags:', 'stockholm' ); ?></h5>
						<?php the_tags( '', '', '' ); ?>
					</div>
				</div>
			<?php } ?>
			<?php stockholm_qode_wp_link_pages(); ?>
			<?php if ( stockholm_qode_options()->getOptionValue( 'blog_author_info' ) == "yes" ) { ?>
				<div class="author_description">
					<div class="author_description_inner">
						<div class="image">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 102 ); ?>
						</div>
						<div class="author_text_holder">
							<h4 class="author_name">
								<?php if ( get_the_author_meta( 'first_name' ) != "" || get_the_author_meta( 'last_name' ) != "" ) {
									echo get_the_author_meta( 'first_name' ) . " " . get_the_author_meta( 'last_name' );
								} else {
									echo get_the_author_meta( 'display_name' );
								} ?>
							</h4>
							<?php if ( stockholm_qode_options()->getOptionValue( 'disable_author_info_email' ) != "yes" ) { ?>
								<span class="author_email"><?php echo get_the_author_meta( 'email' ); ?></span>
							<?php } ?>
							<?php if ( get_the_author_meta( 'description' ) != "" ) { ?>
								<div class="author_text">
									<p><?php echo get_the_author_meta( 'description' ) ?></p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
</article>