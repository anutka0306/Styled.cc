import $ from 'jquery';
import '../libs/jquery.maskedinput.min';

$(document).ready(function () {
	$('.wapopup').click(function (e) {
		e.preventDefault();
		
		$('.w-popup').addClass('open');
	})
	
	$('.w-popup-close').click(function (e) {
		e.preventDefault();
		
		$('.w-popup').removeClass('open');
	})
	
	$('.whatsapppop').click(function () {
		dataLayer.push({
			'event': ' whatsapp'
		});
	})
});