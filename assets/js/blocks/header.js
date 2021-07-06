import $ from 'jquery';
$(document).ready( function () {
	$('#contacts, .flex-head .close').click(function () {
		
		var contacts = $('.header__wrapper__bottom');
		var menu = $('.header__wrapper__menu__items');
		if ($(contacts).hasClass('active')) {
			$(contacts).slideUp(400);
			$(contacts).removeClass('active');
		}
		else {
			if ($(menu).hasClass('active')) {
				$(menu).slideUp(400);
				$(menu).removeClass('active');
				// $('.header__wrapper__menu').slideUp(400);
			}
			$(contacts).slideDown(400);
			$(contacts).addClass('active');
		}
	});
	
	$('#menu, .header__wrapper__menu .close').click(function () {
		
		var contacts = $('.header__wrapper__bottom');
		var menu = $('.header__wrapper__menu__items');
		if ($(menu).hasClass('active')) {
			$(menu).slideUp(400);
			$(menu).removeClass('active');
			// $('.header__wrapper__menu').slideUp(400);
		}
		else {
			if ($(contacts).hasClass('active')) {
				$(contacts).slideUp(400);
				$(contacts).removeClass('active');
			}
			// $('.header__wrapper__menu').slideDown(400);
			$(menu).slideDown(400);
			$(menu).addClass('active');
		}
	})
});
$(window).scroll(function () {
	var header = $('.header__wrapper');
	var headerHeight = 0;
	if ($('.header__wrapper__bottom').css('display') == 'none') {
		headerHeight = $('.header__wrapper__top').height()
	}
	else {
		headerHeight = $('.header__wrapper__top').height() + $('.header__wrapper__bottom').height();
	}
	if ($(this).scrollTop() > headerHeight) {
		$(header).addClass('fixed');
	} else {
		$(header).removeClass('fixed');
	}
});