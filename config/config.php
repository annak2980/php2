<?php

function __autoload($classname){ //автозагрузчик классов контроллеров и моделей
    
    try{
        if (mb_substr($classname, 0, 1) == 'C') 
            $fileInc = include_once("c/$classname.php");
        else
            $fileInc = include_once('m/'.$classname.'_model.php');     
        if($fileInc === false){        
            throw new Exception('Невозможно открыть файл с описанием класса '.$classname);     
        }
    } 
    //Перехватываем (catch) исключение, если что-то идет не так.
    catch (Exception $ex) {
    //Выводим сообщение об исключении.
        echo $ex->getMessage();
    }
    
}

define('DRIVER','mysql');
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'php_2_5lesson');
define('CHARSET','utf-8');

Dbpdo::getInstance()->connect();