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
<section class="search-results">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1>Search Results</h1>
				<?php get_search_form(); ?>

				<?php $filtered_posts = $wp_query; // send default query to blog-post-listing.php ?>
				<div class="blog-posts">
					<?php include(locate_template('includes/post-listings/blog-post-listing.php')); ?>
				</div>

				<?php include(locate_template('includes/modules/pagination-module.php')); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
