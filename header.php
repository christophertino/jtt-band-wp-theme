<?php
/**
 * Header Template
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>
<!DOCTYPE html>
<html class="no-js" dir="ltr" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_url'); ?>/images/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/images/favicons/safari-pinned-tab.svg" color="#f15a29">
	<meta name="msapplication-TileColor" content="#f15a29">
	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/dist/css/foundation.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="hide-for-large" data-sticky-container>
			<div class="title-bar" data-sticky data-top-anchor="1" data-sticky-on="small" data-margin-top="0">
				<div class="title-bar-left">
					<button class="menu-icon" type="button" data-open="mobile-modal"></button>
					<span class="title-bar-title title-logo">
						<a href="<?php echo get_option('siteurl') ?>" title="<?php echo get_option('blogname') ?>" rel="nofollow">
							<?php get_template_part('images/svg/jtt-logo.svg'); ?>
						</a>
					</span>
				</div>
			</div>
		</div>
		<div class="show-for-large" data-sticky-container>
			<div data-sticky data-top-anchor="1" data-sticky-on="large" data-margin-top="0">
				<nav class="top-bar">
					<div class="top-bar-left">
						<?php $leftMenu = array(
							'container' => 'false',
							'menu' => 'Header Menu Left',
							'menu_id' => 'header-menu-left',
							'menu_class' => 'dropdown menu',
							'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
							'walker' => new TopBarWalkerMenu()
						);
						wp_nav_menu($leftMenu); ?>
					</div>
					<div class="top-bar-title title-logo">
						<a href="<?php echo get_option('siteurl') ?>" title="<?php echo get_option('blogname') ?>" rel="nofollow">
							<?php get_template_part('images/svg/jtt-logo.svg'); ?>
						</a>
					</div>
					<div class="top-bar-right">
						<?php get_template_part('includes/menus/social-menu'); ?>
						<?php $rightMenu = array(
							'container' => 'false',
							'menu' => 'Header Menu Right',
							'menu_id' => 'header-menu-right',
							'menu_class' => 'dropdown menu',
							'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
							'walker' => new TopBarWalkerMenu()
						);
						wp_nav_menu($rightMenu); ?>
					</div>
				</nav>
			</div>
		</div>
		<?php get_template_part('includes/menus/mobile-menu'); ?>
	</header>
	<main>
	<?php //main ?>
<?php //body ?>
