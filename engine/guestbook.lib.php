<?php

function getAllGuestbook() {
	$sql = "SELECT * FROM `guestbook` WHERE 1 ORDER BY `data` DESC;";
	$book = getAssocResult($sql);
	
    $newbook = [];
    foreach ($book as $i=>$value) {
        $value["process_record"] = '';    
        if ($_SESSION["status"]==1) { //для админа будет видна кнопка Удалить
            $id_rec["id_record"]  = $value["id_record"];
            $value["process_record"] = renderPage("guestbook_process_block",$id_rec);
        }
        
        $newbook[]=$value;
    }
    
    return $newbook;
}

function doActionWithRecord($action){
    $response = [
        "result" => 0,
    ];

    switch($action){
        case "add_record":
            AddRecordToGuestbook($response);
            break;
        case "remove_record":
            DeleteRecord($response);
            break;
    }

    return json_encode($response);
}

function AddRecordToGuestbook(&$response) {
    
    $name  = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["name"]));
    $email = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["email"]));
    $text  = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["text"]));
    
    if (($name == "")||($email == "")||($text  == "")) {
        $response["result"] = 2;
    }
    else {
    
        $date  = date("Y-m-d");   
        $sql = "INSERT INTO `guestbook` (`name`, `email`, `text`, `data`) 
                VALUES ('{$name}', '{$email}', '{$text}', '{$date}');";
       
        if(executeQuery($sql)){
            $response["result"] = 1;
        }
    }
}

function DeleteRecord(&$response){
    $id_record = (int)$_POST['id_record'];
    
    $sql = "DELETE FROM `guestbook` WHERE `guestbook`.`id_record` = {$id_record}";
    
    if(executeQuery($sql)){
        $response["result"] = 1;
    }
	
}