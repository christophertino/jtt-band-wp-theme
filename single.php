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
						<div class="cell medium-10 large-10">
							<article class="blog-content">
								<?php get_template_part('includes/modules/breadcrumb-module'); ?>
								<?php if (has_post_thumbnail()) : ?>
									<div class="background-image-cover" style="background-image: url(<?php the_post_thumbnail_url('hero_large') ?>);"></div>
								<?php endif; ?>
								<h1><?php the_title(); ?></h1>
								<p class="date"> <?php the_date(); ?> &ndash; <?php the_author(); ?></p>
								<?php the_content(); ?>
							</article>
						</div>
					</div>
				</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php //recent / popular posts ?>
</section>
<?php get_footer(); ?>
