<?php
/**
 * Blog Category Menu
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="grid-container">
	<div class="grid-x">
		<div class="cell">
			<ul class="menu blog-categories align-center">
				<?php $blogID = get_option('page_for_posts');
				$currentCategory = get_category(get_query_var('cat')); ?>
				<li <?php if (is_home()) { echo 'class="active"'; } ?>>
					<a class="white-link" href="<?php echo get_page_link($blogID); ?>" title="All Posts">All Posts</a>
				</li>
				<?php $categories = get_categories(array(
					'hide_empty' => true,
					'orderby' => 'title',
					'order'   => 'ASC'
				));
				foreach( $categories as $category ) : ?>
					<li <?php if ($currentCategory->term_id === $category->term_id) { echo 'class="active"'; } ?>>
						<a class="white-link" href="<?php echo get_category_link($category->term_id); ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
