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

<div class="blog-post-item cell">
	<div class="post-inner">
		<div class="post-content">
			<?php if (has_post_thumbnail()): ?>
				<?php the_post_thumbnail() ?>
			<?php endif; ?>
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<p><?php the_content_limit(200); ?></p>
		</div>

		<?php $posttags = get_the_tags();
		if ($posttags) : ?>
			<hr />
			<div class="post-tags">
				<?php foreach($posttags as $tag) : ?>
					<a href="<?php echo get_tag_link($tag->term_id); ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
