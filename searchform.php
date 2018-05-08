<?php
/**
 * Search Form
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<input type="search" placeholder="Search Just the TIp&hellip;" value="<?php echo get_search_query() ?>" name="s" title="Search for:" />
	<button type="submit">
		<i class="fas fa-search"></i>
	</button>
</form>
