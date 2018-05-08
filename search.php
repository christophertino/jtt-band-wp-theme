<?php
/**
 * Search Results Page
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php get_header(); ?>
<section class="search-results">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1>Search Results</h1>
				<?php get_search_form(); ?>

				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>

					<?php endwhile; ?>
				<?php else : ?>
					<h5>Sorry, no blog posts found</h5>
				<?php endif; ?>

				<?php include(locate_template('includes/modules/pagination-module.php')); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
