<?php
/**
 * Search Results Page
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
<section class="search-results blog-template background-image-cover" style="background-image:url(<?php echo $blog_bg_image['url']; ?>);">
	<div class="blog-header">
		<div class="grid-container">
			<div class="grid-x align-middle">
				<div class="cell medium-6 large-8">
					<h1>Search Results</h1>
				</div>
				<div class="cell medium-6 large-4">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>

	<?php $filtered_posts = $wp_query; // send default query to blog-post-listing.php ?>
	<div class="blog-posts">
		<?php include(locate_template('includes/post-listings/blog-post-listing.php')); ?>
	</div>
</section>
<?php get_footer(); ?>
