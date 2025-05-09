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
        <?php
        the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </div>
</div>
<section class="post-list-wrap" role="main">
    <div class="container">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-4">
                    <?php get_template_part('content'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>