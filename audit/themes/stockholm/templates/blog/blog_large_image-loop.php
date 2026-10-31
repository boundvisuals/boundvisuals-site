<?php
$_post_format = get_post_format();

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
						<?php get_template_part( 'templates/blog/post-info/title' ); ?>
						<?php get_template_part( 'templates/blog/post-info/content' ); ?>
						<?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
							<div class="post_social">
								<?php get_template_part( 'templates/blog/post-info/social-share' ); ?>
								<?php get_template_part( 'templates/blog/post-info/comment' ); ?>
								<?php get_template_part( 'templates/blog/post-info/like' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</article>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
						<?php get_template_part( 'templates/blog/post-info/title' ); ?>
						<?php get_template_part( 'templates/blog/post-info/content' ); ?>
						<?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
							<div class="post_social">
								<?php get_template_part( 'templates/blog/post-info/social-share' ); ?>
								<?php get_template_part( 'templates/blog/post-info/comment' ); ?>
								<?php get_template_part( 'templates/blog/post-info/like' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
				
			</div>
		</article>

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
						<?php get_template_part( 'templates/blog/post-info/title' ); ?>
						<?php get_template_part( 'templates/blog/post-info/content', 'filtered' ); ?>
						<?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
							<div class="post_social">
								<?php get_template_part( 'templates/blog/post-info/social-share' ); ?>
								<?php get_template_part( 'templates/blog/post-info/comment' ); ?>
								<?php get_template_part( 'templates/blog/post-info/like' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</article>
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
						<?php get_template_part( 'templates/blog/post-info/title', 'link' ); ?>
						<?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
							<div class="post_social">
								<?php get_template_part( 'templates/blog/post-info/social-share' ); ?>
								<?php get_template_part( 'templates/blog/post-info/comment' ); ?>
								<?php get_template_part( 'templates/blog/post-info/like' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</article>
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
							<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'post_format' => 'quote' ) ); ?>
							<?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
								<div class="post_social">
									<?php get_template_part( 'templates/blog/post-info/social-share' ); ?>
									<?php get_template_part( 'templates/blog/post-info/comment' ); ?>
									<?php get_template_part( 'templates/blog/post-info/like' ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</article>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<?php get_template_part( 'templates/blog/post-format/image' ); ?>
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
							<?php get_template_part( 'templates/blog/post-info/category' ); ?>
							<?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
						</div>
						<?php get_template_part( 'templates/blog/post-info/title' ); ?>
						<?php get_template_part( 'templates/blog/post-info/content' ); ?>
						<?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
							<div class="post_social">
								<?php get_template_part( 'templates/blog/post-info/social-share' ); ?>
								<?php get_template_part( 'templates/blog/post-info/comment' ); ?>
								<?php get_template_part( 'templates/blog/post-info/like' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</article>
<?php
}
?>

