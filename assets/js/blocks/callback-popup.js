import $ from 'jquery';
import '../libs/jquery.maskedinput.min';

function verifyForm(Form) {
	let phone = $(Form).find('[name="phone"]');
	var email = $(Form).find('[name="email"]');
	var select = $(Form).find('select');
	let errors = false;
	
	for (let i = 0; i < $(Form).find('[required]').length; i++) {
		let element = $(Form).find('[required]').eq(i);
		element.next().removeClass('show');
		if (element.val() == '') {
			element.addClass('error')
				.next().addClass('show')
				.text('Поле обязательно для заполнения');
			errors = true;
		}
	}
	
	if (phone.length) {
		let value = phone.val();
		let phone_pattern = /7\d{10}/;
		if (value == '') {
		} else if (/_/gi.test(value)) {
			phone.addClass('error')
				.next().addClass('show')
				.text('Введите корректный номер телефона');
			
			errors = true;
		} else if (!phone_pattern.test(value.replace(/\D/gi, ''))) {
			phone.addClass('error')
				.next().addClass('show')
				.text('Введите корректный номер телефона');
			console.log(value.replace(/\D/gi, ''));
			errors = true;
		}
	}
	if (email.length) {
		value = email.val();
		var regexp = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
		
		if (value != '' && !regexp.test(value)) {
			email.addClass('msg-error')
				.next().addClass('show')
				.text('Введите корректный адрес электронной почты');
			
			errors = true;
		}
	}
	
	if (select.val() == '0' || !select.val().length) {
		select.addClass('msg-error')
			.next().addClass('show')
			.text('Пожалуйста, выберите Сервисный Центр');
		
		errors = true;
	}
	else {
		select.removeClass('msg-error')
			.next().removeClass('show')
			.text('');
	}
	return errors;
}

function parseValues(values) {
	let result = {};
	
	for (let i = 0; i < values.length; i++)
		result[values[i].name] = values[i].value;
	
	return result;
}

function sendForm(formData, Form) {
	$.ajax({
		type: 'POST',
		url: Form.action,
		data: formData,
		dataType: 'json',
		success: function (data) {
			if (data.status) {
				showSuccessMsg();
			}
			else {
				alert("Возникли ошибки:\n - " + data.errors.join("\n - "));
			}
		},
		error: function (e) {
			console.log(e.responseJSON);
			alert(e.responseJSON.detail);
		}
	});
}
function showSuccessMsg() {
	$('.form-body').hide();
	$('.form-msg').show();
	const modal_callback = $('#modal-callback');
	if (! modal_callback.hasClass('is-visible')) {
		modal_callback.addClass('is-visible')
	}
}
$(document).ready(function () {
	const modal_callback = $('.popup');
	const modal_title = modal_callback.find('.middle_text_form');
	$(document).on('click', '.popup-trigger', function (e) {
		e.preventDefault();
		let title = $(this).data('title');
		if (!title) {
			title = 'Заказать звонок';
		}
		modal_title.html(title + ':');
		modal_callback.addClass('show');
	});
	$('.popup .close').click(function (e) {
		e.preventDefault();
		$(this).parent().parent().removeClass('show');
		$('.error-input').removeClass('show');
	});
	$(".phone").mask("+7(999)999-99-99");
	
	$('.callback_submit').click(function (e) {
		e.preventDefault();
		var Form = (this).closest('form');
		if (verifyForm(Form)) {
			return;
		}
		
		//$(this).prop('disabled', true);
		
		let tel = $(Form).find('input[name="phone"]').val();
		
		if (window.Comagic) {
			
			// const array_of_dealers_for_comagic = {
			// 	'lobn': 188028,
			// 	'udal': 188022,
			// 	'sev': 188026,
			// };
			//
			// var t = +new Date() + 10000;
			// const location = $(Form).find('select[name=location]').val();
			// var selected_location = array_of_dealers_for_comagic[location];
			// Comagic.sitePhoneCall({
			// 	captcha_key: '',
			// 	captcha_val: '',
			// 	phone: tel,
			// 	delayed_call_time: t.toString(),
			// 	group_id: selected_location
			// }, function (resp) {
			//
			// });
            var t = +new Date() + 10000;
            var settings = {
                "url": "https://admin.qrenta.ru/api/sitephone/code_perezvon?phone=78004&site=4",
                "method": "GET",
                "timeout": 0,
            };
            $.ajax(settings).done(function (response) {
                var id_ploshadki = "";
                if(response['status']){
                    id_ploshadki = response['data']['code_perezvon'];
                }
                ComagicWidget.sitePhoneCall({phone: tel, group_id: id_ploshadki, delayed_call_time: t.toString()});
            });
		}
		
		
		let formData = parseValues($(Form).serializeArray());
		sendForm(formData, Form);
	});
});