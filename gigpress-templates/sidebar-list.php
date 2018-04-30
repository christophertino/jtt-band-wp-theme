<?php
/**
 * Gigpress Sidebar List Content
 *
 * This template displays all of our individual show data in the sidebar/wudget shows listing.
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<div class="cell text-center <?php echo $class; ?>">
	<h5 class="gigpress-sidebar-venue"><?php echo $showdata['venue']; ?></h5>

	<?php if( ! $group_artists && ! $artist && $total_artists > 1) : ?>
		<p class="gigpress-sidebar-artist"><?php echo $showdata['artist']; ?></p>
	<?php endif; ?>

	<p class="gigpress-sidebar-date"><?php echo $showdata['date']; ?> | <?php echo $showdata['time']; ?></p>
	<p class="gigpress-sidebar-city"><?php echo $showdata['city']; if(!empty($showdata['state'])) echo ', '.$showdata['state']; ?></p>

	<?php if($showdata['ticket_link'] && $showdata['status'] === 'active') : ?>
		<p class="gigpress-sidebar-tickets">
			<a class="button" href="<?php echo $showdata['ticket_url']; ?>" target="_blank">Tickets</a>
		</p>
	<?php elseif($showdata['status'] !== 'active') : ?>
		<p class="gigpress-sidebar-status">
			<button type="button" class="button disabled"><?php echo $showdata['ticket_link']; ?></button>
		</p>
	<?php endif; ?>
</div>
