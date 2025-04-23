<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*
 * Template Name: index page
 */
get_header(); ?>

<div class="page-header">
	<div class="container">
		<h2 class="page-title"><?php echo get_the_title(); ?></h2>
		<?php the_archive_description('<div class="page-description">', '</div>'); ?>
	</div>
</div>

<section class="card-lists">
    <div class="container">
        <div class="row">
            <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있는지? -->
            <?php if (have_posts()) : ?>

                <!-- while문 : 해당 배열 안에 포스트를 반복해서 불러오기 -->
                <?php while (have_posts()) :
                    the_post(); ?>
                    <!-- Start : 이 안에 코드 형식으로 출력 -->
                    <div class="col-3">
                        <?php get_template_part('content'); ?>
                    </div>
                    <!-- End : 이 안에 코드 형식으로 출력 -->
                <?php endwhile; ?>

            <?php else : ?>
                <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있지 않을 때 해당 코드 실행 -->
                <?php get_template_part('content', 'empty'); ?>

            <?php endif; ?>
        </div>
        <?php the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => '',
            'next_text' => ''
        )); ?>
        <div class="row">
            <!-- 배열에 대한 정의 -->
            <?php
            $args = array(
                // 'posts_per_page' => -1, //수 제한 없음
                'posts_per_page' => 4, // 표시할 항목
                // 'category_name' => 'basic',//특정 카테고리 리스트 원할때 사용 
                'paged' => $paged,
                'post_type' => 'post',
                // 'post_status' => 'publish',
            );
            $arr_posts = new WP_Query($args); ?>
            <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있는지? -->
            <?php if ($arr_posts->have_posts()): ?>
                <!-- while문 : 해당 배열 안에 포스트를 반복해서 불러오기 -->
                <?php while ($arr_posts->have_posts()):
                    $arr_posts->the_post(); ?>
                    <!-- Start : 이 안에 코드 형식으로 출력 -->
                    <div class="col-3">
                        <?php get_template_part('content'); ?>
                    </div>
                    <!-- End : 이 안에 코드 형식으로 출력 -->
                <?php endwhile; ?>

            <?php else: ?>
                <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있지 않을 때 해당 코드 실행 -->
                <?php get_template_part('content', 'empty'); ?>
            <?php endif; ?>

            <?php the_posts_pagination(array('prev_text' => '', 'next_text' => '')); ?>

        </div>


    </div>
</section>
<?php get_footer(); ?>