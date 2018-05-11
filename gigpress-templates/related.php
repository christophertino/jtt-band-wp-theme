<?php
/**
 * Gigpress Related Posts
 *
 * This template displays Gigpress show data on a related blog post.
 *
 * Variables
 * $count = current related show (if you have mutliple)
 * $total_shows = total number of related shows for this post
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php if ($gpo['related_heading'] && $count == 1) : ?>
	<h3 class="gigpress-related-heading"><?php echo wptexturize($gpo['related_heading']); ?></h3>
<?php endif; ?>

<ul class="gigpress-related-show no-bullet <?php echo $showdata['status']; ?>">
	<li>
		<span class="gigpress-show-related"><?php echo $showdata['venue']; ?></span>
		<span class="gigpress-related-label"><?php _e(" featuring ", "gigpress"); ?></span>
		<span class="gigpress-related-item"><?php echo $showdata['artist']; ?></span>
	</li>

	<?php if($showdata['tour']) : ?>
		<li>
			<?php if($gpo['tour_label'] != '') : ?><span class="gigpress-related-label"><?php echo wptexturize($gpo['tour_label']); ?>:</span> <?php endif; ?>
			<span class="gigpress-related-item"><?php echo $showdata['tour']; ?></span>
		</li>
	<?php endif; ?>

	<?php if($showdata['address']) : ?>
		<li>
			<span class="gigpress-related-item"><?php echo $showdata['address']; ?></span>
		</li>
	<?php endif; ?>

	<li>
		<span class="gigpress-related-item"><?php echo $showdata['city']; ?><?php if(!empty($showdata['state'])) : ?> , <?php echo $showdata['state']; ?><?php endif; ?>
		</span>
	</li>

	<?php if($showdata['venue_phone']) : ?>
		<li>
			<span class="gigpress-related-item"><?php echo $showdata['venue_phone']; ?></span>
		</li>
	<?php endif; ?>

	<li class="date">
		<span class="gigpress-related-item"><?php echo $showdata['date_long']; ?>, <?php if($showdata['time']) : echo $showdata['time']; endif; ?></span>
	</li>

	<?php if($showdata['price']) : ?>
		<li>
			<span class="gigpress-related-label"><?php _e("Admission", "gigpress"); ?>:</span>
			<span class="gigpress-related-item"><?php echo $showdata['price']; ?></span>
		</li>
	<?php endif; ?>

	<?php if($showdata['admittance']) : ?>
		<li>
			<span class="gigpress-related-label"><?php _e("Age Restrictions", "gigpress"); ?>:</span>
			<span class="gigpress-related-item"><?php echo $showdata['admittance']; ?></span>
		</li>
	<?php endif; ?>

	<?php if($showdata['ticket_link']) : ?>
		<li><a class="button" href="<?php echo $showdata['ticket_url']; ?>" target="_blank">Tickets</a></li>
	<?php endif; ?>

	<?php if($showdata['external_link']) : ?>
		<li><a class="button" href="<?php echo $showdata['external_url']; ?>" target="_blank">More Info</a></li>
	<?php endif; ?>

	<?php if($showdata['notes']) : ?>
		<li>
			<span class="gigpress-related-label"><?php _e("Notes", "gigpress"); ?>:</span>
			<span class="gigpress-related-item"><?php echo $showdata['notes']; ?></span>
		</li>
	<?php endif; ?>
</ul>
