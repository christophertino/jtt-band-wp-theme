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
	<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	if( $filtered_posts->have_posts() ): ?>
		<div class="grid-x grid-padding-x small-up-2 medium-up-4 large-up-6">
			<?php while ( $filtered_posts->have_posts()) : $filtered_posts->the_post();
				get_template_part('includes/post-items/blog-post-item');
			endwhile; ?>
		</div>
		<?php wp_reset_postdata();
	else : ?>
		<p>Sorry, no blog posts found</p>
	<?php endif; ?>
</div>
<?php include(locate_template('includes/modules/pagination-module.php')); ?>
