<?php $otpravka = 0;
//include (dirname(__FILE__).'/../../config.php');
//<pre>print_r($_POST);

if ( ! isset($_POST['RadioGroup1'])) {
    print 'Выберите, пожалуйста, техцентр<br>';
}
function strip_data($text)
{
    $quotes     = array("\x27", "\x22", "\x60", "\t", "\n", "\r", "*", "%", "<", ">", "?", "!");
    $goodquotes = array("-", "+", "#");
    $repquotes  = array("\-", "\+", "\#");
    $text       = trim(strip_tags($text));
    $text       = str_replace($quotes, '', $text);
    $text       = str_replace($goodquotes, $repquotes, $text);
    $text       = str_replace(" +", " ", $text);
    
    return $text;
}

$_POST['fio'] = strip_data($_POST['fio']);
if ($_POST['fio'] == '') {
    print 'Заполните поле Имя<br>';
    $otpravka = 1;
}
if (preg_match("/[a-zA-Z0-9]/", $_POST['fio'])) {
    echo "Имя пользователя задано в неправильном формате<br>";
    $otpravka = 1;
}

if (($_POST['email'] == '') && ($_POST['calculator_phone'] == '')) {
    print 'Заполните поле телефон, e-mail<br>';
    $otpravka = 1;
}

if ($_POST['email'] != '') {
    if (1 == preg_match(
                 '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u',
                 $_POST['email']) . '<br/>') {
        //echo '"' . $_POST['email'] . '" : correct' . '<br/>';
    } else {
        if ($_POST['email'] != '') {
            echo '"' . $_POST['email'] . '" : не корректный е-майл' . '<br/>';
            $otpravka = 1;
        }
    }
}

/*$url       = 'https://www.google.com/recaptcha/api/siteverify';
$secret    = '6LdAi0EUAAAAAJ78vQty-t922-hbjhLCp8hFupAH';
$recaptcha = $_POST['g-recaptcha-response'];
$ip        = $_SERVER['REMOTE_ADDR'];

$url_data = $url . '?secret=' . $secret . '&response=' . $recaptcha . '&remoteip=' . $ip;
$curl     = curl_init();

curl_setopt($curl, CURLOPT_URL, $url_data);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$res = curl_exec($curl);
curl_close($curl);
$res = json_decode($res);
if ( ! $res->success) {
    $otpravka = 1;
}*/

if ($otpravka == 0) {
    $message = '';
    if (isset($_POST['fio'])) {
        $name = $_POST['fio'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['calculator_phone'])) {
        $tel = $_POST['calculator_phone'];
    }
    if (isset($_POST['RadioGroup1'])) {
        $tex = $_POST['RadioGroup1'];
    }
    
    if ($_POST['mob_calk'] == 'on') {
        $result = count($_POST);
        while ($i++ <= $result) {
            
            if (isset($_POST['checkbox-' . $i])) {
                $message .= $_POST['name-' . $i] . ',' . $_POST['tip_rabot-' . $i] . ',' . $_POST['cena-' . $i] . ' руб., количество:' . $_POST[$i . '-kol'] . '<br>';
                $sena    = ($_POST['cena-' . $i] * $_POST[$i . '-kol']) + $sena;
            }
        }
        $message .= 'Итого:' . $sena . ' руб.';
    } else {
        foreach ($_POST as $key => $val) {
            if (($key != 'fio') && ($key != 'email') && ($key != 'calculator_phone') && ($key != 'RadioGroup1') && ($key != 'checkDataCalc') && ($key != 'g-recaptcha-response')) {
                
                $message .= $val . '<br>';
                
            }
        }
    }
    
    $subject = 'fuelfuture.ru - калькулятор';
    //Форма требует обработки и перезвона клиенту. <br>
    $message = "

Техцентр: $tex<br>
Имя: $name<br>  
Email: $email<br>   
Телефон: $tel<br>   

Заказаные работы:<br> 
$message
";
    
    //заголовки
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=UTF-8\n";
    $headers .= "From: robot@fuelfuture.ru\n";
    
    $phoneCheck = preg_replace('~\D+~', '', $_POST['calculator_phone']);
    if ( ! stristr($phoneCheck, '1111111111')) {
        //не тест
        if ($_POST['RadioGroup1'] == 'Мичуринский') {//Удальцова
            $emailAr = array('rsb@mbmwservice.ru', 'director@mbmwservice.ru');
        }
        if ($_POST['RadioGroup1'] == 'Севастопольский') {
            $emailAr = array('Service@rovercity.ru', 'Direktor@rovercity.ru');
        }
        //Нижегородская
        if ($_POST['RadioGroup1'] == 'Нижегородская') {
            $emailAr = array('Rsb@tokyogarage.ru', 'Direktor@tokyogarage.ru');
        }
        if ($_POST['RadioGroup1'] == 'Лобненская') {
            $emailAr = array('rsb3@qmotors.ru', 'direktor@qmotors.ru');
        }
    }
    
    $emailAr[] = 'clients@qmotors.ru';
    
    foreach ($emailAr as $emailItem) {
        mail($emailItem, $subject, $message, $headers);
    }
    ?>
    <?php if ($_POST['mob_calk'] == 'on') {
        echo 'send ok';
    } ?>
	<script>
		//PopUpHide();
        <?php if($_POST['mob_calk'] == 'on'){ ?>
		
		sbros_formi(); <? } ?>
        <?php if(( ! isset($_POST['mob_calk'])) && ($_POST['mob_calk'] != 'on')){ ?>
		alert('send ok');//отправка прошла успешно
		javascript:window.close();<?php }?>
	</script>
    <?
}

?>
