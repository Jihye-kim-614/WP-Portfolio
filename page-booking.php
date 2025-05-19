<?php
/**
 * Template Name: Booking
 */
get_header(); ?>

<div class="page-header">
	<div class="container">
		<h2 class="page-title"><?php echo get_the_title(); ?></h2>
		<?php the_archive_description('<div class="page-description">', '</div>'); ?>
	</div>
</div>


<div class="container">
  <div class="inner-padding">
    <div class="swiper mySwiper">
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
      <div class="swiper-wrapper">
        <?php
        $all_posts = new WP_Query([
          'post_type' => 'booking_date',
          'posts_per_page' => -1,
          'orderby' => 'title',
          'order' => 'ASC'
        ]);

        $weeks = [];

        if ($all_posts->have_posts()) {
          while ($all_posts->have_posts()) {
            $all_posts->the_post();
            $date_str = get_the_title(); // 예: 2025-04-21
            $timestamp = strtotime($date_str);
        
            // 오늘보다 과거 날짜는 제외
            if ($timestamp < strtotime('today')) {
              continue;
            }
        
            $week = date('W', $timestamp); // 주차 번호
        
            $weeks[$week][] = [
              'id' => get_the_ID(),
              'date' => $date_str,
              'slots' => array_filter(array_map(function($i) {
                return get_field("slot_$i");
              }, range(1, 10)))
            ];
          }
          wp_reset_postdata();
        }
        
        $current_week = date('W');
        $week_keys = array_keys($weeks);
        uksort($weeks, function($a, $b) use ($current_week) {
          if ($a == $current_week) return -1;
          if ($b == $current_week) return 1;
          return $a - $b;
        });
        $current_slide_index = array_search($current_week, array_keys($weeks));
        
        // 주차별로 슬라이드 생성
        foreach ($weeks as $week_number => $dates) : ?>
          <div class="swiper-slide">
            <div class="booking">

              <h4 style="margin-top:10px;">Kalenderwoche <?= $week_number ?></h4>
              <ul style="list-style:none; padding-left:0;">
                <?php foreach ($dates as $entry) : ?>
                  <li style="margin-bottom:20px;">
                    <h5><?= $entry['date'] ?></h5>
                    <?php foreach ($entry['slots'] as $slot) : ?>
                      <a href="#" class="booking-slot"
                        data-date="<?= $entry['date'] ?>"
                        data-time="<?= $slot ?>"
                        style="margin-right:8px; display:inline-block; padding:5px 10px; background:#eee; border-radius:4px;">
                        <?= $slot ?>
                      </a>
                    <?php endforeach; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
      </div> <!-- .swiper-wrapper -->
    </div> <!-- .swiper -->

    <!-- 숨김 필드 및 폼 -->
    <input type="hidden" name="selected_date" id="cf7_date">
    <input type="hidden" name="selected_time" id="cf7_time">

    <div id="wpforms-container" style="display:none; margin-top:30px;">
      <?php echo do_shortcode('[wpforms id="297"]'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>


<script>

jQuery(document).ready(function($) {
  $(document).on('click', '.booking-slot', function(e) {
    e.preventDefault();
    const date = $(this).data('date');
    const time = $(this).data('time');

    $('#cf7_date').val(date);
    $('#cf7_time').val(time);

    $('#wpforms-container').slideDown();

    // WPForms 필드 ID에 맞게 바꾸기
    $('input[name="wpforms[fields][4]"]').val(date);
    $('input[name="wpforms[fields][5]"]').val(time);
  });
});

const swiper = new Swiper('.mySwiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    initialSlide: <?= $current_slide_index ?>, // ← 현재 주차가 몇 번째 슬라이드인지
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
});

</script>




