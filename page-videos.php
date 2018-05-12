<?php
/**
 * Template Name: Videos Page
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
<section class="index-page videos-template background-image-cover" style="background-image:url(<?php echo $page_bg_image['url']; ?>);">
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

			<?php if( have_rows('video_links') ): ?>
				<div class="video-hero owl-carousel owl-theme">
					<?php while ( have_rows('video_links') ) : the_row();
						$video_url = get_sub_field('video_url'); ?>
						<div class="item-video"><a class="owl-video" href="<?php echo $video_url; ?>"></a></div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<div class="grid-container">
				<div class="grid-x align-center">
					<div class="cell medium-10">
						<article class="page-content white-bg text-center">
							<?php the_content(); ?>
							<a class="button large hollow" href="https://www.youtube.com/playlist?list=FLvLin6JqOdJ8mWv_FPMpoiA" target="_blank" title="Just the Tip on YouTube"><i class="fab fa-youtube"></i>See More Videos</a>
						</article>
					</div>
				</div>
			</div>
		<?php endwhile;
	endif; ?>
</section>
<?php get_footer(); ?>
