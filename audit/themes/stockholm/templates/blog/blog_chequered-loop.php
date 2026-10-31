<?php
$_post_format  = get_post_format();
$post_bg_color = get_post_meta( get_the_ID(), "qode_blog_chequered_color", true );
$holder_styles = array();

if ( $post_bg_color != '' ) {
	$holder_styles[] = 'background-color: ' . esc_attr( $post_bg_color );
	$post_class     = 'qodef-with-bg-color';
} else {
	$holder_styles[] = 'background-image: url("' . esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) . '")';
	$post_class     = 'qodef-with-bg-image';
}

switch ( $_post_format ) {
	case "video": ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
		    <div class="qodef-post-content" <?php stockholm_qode_inline_style( $holder_styles ); ?>>
		        <span class="qodef-post-content-overlay"></span>
		        <div class="qodef-post-content-inner">
		            <div class="qodef-post-text">
		                <div class="qodef-post-text-inner">
			                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'has_date' => true ) ); ?>
			                <div class="post_info">
				                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
			                </div>
		                    <?php stockholm_qode_excerpt(); ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>
		<?php
		break;
	case "audio": ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
		    <div class="qodef-post-content" <?php stockholm_qode_inline_style( $holder_styles ); ?>>
		        <span class="qodef-post-content-overlay"></span>
		        <div class="qodef-post-content-inner">
		            <div class="qodef-post-text">
		                <div class="qodef-post-text-inner">
			                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'has_date' => true ) ); ?>
			                <div class="post_info">
				                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
			                </div>
			                <?php stockholm_qode_excerpt(); ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>
		<?php
		break;
	case "gallery": ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
		    <div class="qodef-post-content" <?php stockholm_qode_inline_style( $holder_styles ); ?>>
		        <span class="qodef-post-content-overlay"></span>
		        <div class="qodef-post-content-inner">
		            <div class="qodef-post-text">
		                <div class="qodef-post-text-inner">
			                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'has_date' => true ) ); ?>
			                <div class="post_info">
				                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
			                </div>
			                <?php stockholm_qode_excerpt(); ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>
		<?php
		break;
	case "link": ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
		    <div class="qodef-post-content" <?php stockholm_qode_inline_style( $holder_styles ); ?>>
		        <span class="qodef-post-content-overlay"></span>
		        <div class="qodef-post-content-inner">
		            <div class="qodef-post-text">
		                <div class="qodef-post-text-inner">
			                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'has_date' => true ) ); ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>
		<?php
		break;
	case "quote": ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
		    <div class="qodef-post-content" <?php stockholm_qode_inline_style( $holder_styles ); ?>>
		        <span class="qodef-post-content-overlay"></span>
		        <div class="qodef-post-content-inner">
		            <div class="qodef-post-text">
		                <div class="qodef-post-text-inner">
			                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'post_format' => 'quote', 'has_date' => true ) ); ?>
			                <span class="quote_author">&ndash; <?php the_title(); ?></span>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>
		<?php
		break;
	default: ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
		    <div class="qodef-post-content" <?php stockholm_qode_inline_style( $holder_styles ); ?>>
		        <span class="qodef-post-content-overlay"></span>
		        <div class="qodef-post-content-inner">
		            <div class="qodef-post-text">
		                <div class="qodef-post-text-inner">
			                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3', 'has_date' => true ) ); ?>
			                <div class="post_info">
				                <?php stockholm_qode_get_template_part( 'templates/blog/post-info/author', '', array( 'holder_tag' => 'span' ) ); ?>
			                </div>
			                <?php stockholm_qode_excerpt(); ?>
		                </div>
		            </div>
		        </div>
		    </div>
		</article>
	<?php
}
?>