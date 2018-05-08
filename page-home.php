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
				<div class="homepage-hero owl-carousel owl-theme">
					<?php while ( have_rows('homepage_carousel') ) : the_row();
						$slide_image = get_sub_field('slide_image');
						$slide_button_text = get_sub_field('slide_button_text');
						$slide_button_link_internal = get_sub_field('button_link_internal');
						$slide_button_link_external = get_sub_field('button_link_external');
						if( !empty($slide_image) ): ?>
							<div class="cell slide background-image-cover" data-interchange="[<?php echo $slide_image['sizes']['hero_small']; ?>, small], [<?php echo $slide_image['sizes']['hero_medium']; ?>, medium], [<?php echo $slide_image['sizes']['hero_xlarge']; ?>, large]">
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

			<div class="schedule">
				<?php $schedule_image = get_field('schedule_background_image');
				if( !empty($schedule_image) ): ?>
					<div class="background-image-cover" data-interchange="[<?php echo $schedule_image['sizes']['hero_small']; ?>, small], [<?php echo $schedule_image['sizes']['hero_medium']; ?>, medium], [<?php echo $schedule_image['sizes']['hero_large']; ?>, large]">
				<?php else : ?>
					<div class="background-image-cover">
				<?php endif; ?>
					<div class="grid-container content-inner-padding">
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

			<div class="news">
				<?php $news_image = get_field('news_background_image');
				if( !empty($news_image) ): ?>
					<div class="background-image-cover" data-interchange="[<?php echo $news_image['sizes']['hero_small']; ?>, small], [<?php echo $news_image['sizes']['hero_medium']; ?>, medium], [<?php echo $news_image['sizes']['hero_large']; ?>, large]">
				<?php else : ?>
					<div class="background-image-cover">
				<?php endif; ?>
					<div class="grid-container content-inner-padding">
						<div class="grid-x">
							<div class="cell">
								<h2 class="text-center">What's New</h2>
								<?php include(locate_template('includes/post-listings/homepage-post-listing.php')); ?>
								<div class="text-center">
									<a href="<?php echo get_option('siteurl'); ?>/blog" class="button large hollow"><i class="fas fa-newspaper"></i> Read More News</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="soundcloud">
				<div class="grid-container content-inner-padding">
					<div class="grid-x align-center">
						<div class="cell medium-10 large-9">
							<h2 class="text-center">Music</h2>
							<div class="listing-content">
								<iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/42087972&color=%23ff5500&auto_play=false&hide_related=true&show_comments=false&show_user=false&show_reposts=false&show_teaser=false"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="instagram">
				<div class="grid-container full content-inner-padding">
					<div class="grid-x">
						<div class="cell">
							<h2 class="text-center">Instagram</h2>
							<div id="instagram-feed" class="listing-content"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="songlist">
				<div class="grid-container content-inner-padding">
					<div class="grid-x align-center">
						<div class="cell large-10">
							<h2 class="text-center">Partial Artist List</h2>
							<div class="listing-content artist-columns">
								<?php the_field('artist_list'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="contact">
				<?php $contact_image = get_field('contact_background_image');
				if( !empty($contact_image) ): ?>
					<div class="background-image-cover" data-interchange="[<?php echo $contact_image['sizes']['hero_small']; ?>, small], [<?php echo $contact_image['sizes']['hero_medium']; ?>, medium], [<?php echo $contact_image['sizes']['hero_large']; ?>, large]">
				<?php else : ?>
					<div class="background-image-cover">
				<?php endif; ?>
					<div class="grid-container content-inner-padding">
						<div class="grid-x align-center">
							<div class="cell medium-10 large-8 text-center">
								<h2>Have Questions?</h2>
								<div class="listing-content">
									<h4>Drop us an email and tell us all about your event. We love chatting about music and your crazy Aunt who loves Neil Diamond.</h4>
								</div>
								<a href="<?php echo get_option('siteurl'); ?>/contact" class="button large hollow"><i class="fas fa-envelope"></i> Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile;
	endif; ?>
</section>
<?php get_footer(); ?>
