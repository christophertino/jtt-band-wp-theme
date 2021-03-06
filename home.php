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
<?php $blog_bg_image = get_field('blog_body_image', get_option('page_for_posts')); ?>
<section class="blog-template background-image-cover" style="background-image:url(<?php echo $blog_bg_image['url']; ?>);">

	<div class="blog-header">
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell">
					<h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
					<?php if (get_field('blog_description', get_option('page_for_posts'))) : ?>
						<p><?php the_field('blog_description', get_option('page_for_posts')); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="blog-categories">
		<?php get_template_part('includes/menus/blog-category-menu'); ?>
	</div>

	<div class="blog-featured-posts">
		<?php $excludeIDs = array(); ?>
		<?php include(locate_template('includes/post-listings/featured-blog-post-listing.php')); ?>
	</div>

	<?php $filtered_posts = new WP_Query(array(
		'post_type' => 'post',
		'paged' => $paged,
		'post_status' => 'publish',
		'orderby' => 'date',
		'post__not_in' => $excludeIDs //exclude featured posts
	)); ?>
	<div class="blog-posts">
		<?php include(locate_template('includes/post-listings/blog-post-listing.php')); ?>
	</div>

</section>
<?php get_footer(); ?>
