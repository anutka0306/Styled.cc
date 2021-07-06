/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
import '../scss/app.scss';
import '../scss/global.scss';

import './blocks/header'
import './blocks/callback-popup'
import './blocks/whatsapp_button'
import './blocks/map'
import './blocks/mango'
import './blocks/price-list'
import './blocks/before_after'
import './blocks/brands'
import './blocks/read_more'
import './global/swiper_sliders'
import './blocks/special_offers'
import './blocks/naschiraboty'
import LazyLoad from './libs/lazyload.min'

new LazyLoad({
	elements_selector: ".lazy"
});
// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

