<?php
/**
 * Homepage Post Item
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="cell">
	<div class="homepage-post-item">
		<?php if (has_post_thumbnail()) :
			$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'featured_image'); ?>
			<div class="content-image">
				<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
					<img src="<?php echo $image[0]; ?>" title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>">
				</a>
			</div>
		<?php endif; ?>
		<div class="content-inner" data-equalizer-watch>
			<h6>
				<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
					<?php echo get_the_title(); ?>
				</a>
			</h6>
			<p class="excerpt"><?php the_content_limit(350) ?></p>
			<p class="read-more text-right"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">[Read More]</a></p>
		</div>
	</div>
</div>
