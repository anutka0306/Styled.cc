import $ from 'jquery';

let popular_brands = $('.popular_brands');
let all_brands = $('.all-brands');
let show_all_brands = $('.show-all-brands');
show_all_brands.on('click',function() {
	if (popular_brands.is(":visible")) {
		popular_brands.slideUp();
		all_brands.slideDown();
		show_all_brands.html('Показать популярные');
	}else {
		all_brands.slideUp();
		popular_brands.slideDown();
		show_all_brands.html('Показать ещё марки');
	}
});