<?php
/**
 * Blog Sidebar
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php if (is_active_sidebar('blog_sidebar')) : ?>
	<ul class="no-bullet sidebar-list">
		<?php dynamic_sidebar('blog_sidebar'); ?>
	</ul>
<?php endif; ?>
