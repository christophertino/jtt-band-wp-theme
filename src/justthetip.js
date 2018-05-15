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
			autoplayHoverPause: false,
			loop: true,
			navText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
			responsive: {
				0: {
					nav: false,
				},
				640: {
					nav: false,
				},
				1024: {
					nav: true,
				}
			}
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

	videoPage() {
		$('.video-hero').owlCarousel({
			items: 1,
			loop: true,
			video: true,
			navText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
			responsive: {
				0: {
					nav: false,
				},
				640: {
					margin: 15,
					nav: false,
					stagePadding: 100,
				},
				1024: {
					margin: 30,
					nav: true,
					stagePadding: 200,
				}
			}
		});
	}

	weddingsPage() {
		$('.weddings-hero').owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			autoplayHoverPause: true,
			nav: true,
			navText: ['<i class=\"fa fa-angle-left\"></i>', '<i class=\"fa fa-angle-right\"></i>'],
			responsive: {
				640: {
					margin: 15,
					stagePadding: 100,
				},
				1024: {
					margin: 30,
					stagePadding: 200,
				}
			}
		});
	}

	blogPost() {
		// Open linked blog posts images in foundation reveal modal
		$('.blog-content a[href$="jpg"], .blog-content a[href$="png"], .blog-content a[href$="jpeg"]').on('click', function(e){
			e.preventDefault();
			$('#blog-post-modal').append('<img src="' + $(this).attr('href') + '">').foundation('open');
		})
	}
}

// singleton
export default new JustTheTip();
