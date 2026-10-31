<?php
/*
Template Name: Landing Page
*/

$qodef_sidebar = stockholm_qode_get_sidebar_layout( false );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	
	<?php do_action( 'stockholm_qode_action_header_meta' ); ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'title' ); ?>
	<?php get_template_part( 'slider' ); ?>
	<div class="full_width" <?php stockholm_qode_inline_page_background_style(); ?>>
		<div class="full_width_inner" <?php stockholm_qode_inline_page_padding_style(); ?>>
			<?php if ( ( $qodef_sidebar == "default" ) || ( $qodef_sidebar == "" ) ) : ?>
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			<?php elseif ( $qodef_sidebar == "1" || $qodef_sidebar == "2" ): ?>
				<?php if ( $qodef_sidebar == "1" ) : ?>
					<div class="two_columns_66_33 clearfix grid2">
						<div class="column1">
				<?php elseif ( $qodef_sidebar == "2" ) : ?>
					<div class="two_columns_75_25 clearfix grid2">
						<div class="column1">
				<?php endif; ?>
							<?php if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
									<div class="column_inner">
										<?php the_content(); ?>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
						<div class="column2"><?php get_sidebar(); ?></div>
					</div>
			<?php elseif ( $qodef_sidebar == "3" || $qodef_sidebar == "4" ): ?>
				<?php if ( $qodef_sidebar == "3" ) : ?>
					<div class="two_columns_33_66 clearfix grid2">
						<div class="column1"><?php get_sidebar(); ?></div>
						<div class="column2">
				<?php elseif ( $qodef_sidebar == "4" ) : ?>
					<div class="two_columns_25_75 clearfix grid2">
						<div class="column1"><?php get_sidebar(); ?></div>
						<div class="column2">
				<?php endif; ?>
							<?php if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
									<div class="column_inner">
										<?php the_content(); ?>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
			<?php endif; ?>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>