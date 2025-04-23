<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*
 * 카테고리 페이지
 */
get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Work</h1>
    </div>
</div>
<section class="post-list-wrap">
    <div class="container">
        <div class="row">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            if (wp_is_mobile()) {
                $work = new WP_Query(
                    array(
                        'posts_per_page' => 8,
                        'post_type' => 'work',
                        'order' => 'date',
                        'paged' => $paged
                    )
                );
            } else {
                $work = new WP_Query(
                    array(
                        'posts_per_page' => 12,
                        'post_type' => 'work',
                        'order' => 'date',
                        'paged' => $paged
                    )
                );
            } ?>
            <?php if (have_posts()) : ?>

                <?php while ($work->have_posts()) : $work->the_post();
                ?>
                    <div class="col-4">
                        <?php get_template_part('content-work'); ?>
                    </div>
                <?php endwhile; ?>
                <?php the_posts_pagination(array('prev_text' => '', 'next_text' => ''), $work->max_num_pages); ?>

            <?php else : ?>
                <?php get_template_part('content-none', get_post_format()); ?>
            <?php endif; ?>


        </div>
    </div>
</section>
<?php get_footer(); ?>