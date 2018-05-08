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
	<?php if( $filtered_posts->have_posts() ): ?>
		<div class="grid-x grid-margin-x grid-margin-y small-up-1 medium-up-2 large-up-3">
			<?php while ( $filtered_posts->have_posts()) : $filtered_posts->the_post(); ?>
				<div class="cell">
					<?php get_template_part('includes/post-items/blog-post-item'); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); // @TODO: for archive.php this isn't needed
	else : ?>
		<div class="grid-x grid-margin-y">
			<div class="cell">
				<h5>Sorry, no blog posts found</h5>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php include(locate_template('includes/modules/pagination-module.php')); ?>
