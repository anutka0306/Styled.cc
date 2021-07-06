import $ from 'jquery';
import '../libs/jquery.maskedinput.min';

$(document).ready(function ($) {

	// Маска для телефона
	$('.js-phone').mask( "+7(999) 999-99-99");
	$('.js-email').mask("*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]");

	$('.seo-box__text-hide').hide();
	$('.seo-box__more').on('click', function(){
		$(this).toggleClass('is-show');
		$(this).prev('.seo-box__text-hide').slideToggle();
		$(this).text($(this).text() === 'Свернуть' ? 'Развернуть' : 'Свернуть');
	});

  // Показываем ,бренды
  $('.brands > div').hide();
  $('.brands > div').slice(0, 4).show();
  $('.brands__more').on('click', function (e) {
  	e.preventDefault();
  	$('.brands > div:hidden').slice(0, 2).slideDown();
  	var elHidden = $('.brands > div:hidden').length;
  	if (elHidden <= 0) {
  		$('.brands__more').hide();
  	}
  });

});