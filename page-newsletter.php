<?php
/**
 * Template Name: Newsletter
 */
get_header();

// 배경 이미지 설정
$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>

<?php if (has_post_thumbnail()) : ?>
    <div class="page-header page-cover-img" style="background-image: url('<?php echo esc_url($thumb[0]); ?>')">
<?php else : ?>
    <div class="page-header">
<?php endif; ?>
    <div class="container">
        <h2 class="page-title">Newsletter</h2>
        <?php the_archive_description('<div class="page-description">', '</div>'); ?>
    </div>
</div>

<section class="section-newsletter">
    <div class="container">
        <div class="inner-padding">

        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
            'posts_per_page' => 8,
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

            <!-- 페이지네이션 -->
            <div class="newsletter-pagination">
                <?php
                echo paginate_links(array(
                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'total' => $arr_posts->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'format' => '?paged=%#%',
                    'show_all' => false,
                    'type' => 'plain',
                    'end_size' => 1,
                    'mid_size' => 2,
                    'prev_next' => true,
                    'prev_text' => __('← PREV'),
                    'next_text' => __('NEXT →'),
                ));
                ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <?php get_template_part('content', 'empty'); ?>
        <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
