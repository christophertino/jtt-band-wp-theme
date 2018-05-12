<?php
/**
 * 404 Error Page
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
<section class="error-page index-page background-image-cover" style="background-image:url(<?php echo $page_bg_image['url']; ?>);">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="cell medium-10 large-8">
				<article class="page-content white-bg text-center">
					<h1>404</h1>
					<h5>Sorry, the page you are looking for doesn't exist. You may have mistyped the address or the page may have moved.</h5>
					<a href="<?php echo get_option('siteurl') ?>" title="<?php echo get_option('blogname') ?>">Take me back to the homepage</a>
				</article>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
