import $ from 'jquery';
import '../../../libs/jquery.maskedinput.min';

$(document).ready(function () {
	$(".phone_mask_perezvon").mask("(999) 999-99-99");
	
	$('#perethvon0').on('click',function () {
		$('#perethvon0').hide();
		$('#perethvon').show();
	});
	
	$('.close-popup_perezvon').on('click',function () {
		$('#perethvon0').show();
		$('#perethvon').hide();
	});
	
	$('div.button-widget_perezvon').on('click', function () {
		const phone = $("#phoneperezvon").val();
		
		
		if (phone.length < 7) {
			$('#phoneperezvon').css('border', '1px solid #FF0000');
			alert("заполните полое телефон, пожалуйста.");
		} else {
			//$('#phoneperezvon').css('border', '1px solid #B2B2B2');
		}
		
		
		if (phone.length > 6) {
			
			$(this).html('Отправка...');
			$.post("/mail/callback/mango",
				{phone: '+7' + phone, subject: 'Заказ звонка с сайта'},
				function (data111s22122ddd2111) {
					if (window.ComagicWidget) {
						var t = +new Date() + 10000;

					//	yaCounter41408589.reachGoal('perezvon');
						ComagicWidget.sitePhoneCall({
							phone: phone,
							group_id: '',
							delayed_call_time: t.toString()
						});
						console.log('phone =>'+phone);
					}else{
						console.log('Comagic не инициализирован!');
					}
					alert('Отправлено');
					$('#perethvon0').show();
					$('#perethvon').hide();
					$('.button-widget_perezvon').html('Отправлено');
					$('#phoneperezvon').remove();
				}
			);
		}
		
	});
});