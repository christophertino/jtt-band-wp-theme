<?php
/**
 * Blog Post Listing
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="grid-container">
	<?php $archive_title = "";
		$filtered_posts = new WP_Query(array(
			'post_type' => 'post',
			'paged' => $paged,
			'post_status' => 'publish',
			'orderby' => 'date',
			'post__not_in' => $excludeIDs, //exclude featured posts
		));
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	if( $filtered_posts->have_posts() ): ?>
		<div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">
			<?php while ( $filtered_posts->have_posts()) : $filtered_posts->the_post(); ?>
				<div class="cell">
					<?php get_template_part('includes/post-items/blog-post-item'); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata();
	else : ?>
		<p>Sorry, no blog posts found</p>
	<?php endif; ?>
</div>
<?php include(locate_template('includes/modules/pagination-module.php')); ?>
