<?php
/**
 * Blog Post Item
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="blog-post-item">
	<?php if (has_post_thumbnail($p->ID)) :
		$image = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), 'blog_thumbnail'); ?>
		<div class="content-image">
			<a href="<?php the_permalink($p->ID); ?>" title="<?php the_title($p->ID); ?>">
				<img src="<?php echo $image[0]; ?>" title="<?php the_title($p->ID); ?>" alt="<?php the_title($p->ID); ?>">
			</a>
		</div>
	<?php endif; ?>
	<div class="content-inner">
		<?php $categories = get_the_category();
		if (!empty($categories)) : ?>
			<a href="<?php esc_url(get_category_link($categories[0]->term_id)); ?>">
				<?php esc_html($categories[0]->name); ?>
			</a>
		<?php endif; ?>
		<h5>
			<a class="white-link" href="<?php the_permalink($p->ID); ?>" title="<?php the_title($p->ID); ?>">
				<?php the_title($p->ID); ?>
			</a>
		</h5>
		<ul class="menu social-share">
			<li class="date"><i class="far fa-clock"></i> <?php the_date('l F jS'); ?></li>
			<li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink($p->ID); ?>" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="https://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&url=<?php the_permalink($p->ID); ?>&via=Just the Tip Band" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
		</ul>
	</div>
</div>
