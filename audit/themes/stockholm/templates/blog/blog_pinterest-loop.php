<?php
$_post_format = get_post_format();

switch ($_post_format) {
	case "video":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php get_template_part( 'templates/blog/post-format/video' ); ?>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/category' ); ?>
					</div>
					<?php get_template_part( 'templates/blog/post-info/content' ); ?>
					<?php if( stockholm_qode_is_author_info_enabled() || stockholm_qode_is_comments_enabled() ) { ?>
						<div class="post_author_holder">
							<?php get_template_part( 'templates/blog/post-info/author' ); ?>
							<?php get_template_part( 'templates/blog/post-info/comment-without-icon' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</article>

		<?php
		break;
	case "audio":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php get_template_part( 'templates/blog/post-format/audio', 'pinterest' ); ?>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/category' ); ?>
					</div>
					<?php get_template_part( 'templates/blog/post-info/content' ); ?>
					<?php if( stockholm_qode_is_author_info_enabled() || stockholm_qode_is_comments_enabled() ) { ?>
						<div class="post_author_holder">
							<?php get_template_part( 'templates/blog/post-info/author' ); ?>
							<?php get_template_part( 'templates/blog/post-info/comment-without-icon' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</article>
		<?php
		break;
	case "link":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part( 'templates/blog/post-format/image', 'pinterest' ); ?>
			<div class="post_content_holder">
				<div class="post_text">
					<div class="post_text_inner">
						<i class="link_mark fa fa-link pull-left"></i>
						<?php get_template_part( 'templates/blog/post-info/title', 'link' ); ?>
						<?php if( stockholm_qode_is_author_info_enabled() || stockholm_qode_is_comments_enabled() ) { ?>
							<div class="post_author_holder">
								<?php get_template_part( 'templates/blog/post-info/author' ); ?>
								<?php get_template_part( 'templates/blog/post-info/comment-without-icon' ); ?>
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
			<div class="post_image">
				<?php get_template_part( 'templates/blog/post-format/gallery', 'full' ); ?>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/category' ); ?>
					</div>
					<?php get_template_part( 'templates/blog/post-info/content', 'filtered' ); ?>
					<?php if( stockholm_qode_is_author_info_enabled() || stockholm_qode_is_comments_enabled() ) { ?>
						<div class="post_author_holder">
							<?php get_template_part( 'templates/blog/post-info/author' ); ?>
							<?php get_template_part( 'templates/blog/post-info/comment-without-icon' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</article>
		<?php
		break;
	case "quote":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part( 'templates/blog/post-format/image', 'pinterest' ); ?>
			<div class="post_content_holder">
				<div class="post_text">
					<div class="post_text_inner">
						<i class="qoute_mark icon_quotations pull-left"></i>
						<?php get_template_part( 'templates/blog/post-info/title', 'quote-2' ); ?>
						<?php if( stockholm_qode_is_author_info_enabled() || stockholm_qode_is_comments_enabled() ) { ?>
							<div class="post_author_holder">
								<?php get_template_part( 'templates/blog/post-info/author' ); ?>
								<?php get_template_part( 'templates/blog/post-info/comment-without-icon' ); ?>
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
			<?php get_template_part( 'templates/blog/post-format/image', 'pinterest' ); ?>
			<div class="post_text">
				<div class="post_text_inner">
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/category' ); ?>
					</div>
					<?php get_template_part( 'templates/blog/post-info/content' ); ?>
					<?php if( stockholm_qode_is_author_info_enabled() || stockholm_qode_is_comments_enabled() ) { ?>
						<div class="post_author_holder">
							<?php get_template_part( 'templates/blog/post-info/author' ); ?>
							<?php get_template_part( 'templates/blog/post-info/comment-without-icon' ); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</article>
		<?php
}
?>

