<?php

//функция возвращает массив с именами файлов картинок и комментариями к ним
function getImgs(){
    $sql = "SELECT idx, file, descript, alt, hype FROM gallery";
    $imgs = getAssocResult($sql);
    
    return $imgs;
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
    
    $id_imgs = (int)$_GET['idx'];

    $sql = "SELECT * FROM gallery WHERE idx = ".$id_imgs;
    $imgs = getAssocResult($sql);

	//В случае если записи нет, вернем пустое значение
    $result = [];
    if(isset($imgs[0]))
        $result = $imgs[0];

    return $result;
}