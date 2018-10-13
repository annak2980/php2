<?php

abstract class C_Controller {
	// абстрактные методы будут переопределены в дочерних классах
	protected abstract function prepareVars();
	
    //метод выполняется до основного действия action, заполняется содержимое head
	protected abstract function before();
	
	public function Request($action)
	{
		$this->before();
		$this->$action();   //$this->action_index
		$this->prepareVars();
	}
	
	//
	// используется ли для передачи параметров GET
	//
	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	//
	// используется ли для передачи параметров POST
	//
	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
	
	// в случае вызова неверного url или параметров
	public function __call($name, $params){
        die('Ошибка ввода url');
	}
}