<?php
/**
 * Blog Posts Page
 *
 * Note: Because we are using /blog as our WP Posts Page, we must
 * use home.php as the template file instead of page-blog.php.
 * https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php get_header(); ?>
<section class="blog-template">
	<div class="module blog-header">
		<?php $blog_image = get_field('blog_header_image', get_option('page_for_posts'));
		if( !empty($blog_image) ): ?>
			<div class="module-bg-image" data-interchange="[<?php echo $blog_image['sizes']['hero_small']; ?>, small], [<?php echo $blog_image['sizes']['hero_medium']; ?>, medium], [<?php echo $blog_image['sizes']['hero_large']; ?>, large]">
		<?php else : ?>
			<div class="module-bg-image">
		<?php endif; ?>
			<div class="grid-container">
				<div class="grid-x">
					<div class="cell">
						<h1><?php the_title(get_option('page_for_posts')); ?></h1>
						<?php if (get_field('blog_description', get_option('page_for_posts'))) : ?>
							<p><?php the_field('blog_description', get_option('page_for_posts')); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="module blog-categories">
		<?php get_template_part('includes/menus/blog-category-menu'); ?>
	</div>

	<div class="module blog-featured-content">
		<?php $excludeIDs = array(); ?>
		<?php include(locate_template('includes/post-listings/featured-blog-post-listing.php')); ?>
	</div>

	<div class="module blog-posts">
		<?php include(locate_template('includes/post-listings/blog-post-listing.php')); ?>
	</div>
</section>
<?php get_footer(); ?>
