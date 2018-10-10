<?php

//функция возвращает массив с именами файлов картинок и комментариями к ним
function getImgs(){
    
    $sql = "SELECT `idx`, `file`, `descript`, `alt`, `hype` FROM `gallery`";
    $imgs = getAssocResult($sql);
    
    $result = [];
    
    if(isset($imgs[0])) {
        foreach ($imgs as $i=>$value) {
            $value["file"] = IMG_LIT_DIR . '/' . $value["file"];
            $value["opn_img"] = "/imgspage/?idx=" .$value["idx"]; 
            $value["del_img"] = "/delete/?idx=" .$value["idx"]; 
            $result[]=$value;
        }
    }
    return $result;
}
//функция увеличения количества просмотров
function addHype(){
    $idx = (int)$_GET['idx'];
    $sql = "UPDATE `gallery` SET `hype`=`hype`+1 WHERE `gallery`.`idx`={$idx}";
	executeQuery($sql);
}

//функция удаления записи по ее номеру
function delImg(){
    //запрос вида site/delete/idx=2 т.е. удалите ка вторую запись в базе
    //Получаем номер записи через GET
    $idx = (int)$_GET['idx'];
    $sql = "DELETE FROM `gallery` WHERE `gallery`.`idx` = {$idx}";
	executeQuery($sql);

}
//функция вовзращает данные записи по ее номеру
function getImgsContent(){
    
    $idx = (int)$_GET['idx'];

    $sql = "SELECT * FROM `gallery` WHERE `idx`={$idx}";
    $imgs = getAssocResult($sql);
    
    $result = [];
    
    foreach ($imgs as $i=>$value) {
        $value["file"] = IMG_BIG_DIR . '/' . $value["file"];         
        $result[]=$value;
    }
    
    return $result[0];
}