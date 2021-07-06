<?
    if ( $_POST['do_thisss'] == 'perezvonishka')
    {
        $phonezrr=$_POST['phonezrr'];
        $headers =  "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=utf-8\n";
        $headers .= "From: fuelfuture.ru Mailer <robot@fuelfuture.ru>\n";
        $message11 = '<br>Запрос звонока с сайта<br><br>Телефон клиента: <b>'.$phonezrr.'</b><hr><br>С уважением, Почтовик fuelfuture.ru!';
        if(!stristr($phonezrr,'7(111) 111-11-11')){
            //не тест
            @mail('Service@rovercity.ru', 'Запрос звонока с сайта', $message11, $headers);
            @mail('Direktor@rovercity.ru', 'Запрос звонока с сайта', $message11, $headers);
            @mail('rsb@mbmwservice.ru', 'Запрос звонока с сайта', $message11, $headers);
            @mail('director@mbmwservice.ru', 'Запрос звонока с сайта', $message11, $headers);
            @mail('rsb3@qmotors.ru', 'Запрос звонока с сайта', $message11, $headers);
            @mail('direktor@qmotors.ru', 'Запрос звонока с сайта', $message11, $headers);
        }
        @mail('clients@qmotors.ru', 'Запрос звонока с сайта', $message11, $headers);
    }
?>