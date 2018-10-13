<?php

	class User {
		
		public $user_id, $user_login, $user_name, $user_password;

		public function __construct () {
		}

		public function pass ($password) {
			return md5($password);
		}

		public function get ($id) {
            
			return Dbpdo::getInstance()->query("SELECT * FROM users WHERE id = '" . $id . "'")->fetch();
		}

		public function newR ($name, $login, $password) {
              
			$user_data = Dbpdo::getInstance()->Select("SELECT * FROM users WHERE login = '" . $login . "'");
			
            if (!$user_data) {
				Dbpdo::getInstance()->Query("INSERT INTO users VALUES (null, '" . $name . "', '" . $login . "', '" . $password . "')");
				return 'Пользователь ' .$login . ' добавлен в базу';
			} else {
				return 'Пользователь с логином ' . $login . ' уже существует';
			}
		}

		public function login ($login, $password) {
            
			$user_data = Dbpdo::getInstance()->Select("SELECT * FROM users WHERE login = '" . $login . "'"); 
			
            if ($user_data) {
				if ($user_data['password'] == $password) {
    				$_SESSION['user_id'] = $user_data['id'];
    				return 'Добро пожаловать в систему, ' . $user_data['name'] . '!';
				} else {
					return 'Пароль не верный!';
				}
			} else {
				return 'Пользователь с таким логином не зарегистрирован!';
			}
		}

		public function logout () {
			if (isset($_SESSION["user_id"])) {
				$_SESSION["user_id"]=null;
				return true;
			} 
			return false;
			
		}
	}
?>