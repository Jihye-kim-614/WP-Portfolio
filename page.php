<?php

/**
 * @package WordPress
 * @subpackage Supernormal
 * @since Supernormal 1.0
 */

/*
 * Template Name: 공통 페이지
 */
get_header();

$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>

<?php if (has_post_thumbnail()) : ?>
	<div class="page-header page-cover-img" style="background-image: url('<?php echo $thumb['0']; ?>')">
	<?php else : ?>
		<div class="page-header">
		<?php endif; ?>
		<div class="container">
			<h2 class="page-title"><?php echo get_the_title(); ?></h2>
			<?php the_archive_description('<div class="page-description">', '</div>'); ?>
		</div>
		</div>

		<div class="container">
			<?php while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			<?php endwhile;
			?>
		</div>
		<?php get_footer(); ?>