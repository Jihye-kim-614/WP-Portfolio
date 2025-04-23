<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*
 * 싱글 페이지 - work CPT전용
 */

get_header();

?>


<div class="container work-single-layout">
	<?php while (have_posts()) : the_post(); ?>
		<!-- 싱글 페이지 -->
		<?php
		$workClient = get_post_meta($post->ID, 'work-client', true);
		$workDate = get_post_meta($post->ID, 'work-date', true);
		$workCategory = get_post_meta($post->ID, 'work-category', true);
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="thumbnail-img">
				<?php echo the_post_thumbnail(); ?>
			</div>




			<div class="post-header">
				<!-- 타이틀 -->
				<h2 class="post-title"><?php the_title(); ?></h2>
				<!-- <span class="post-date"><?php echo get_the_date(); ?></span> -->

				<?php echo ($workClient ? '<span class="customfield">Client : ' . $workClient . '</span>' : ''); ?>
				<?php echo ($workDate ? '<span class="customfield">Project Date : ' . $workDate . '</span>' : ''); ?>
				<?php echo ($workCategory ? '<span class="customfield">' . $workCategory . '</span>' : ''); ?>

			</div>

			<div class="post-content">
				<!-- 본문 -->
				<?php the_content(); ?>
			</div>
		</article>

		<!-- 페이지네이션 -->
		<?php get_template_part('pagination'); ?>

		<!-- 댓글 -->
		<?php
		if (comments_open() || '0' != get_comments_number())
			comments_template('', true);
		?>
	<?php endwhile;  ?>
</div>
<?php get_template_part('related-work'); ?>
<?php get_footer(); ?>