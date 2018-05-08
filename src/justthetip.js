/**
 * Just the Tip Class
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */

class JustTheTip {
	init() {
		$(document).foundation();
	}

	homepage() {
		$('.homepage-hero').owlCarousel({
			items: 1,
			autoplay: true,
			autoplayHoverPause: true,
			loop: true,
			nav: false,
			navText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>']
		});

		// fetch instagram feed
		$.get('/wp-admin/admin-ajax.php', {
			action: 'fetch_instagram'
		}, function(response) {
			var output = '';
			if (response.Succeeded === false) {
				output += '<h4 class="text-center">Sorry, no Instagram posts found.</h4>';
			} else {
				var data = response.data;
				output += '<div class="grid-x small-up-2 medium-up-4 large-up-6">';
				data.forEach(function(value, index) {
					output += '<div class="cell">';
					//anchor tag here with foundation tooltip. background image with cover, zoom on hover
					output += '<span class="instagram-tooltips" data-tooltip data-alignment="center" tabindex="1" title="' + value.caption.text + '">';
					output += '<a class="instagram-image background-image-cover" href="' + value.link + '" style="background-image:url(' + value.images.standard_resolution.url + ');" target="_blank"></a>';
					output += '</span>';
					output += '</div>';
				});
				output += '</div>';
				$('#instagram-feed').html(output).foundation();
			}
		}, 'json');
	}
}

// singleton
export default new JustTheTip();
