<?php
/**
 * Подготовка переменных для разных страниц
 * @param $page_name
 * @return array
 */
function prepareVariables($page_name, $action = ""){
    
    $vars["title"] = SITE_TITLE;
    
    $header_vars = $vars;
    $menu_vars["main_menu_links"] = getMainMenuLinks();
    $header_vars["main_menu"] = renderPage("main_menu_block", $menu_vars);
	
    $vars["header"] = renderPage("header_block", $header_vars);
	$vars["footer"] = renderPage("footer_block");

    $clear_vars = $vars;
	if (alreadyLoggedIn()) {
		$clear_vars["user"]=$_SESSION['user'];
		$clear_vars["back_url"]=$_SERVER["REQUEST_URI"];
		
		$vars["login"] = renderPage("logout_block",$clear_vars);
	}
	else {
        if (checkAuthWithCookie()){ // если есть куки, то авторизуем сразу
            $clear_vars["user"]=$_SESSION['user'];
        }
        $clear_vars["back_url"]=$_SERVER["REQUEST_URI"];
		$vars["login"] = renderPage("login_block",$clear_vars);
    }
    switch ($page_name){
            
        case "index":
            $vars["greetings"] = renderPage("index_greetings_block");
		break; 
	
        case "login":
            if ($action <> "") {
                $vars['response'] = doActionWithLogin($action);
            }  
            else {       
                // авторизация через БД
                authWithCredentials();
                
                if ($_GET["back"] != '') {
                    $back=strip_tags($_GET["back"]); //после ввода логина и пароля остаемся на той же стр   
                    header("Location: {$back}");
                }
                else header("Location: /");
            }
   
            break; 	
			
        case "logout":
			$back=strip_tags($_GET["back"]);
            unset($_SESSION["user"]);
            unset($_SESSION["status"]);
            session_destroy();
            if (($back=='/admin/')||($back=='/history/')) header("Location: /"); 
            //закрываем личные страницы заказов и администрирования
			else header("Location: {$back}"); //если это другая страница , то остаемся на той же стр
            
            break; 
            
		case "activation":
            $vars['user_answer'] = ActivationUser();
            $vars["login"] = '';
            break; 
            
        case "basket":     
            if ($action <> "") {
                $vars['response'] = doActionWithBasket($action);
            }  
            else {
                $vars["basket_content"] = getMyBasket();          
                $vars["discount_total"] = getDiscountTotal();                     
                $vars["amount"] = getSummGoodsInBasket();
                $vars["order_rub"] = getSummOrderDiscount();
            }
            break;   
			
		case "news":
            if ($action == "") {
                $vars["add_news"] = '';
                if ($_SESSION["status"]==1)  //для админа будет доступно добавление новости
                    $vars["add_news"] = renderPage("news_add_block");   
                $vars["newsfeed"] = getNews();
            }  
            else {
                $vars['response'] = doActionWithNews($action);
            }
            break;           
			
        case "newspage":
            $vars["date_news"]  = '';
            $vars["news_title"] = '';
            $vars["news_body"]  = '';
            
            if ($_GET["id_page"] != '') {
                $content = getNewsContent((int)$_GET["id_page"]);
                
                $vars["date_news"]  = $content["date_news"];
                $vars["news_title"] = $content["news_title"];
                $vars["news_body"]  = $content["news_body"];
            }
            
            break;
		
        case "cataloguepage":
            if ($action <> "") {
                $vars['response'] = doActionWithGood($action);
            }  
            else {
                $vars["name_good"]     = '';
                $vars["descript_good"] = '';
                $vars["price"]         = '';
                $vars["id_good"]       = '';
                $vars["image_big"]     = '';
            
                if ($_GET["id_page"] != '') {
                    $content = getGoodContent((int)$_GET["id_page"]);
                    
                    $vars["name_good"]     = $content["name_good"];
                    $vars["descript_good"] = $content["descript_good"];
                    $vars["price"]         = $content["price"];
                    $vars["id_good"]       = $content["id_good"];
                    $vars["image_big"]     = $content["image_big"];
                }
            }
            
            break;
            
        case "catalogue":
            if($action == "") {
                $vars["goods"] = prepareCataloguePage();
                
                $vars["add_goods"] = '';
                if ($_SESSION["status"]==1)  //для админа будет доступно добавление нового товара в каталог
                    $vars["add_goods"] = renderPage("goods_add_block");   
            }
            else {
                $vars['response'] = doActionWithBasket($action);
            }
			
            break;
			
		case "guestbook":
			if ($action == "") {
                $vars["guestbookfeed"] = getAllGuestbook();
			}
            else {
                $vars['response'] = doActionWithRecord($action);    
            }
            
            break;	
							
		case "history":
            if ($action <> "") {
                $vars['response'] = doActionWithOrders($action);
            }  
            else {
                $vars["orders"] = prepareOrders();
            }
            
            break;
            
        case "admin":
			if ($action <> "") {
                $vars['response'] = doActionWithAdmin($action);   
			}
            else {
                $vars["clients"]   = getAllUsers();
                $vars["discounts"] = getAllDiscounts();    
            }
            
            break;		
    }
  
    //_log($vars,'vars'); можно подключить запись лог-файлов
    
    return $vars;
}

//формируем динамическое меню
function getMainMenuLinks(){
	//определим количество товаров в корзине
	$ngoods = getCountGoodsInBasket();
	$menu = [
        [
          "link" => "/",
          "link_title" => "Главная"
        ],
        [
            "link" => "/catalogue/",
            "link_title" => "Каталог"
        ],      
		[
            "link" => "/news/",
            "link_title" => "Новости"
        ],
        [
            "link" => "/guestbook/",
            "link_title" => "Отзывы"
        ],     
		[
            "link" => "/contacts/",
            "link_title" => "Контакты"
        ]
    ];
	//покажем пункт с корзиной если она не пуста
	if ($ngoods!=0)
		$menu[] =
		[
            "link" => "/basket/",
            "link_title" => "Корзина (" . $ngoods . ")"
        ];	
	if (alreadyLoggedIn()) 
		$menu[] =
		[
            "link" => "/history/",
            "link_title" => "Заказы"
        ];
    if (alreadyLoggedIn()&&($_SESSION["status"]==1))
		$menu[] =
		[
            "link" => "/admin/",
            "link_title" => "Администр"
        ];
	return $menu;
    
}
