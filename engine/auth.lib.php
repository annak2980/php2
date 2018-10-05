<?php

/**
 * авторизация если сохранены файлы Cookie
 */ 
function checkAuthWithCookie(){
    
    $isAuth = false;

    if(isset($_COOKIE['id_user']) && isset($_COOKIE['user_hash'])){
        // получаем данные пользователя по id
        $link = getConnection();
        $sql = "SELECT `id_user`, `user_name`, `user_login`, `user_password`, `user_status` FROM `user` 
                WHERE `id_user` = '".mysqli_real_escape_string($link, $_COOKIE['id_user'])."'";
        $user_data = getRowResult($sql, $link);
        
        if(($user_data['user_password'] == $_COOKIE['user_hash']) && ($user_data['id_user'] == $_COOKIE['id_user'])){
            $_SESSION['user']   = $user_data['user_login']; // сохраним данные в сессию при совпадении пароля
            $_SESSION['status'] = $user_data['user_status']; 
            
            //Запишем в базу дату последней авторизации пользователя
		    executeQuery("UPDATE `user` SET `user_last_login`=NOW() WHERE `user_login`='{$user_data['user_login']}'");
        
            $isAuth = true;
        }
    }
    
    return $isAuth;
}

/**
 * авторизация через логин и пароль 
 */
function authWithCredentials(){
    
    $link = getConnection();
    $login = mysqli_real_escape_string($link, strip_tags($_POST['login']));
    $password  = strip_tags($_POST['password']);
    
    // получаем данные зарегистрированного по email пользователя (статус 1 или 2) по логину
    $sql = "SELECT `user`.*,`user_status`.* FROM `user`,`user_status` 
            WHERE `user`.`user_status`=`user_status`.`id_status` AND `user_login` = '{$login}'";
    $user_data = getRowResult($sql, $link);

    $isAuth = 0;

    // проверяем соответствие логина и пароля
    if ($user_data) {
        if(hashPassword($password) === $user_data['user_password']){
            $_SESSION['user']   = $user_data['user_login']; // сохраним данные в сессию при совпадении пароля
            $_SESSION['status'] = $user_data['user_status']; 
            
            if(isset($_POST['rememberme']) && $_POST['rememberme'] == 'on'){
                setcookie("id_user",$user_data['id_user'],time()+86400,"/");
                setcookie("user_hash",hashPassword($password),time()+86400,"/");
            }
            
            //Запишем в базу дату последней авторизации пользователя
		    executeQuery("UPDATE `user` SET `user_last_login`=NOW() WHERE `user_login`='{$user_data['user_login']}'");
            
            $isAuth = 1;   
        }       
    }
    
    return $isAuth;
}

function hashPassword($password)
{
    $salt = md5(uniqid(SALT2, true));
    $salt = substr(strtr(base64_encode($salt), '+', '.'), 0, 22);
    return crypt($password, '$29ann$80$' . $salt);
}

/**
 * Сверяем введённый пароль и хэш
 */
function checkPassword($user_password,$hash){
    return crypt($user_password, $hash) === $hash;
}

function alreadyLoggedIn(){
    return isset($_SESSION['user']);
}

function GetIdUser(){
    
    $idUser = 0;

    if (alreadyLoggedIn()) {
        // получаем id пользователя по имени
        $link = getConnection();
        $sql = "SELECT `id_user` FROM `user` WHERE `user_login` = '{$_SESSION['user']}'";
        $user_data = getRowResult($sql, $link);
        
        $idUser = $user_data['id_user'];
    }
    
    return $idUser;
}

function doActionWithLogin($action){
    $response = [
        "result" => 0,
    ];

    switch($action){
        case "send_email":
            SendEmailToUser($response);
            break; 
        case "activation":
            ActivationUser($response);
            break; 
    }

    return json_encode($response);
}

function SendEmailToUser(&$response) {

    $email    = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["email"]));
    $login    = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["login"]));
    $password = strip_tags(mysqli_real_escape_string(getConnection(),$_POST["password"]));
    
    if (($email == "")||($login == "")||($password == "")){
        $response["result"] = 3;
        return;
    } 
        
    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)){
        $response["result"] = 2;
        return;
    } 

    if (getRowResult("SELECT `id_user` FROM `user` WHERE `user_login`='{$login}'")){
        //уже есть пользователь с таким логином
        $response["result"] = 4;
        return;
    }
    
    $password = hashPassword($password);
    
    $sql = "INSERT INTO `user` (`user_name`,`user_login`,`user_password`,`user_mail`,`user_registr_date`)                                               VALUES('{$login}','{$login}','{$password}','{$email}',NOW())";       
            
    if(executeQuery($sql)){
        $result_id  = getRowResult("SELECT `id_user` FROM `user` WHERE `user_login`='{$login}'");
	    $id_user    = $result_id["id_user"];
        $activation = md5($id_user).md5($login);//код активации аккаунта. 
        $subject    = "Подтверждение регистрации";//тема сообщения
        $message    = "Здравствуйте! Спасибо за регистрацию на test.ru\nВаш логин:".$login."\n
                        Перейдите по ссылке в течение 2 часов, чтобы активировать ваш аккаунт:\n http://test/activation/?login=".$login."&code=".$activation." \nС уважением,\n
                        Администрация test.ru";//содержание сообщения
        mail($email, $subject, $message, "Content-type:text/plane; Charset=windows-1251\r\n");//отправляем сообщение
        $response["result"] = 1;
    }    
}

function ActivationUser() {
    $user_answer = '';
    
    $sql = "DELETE FROM `user` WHERE `id_user`<>'0' AND `user_status` IS NULL 
            AND UNIX_TIMESTAMP() - UNIX_TIMESTAMP(`user_registr_date`) > 7200";//удаляем незарегистрированных в течение 2 часов польз. из базы
    executeQuery($sql);
    
    if (isset($_GET['code'])){
        $code =$_GET['code'];  //код подтверждения 
    } 
    else {    
        $user_answer = "Вы зашли на страницу без кода подтверждения!"; //если не указали code, то выдаем ошибку
    }
    
    if (isset($_GET['login'])){
        $login=$_GET['login']; //логин, который нужно активировать
    }
    else {    
        $user_answer = "Вы зашли на страницу без логина!"; //если не указали логин, то выдаем ошибку
    }
 
    $result_id  = getRowResult("SELECT `id_user` FROM `user` WHERE `user_login`='{$login}'");
    $id_user    = $result_id["id_user"];
    $activation = md5($id_user).md5($login);//создаем такой же код подтверждения
    
    if ($activation == $code) {//сравниваем полученный из url и сгенерированный код 
        
        $sql = "UPDATE `user` SET `user_status`='2' WHERE `user_login`='{$login}'"; //активируем пользователя
        if(executeQuery($sql))
            $user_answer = "Ваш Е-мейл подтвержден!";          
        else 
            $user_answer = "Ошибка регистрации, обратитесь в службу поддержки!";          
    }
    else {
        $user_answer = "Ошибка регистрации! Получите новый код!";
            //если же code, полученный из url и сгенерированный код не равны, то выдаем ошибку
    }
    
    return $user_answer;
}