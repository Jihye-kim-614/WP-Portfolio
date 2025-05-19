<?php
/**
 * Template Name: Q&A Board
 */
get_header(); ?>


<div class="page-header">
	<div class="container">
		<h2 class="page-title"><?php echo get_the_title(); ?></h2>
		<?php the_archive_description('<div class="page-description">', '</div>'); ?>
	</div>
</div>

<div class="container">
  <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        the_content();
      endwhile;
    endif;
  ?>
</div>

<div class="container">
<div class="inner-padding">
    <div class="question-board">
        
        <div id="form-container" style="display:none;">
            <?php echo do_shortcode('[wpforms id="292"]'); // WPForms 폼 ID가 4라면 이렇게 수정 ?>
        </div>

        <div class="question-header">
            <span class="question-number">Nr</span>
            <span class="question-category">Cat.</span>
            <span class="question-title">Title</span>
            <span class="question-date">Date</span>
        </div>
        <div class="question-list">
            <?php
            // 질문 글 불러오기
            $args = array(
                

                'posts_per_page' => 10,
                'orderby' => 'date',
                'order' => 'DESC',
                'meta_key' => '_custom_category_label',
                
            );
            
            $query = new WP_Query($args);
            $counter = $query->found_posts; // 🔁 총 글 개수부터 시작
            
            
            if ($query->have_posts()) :
                
                while ($query->have_posts()) : $query->the_post();
                $dropdown_category = get_post_meta(get_the_ID(), '_custom_category_label', true);
                ?>
                <a href="<?php the_permalink(); ?>" class="question-item-link">
                  <div class="question-item">
                    <div class="question-meta">
                      <span class="question-number"><?php echo $counter ; ?></span>
                      <span class="question-category"><?php echo esc_html($dropdown_category); ?></span>
                      <span class="question-title"><?php the_title(); ?></span>
                      <span class="question-date"><?php echo get_the_date('d/m/Y'); ?></span>
                    </div>
                  </div>
                </a>
                    <?php
                    $counter--; // 🔽 하나씩 줄이기
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>현재 질문이 없습니다.</p>';
            endif;
            ?>
        </div>
        <button id="write-post-btn">Write</button>
    </div>
    </div>    
</div>

<?php get_footer(); ?>

<script>
    document.getElementById("write-post-btn").addEventListener("click", function() {
        var formContainer = document.getElementById("form-container");
        if (formContainer.style.display === "none") {
            formContainer.style.display = "block";
        } else {
            formContainer.style.display = "none";
        }
    });

    jQuery(document).ready(function($) {
  // 날짜 변경 시 시간대 불러오기
  $('#booking_date').on('change', function() {
    const postId = $(this).val();
    
    // AJAX 요청 보내기
    $.ajax({
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      type: 'POST',
      data: {
        action: 'get_time_slots',
        post_id: postId
      },
      success: function(response) {
        $('#booking_time').html(response); // 반환된 시간대 옵션을 #booking_time에 추가
      }
    });
  });

  // 시간 선택 시 선택된 시간과 날짜를 hidden 필드에 저장
  $('#booking_time').on('change', function() {
    $('#cf7_date').val($('#booking_date option:selected').text());
    $('#cf7_time').val($(this).val());
  });
});

</script>