<?php
/**
 * Breadcrumb Module
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php if ( function_exists('yoast_breadcrumb') ) : ?>
	<div class="module breadcrumbs">
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell">
					<?php yoast_breadcrumb(); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
