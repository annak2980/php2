<?php

class C_User extends C_Base {
		
    public function action_info() {
        	
        $get_user = new User();
        
        $user_info = $get_user->get($_SESSION['user_id']);
        
        $this->title .= '::' . $user_info['name'];
        $this->content = Render::getInstance()->renderPage('v_info.tmpl', array('username' => $user_info['name'], 'userlogin' => $user_info['login']));
    }
		
    public function action_reg() {
			
        $this->title .= 'Регистрация';
        $this->content = Render::getInstance()->renderPage('v_reg.tmpl', array());

        if($this->isPost()) {
            
            $new_user = new User();
            
            $result = $new_user->newR(strip_tags($_POST['name']), strip_tags($_POST['login']), strip_tags($_POST['password']));
                                      
            if ($result) {
				$this->content = Render::getInstance()->renderPage('v_reg.tmpl', array('text' => $result));
            } else {
				$this->content = Render::getInstance()->renderPage('v_reg.tmpl', array('text' => $result));
            }
        }
    }

    public function action_login() {
            
        $this->title .= '::Вход';
        $this->content = Render::getInstance()->renderPage('v_login.tmpl');

        if($this->isPost()) {
            
            $user_obj = new User();
            
            $result = $user_obj->login(strip_tags($_POST['login']), strip_tags($_POST['password']));
                                       
            if ($result) {
				$this->content = Render::getInstance()->renderPage('v_login.tmpl', array('text' => $result));
            } else {
				$this->content = Render::getInstance()->renderPage('v_login.tmpl', array('text' => "ошибка авторизации"));
            }
        }
    }

    public function action_logout() {
        $user_obj = new User();
        $result = $user_obj->logout();
    }
}

?>