<?php
//Формирует информацию в меню администратора

function getAllDiscounts() {
	$sql = "SELECT `discounts`.* FROM `discounts` WHERE 1";
	$discounts = getAssocResult($sql);
	
    return $discounts;
}

function getAllUsers() {
	$sql = "SELECT `user`.*,`user_status`.* FROM `user`,`user_status` 
            WHERE `user`.`id_user`<>0 AND `user_status`.`id_status`<>1 AND `user`.`user_status`=`user_status`.`id_status` 
            ORDER BY `user`.`user_last_login` DESC";
	$users = getAssocResult($sql);
	//получаем список всех зарегистрированных юзеров кроме администраторов сайта
    
    return $users;
}

function CheckDiscountDate($startdate,$finishdate) {
	$sql = "SELECT `discounts`.* FROM `discounts` 
            WHERE `discounts`.`discount_start` >= '{$startdate}' 
            AND `discounts`.`discount_finish`<= '{$finishdate}'";
  
    $discounts = getAssocResult($sql);
	
    if ($discounts){
       return 0;
    }
    else{
       return 1;
    }       
}

function doActionWithAdmin($action){
    $response = [
        "result" => 0,
    ];

    switch($action){
        case "add_discount":
            AddDiscount($response);
            break;
        case "remove_discount":
            DeleteDiscount($response);
            break; 
        case "remove_user":
            DeleteUser($response);
            break;       
    }

    return json_encode($response);
}

function AddDiscount(&$response) {

    $discname   = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["discname"]));
    $percent    = (int)$_POST["percent"];
    $startdate  = mysqli_real_escape_string(getConnection(),$_POST["startdate"]);
    $finishdate = mysqli_real_escape_string(getConnection(),$_POST["finishdate"]);
    
    if (($discname == "")||($percent == "")||($startdate  == "")||($finishdate  == "")){
       $response["result"] = 2;
    } 
    else {
        $startdate  = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $startdate)));
        $finishdate = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $finishdate)));
    
        if ($startdate > $finishdate) {      
        
            $response["result"] = 3;
        }
        else if (!CheckDiscountDate($startdate,$finishdate)) {      
        
            $response["result"] = 4;
        }
        else {
           
            $sql = "INSERT INTO `discounts` (`discount_name`, `discount`, `discount_start`, `discount_finish`) 
                    VALUES ('{$discname}', '{$percent}', '{$startdate}', '{$finishdate}')";
       
            if(executeQuery($sql)){
                $response["result"] = 1;
            }
        }
    }
}

function DeleteDiscount(&$response){
    $id_discount = (int)$_POST['id_discount'];
    
    $sql = "DELETE FROM `discounts` WHERE `discounts`.`id_discount` = {$id_discount}";
    
    if(executeQuery($sql)){
        $response["result"] = 1;
    }
	
}

function DeleteUser(&$response){
    $id_user = (int)$_POST['id_user'];
    
    $sql = "DELETE FROM `user` WHERE `user`.`id_user` = {$id_user}";
    
    if(executeQuery($sql)){
        $response["result"] = 1;
    }
	
}


