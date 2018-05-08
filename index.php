<?php
/**
 * Default Page/Post Template
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php get_header(); ?>
<section class="index-page">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<?php get_template_part('includes/modules/breadcrumb-module'); ?>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<p>Sorry, Page Not Found.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
