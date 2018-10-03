<?php

function prepareVariables($page_name){
    $vars = [];
	//в зависимости от имени страницы, какую вызываем
	//такой блок case для нее и выполняем
    switch ($page_name){
            
        case "index": 
            
            break;
            
        case "main_gallery":
            
			//если вызвана страница галереи заполним для нее поля
            getPageStyle($vars);
            
            $vars["titlepage"] = 'МАГАЗИН ФОТОКАРТИН';
            
            $vars["imgsfeed"]  = getRenderArray("imgsfeed", getImgs());
            $vars["header"]    = 'Галерея';
            $vars["footer"]    = renderPage("footer", ["currentdate"=> date('Y')]);  
            
            break;
            
        case "imgspage":
			//если вызвана страница для полной версии картинки
			//то получим данные через выполнение запроса к базе по номеру картинки
			//который получаем через GET
            getPageStyle($vars);
            
            addHype();// функция увеличения количества просмотров
            
            $content = getImgsContent();
             
            $vars["img_hype"]     = 'Просмотров: '.$content["hype"];
            $vars["img_descript"] = $content["descript"];
            $vars["img_title"]    = $content["alt"];
            $vars["file"]         = $content["file"];
            
            break;  
            
		case "delete":
			//вызываем функцию удаления записи
			delImg();
			//возвращаемся на страницу с картинками, никаких значений возвращать уже не нужно
			header("location: /main_gallery/");
            
            break;
            
    }
	//возвращаем готовый массив значения vars для шаблона 
    return $vars;
}

function getPageStyle(&$vars){ //подключение стилей в заголовке любого шаблона
    
    $styleArray["titlepage"] = SITE_TITLE;
    $styleArray["publicdir"] = SITE_ROOT;
    
    $vars["title"] = renderPage("title", $styleArray); 
    
    return $vars;
}

function getRenderArray($templ_name,$db_array) {
	
    $newPageArray = [];
    $db_vars = [];
    
    foreach ($db_array as $i=>$value) { 
         
        foreach ($value as $dbprop=>$dbvalue) {
            $db_vars[$dbprop]  = $dbvalue;  
        }
        
        $newPageArray[] = renderPage($templ_name,$db_vars);
        
    }
    
    return $newPageArray;
    
}