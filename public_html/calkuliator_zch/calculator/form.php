<div id="contact_form">
	<table style="background:#fff;">
		<tr>
			<td>
				<h3>Заполните данные для отправки заявки</h3>
				
				<div class="input_wrapper">
					<p for="calculator_contactName">Выберите техцентр *</p>
					
					<p>
						<label>
							<input type="radio" name="RadioGroup1" value="Севастопольский" id="RadioGroup1_0" />
							Севастопольский</label>
						<br />
						<label>
							<input type="radio" name="RadioGroup1" value="Мичуринский" id="RadioGroup1_1" />
							Мичуринский</label>
						<br />
						<!--<label>
							<input type="radio" name="RadioGroup1" value="Нижегородская" id="RadioGroup1_2" />
							Нижегородская</label>
						<br />-->
						
						<label>
							<input type="radio" name="RadioGroup1" value="Лобненская" id="RadioGroup1_3" />
							Лобненская</label>
						<br />
					</p>
				</div>
				<div class="input_wrapper">
					<p for="calculator_contactName">Имя или организация *</p>
					<input type="text" name="fio" id="calculator_contactName" class="required" value="" tabindex="1" />
				</div>
				
				<div class="input_wrapper">
					<p for="calculator_email">Email </p>
					<input type="text" name="email" id="calculator_email" class="required email" value=""
					       tabindex="2" />
				</div>
				
				<div class="input_wrapper">
					<p for="calculator_phone">Телефон</p>
					
					<input type="text" name="calculator_phone" id="calculator_phone" class="required last" value=""
					       tabindex="3" />
				
				</div>
				<div class="input_wrapper">
					<!--<div class="g-recaptcha" id="recaptcha6" style="display: inline-block"></div><br>-->
					<div class="checkCogalcie"  style="display: inline-block">
						<input type="checkbox" name="checkDataCalc" id="checkDataCalc" checked>
						<label for="checkDataCalc">Даю согласие на обработку и хранение своих персональных данных</label><br>
					</div>
				</div>
				
				<input name="submit" type="button" id="submit" class="btn_smallblue left" value="Отправить заявку"
				       onclick="send_button(); "><!--ga('send', 'event', 'goals1', 'reg1');-->

</div>

<div id="blok_otpravki" style="color:#F00"></div>

<div class="clear"></div>

<? if ($_SERVER ['REQUEST_URI'] != '/calkuliator/'){ ?>
<div class="sert">
	
	<p style="text-align: center;"><span
				style="font-size: large; color: #000000;">Сертификат соответствия ON-Line калькулятора:</span>
	</p>
	
	<p style="text-align: center;"> </p>
	
	<p>
		<span style="font-size: medium;">1. Все расчеты в Он-Лайн калькуляторе (кроме замены фар, фонарей и стекол) , включают в себя стоимость материалов для окраски и/или кузовного ремонта.</span>
	</p>
	
	<p>
		<span style="font-size: medium;">2. В стоимость замены, кузовного ремонта и покраски, включена стоимость работ по разборкее/сборке как самой детали, так и снятие/установка сопряженных элементов конструкции, препятствующих кузовному ремонту и/или покраске автомобиля.</span>
	</p>
	
	<p>
		<span style="font-size: medium;">3. Расчет наружной покраски автомобиля, выполняется по специальным нормативам и итоги расчета по покраске всех элементов кузова на данном калькуляторе, не могут служить основанием для рассмотрения в качестве возможных претензий по сумме расчета.</span>
	</p>
	
	<p>
		<span style="font-size: medium;">4. Он-лайн калькулятор стоимости кузовного ремонта и покраски автомобиля, не является основанием для выполнения окончательных расчетов с заказчиком, поскольку предназначен для ознакомления возможных клиентов с уровнем цен автоцентра, посредством сервиса на официальном сайте компании.</span>
	</p>
	
	<p>
		<span style="font-size: medium;">5. Окончательная стоимость работ и материалов, формируется после осмотра и дефектации транспортного средства в условиях автосервиса.</span>
	</p>
	
	<p>
		<span style="font-size: medium;">6. В настоящем Он-Лайн калькуляторе, использованы средневзвешенные нормативы на кузовные работы, работы по разборке/сборке и покраске, сформированные посредством выборки их применения на различных марках и моделях автомобилей.</span>
	</p>
	
	<p>
		<span style="font-size: medium;">7. Настоящий калькулятор не применим для расчета стоимости ремонта эксклюзивных и/или представительских автомобилей, а также стоимости эксклюзивной покраски кузова или его элементов.</span>
	</p>
	
	<p>
		<span style="font-size: medium;">8. Он-Лайн калькулятор не учитывает стоимость работ по подготовке стапеля, кондуктора, установке автомобиля на стапель, проверку и регулировку развал-схождения, а также работы по диагностике и ремонту подвески.</span>
	</p>
	<br>
	<p><span style="font-size: medium;">Обратите внимание на то, что данный интернет-ресурс (в том числе указанные цены на услуги) носит исключительно ознакомительный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 (2) Гражданского кодекса РФ. Стоимость работ меняется в зависимости от марки автомобиля, его возраста и технического состояния.
    </span>
	</p><? } ?>
