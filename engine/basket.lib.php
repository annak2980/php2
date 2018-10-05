<?php

function getCountGoodsInBasket() {
	$id_session=session_id();
	$result=getRowResult("SELECT sum(col) as sum FROM `basket` WHERE `session`='{$id_session}'");
    return $result["sum"];
}

function getMyBasket() {
	$id_session=session_id();
	$sql = "SELECT @i:=@i+1 as number, `goods`.*,`basket`.* FROM `goods`,`basket`,(SELECT @i:=0) as X 
            WHERE `goods`.`id_good`=`basket`.`id_good` AND `basket`.`session`='{$id_session}'";
	$goods = getAssocResult($sql);
	
    return $goods;
}

function getSummGoodsInBasket() {
	$id_session=session_id();
	$result=getRowResult("SELECT sum(price*col) as sum FROM `goods`,`basket` 
                          WHERE `goods`.`id_good`=`basket`.`id_good` AND `session`='{$id_session}'");
    
    return $result["sum"];
}

function getDiscountTotal() {
    //Если действует акция, то выводим в корзине отдельную строчку с суммой скидки
    $discountTotal = '';
    $var_discount= [];
                   
    if (getDiscountInBasket()){   
        $var_discount["discount_rub"] = getSummDiscountInBasket(); 
        $var_discount["discount_name"] = getNameDiscountInBasket();
        $discountTotal.= renderPage("discount_block",$var_discount);
    }  
    return $discountTotal;
}

function getSummDiscountInBasket() {
	$date = date("Y-m-d H:i:s");
    
	$discountPers = getRowResult("SELECT `discount` FROM `discounts` 
                    WHERE `discounts`.`discount_start`<='{$date}' AND `discounts`.`discount_finish`>='{$date}'");
    
    return getSummGoodsInBasket()*$discountPers["discount"]/100;
}

function getDiscountInBasket() {
	$date = date("Y-m-d H:i:s");
	$discountPers = getRowResult("SELECT `discount` FROM `discounts` 
                    WHERE `discounts`.`discount_start`<='{$date}' AND `discounts`.`discount_finish`>='{$date}'");
    if ($discountPers) 
        return $discountPers["discount"];
    else
        return 0;
}

function getNameDiscountInBasket() {
	$date = date("Y-m-d H:i:s");
	$discountPers = getRowResult("SELECT `discount_name` FROM `discounts` 
                    WHERE `discounts`.`discount_start`<='{$date}' AND `discounts`.`discount_finish`>='{$date}'");
    
    return $discountPers["discount_name"];
}

function getSummOrderDiscount(){
    $order_rub = 0;
    $discount = getSummDiscountInBasket();
    $amount   = getSummGoodsInBasket();
    
    if ($amount > $discount) 
        $order_rub = $amount - $discount;
    
    return $order_rub;
}
    
function doActionWithBasket($action){
    $response = [
        "result" => 0,
    ];

    switch($action){
        case "buy":
            AddToBasket($response);
            break;
        case "delete":
            DeleteFromBasket($response);
            break;
        case "order":
            AddToOrder($response);
            break;
        case "add_goods":   //catalogue.lib
            AddToCatalogue($response);
            break;
        case "remove_good": //catalogue.lib
            DeleteFromCatalogue($response);
            break;
        case "upload_img": //catalogue.lib
            UploadImg($response);
            break;
        case "more_good": //catalogue.lib
            MoreGoodCatalogue($response);
            break;
    }

    return json_encode($response);
}

function DeleteFromBasket(&$response){
    $id_good = (int)$_POST['id_good'];
	$id_session=session_id();
    
    $sql = "DELETE FROM `basket` WHERE `basket`.`id_good` = {$id_good} AND `basket`.`session` = '{$id_session}'";
    
    if(executeQuery($sql)){
        $response["result"] = 1;
    }
	
}
 
function AddToBasket(&$response){
    $id_good = (int)$_POST['id_good'];
    $quantity = (int)$_POST['quantity'];
	$id_session=session_id();

	//Проверим есть ли уже такой товар в корзине
	$resultQ=getRowResult("SELECT col FROM `basket` WHERE `session`='{$id_session}' AND `id_good`={$id_good}");
	$col=$resultQ["col"];

	//если есть увеличим счетчик товара
	if ($col!=null) {
        $sql = "UPDATE `basket` SET `col`=`col`+{$quantity} WHERE `session`='{$id_session}' AND `id_good`={$id_good}";
		
        if(executeQuery($sql)){
            $response["result"] = 1;
        }
    }
	else {
		//если нет то просто добавим товар в корзину с количеством $quantity 1
        $sql = "INSERT INTO `basket` (`session`, `id_good`, `col`) VALUES ('{$id_session}', '{$id_good}', '{$quantity}')";
        
        if(executeQuery($sql)){
            $response["result"] = 1;
        }
    }
}

function AddToOrder(&$response) {
	$id_session=session_id();   
    $name  = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["name"]));
    $phone = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["phone"]));
    $adres = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["adres"]));
    $order_sum = getSummOrderDiscount();
    
    if (($name == "")||($phone == "")||($adres  == "")) 
        $response["result"] = 2;   
    elseif (getCountGoodsInBasket()==0)
        $response["result"] = 3;
    else {
        $date = date("Y-m-d");  
        $user = GetIdUser();
	    $sql  = "INSERT INTO `orders` (`session`, `status`, `name`, `phone`, `adres`, `date_order`, `order_sum`, `user`)
                 VALUES ('{$id_session}', '1', '{$name}', '{$phone}', '{$adres}', '{$date}', '{$order_sum}', '{$user}');";
        
        if (executeQuery($sql)){
            $response["result"] = 1;
            session_regenerate_id();
        }
    }
}