<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*
 * 싱글 페이지
 */

get_header();

?>


<div class="container single-layout">
	<div class="align-left">
		<?php while (have_posts()) : the_post(); ?>
			<!-- 싱글 페이지 -->
			<?php get_template_part('content-page'); ?>

			<!-- 페이지네이션 -->
			<?php get_template_part('pagination'); ?>

			<!-- 댓글 -->
			<?php
			if (comments_open() || '0' != get_comments_number())
				comments_template('', true);
			?>
		<?php endwhile;  ?>
	</div>

</div>

<?php get_footer(); ?>