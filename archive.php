<?php
/**
 * Blog Post Type - Archive Page
 *
 * This template displays posts by category/tag/author at:
 * https://www.justthetipband.com/blog/category/{$category_name}/
 * https://www.justthetipband.com/blog/tag/{$tag_name}/
 * https://www.justthetipband.com/blog/author/{$author_name}/
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php get_header(); ?>
<section class="blog-template blog-archive">
	<div class="blog-header">
		<?php $blog_image = get_field('blog_header_image', get_option('page_for_posts'));
		if( !empty($blog_image) ): ?>
			<div class="background-image-cover" data-interchange="[<?php echo $blog_image['sizes']['hero_small']; ?>, small], [<?php echo $blog_image['sizes']['hero_medium']; ?>, medium], [<?php echo $blog_image['sizes']['hero_large']; ?>, large]">
		<?php else : ?>
			<div class="background-image-cover">
		<?php endif; ?>
			<div class="grid-container">
				<div class="grid-x">
					<div class="cell">
						<h1><?php the_archive_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="blog-categories">
		<?php get_template_part('includes/menus/blog-category-menu'); ?>
	</div>

	<?php $filtered_posts = $wp_query; // send default query to blog-post-listing.php ?>
	<div class="blog-posts">
		<?php include(locate_template('includes/post-listings/blog-post-listing.php')); ?>
	</div>
</section>
<?php get_footer(); ?>
