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
	<?php if (has_post_thumbnail()) :
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog_thumbnail'); ?>
		<a class="content-image background-image-cover" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" style="background-image: url(<?php echo $image[0]; ?>)"></a>
	<?php endif; ?>
	<div class="content-inner flex-container flex-dir-column align-center">
		<?php $categories = get_the_category();
		if (!empty($categories)) : ?>
			<div class="categories">
				<a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
					<?php echo esc_html($categories[0]->name); ?>
				</a>
			</div>
		<?php endif; ?>
		<h5>
			<a class="white-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
			</a>
		</h5>
		<ul class="menu align-middle social-share">
			<li class="date"><i class="far fa-clock"></i> <?php the_time('l F jS'); ?></li>
			<li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="https://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&url=<?php the_permalink(); ?>&via=Just the Tip Band" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
		</ul>
	</div>
</div>
