<?php
/**
 * Template Name: Weddings Page
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
<section class="index-page weddings-template background-image-cover" style="background-image:url(<?php echo $page_bg_image['url']; ?>);">
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			<div class="page-header">
				<div class="grid-container">
					<div class="grid-x">
						<div class="cell">
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
			</div>

			<?php $gallery = get_field('wedding_image_carousel');
			if ($gallery) : ?>
				<div class="weddings-hero owl-carousel owl-theme">
					 <?php foreach( $gallery as $image ): ?>
						<div class="item background-image-cover" data-interchange="[<?php echo $image['sizes']['hero_small']; ?>, small], [<?php echo $image['sizes']['hero_medium']; ?>, medium], [<?php echo $image['sizes']['hero_xlarge']; ?>, large]"></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="grid-container">
				<div class="grid-x align-center">
					<div class="cell large-10">
						<article class="page-content white-bg">
							<?php the_content(); ?>
							<?php //wedding wire badge here ?>
						</article>
					</div>
				</div>
			</div>
		<?php endwhile;
	endif; ?>
</section>
<?php get_footer(); ?>
