<?php

class Products {
    
    //(properties)свойства класса
    private $id;
    private $name;
    private $type;
    private $price;
    private $descript;

    //МЕТОДЫ КЛАССА
    
    //конструктор и деструктор
    function __construct($id, $name, $type, $price, $descript) {
        $this->id       = $id;
        $this->type     = $type;
        $this->price    = $price;
        $this->name     = $name;
        $this->descript = $descript;
    }
    
    function __destruct() {
        echo 'Объект класса Product удален'."<br>";
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
    public function productDisplay()
   {
        echo 'Наименование: '.$this->name,'<br>',
        'Цена (руб): '.$this->price,'<br>',
        'Описание: '.$this->descript,'<br>'; 
   }
}