<?php
/**
 * Mobile Menu Modal
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="reveal full" id="mobile-modal" data-reveal>
	<button class="close-button" data-close aria-label="Close Modal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
	<div class="text-center">
		<a href="<?php echo get_option('siteurl') ?>" title="<?php echo get_option('blogname') ?>" rel="nofollow">
			<?php get_template_part('images/svg/jtt-logo.svg'); ?>
		</a>
	</div>
	<?php wp_nav_menu(array(
		'menu' => 'Mobile Menu',
		'menu_id' => 'mobile-menu',
		'container' => 'false',
		'depth' => 1, //no dropdown content
		'menu_class' => 'no-bullet text-center')
	); ?>
	<?php get_template_part('includes/menus/social-menu'); ?>
</div>
