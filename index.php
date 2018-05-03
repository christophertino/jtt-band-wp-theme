<?php
/**
 * Default Page/Post Template
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php get_header(); ?>
<section class="index-page">
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="small-12 columns">
					<?php get_template_part('includes/modules/breadcrumb-module'); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php else : ?>
		<div class="row">
			<div class="small-12 columns">
				<p>Sorry, Page Not Found.</p>
			</div>
		</div>
	<?php endif; ?>
</section>
<?php get_footer(); ?>
