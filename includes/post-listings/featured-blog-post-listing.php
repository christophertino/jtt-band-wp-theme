<?php
/**
 * Featured Blog Post Listing
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="grid-container">
	<?php $args = array(
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish'
	);
	$featured_posts = new WP_Query($args);
	$count = 0;
	if ($featured_posts->have_posts()) : ?>
		<div class="grid-x grid-margin-x">
			<?php while($featured_posts->have_posts()) : $featured_posts->the_post();
				$count++;
				if ($count === 1) : ?>
					<div class="cell medium-6">
						<?php include(locate_template('includes/post-items/blog-post-item.php')); ?>
					</div>
					<div class="cell medium-6">
						<div class="grid-x grid-margin-x">
				<?php else : ?>
							<div class="cell">
								<?php include(locate_template('includes/post-items/blog-post-item.php')); ?>
							</div>
				<?php endif; ?>

				<?php if ($count === 3) : ?>
						</div>
					</div>
				<?php endif; ?>

				<?php array_push($excludeIDs, $post->ID);
			endwhile; ?>
		</div>
	<?php endif;
	wp_reset_postdata(); ?>
</div>
