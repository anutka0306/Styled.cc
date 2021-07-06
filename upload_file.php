<?php

$mysqli = new mysqli('localhost', 'root', '', 'styled_cc');
$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$mysqli->set_charset('utf8');
$mysqli->set_charset('utf-8');

$strRequest = file_get_contents('php://input');
$strRequest = json_decode($strRequest, true);

if(empty($strRequest))
    $strRequest = $_REQUEST;

if($strRequest['get_category']){
    echo json_encode(['status'=>true, 'data'=>getCategory($mysqli)],256);
    die();
}

if(empty($strRequest['modal_name'])){
    echo json_encode(['status'=>false, 'error'=>'Не передан параметр modal_name'],256);
    die();
}
if(empty($strRequest['brand_name'])){
    echo json_encode(['status'=>false, 'error'=>'Не передан параметр brand_name'],256);
    die();
}
if(empty($strRequest['category_list'])){
    echo json_encode(['status'=>false, 'error'=>'Не передан параметр category_list'],256);
    die();
}
if(empty($strRequest['files_download_url'])){
    echo json_encode(['status'=>false, 'error'=>'Не передан параметр files_download_url'],256);
    die();
}

$request = $mysqli->query("SELECT model.id FROM `price__brand` as brand, `price__model` as model WHERE model.name = '".$strRequest['modal_name']."' AND brand.name = '".$strRequest['brand_name']."' AND model.brand_id = brand.id", MYSQLI_USE_RESULT);
$row=[];
while ($obj3 = $request->fetch_object()) {
    $row = array_merge($row,json_decode(json_encode($obj3),true));
}

if(empty($row['id'])){
    echo json_encode(['status'=>false, 'error'=>'Не найдена марка или модель!'],256);
    die();
}

$mysqli->query("INSERT INTO `our_works` (`price_model_id`) VALUES ('".$row['id']."')", MYSQLI_USE_RESULT);
$id = $mysqli->insert_id;
foreach ($strRequest['category_list'] as $value){
    $requestCategoryId = $mysqli->query("SELECT id FROM `price__services` WHERE `slug` = '".$value."'", MYSQLI_USE_RESULT);
    $row=[];
    while ($obj3 = $requestCategoryId->fetch_object()) {
        $row = array_merge($row,json_decode(json_encode($obj3),true));
    }
    if(!empty($row['id']))
        $mysqli->query("INSERT INTO `our_works_price_service` (`our_works_id`, `price_service_id`) VALUES ('".$id."','".$row['id']."')", MYSQLI_USE_RESULT);
}
$path_save_file = "img/our-works/".$id;

if(!file_exists($path_save_file)){
    if (!mkdir($path_save_file, 0777, true)) {
        echo json_encode(['status'=>false, 'error'=>'Ошибка создания директории ('.$path_save_file.')!'],256);
        die();
    }
}

if(!empty($strRequest['files_download_url'])){
    foreach ($strRequest['files_download_url'] as $value_url) {
        $result_parse_url = parse_url($value_url);
        $parce_query = [];
        parse_str($result_parse_url['query'], $parce_query);
        $file_name = $parce_query['filename'];
        file_put_contents($path_save_file . '/' . $file_name, file_get_contents($value_url));
        resize($path_save_file . '/' . $file_name, 1200); // Уменьшаем до 1200 px
        compressImage($path_save_file . '/' . $file_name, $path_save_file . '/' . $file_name, 50); // Сжимаем качество картинки
    }
    echo json_encode(['status'=>true, 'callback_url'=>strtolower('https://fuelfuture.ru/'.$strRequest['brand_name'].'/'.$strRequest['modal_name']), 'error'=>'none'],256);
    die();
}

function compressImage($source_url, $destination_url, $quality) {
    $info = getimagesize($source_url);
    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
    else return false;
    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
}

function resize($image, $w_o = false, $h_o = false) {
    if (($w_o < 0) || ($h_o < 0)) {
        echo "Некорректные входные параметры";
        return false;
    }
    list($w_i, $h_i, $type) = getimagesize($image);
    $types = array("", "gif", "jpeg", "png");
    $ext = $types[$type];
    if ($ext) {
        $func = 'imagecreatefrom'.$ext;
        $img_i = $func($image);
    } else {
        echo 'Некорректное изображение';
        return false;
    }
    if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
    if (!$w_o) $w_o = $h_o / ($h_i / $w_i);
    $img_o = imagecreatetruecolor($w_o, $h_o);
    imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
    $func = 'image'.$ext;
    return $func($img_o, $image);
}

function getCategory($mysqli): array
{
    $request = $mysqli->query("SELECT name, slug FROM `price__services`", MYSQLI_USE_RESULT);
    $row=[];
    while ($obj3 = $request->fetch_object()) {
        $row = array_merge($row,[json_decode(json_encode($obj3),true)]);
    }
    return $row;
}
