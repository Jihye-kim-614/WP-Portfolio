<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*

 */
get_header(); ?>




<div class="page-header">
    <div class="container">
        <h1 class="hero-title">PORTFOLIO <br>
            <strong class="serif">WORDPRESS</strong> 
        </h1><br>
        <h3 class="archive-description">Webdesign <br>using WordPress</h3>
        <div class="hero-deco">
        </div>
    </div>
</div>

<section class="about-section">
    <div class="container">
    <div class="category-title-wrap">
            <h2 class="category-title">Who am I ?</h2>
        </div>
        <div class="inner-padding">
        <div class="row">
            <div class="col-6">
                <div class="img-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/about-img-jihye.jpg" alt="" width="70%">
                </div>
            </div>
            <div class="col-6">
                <div class="text-wrap">
                    <h2>Hi! I'am Jihye</h2>
                    <p>I am web designer specialized in UX/UI, currently living in Berlin.</p>
                    <a class="button" href="<?php echo esc_url(home_url('/about')); ?>">Learn more about me</a>
                </div>
            </div>


        </div>
        </div>
    </div>
</section>
<section class="marquee-section">
    <div class="marquee">
        <div class="marquee__content">
            <ul class="list-inline">
                <li>&nbsp;&nbsp;Web Designer</li>
                <li>&nbsp;&nbsp;Creative Web Coding</li>
                <li>&nbsp;&nbsp;WordPress Developer</li>
            </ul>
            <ul class="list-inline">
                <li>&nbsp;&nbsp;Web Designer</li>
                <li>&nbsp;&nbsp;Creative Web Coding</li>
                <li>&nbsp;&nbsp;WordPress Developer</li>
            </ul>
            <ul class="list-inline">
                <li>&nbsp;&nbsp;Web Designer</li>
                <li>&nbsp;&nbsp;Creative Web Coding</li>
                <li>&nbsp;&nbsp;WordPress Developer</li>
            </ul>
        </div>
    </div>
</section>
<section class="section-blog">
    <div class="container">
        
        <div class="category-title-wrap">
            <h2 class="category-title">Newsletter</h2>
            <a class="button line-button" href="<?php echo esc_url(home_url('/newsletter')); ?>">Show More</a>
        </div>
        <div class="inner-padding">
            <div class="row">
                <!-- 배열에 대한 정의 -->
                <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page' => 4,
                'post_type' => 'post',
                'paged' => $paged,
                'meta_key' => '_custom_category_label',
                'meta_compare' => 'NOT EXISTS',
            );
            $arr_posts = new WP_Query($args);
            ?>

            <?php if ($arr_posts->have_posts()): ?>
                <div class="newsletter-list">
                    <?php while ($arr_posts->have_posts()): $arr_posts->the_post(); ?>
                        <article class="newsletter-item">
                            <div class="newsletter-row">
                                <div class="newsletter-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                                <div class="newsletter-date">
                                    <?php echo get_the_date(); ?>
                                </div>
                            </div>
                            <div class="newsletter-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <?php get_template_part('content', 'empty'); ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="work-section">
    <div class="container">
        <div class="category-title-wrap">
            <h2 class="category-title">Featured Projects</h2>
            <a class="button line-button" href="<?php echo esc_url(home_url('/work')); ?>">Show More</a>
        </div>
        <div class=" row">
                <!-- 배열에 대한 정의 -->
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
                <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있는지? -->
                <?php if ($work->have_posts()): ?>
                    <!-- while문 : 해당 배열 안에 포스트를 반복해서 불러오기 -->
                    <?php while ($work->have_posts()):
                        $work->the_post(); ?>
                        <!-- Start : 이 안에 코드 형식으로 출력 -->
                        <div class="col-4">
                            <?php get_template_part('content-work'); ?>
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