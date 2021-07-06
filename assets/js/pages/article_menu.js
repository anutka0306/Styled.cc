import $ from 'jquery';
$(document).ready(function() {
	
	var toggleFlag = false;
	
	$('.services-list-btn').on('click', function () {
		servicesListCalculateWidth();
	});
	
	
	function servicesListCalculateWidth() {
		var containerWidth = $('#block_usl_model_top').outerWidth();
		var maxWidth = $('#block_usl_model_top li').eq(0).outerWidth();
		var columns = Math.floor(containerWidth / maxWidth);
		var showColumns = columns * 3;
		if (toggleFlag) {
			$('#block_usl_model_top li').show();
			$('.services-list-btn').text('Свернуть');
			toggleFlag = false;
		} else {
			$('#block_usl_model_top li').hide();
			$('#block_usl_model_top li:lt(' + showColumns + ')').show();
			$('.services-list-btn').text('Показать все');
			toggleFlag = true;
		}
	}
	
	servicesListCalculateWidth();
});