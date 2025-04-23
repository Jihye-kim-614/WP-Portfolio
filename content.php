<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*
 * 컴포넌트 - Blog 콘텐츠
 */
?>
<article id="post-<?php the_ID(); ?>" class="blog-item card-type" <?php post_class(); ?>>
    <?php echo '<a href="' . esc_url(get_permalink()) . '">'; ?>
    <div class="card-thumbnail">
        <?php echo the_post_thumbnail('post-thumbnail-img'); ?>
    </div>
    <div class="entry-text-wrap">

        <h1 class="entry-title"><?php the_title(); ?></h1>
        <p class="entry-excerpt">
            <?php echo wp_trim_words(get_the_content(), 16, '...'); ?>
        </p>
        <div class="entry-info">
            <div class="entry-category">
                <?php foreach ((get_the_category()) as $category) {
                    echo $category->cat_name . ' ';
                } ?>
            </div>
            <span class="entry-date"><?php echo get_the_date(); ?></span>
        </div>
    </div>
    </a>
</article>