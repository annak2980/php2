<?php

//подключаем все библиотеки
require_once('../config/config.php');

//получаем URL запроса к сайту и разбиваем его в массив url_array
$url_array = explode("/", $_SERVER['REQUEST_URI']);


if ($url_array[1] == ""){
	$page_name = "main_gallery"; //главная страница сайта пока будет не index, а галерея картинок
    
    header("location: /main_gallery/");
}
else
	$page_name = $url_array[1];

//подготовку переменных вынесли в отдельную функцию
//в нее передаем имя страницы, переменные для которой нужно подготовить
$variables = prepareVariables($page_name);

$mainvar = [];

$mainvar["content"]   = renderPage($page_name, $variables);
$mainvar["titlepage"] = 'МАГАЗИН ФОТОКАРТИН';

echo renderPage("main", $mainvar);

_log("Страница загружена",'messages');
_log($variables,'vars');