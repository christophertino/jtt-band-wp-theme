<?php
/**
 * Featured Post Listing
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php if ($recent_posts->have_posts()) : ?>
	<div class="listing-content grid-x grid-padding-x small-up-1 medium-up-3" data-equalizer data-equalize-on="medium">
		<?php while ($recent_posts->have_posts()) : $recent_posts->the_post();
			get_template_part('includes/post-items/featured-post-item');
		endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<h5>Sorry, no recent posts found.</h5>
<?php endif; ?>