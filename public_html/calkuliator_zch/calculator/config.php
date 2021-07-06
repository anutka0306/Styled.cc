<?php
$host_map    = [
    'fuelfuture.rul' => "BK*cpX1j",//178.158.52.219
    'fuelfuture.ru' => "SyV6J8sB",
    'fuelfuture.cd41104.tmweb.ru' => "%sE6xR6b",
    'fuel.ch82817.tmweb.ru' => "SyV6J8sB",
];
$server_host = $_SERVER['HTTP_HOST'];
$dblocation  = "localhost";
$dbname      = "ch82817_calkul";
$dbuser      = "ch82817_calkul";
$dbpasswd    = $host_map[$server_host];

// Директивы гостевой книги
// Число выводимых сообщений на странице
$pnumber = 10;
// Отправлять письмо на e-mail при добавлении нового сообщения
// в гостевую книгу? Для включения данного сервиса исправите на true
$sendmail = false;
// e-mail на который следует отправлять сообщение
$valmail = "123451973@mail.ru";
// Устанавливаем соединение с базой данных
$dbcnx = mysqli_connect($dblocation, $dbuser, $dbpasswd, $dbname);
mysqli_set_charset($dbcnx, "utf-8");//cp1251
if ( ! $dbcnx) {
    $error =  mysqli_connect_error();
    echo(
    '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title><P>В настоящий момент сервер базы данных не доступен, поэтому корректное отображение страницы невозможно.</P>'.$error);
    exit();
}

// Небольшая вспомогательная функция, которая выводит сообщение об ошибке
// в случае ошибки запроса к базе данных
/* function puterror($message)
{
  echo("<p>$message</p>");
  exit();
} */ ?>