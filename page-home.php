<?php
/**
 * Template Name: Home Page
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php get_header(); ?>
<section class="home-template">
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			if( have_rows('homepage_carousel') ): ?>
				<div class="module homepage-hero owl-carousel owl-theme">
					<?php while ( have_rows('homepage_carousel') ) : the_row();
						$slide_image = get_sub_field('slide_image');
						$slide_button_text = get_sub_field('slide_button_text');
						$slide_button_link_internal = get_sub_field('button_link_internal');
						$slide_button_link_external = get_sub_field('button_link_external');
						if( !empty($slide_image) ): ?>
							<div class="slide module-bg-image flex-container align-middle" data-interchange="[<?php echo $slide_image['sizes']['hero_small']; ?>, small], [<?php echo $slide_image['sizes']['hero_medium']; ?>, medium], [<?php echo $slide_image['sizes']['hero_xlarge']; ?>, large]">
						<?php else : ?>
							<div class="slide flex-container align-middle">
						<?php endif; ?>
								<div class="row">
									<div class="small-12 medium-8 large-6 columns">
										<h1><?php the_sub_field('slide_title'); ?></h1>
										<p><?php the_sub_field('slide_content'); ?></p>
										<?php if($slide_button_text) :
											if ($slide_button_link_internal) : ?>
												<a class="button secondary large" href="<?php echo $slide_button_link_internal; ?>" title="<?php echo $slide_button_text; ?>">
													<?php echo $slide_button_text; ?>
												</a>
											<?php elseif ($slide_button_link_external) : ?>
												<a class="button secondary large" href="<?php echo $slide_button_link_external; ?>" title="<?php echo $slide_button_text; ?>" target="_blank">
													<?php echo $slide_button_text; ?>
												</a>
											<?php endif; ?>
										<?php endif; ?>
									</div>
								</div>
							</div> <?php //.slide ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<iframe width="100%" height="600" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/42087972&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>

		<?php endwhile;
	endif; ?>
</section>
<?php get_footer(); ?>
