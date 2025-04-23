<?php
/*
* @package designbase
*/
?>

<!-- related post -->
<section class="related-section">
    <div class="container">
        <div class="category-title-wrap">
            <h3 class="category-title">관련 글</h3>
        </div>
        <div class="contents-list row">
            <?php
            $args = array(
                'posts_per_page' => 4, // 표시할 항목
                'post__not_in'   => array(get_the_ID()), // 현재 글 제외
                'no_found_rows'  => true, // We don't need pagination so 
            );
            $cats = wp_get_post_terms(get_the_ID(), 'category');
            $cats_ids = array();
            foreach ($cats as $wpex_related_cat) {
                $cats_ids[] = $wpex_related_cat->term_id;
            }
            if (!empty($cats_ids)) {
                $args['category__in'] = $cats_ids;
            }
            // Query posts
            $wpex_query = new wp_query($args); ?>
            <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있는지? -->
            <?php if ($wpex_query->have_posts()) :

                // Loop through posts
                foreach ($wpex_query->posts as $post) : setup_postdata($post); ?>
                    <div class="col-3">
                        <?php get_template_part('content'); ?>
                    </div>
                <?php
                endforeach; ?>
            <?php else : ?>
                <!-- if문 : 해당 배열 안에 포스트 데이터를 가지고 있지 않을 때 해당 코드 실행 -->
                <?php get_template_part('content', 'empty'); ?>
            <?php endif; ?>




        </div>

    </div>
</section>