</div>
</td>
</tr>
</table>

</div>

<!--начало колтрекинг маркетинг calltracking.ru-->
<script type="text/javascript">
	var __cs = __cs || [];
	__cs.push(["setCsAccount", "LhGfwnpqgUuneAOUpGhOdqibcZngBSkl"]);
</script>
<script type="text/javascript" async src="https://app.comagic.ru/static/cs.min.js"></script>
<!--конец колтрекинг маркетинг calltracking.ru-->
<script>
	/*$(document).ready(function($){
    $(function(){
      $("#calculator_phone").mask("8(999) 999-9999");
    });
    
    });*/
	function send_button() {
		var name = document.getElementById('calculator_contactName').value;
		var phone = document.getElementById('calculator_phone').value;
		/*var captcha = grecaptcha.getResponse(cacl);*/
		
		
		if ((!$("#RadioGroup1_0").is(":checked"))
			&& (!$("#RadioGroup1_1").is(":checked"))
			&& (!$("#RadioGroup1_2").is(":checked"))
			&& (!$("#RadioGroup1_3").is(":checked"))
		
	 )
		
	 {alert('Выберите салон!');return false;}
	 
	if(name==''){alert('Заполните поле имя'); return;}
	if (/[0-9]/.test(name) ) {alert('В поле Имя не могут содержаться цифры!');return;}
	if (/[a-zA-Z]/.test(name) ) {alert('В поле Имя не могут содержаться английские буквы!');return;}
	if(phone==''){alert('Заполните поле телефон'); return;}
	
		if (!$("#checkDataCalc").is(":checked")) {
			alert('Вы не дали согласие на обработку персональных данных!');
			return;
		}
		
		var msg = $('#kalk_form').serialize();
		$("#blok_otpravki").empty();//чистим всё лишнее
		if ($("#RadioGroup1_0").is(":checked")) {
			var id_ploshadki = '205861';
		}//Севастопольский
		if ($("#RadioGroup1_1").is(":checked")) {
			var id_ploshadki = '205857';
		}//Мичуринский
		if ($("#RadioGroup1_2").is(":checked")) {
			var id_ploshadki = '205859';
		}//Нижегородская
		if ($("#RadioGroup1_3").is(":checked")) {
			var id_ploshadki = '205855';
		}//Лобненская
		
		if (window.ComagicWidget) {
			var t = +new Date() + 10000;
//alert('2');
			ComagicWidget.sitePhoneCall({phone: phone, group_id: id_ploshadki, delayed_call_time: t.toString()});
		}
		// ga('send', 'event', 'goals1', 'reg1'); 
		//$("#blok_spisok_rabot").empty();
		$.ajax({
			type: 'POST',
			url: '<?=$url ?>calculator/ajax.obrabotchik.php',
			data: msg,
			success: function (data) {
				$('#blok_otpravki').html(data);
				window.onload = function () {
					//ga('send', 'event', 'goals1', 'reg1');
					yaCounter41408589.reachGoal('kuzovnoi_kalkuliator');
					//Comagic.addOfflineRequest({name: name_client, phone: phone});
				}
			},
			error: function (xhr, str) {
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		});
		
	}</script>
<script src="/js/phone.mask.js"></script>
<script>
	$(function () {
		$("#calculator_phone").mask("+7(999) 999-99-99");
	});
</script>
