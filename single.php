<?php
/**
 * Blog Post Type - Single Page
 *
 * This template displays single blog posts at:
 * https://www.justthetipband.com/blog/${category_name}/{$post_name}/
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php get_header(); ?>
<?php $blog_bg_image = get_field('blog_single_body_image', get_option('page_for_posts')); ?>
<section class="blog-single background-image-cover" style="background-image:url(<?php echo $blog_bg_image['url']; ?>);">
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<div class="grid-container">
				<div class="grid-x grid-margin-x align-center">
					<div class="cell medium-8">
						<article class="blog-content white-bg">
							<?php get_template_part('includes/modules/breadcrumb-module'); ?>
							<h1><?php the_title(); ?></h1>
							<ul class="menu align-middle blog-post-meta">
								<li class="date"><i class="far fa-clock"></i><span><?php the_date(); ?></span></li>
								<li class="divider">|</li>
								<li><?php the_author_posts_link(); ?></li>
								<li class="divider">|</li>
								<li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&url=<?php the_permalink(); ?>&via=Just the Tip Band" title="Share on Twitter"><i class="fab fa-twitter"></i></a></li>
							</ul>
							<?php the_content(); ?>
						</article>
					</div>
					<aside class="cell medium-4 blog-sidebar">
						<?php get_template_part('includes/modules/blog-sidebar'); ?>
					</aside>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php //@TODO: recent / popular posts ?>
</section>
<div class="reveal" id="blog-post-modal" data-reveal>
	<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php get_footer(); ?>
