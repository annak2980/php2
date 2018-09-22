<?php

class Program extends Products {
    
    //(properties)свойства класса
    private $protection;
    private $setup;

    //МЕТОДЫ КЛАССА
    
    //конструктор и деструктор
    function __construct($id, $name, $type, $price, $descript, $protection, $setup) {
        parent:: __construct($id, $name, $type, $price, $descript);
        $this->protection = $protection;  
        $this->setup      = $setup; 
    }
    
    function __destruct() {
        echo "Объект {$this->name} подкласса Program удален"."<br>";
        parent:: __destruct(); //можно выполнить дополнительные действия в деструкторе родительского класса
    }
    
    //сеттеры и геттеры
    public function getProtection() {
        return $this->protection;
    }
    
    public function setProtection($protection) {
        $this->protection = $protection;
    }
    
    public function getSetup() {
        return $this->setup;
    }
    
    public function setSetup($setup) {
        $this->setup = $setup;
    }
    
    public function productDisplay() { //перегрузка родительского метода
        parent:: productDisplay();
        echo 'Тип защиты: '.$this->protection,'<br>';
    }
    
    public function setupProgram() {
        //описание процесса установки свое для каждой программы
        echo 'Установка программного продукта '.$this->name.' включает в себя:<br>'.$this->setup.'<br>';
    }
}