<?php

trait Trait_Singleton {

    public static function getInstance() {
        static $_instance;
        if ($_instance === null) {
            $_instance = new self();  
        }
        return $_instance;
    }

}

// Реализация паттерна Singleton при помощи traits

class Organization {
    
    use Trait_Singleton;
    
    const INN = '1234567890';
    const ORG_NAME = 'ООО "GB"';
    const ADDR = 'Российская Федерация, г.Москва, ул.Ленина 11';
    
    // Запрещаем внешний вызов __construct
    private function __construct() {}
    
    // Запрещаем внешний вызов __clone
    private function __clone() {}

    // Запрещаем внешний вызов __wakeup()
    private function __wakeup() {}  
    
    public function printOrgData(){
		echo 'Поставщик:'.self::ORG_NAME.' ИНН:'.self::INN.'<br>Адрес:' .self::ADDR.'<br>';
	}
    
    public function getOrgName(){
		return 'Поставщик:'.self::ORG_NAME.' ИНН:'.self::INN.'<br>';
	}
}

class DatabaseConnection { //Другой класс паттерна Singleton так же использует тот же Trait_Singleton
    
    use Trait_Singleton;
    
    // Запрещаем внешний вызов __construct
    private function __construct() {}
    
    // Запрещаем внешний вызов __clone
    private function __clone() {}

    // Запрещаем внешний вызов __wakeup()
    private function __wakeup() {}  
    
    public function printConnectionData(){
		echo 'Здесь возможно вывести данные соеденинения с SQL-базой.....<br>';
	}
    
}

?>