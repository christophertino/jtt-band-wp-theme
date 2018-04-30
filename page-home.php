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
					<div class="grid-container module-inner">
						<div class="grid-x">
							<div class="cell">
								<h2 class="text-center">Upcoming Shows</h2>
								<?php
									$options = array('scope' => 'upcoming', 'limit' => 4);
									echo gigpress_sidebar($options);
								?>
								<div class="text-center">
									<a href="<?php echo get_option('siteurl'); ?>/schedule" class="button large hollow"><i class="fas fa-th-large"></i> See the Full Schedule</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="module news">
				<div class="module-bg-image" data-interchange="[<?php bloginfo('template_url'); ?>/images/homepage/home_news_bg-640x300.jpg, small], [<?php bloginfo('template_url'); ?>/images/homepage/home_news_bg-1024x400.jpg, medium], [<?php bloginfo('template_url'); ?>/images/homepage/home_news_bg-1440x400.jpg, large]">
					<div class="grid-container module-inner">
						<div class="grid-x">
							<div class="cell">
								<h2 class="text-center">What's New</h2>
								<?php $recent_posts = new WP_Query(array(
									'post_status' => 'publish',
									'orderby' => 'date',
									'posts_per_page' => 3
								));
								if ($recent_posts) :
									include(locate_template('includes/post-listings/featured-post-listing.php'));
								endif; ?>
								<div class="text-center">
									<a href="<?php echo get_option('siteurl'); ?>/blog" class="button large hollow">Read More News</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="module soundcloud">
				<div class="grid-container module-inner">
					<div class="grid-x align-center">
						<div class="cell medium-9">
							<h2 class="text-center">Music</h2>
							<div class="listing-content">
								<iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/42087972&color=%23ff5500&auto_play=false&hide_related=true&show_comments=false&show_user=false&show_reposts=false&show_teaser=false"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile;
	endif; ?>
</section>
<?php get_footer(); ?>
