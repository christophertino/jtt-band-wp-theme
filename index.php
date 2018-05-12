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
<?php $page_bg_image = get_field('default_page_background_image', 'option'); ?>
<section class="index-page background-image-cover" style="background-image:url(<?php echo $page_bg_image['url']; ?>);">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<article class="page-content white-bg">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</article>
					<?php endwhile; ?>
				<?php else : ?>
					<h5>Sorry, Page Not Found.</h5>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
