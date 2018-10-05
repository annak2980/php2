<?php
require_once('../config/config.php');

session_start();

$url_array = explode("/", $_SERVER['REQUEST_URI']);
//explode Возвращает массив (array) строк (string), созданный делением параметра string по границам, указанным параметром delimiter.
//Если delimiter является пустой строкой (""), explode() возвращает FALSE. Если delimiter не содержится в string, и используется отрицательный limit, то будет возвращен пустой массив (array), иначе будет возвращен массив, содержащий string.

//В элемент $_SERVER['REQUEST_URI'] содержит имя скрипта, начиная от корневой директории виртуального хоста и параметры

$page_name = "index";
if($url_array[1] != "")
	$page_name = $url_array[1];

if ($url_array[2] != "") {
    
    //отделяем возможные параметры $_GET от действий action
    if (($_GET["id_page"] != "")||($_GET["back"] != "")||($_GET["login"] != "")||($_GET["code"] != "")) 
        $action   = ""; 
    else
        $action = $url_array[2]; //дополнительное действие к url,например delete или edit
}

$variables = prepareVariables($page_name, $action);

$isAjax = ($action == "") ? false : true;

echo renderPage($page_name, $variables, $isAjax);


