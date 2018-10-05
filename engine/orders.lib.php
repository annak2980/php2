<?php
/**
 * готовим страницу - перечень заказов
 */
function doActionWithOrders($action){
    $response = [
        "result" => 0,
    ];

    switch($action){
        case "confirme":
            ConfirmOrder($response);
            break;
        case "delete":
            DeleteOrder($response);
            break;
    }

    return json_encode($response);
} 

function DeleteOrder(&$response){
    $idx = (int)$_POST['id_order'];    
    $sql = "DELETE FROM `orders` WHERE `orders`.`idx` = {$idx}";
    if(executeQuery($sql)){
        $response["result"] = 1;
    }
	
}

function ConfirmOrder(&$response) {
    $idx = (int)$_POST['id_order'];
	$sql = "UPDATE `orders` SET `status` = '2' WHERE `orders`.`idx` = {$idx}";
	if(executeQuery($sql)){
        $response["result"] = 1;
    }
}

function getSummGoodsInOrder($id_session) {
	$result = getRowResult("SELECT sum(price*col) as sum FROM `goods`,`basket` 
                            WHERE `goods`.`id_good`=`basket`.`id_good` AND `session`='{$id_session}'");
    
    return $result["sum"];
}
 
function prepareOrders(){
    //для администратора $_SESSION["status"]=1 выведем список всех заказов, 
    //для зарег. пользователя - только его заказы
    
    if ($_SESSION["status"]==1)
        $sql = "SELECT * FROM `orders`,`order_status`,`user` 
                WHERE `orders`.`user`=`user`.`id_user` AND `orders`.`status`=`order_status`.`id_status` 
                ORDER BY `id_status`, `date_order` DESC,`user`,`idx` DESC";
    else
        $sql = "SELECT * FROM `orders`,`order_status`,`user` 
                WHERE `user`.`user_login`='{$_SESSION["user"]}' AND `orders`.`status`=`order_status`.`id_status` 
                AND `orders`.`user`=`user`.`id_user` 
                ORDER BY `id_status`, `date_order` DESC,`idx` DESC";
        
    $orders = getAssocResult($sql);

    $neworders=[];
    foreach ($orders as $i=>$value) {
        $subordersPage = "";
        $sql = "SELECT @i:=@i+1 as number, `goods`.`name_good`, `goods`.`price`,`basket`.`col` FROM `goods`,`basket`,(SELECT @i:=0) as X  
                WHERE `basket`.`id_good`=`goods`.`id_good` AND `basket`.`session`='{$value["session"]}'";				
        $suborders = getAssocResult($sql);	
    
        foreach ($suborders as $subi=>$subvalue) {
            $subordersPage .= renderPage("history_orders_subtable_block",$subvalue);
        }
        
        $value["subtable"] = $subordersPage;
        
        $value["amount"] = getSummGoodsInOrder($value["session"]);
        
        $value["process_order"] = '';
        
        $id_orders["idx"] = $value["idx"];
        
        if ($_SESSION["status"]==1)
            $value["process_order"] = renderPage("history_orders_process_block",$id_orders);
        
        $neworders[]=$value;
    } 
 
return $neworders;
  
}