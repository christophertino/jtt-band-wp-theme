/**
 * Application Logic
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */

import $ from 'jquery';
import whatInput from 'what-input';
import Foundation from './foundation';
import 'owl.carousel';

//Define our global namespace
let JustTheTip = JustTheTip || {};

/**
 * Immediately Invoked Function Expression
 * @desc	Pass in JustTheTip namespace as App
 * @desc	Leading semi-colon for minification purposes
 */
;(function($, window, document, App) {

	App.utilities = {

		buildBindings : function() {
			//do stuff
		}
	};

	App.pages = {
		homepage: function(){
			$('.homepage-hero').owlCarousel({
				items:1,
				loop:true,
				nav:false
			});
		}
	};

	App.init = function() {

		$(document).foundation();

		App.utilities.buildBindings();

		//Call other App methods here

	};

})(jQuery, window, document, JustTheTip);
