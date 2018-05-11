/**
 * Application Bundle
 *
 * Note: We bundle jQuery separately and attach via wp_register_script()
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */

import whatInput from 'what-input';
import Foundation from './foundation';
import JustTheTip from './justthetip';
import 'owl.carousel';

// expose globals
window.JustTheTip = JustTheTip;
