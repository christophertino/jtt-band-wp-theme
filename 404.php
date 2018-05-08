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
<section class="error-page">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1>404</h1>
				<p>Sorry, the page you are looking for doesn't exist. You may have mistyped the address or the page may have moved.</p>
				<a href="<?php echo get_option('siteurl') ?>" title="<?php echo get_option('blogname') ?>">Take me back to the homepage</a>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
