<?php
$_post_format = get_post_format();

switch ($_post_format) {
    case "video":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="qodef-post-content">
                <a class="qodef-post-content-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="qodef-post-content-overlay">
                        <span aria-hidden="true" class="arrow_carrot-right"></span>
                    </span>
                    <div class="qodef-post-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="qodef-post-text">
                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4', 'disable_link' => true ) ); ?>
                        <div class="post_info">
	                        <?php get_template_part( 'templates/blog/post-info/date' ); ?>
	                        <?php get_template_part( 'templates/blog/post-info/author', 'simple' ); ?>
                        </div>
                    </div>
                </a>
            </div>
        </article>
        <?php
        break;
    case "audio":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="qodef-post-content">
                <a class="qodef-post-content-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="qodef-post-content-overlay">
                        <span aria-hidden="true" class="arrow_carrot-right"></span>
                    </span>
                    <div class="qodef-post-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="qodef-post-text">
                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4', 'disable_link' => true ) ); ?>
                        <div class="post_info">
	                        <?php get_template_part( 'templates/blog/post-info/date' ); ?>
	                        <?php get_template_part( 'templates/blog/post-info/author', 'simple' ); ?>
                        </div>
                    </div>
                </a>
            </div>
        </article>
        <?php
        break;
    case "gallery":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="qodef-post-content">
                <a class="qodef-post-content-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="qodef-post-content-overlay">
                        <span aria-hidden="true" class="arrow_carrot-right"></span>
                    </span>
                    <div class="qodef-post-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="qodef-post-text">
                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4', 'disable_link' => true ) ); ?>
                        <div class="post_info">
	                        <?php get_template_part( 'templates/blog/post-info/date' ); ?>
	                        <?php get_template_part( 'templates/blog/post-info/author', 'simple' ); ?>
                        </div>
                    </div>
                </a>
            </div>
        </article>
        <?php
        break;
    case "link":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="qodef-post-content">
                <a class="qodef-post-content-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="qodef-post-content-overlay">
                        <span aria-hidden="true" class="arrow_carrot-right"></span>
                    </span>
                    <div class="qodef-post-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="qodef-post-text">
                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4', 'disable_link' => true ) ); ?>
                        <div class="post_info">
	                        <?php get_template_part( 'templates/blog/post-info/date' ); ?>
	                        <?php get_template_part( 'templates/blog/post-info/author', 'simple' ); ?>
                        </div>
                    </div>
                </a>
            </div>
        </article>
        <?php
        break;
    case "quote":
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="qodef-post-content">
                <a class="qodef-post-content-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="qodef-post-content-overlay">
                        <span aria-hidden="true" class="arrow_carrot-right"></span>
                    </span>
                    <div class="qodef-post-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="qodef-post-text">
	                    <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4', 'post_format' => 'quote', 'disable_link' => true ) ); ?>
                        <div class="post_info">
	                        <?php get_template_part( 'templates/blog/post-info/date' ); ?>
	                        <?php get_template_part( 'templates/blog/post-info/author', 'simple' ); ?>
                        </div>
                    </div>
                </a>
            </div>
        </article>
        <?php
        break;
    default:
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="qodef-post-content">
                <a class="qodef-post-content-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <span class="qodef-post-content-overlay">
                        <span aria-hidden="true" class="arrow_carrot-right"></span>
                    </span>
                    <div class="qodef-post-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="qodef-post-text">
                        <?php stockholm_qode_get_template_part( 'templates/blog/post-info/title', '', array( 'title_tag' => 'h4', 'disable_link' => true ) ); ?>
                        <div class="post_info">
	                        <?php get_template_part( 'templates/blog/post-info/date' ); ?>
	                        <?php get_template_part( 'templates/blog/post-info/author', 'simple' ); ?>
                        </div>
                    </div>
                </a>
            </div>
        </article>
    <?php
}
?>