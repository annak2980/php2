<?php
/**
 * готовим каталог товаров
 */
function prepareCataloguePage(){
    $sql = "SELECT * FROM `goods` WHERE 1 LIMIT 3";
    $goods = getAssocResult($sql);

    $goodsbook = [];
    foreach ($goods as $i=>$value) {
        $value["process_goods"] = '';    

        if ($_SESSION["status"]==1) { //для админа будет видна кнопка Удалить
            $id_goods_arr["id_good"]  = $value["id_good"];
            $value["process_goods"] = renderPage("catalogue_process_block",$id_goods_arr);
        }
        
        $goodsbook[]=$value;
    }
    
    return $goodsbook;
}

function MoreGoodCatalogue(&$response){
    
    $goodsbook = [];
    
    if(isset($_GET['num'])){
        $num = (int)$_GET['num'];
        
        $sql = "SELECT * FROM `goods` WHERE 1 LIMIT {$num},3";
        $goods = getAssocResult($sql);

        foreach ($goods as $i=>$value) {
            $value["process_goods"] = '';    

            if ($_SESSION["status"]==1) { //для админа будет видна кнопка Удалить
                $id_goods_arr["id_good"]  = $value["id_good"];
                $value["process_goods"] = renderPage("catalogue_process_block",$id_goods_arr);
            }
        
            $goodsbook[]=$value;
        }
    }
    
    if ($goodsbook <> []) {
        $response["result"] = "";
        $goods_array["newgoods"] = $goodsbook; 
        $response["result"] = renderPage("catalogue_block",$goods_array);
    }
}

function getGoodContent($id_page){   
    $sql = "SELECT * FROM `goods` WHERE `id_good` = {$id_page}";
    $goods = getAssocResult($sql);

    $result = [];
    if(isset($goods[0]))
        $result = $goods[0];

    return $result;
}

function doActionWithGood($action){
    $response = [
        "result" => 0,
    ];

    switch($action){
        case "buy":
            AddToBasket($response);
            break;
    }

    return json_encode($response);
}

function AddToCatalogue(&$response) {
    $name          = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["name"]));
    $catalogue_img = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["catalogue_img"]));
    $catalogue_img = pathinfo($catalogue_img)['basename'];
    $page_big_img  = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["page_big_img"]));
    $page_big_img  = pathinfo($page_big_img)['basename'];
    $price         = (int)$_POST["price"];
    $descript      = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["descript"]));
   
    if (($name == "")||($price == "")||($descript  == "")) 
        $response["result"] = 2;   
    else {
	    $sql  = "INSERT INTO `goods` (`name_good`, `image`, `image_big`, `price`, `descript_good`)
                 VALUES ('{$name}', '{$catalogue_img}', '{$page_big_img}', '{$price}', '{$descript}');";      
        
        if (executeQuery($sql)){
            $response["result"] = 1;
        }
    }
}

function DeleteFromCatalogue(&$response){
    $id_good = (int)$_POST["id_good"];  
    
    $sql = "DELETE FROM `goods` WHERE `goods`.`id_good` = '{$id_good}'";
    
    if(executeQuery($sql)){
        $response["result"] = 1;
    }	
}

function UploadImg(&$response) {
    if ( 0 < $_FILES['file']['error'] ) {
        $response["result"] = $_FILES['file']['error'];       
    }
    else {      
        if (move_uploaded_file($_FILES['file']['tmp_name'], 'img/' . $_FILES['file']['name']))
        $response["result"] = 1;
    }
}