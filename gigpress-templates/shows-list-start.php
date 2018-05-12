<?php
/**
 * Gigpress Show List Start
 *
 * This template opens a list of shows - by default it opens a table,
 * but it could also open a list, or be blank if you so desired
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php
	// Figure out how many columns this table has.  Base is 3 (date, city, venue).
	// If we're NOT grouping by artist, and we're NOT displaying just a single artist, add a column (for artist).
	// If we're displaying the country, add another.
	// We don't use this variable in this template, but we do need it in subsequent templates
	$cols = 3;
	$cols = ($total_artists == 1 || $artist || $group_artists == 'yes') ? $cols : $cols + 1;
	$cols = (!empty($gpo['display_country'])) ? $cols + 1 : $cols;
?>

<table class="gigpress-table <?php echo $scope; ?> stack unstriped">
	<thead>
		<tr class="gigpress-header">
			<th scope="col" class="gigpress-date"><?php _e("Date", "gigpress"); ?></th>
		<?php if( (!$artist && $group_artists == 'no') && $total_artists > 1) : ?>
			<th scope="col" class="gigpress-artist"><?php echo wptexturize($gpo['artist_label']); ?></th>
		<?php endif; ?>
			<th scope="col" class="gigpress-venue"><?php _e("Venue", "gigpress"); ?></th>
			<th scope="col" class="gigpress-address"><?php _e("Address", "gigpress"); ?></th>
			<th scope="col" class="gigpress-city"><?php _e("City", "gigpress"); ?></th>
		</tr>
	</thead>

