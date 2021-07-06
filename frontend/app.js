import 'uikit'
import 'uikit/dist/js/uikit-icons'
import 'uikit/dist/css/uikit.min.css'

import './blocks/main.sass';
import './blocks/main.js';
import './blocks/section/callback/callback-popup';
import './blocks/section/map/map';
import './blocks/section/mango/mango';
import './libs/swiper_slider/swiper_sliders.js';
import './libs/lazy_youtube/lazy_youtube';


import LazyLoad from './libs/lazyload.min'

new LazyLoad({
    elements_selector: ".lazy"
});