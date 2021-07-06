import '../../scss/blocks/before_after.scss'

import $ from 'jquery';
import 'slick-carousel';
$(document).ready(function () {
	
	$('.before-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		lazyLoad: 'ondemand',
		infinite: true,
		arrows: false,
		dots: false,
		asNavFor: '.nav-before-slider',
		swipe: false,
		swipeToSlide: false,
		autoplay: true,
        autoplaySpeed: 2000,
	});
	
	$('.nav-before-slider').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		lazyLoad: 'ondemand',
		infinite: true,
		arrows: true,
		dots: false,
		variableWidth: false,
		asNavFor: '.before-slider',
		focusOnSelect: true,
		swipe: false,
		swipeToSlide: false
	});
});