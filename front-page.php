<?php

/*
 * Template Name: 메인 페이지
 */
get_header(); ?>



<div class="hero-viewport">
<div class="page-header">
    <div class="container">        
            <div class="hero-title"><h1 class="hero-title" style="
      font-family: 'Pretendard', sans-serif;
      font-weight: 500;
      color: transparent;
      -webkit-text-stroke: 2px black;
      text-stroke: 2px black;
      letter-spacing: 2px;
      transform: scaleY(1.2); 
    ">PORTFOLIO</h1>  
            <strong class="serif">WORDPRESS</strong>
            </div> 
            <br>
            <h3 class="archive-description">Webdesign <br>using WordPress</h3>
        </div>
    </div>

</div>
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
                    <a class="button" href="<?php echo esc_url(home_url('/about')); ?>">About me</a>
                </div>
            </div>


        </div>
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
                    <a href="<?php the_permalink(); ?>" class="newsletter-link">
                        <div class="newsletter-row">
                            <div class="newsletter-title">
                                <?php the_title(); ?>
                            </div>
                            <div class="newsletter-date">
                                <?php echo get_the_date(); ?>
                            </div>
                        </div>
                        <div class="newsletter-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </a>
                </article>
                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <?php get_template_part('content', 'empty'); ?>
        <?php endif; ?>
        </div>
    </div>
</section>

<section class="section-blog">
<div class="container">
        <div class="category-title-wrap">
            <h2 class="category-title">Team</h2>
            <a class="button line-button" href="<?php echo esc_url(home_url('/team')); ?>">Show More</a>
        </div>
    
    <div class="swiper teamSwiper">
    <div class="swiper-wrapper">
        <?php
        $team_query = new WP_Query(array(
        'post_type' => 'team',
        'posts_per_page' => -1
        ));

        while ($team_query->have_posts()) : $team_query->the_post(); ?>
        <div class="swiper-slide">
            <div class="card team">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
            <?php endif; ?>
            <div class="card-body">
                <h3 class="card-title"><?php the_title(); ?></h3>

                <?php if ($position = get_field('position')): ?>
                <p class="card-text"><?= esc_html($position); ?></p>
                <?php endif; ?>

                <?php if ($email = get_field('email')): ?>
                <p><a href="mailto:<?= esc_attr($email) ?>"><?= esc_html($email) ?></a></p>
                <?php endif; ?>

                <?php if ($phone = get_field('phone')): ?>
                <p><?= esc_html($phone) ?></p>
                <?php endif; ?>
            </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>

    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
    </div>
</div>
</section>


<?php get_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.teamSwiper', {
        slidesPerView: 3, // ⭐ 기본 3명
        slidesPerGroup: 1, // ⭐ 1명씩 넘어가게
        loop: false,
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },
        breakpoints: {
        480: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        992: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 3,
        }
        }
    });
    });
</script>
