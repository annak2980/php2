<?php

abstract class C_Base extends C_Controller {
	protected $title;		//каждая страница имеет заголовок и контент
	protected $content;		

	function __construct() {}
	
	protected function before()
	{
		$this->title = 'Название сайта';
		$this->content = '';
        include_once('m/User_model.php');
	}
	
	//
	// создаем массив переменных, которые затем вместе с именем шаблона передаем в шаблонизатор Template
	//	
	public function prepareVars()
	{   
		$get_user = new User();
		if (isset($_SESSION['user_id'])) {
			$user_info = $get_user->get($_SESSION['user_id']);
		} else {
			$user_info['name'] = false;
		}
            
        if ($user_info['name']) {
            $usermenu = '<a href="index.php?c=user&act=info">Личный кабинет</a> | <a href="index.php?c=user&act=logout">Выйти('. $user_info['name'] .')</a>';
        } else {
			$usermenu = '<a href="index.php?c=user&act=login">Войти</a> | <a href="index.php?c=user&act=reg">Регистрация</a>';
        }            
         
		$vars = array('title' => $this->title, 'content' => $this->content, 'usermenu' => $usermenu);
		$page = Render::getInstance()->renderPage('v_main.tmpl', $vars);
		echo $page;
	}	
}
