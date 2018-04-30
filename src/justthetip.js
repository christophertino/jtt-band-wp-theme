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
	}
}

// singleton
export default new JustTheTip();
