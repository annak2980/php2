<?php

abstract class Products {
    
    //(properties)свойства класса
    private $id;
    private $name;
    private $type;
    private $price;
    private $descript;

    //МЕТОДЫ КЛАССА
    
    //магические методы
    function __construct($id, $name, $type, $price, $descript) {
        $this->setId($id);
        $this->setType($type);
        $this->setPrice($price);
        $this->setName($name);
        $this->setDesc($descript);
    }
    
    function __destruct() {
        echo 'Объект класса Product удален'."<br>";
    }
    
    function __get($nothing) {
        echo "Свойства {$nothing} не существует для класса Product<br>";
    }
    
    function __set($nothing,$value) {
        echo "Свойства {$nothing} нельзя заполнить значением {$value} для класса Product<br>";
    }
    
    function __call($nothing, $params_array) {
        echo "Метод {$nothing} с параметрами ";
        $this->print_array($params_array);
        echo " нельзя вызвать для класса Product<br>";
        
    }
    
    //сеттеры и геттеры
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getDesc() {
        return $this->descript;
    }
    
    public function setDesc($descript) {
        $this->descript = $descript;
    }
    
    //прочие методы
    public function productDisplay() {
        echo 'Наименование: '.$this->getName(),'<br>',
        'Цена (руб): '.$this->getPrice(),'<br>',
        'Описание: '.$this->getDesc(),'<br>'; 
    } 

       
    public function print_array($array) {
        print_r($array);
    }
    
    public function finalCost() {
        print $this->getfinalCost() . "\n";
    }
    
    public function printPriceTag() {
        print $this->getPriceTag() . "\n";
    }
    
    public function printReceipt() {
        print $this->getReceipt() . "\n";
    }

    //Абстрактные методы
    abstract protected function getFinalCost();  //расчет окончательной стоимости товара
    abstract protected function getPriceTag(); //печать ценника на товар receipt
    abstract protected function getReceipt();  //печать чека за покупку
}