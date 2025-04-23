<?php
/*
Template Name: Team Swiper
*/

get_header(); ?>

<div class="page-header">
	<div class="container">
		<h2 class="page-title"><?php echo get_the_title(); ?></h2>
		<?php the_archive_description('<div class="page-description">', '</div>'); ?>
	</div>
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
  <!-- <div class="swiper-pagination"></div> -->
</div>

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
 
      768: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      }
    }
  });
});


</script>


