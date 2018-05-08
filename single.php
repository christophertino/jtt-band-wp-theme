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
<section class="blog-single">
	<?php get_template_part('includes/modules/breadcrumb-module'); ?>
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<article class="blog-content grid-container">
				<div class="grid-x">
					<div class="cell">
						<h1><?php the_title(); ?></h1>
						<p class="date"> <?php the_date(); ?> &ndash; <?php the_author(); ?></p>
						<?php the_content(); ?>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php //recent / popular posts ?>
</section>
<?php get_footer(); ?>
