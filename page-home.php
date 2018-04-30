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
							<div class="cell slide module-bg-image" data-interchange="[<?php echo $slide_image['sizes']['hero_small']; ?>, small], [<?php echo $slide_image['sizes']['hero_medium']; ?>, medium], [<?php echo $slide_image['sizes']['hero_xlarge']; ?>, large]">
						<?php else : ?>
							<div class="cell slide">
						<?php endif; ?>
								<div class="grid-container">
									<div class="grid-x">
										<div class="small-12 medium-8 large-6 cell">
											<h1><?php the_sub_field('slide_title'); ?></h1>
											<p><?php the_sub_field('slide_content'); ?></p>
											<?php if($slide_button_text) :
												if ($slide_button_link_internal) : ?>
													<a class="button large" href="<?php echo $slide_button_link_internal; ?>" title="<?php echo $slide_button_text; ?>">
														<?php echo $slide_button_text; ?>
													</a>
												<?php elseif ($slide_button_link_external) : ?>
													<a class="button large" href="<?php echo $slide_button_link_external; ?>" title="<?php echo $slide_button_text; ?>" target="_blank">
														<?php echo $slide_button_text; ?>
													</a>
												<?php endif; ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div> <?php //.slide ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<div class="module schedule">
				<div class="module-bg-image" data-interchange="[<?php bloginfo('template_url'); ?>/images/homepage/home_shows_bg-640x300.jpg, small], [<?php bloginfo('template_url'); ?>/images/homepage/home_shows_bg-1024x400.jpg, medium], [<?php bloginfo('template_url'); ?>/images/homepage/home_shows_bg-1440x400.jpg, large]">
					<div class="grid-container">
						<div class="grid-x">
							<div class="cell">
								<h2 class="text-center">Upcoming Shows</h2>
								<?php
									$options = array('scope' => 'upcoming', 'limit' => 4);
									echo gigpress_sidebar($options);
								?>
								<div class="text-center schedule-link">
									<a href="<?php echo get_option('siteurl'); ?>/schedule" class="button large hollow"><i class="fas fa-th-large"></i> See the Full Schedule</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<iframe width="100%" height="600" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/42087972&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>

		<?php endwhile;
	endif; ?>
</section>
<?php get_footer(); ?>
