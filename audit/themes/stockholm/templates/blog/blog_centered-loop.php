<?php
$_post_format = get_post_format();

switch ($_post_format) {
    case "video":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
	                    <?php get_template_part( 'templates/blog/post-format/video' ); ?>
                    </div>
                <?php } ?>
                <div class="post_text">
                    <div class="post_text_inner">
	                    <?php get_template_part( 'templates/blog/post-info/category' ); ?>
	                    <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3' ) ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/author' ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/content' ); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="qbutton qode-blog-centered-button"><?php esc_html_e('Continue Reading', 'stockholm') ?></a>
                        <div class="post_info_bottom clearfix">
	                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/date', '', array( 'holder_tag' => 'div', 'enable_date' => true ) ); ?>
                            <?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
                                <div class="post_social">
                                    <?php get_template_part( 'templates/blog/post-info/social-share-list' ); ?>
                                    <?php get_template_part( 'templates/blog/post-info/comment' ); ?>
                                    <?php get_template_part( 'templates/blog/post-info/like' ); ?>
                                </div>
                            <?php } ?>
                        </div>
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
	                    <?php get_template_part( 'templates/blog/post-info/category' ); ?>
	                    <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3' ) ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/author' ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/content' ); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="qbutton qode-blog-centered-button"><?php esc_html_e('Continue Reading', 'stockholm') ?></a>
                        <div class="post_info_bottom clearfix">
	                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/date', '', array( 'holder_tag' => 'div', 'enable_date' => true ) ); ?>
	                        <?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
		                        <div class="post_social">
			                        <?php get_template_part( 'templates/blog/post-info/social-share-list' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/comment' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/like' ); ?>
		                        </div>
	                        <?php } ?>
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
            <div class="post_content_holder">
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="post_image">
	                    <?php get_template_part( 'templates/blog/post-format/gallery' ); ?>
                    </div>
                <?php } ?>
                <div class="post_text">
                    <div class="post_text_inner">
	                    <?php get_template_part( 'templates/blog/post-info/category' ); ?>
	                    <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3' ) ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/author' ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/content', 'filtered' ); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="qbutton qode-blog-centered-button"><?php esc_html_e('Continue Reading', 'stockholm') ?></a>
                        <div class="post_info_bottom clearfix">
	                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/date', '', array( 'holder_tag' => 'div', 'enable_date' => true ) ); ?>
	                        <?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
		                        <div class="post_social">
			                        <?php get_template_part( 'templates/blog/post-info/social-share-list' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/comment' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/like' ); ?>
		                        </div>
	                        <?php } ?>
                        </div>
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
	                    <?php get_template_part( 'templates/blog/post-info/category' ); ?>
	                    <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3' ) ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/author' ); ?>
                        <div class="post_info_bottom clearfix">
	                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/date', '', array( 'holder_tag' => 'div', 'enable_date' => true ) ); ?>
	                        <?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
		                        <div class="post_social">
			                        <?php get_template_part( 'templates/blog/post-info/social-share-list' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/comment' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/like' ); ?>
		                        </div>
	                        <?php } ?>
                        </div>
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
	                    <?php get_template_part( 'templates/blog/post-info/category' ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/title', 'h3-quote' ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/author' ); ?>
                        <div class="post_info_bottom clearfix">
	                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/date', '', array( 'holder_tag' => 'div', 'enable_date' => true ) ); ?>
	                        <?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
		                        <div class="post_social">
			                        <?php get_template_part( 'templates/blog/post-info/social-share-list' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/comment' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/like' ); ?>
		                        </div>
	                        <?php } ?>
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
            <div class="post_content_holder">
	            <?php get_template_part( 'templates/blog/post-format/image' ); ?>
                <div class="post_text">
                    <div class="post_text_inner">
	                    <?php get_template_part( 'templates/blog/post-info/category' ); ?>
	                    <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h3' ) ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/author' ); ?>
	                    <?php get_template_part( 'templates/blog/post-info/content' ); ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="qbutton qode-blog-centered-button"><?php esc_html_e('Continue Reading', 'stockholm') ?></a>
                        <div class="post_info_bottom clearfix">
	                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/date', '', array( 'holder_tag' => 'div', 'enable_date' => true ) ); ?>
	                        <?php if( stockholm_qode_is_social_share_enabled() || stockholm_qode_is_comments_enabled() || stockholm_qode_is_like_enabled()) { ?>
		                        <div class="post_social">
			                        <?php get_template_part( 'templates/blog/post-info/social-share-list' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/comment' ); ?>
			                        <?php get_template_part( 'templates/blog/post-info/like' ); ?>
		                        </div>
	                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php
}
?>

