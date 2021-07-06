import $ from 'jquery'
import '../libs/jquery.magnific-popup.min';
$('body').on('click', 'a.popup-img', function (e) {
	e.preventDefault();
	var theGoodStuff = $(this).attr('href');
	$.magnificPopup.open({
		items: {
			src: theGoodStuff,
		},
		type: 'image'
	});
});