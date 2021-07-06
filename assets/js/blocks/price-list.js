import $ from 'jquery';

$(".prices__list__main").click(function () {
	const element = $(this);
	if (element.hasClass('active')) {
		element.next(".prices__list__content").slideUp();
	}
	else{
		element.next(".prices__list__content").slideDown();
	}
	element.toggleClass('active');
});
$(document).ready(function(){
	// const screen_width = document.documentElement.clientWidth;
	const price_sections = $(".prices__list__main");
	if (/*screen_width > 576 &&*/ typeof price_sections[0] != 'undefined') {
		price_sections[0].click();
	}
});
