<?php
// блок новостей
function getNews(){
    $sql = "SELECT * FROM `news` ORDER BY `date_news` DESC";
    $news = getAssocResult($sql);
    
    $newsbook = [];
    foreach ($news as $i=>$value) {
        $value["process_news"] = '';    

        if ($_SESSION["status"]==1) { //для админа будет видна кнопка Удалить
            $id_news_arr["id_news"]  = $value["id_news"];
            $value["process_news"] = renderPage("news_process_block",$id_news_arr);
        }
        
        $newsbook[]=$value;
    }
    
    return $newsbook;
}

function getNewsContent($id_page){    
    $sql = "SELECT * FROM `news` WHERE `id_news` = {$id_page}";
    $news = getAssocResult($sql);

    $result = [];
    if(isset($news[0]))
        $result = $news[0];

    return $result;
}

function doActionWithNews($action){
    $response = [
        "result" => 0,
    ];

    switch($action){
        case "add_news":
            AddNews($response);
            break;
        case "remove_news":
            DeleteNews($response);
            break;
    }

    return json_encode($response);
}

function AddNews(&$response) {   
    $name  = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["name"]));
    $short = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["short"]));
    $text  = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["text"]));
    $datetime = $_POST["datetime"];
        
    if ($datetime <> '')
        $datetime = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $datetime)));
    else
        $datetime = date('Y-m-d H:i:s');
    
    if (($name == "")||($short == "")||($text  == "")) {
        $response["result"] = 2;
    }
    else {
      
        $sql = "INSERT INTO `news` (`news_title`, `prev`, `news_body`, `date_news`) 
                VALUES ('{$name}', '{$short}', '{$text}', '{$datetime}');";
       
        if(executeQuery($sql)){
            $response["result"] = 1;
        }
    }
}

function DeleteNews(&$response){
    $id_news = (int)$_POST['id_news'];
    
    $sql = "DELETE FROM `news` WHERE `news`.`id_news` = {$id_news}";
    
    if(executeQuery($sql)){
        $response["result"] = 1;
    }
	
}