<?php
/**
 * Gigpress Show List End
 *
 * This template displays all of our individual show data in the main shows listing (upcoming and past).
 * If you're curious what all variables are available in the $showdata array, have a look at the docs: http://gigpress.com/docs/
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<tbody>
	<tr class="gigpress-row <?php echo $class; ?>">
		<td class="gigpress-date"><?php echo $showdata['date_long']; ?>
			<?php if($showdata['end_date']) : ?> - <?php echo $showdata['end_date']; ?><?php endif; ?>
		</td>

		<?php if((!$artist && $group_artists == 'no') && $total_artists > 1) : ?>
			<td class="gigpress-artist">
				<?php echo $showdata['artist']; ?>
			</td>
		<?php endif; ?>

		<td class="gigpress-venue"><?php echo $showdata['venue']; ?></td>

		<td class="gigpress-address"><?php if(!empty($showdata['address'])) echo $showdata['address']; ?></td>

		<td class="gigpress-city">
			<?php echo $showdata['city'];
			if(!empty($showdata['state'])) echo ', ' . $showdata['state'];
			if(!empty($gpo['display_country'])) echo ', ' . $showdata['country']; ?>
		</td>
	</tr>
	<tr class="gigpress-info <?php echo $class; ?>">
		<td colspan="<?php echo $cols; ?>">
			<?php if($showdata['time']) : ?>
				<span class="gigpress-info-item"><span class="gigpress-info-label"><?php _e("Time", "gigpress"); ?>:</span> <?php echo $showdata['time']; ?></span>
			<?php endif; ?>

			<?php if($showdata['price']) : ?>
				<span class="gigpress-info-item"><span class="gigpress-info-label"><?php _e("Admission", "gigpress"); ?>:</span> <?php echo $showdata['price']; ?></span>
			<?php endif; ?>

			<?php if($showdata['admittance']) : ?>
				<span class="gigpress-info-item"><span class="gigpress-info-label"><?php _e("Age restrictions", "gigpress"); ?>:</span> <?php echo $showdata['admittance']; ?></span>
			<?php endif; ?>

			<?php if($showdata['ticket_phone']) : ?>
				<span class="gigpress-info-item"><span class="gigpress-info-label"><?php _e("Box office", "gigpress"); ?>:</span> <?php echo $showdata['ticket_phone']; ?></span>
			<?php endif; ?>

			<?php if($showdata['venue_phone']) : ?>
				<span class="gigpress-info-item"><span class="gigpress-info-label"><?php _e("Venue phone", "gigpress"); ?>:</span> <?php echo $showdata['venue_phone']; ?></span>
			<?php endif; ?>

			<?php if($showdata['notes']) : ?>
				<span class="gigpress-info-item"><?php echo $showdata['notes']; ?></span>
			<?php endif; ?>

			<?php if($showdata['related_link'] && !empty($gpo['relatedlink_notes'])) : ?>
				<span class="gigpress-info-item"><a class="button tiny" href="<?php echo $showdata['related_url']; ?>" target="_blank">Read More</a></span>
			<?php endif; ?>

			<?php if($showdata['ticket_link']) : ?>
				<span class="gigpress-info-item"><a class="button tiny" href="<?php echo $showdata['ticket_url']; ?>" target="_blank">Tickets</a></span>
			<?php endif; ?>

			<?php if($showdata['external_link']) : ?>
				<span class="gigpress-info-item"><a class="button tiny" href="<?php echo $showdata['external_url']; ?>" target="_blank">More Info</a></span>
			<?php endif; ?>
		</td>
	</tr>
</tbody>
