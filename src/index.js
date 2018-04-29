/**
 * Webpack Entry Point
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
import JustTheTip from './justthetip';
import 'owl.carousel';

// expose globals
window.$ = window.jQuery = $;
window.JustTheTip = JustTheTip;
