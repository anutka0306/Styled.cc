import $ from 'jquery';
import './callback-popup.scss'

function verifyForm(Form) {
	const phoneField = $(Form).find('[name="phone"]');
	const emailField = $(Form).find('[name="email"]');
	const nameField = $(Form).find('[name="name"]');
	const selectField = $(Form).find('select');
	let errors = false;
	
	for (let i = 0; i < $(Form).find('[required]').length; i++) {
		let element = $(Form).find('[required]').eq(i);
		element.next().removeClass('show');
		if (element.val() === '') {
			element.addClass('error')
				.next().addClass('show')
				.text('Поле обязательно для заполнения');
			errors = true;
		}
	}
	
	if (phoneField.length) {
		let phoneValue = phoneField.val();
		let phone_pattern = /7\d{10}/;
		if (phoneValue === '') {
		} else if (/_/gi.test(phoneValue)) {
			phoneField.addClass('error')
				.next().addClass('show')
				.text('Введите корректный номер телефона');
			
			errors = true;
		} else if (!phone_pattern.test(phoneValue.replace(/\D/gi, ''))) {
			phoneField.addClass('error')
				.next().addClass('show')
				.text('Введите корректный номер телефона');
			console.log(phoneValue.replace(/\D/gi, ''));
			errors = true;
		}
	}

	if (emailField.length) {
		let emailValue = emailField.val();
		const regexp = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
		
		if (emailValue !== '' && !regexp.test(emailValue)) {
			emailField.addClass('msg-error')
				.next().addClass('show')
				.text('Введите корректный адрес электронной почты');
			
			errors = true;
		}
	}

	if (nameField.length) {
		let nameValue = nameField.val();
		const regexpName = /[a-z0-9]+/i;

		if (nameValue !== '' && regexpName.test(nameValue)) {
			nameField.addClass('msg-error')
				.next().addClass('show')
				.text('Имя не должно содержать латинских символов и цифр');

			errors = true;
		}else{
			nameField.removeClass('msg-error')
				.next().removeClass('show')
				.text('');
		}
	}

	if (selectField.length){
		if (selectField.val() === '0' || !selectField.val().length) {
			selectField.addClass('msg-error')
				.next().addClass('show')
				.text('Пожалуйста, выберите Сервисный Центр');

			errors = true;
		}
		else {
			selectField.removeClass('msg-error')
				.next().removeClass('show')
				.text('');
		}
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
				alert(data.msg);
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
	$(document).on('click', '.js-popup-trigger', function (e) {
		e.preventDefault();
		let title = $(this).data('title');
		if (!title) {
			title = $(this).html();
		}
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
	
	$('.js-callback-form').submit(function (e) {
		e.preventDefault();
		var Form = (this).closest('form');
		if (verifyForm(Form)) {
			return false;
		}
		
		//$(this).prop('disabled', true);
		
		let tel = $(Form).find('input[name="phone"]').val();

		if (window.Comagic) {

			// const array_of_dealers_for_comagic = {
			// 	'lobn': 205855,
			// 	'udal': 205857,
			// 	'sev': 205861,
			// };
            //
			// var t = +new Date() + 10000;
			// const location = $(Form).find('select[name=location]').val();
			// var selected_location = array_of_dealers_for_comagic[location];
			// console.log('Location: '+location);
			// console.log('Comagic group: '+selected_location);
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