<?php
/**
 * Featured Blog Post Item
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="featured-blog-post-item cell">
	<?php if (has_post_thumbnail($p->ID)) :
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), 'blog_featured_large'); ?>
		<div class="content-image">
			<a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo get_the_title($p->ID); ?>">
				<img src="<?php echo $image[0]; ?>" title="<?php echo get_the_title($p->ID); ?>" alt="<?php echo get_the_title($p->ID); ?>">
			</a>
		</div>
	<?php endif; ?>
	<div class="content-inner">
		<h3>
			<a href="<?php echo get_permalink($p->ID); ?>" title="<?php echo get_the_title($p->ID); ?>">
				<?php echo get_the_title($p->ID); ?>
			</a>
		</h3>
		<p class="excerpt"><?php the_field('excerpt_text', $p->ID); ?></p>
	</div>
</div>
