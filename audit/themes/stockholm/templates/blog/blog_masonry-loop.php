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
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/date' ); ?>
					</div>
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<?php get_template_part( 'templates/blog/post-info/content' ); ?>
					<div class="post_author_holder">
						<?php get_template_part( 'templates/blog/post-info/author' ); ?>
					</div>
				</div>
			</div>
		</article>

		<?php
		break;
	case "audio":
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_image">
				<?php get_template_part( 'templates/blog/post-format/audio' ); ?>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/date' ); ?>
					</div>
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<?php get_template_part( 'templates/blog/post-info/content' ); ?>
					<div class="post_author_holder">
						<?php get_template_part( 'templates/blog/post-info/author' ); ?>
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
						<i class="link_mark fa fa-link pull-left"></i>
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
						</div>
						<?php get_template_part( 'templates/blog/post-info/title', 'link' ); ?>
						<div class="post_author_holder">
							<?php get_template_part( 'templates/blog/post-info/author' ); ?>
						</div>
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
				<?php get_template_part( 'templates/blog/post-format/gallery', 'portfolio-default' ); ?>
			</div>
			<div class="post_text">
				<div class="post_text_inner">
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/date' ); ?>
					</div>
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<?php get_template_part( 'templates/blog/post-info/content', 'filtered' ); ?>
					<div class="post_author_holder">
						<?php get_template_part( 'templates/blog/post-info/author' ); ?>
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
						<i class="qoute_mark icon_quotations pull-left"></i>
						<div class="post_info">
							<?php get_template_part( 'templates/blog/post-info/date' ); ?>
						</div>
						<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'post_format' => 'quote' ) ); ?>
						<div class="post_author_holder">
							<?php get_template_part( 'templates/blog/post-info/author' ); ?>
						</div>
					</div>
				</div>
			</div>
		</article>
		<?php
		break;
	default:
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post_image">
					<a href="<?php the_permalink(); ?>" target="_self" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('portfolio-default'); ?>
						<span class="post_overlay">
							<i class="icon_plus" aria-hidden="true"></i>
						</span>
					</a>
				</div>
			<?php } ?>
			<div class="post_text">
				<div class="post_text_inner">
					<div class="post_info">
						<?php get_template_part( 'templates/blog/post-info/date' ); ?>
					</div>
					<?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4' ) ); ?>
					<?php get_template_part( 'templates/blog/post-info/content' ); ?>
					<div class="post_author_holder">
						<?php get_template_part( 'templates/blog/post-info/author' ); ?>
					</div>
				</div>
			</div>
		</article>
		<?php
}
?>