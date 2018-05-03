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
	<div class="grid-x">
		<?php $args = array(
			'posts_per_page' => 3,
			'orderby' => 'date',
			'order' => 'DESC',
			'post_type' => 'post',
			'post_status' => 'publish'
		);
		$featured_posts = new WP_Query($args);
		if ($featured_posts->have_posts()) :
			while($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
				<?php array_push($excludeIDs, $post->ID); ?>
				<?php include(locate_template('includes/post-items/featured-blog-post-item.php')); ?>
			<?php endwhile;
		endif;
		wp_reset_postdata(); ?>
	</div>
</div>
