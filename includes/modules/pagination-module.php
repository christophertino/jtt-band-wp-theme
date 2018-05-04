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

<?php $args = array(
	'type' => 'array',
	'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
	'format' => '?paged=%#%',
	'current' => max(1, get_query_var('paged')),
	'total' => $filtered_posts->max_num_pages,
	'prev_text' => 'Previous',
	'next_text' => 'Next'
);
$pagination = paginate_links($args);

if (!is_null($buildPagination)) : ?>
	<div class="module">
		<div class="grid-container">
			<div class="grid-x">
				<div class="cell">
					<ul class="pagination">

					</ul>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
