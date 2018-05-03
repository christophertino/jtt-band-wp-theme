<?php
/**
 * Pagination Module
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<?php $big = 999999999; // need an unlikely integer
$pagination = array(
	'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
	'format' => '?paged=%#%',
	'current' => max(1, get_query_var('paged')),
	'total' => $filtered_posts->max_num_pages,
	'prev_text' => 'Previous',
	'next_text' => 'Next'
);
$buildPagination = paginate_links($pagination);
if (!is_null($buildPagination)) : ?>
	<div class="module pagination">
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell">
					<div class="pagination-inner">
						<?php echo $buildPagination; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
