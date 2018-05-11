/**
 * jQuery Bundle
 *
 * Bundles current production jQuery to replace legacy version
 * included with WordPress by default.
 *
 * Just the Tip Band Theme
 * https://www.justthetipband.com
 *
 * @author 	Christopher Tino
 * @license	Copyright (c) 2018 Just the Tip Band
 */

import $ from 'jquery';

// Use `global` instead of `window` to prevent `ReferenceError: jQuery is not defined`
// from dependent WordPress javascript files
global.jQuery = global.$ = $;
