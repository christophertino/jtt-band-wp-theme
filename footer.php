<?php
/**
 * Footer Template
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>
	</main><?php //main ?>
	<footer>
		<div class="grid-container">
			<div class="grid-x align-middle footer-upper">
				<div class="medium-6 cell">
					<?php wp_nav_menu(array(
						'menu' => 'Footer Menu',
						'menu_id' => 'footer-menu',
						'container' => 'false',
						'depth' => 1, //no dropdown content
						'menu_class' => 'menu horizontal no-bullet')
					); ?>
				</div>
				<div class="medium-6 cell open-source">
					<div class="flex-container align-right align-middle">
						<a href="https://github.com/christophertino/jtt-band-wp-theme" title="Just the Tip on GitHub" target="_blank"><i class="fab fa-github"></i></a>
					</div>
				</div>
			</div>
			<div class="grid-x footer-lower text-center">
				<div class="cell">
					<p>&copy; Copyright <?php echo date('Y'); ?> <a href="<?php echo get_option('siteurl') ?>" title="<?php echo get_option('blogname') ?>" rel="nofollow"><?php echo get_bloginfo('name'); ?></a>. All rights reserved.</p>
					<p>Booking &amp; Management Provided by <a href="http://www.6four3.com/" title="New York Band Booking by 6Four3 Productions" target="_blank">6Four3 Productions</a></p>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	<?php the_field('site_analytics', 'option'); ?>
</body>
</html>
