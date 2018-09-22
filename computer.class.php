<?php

class Computer extends Products {
    
    //(properties)свойства класса
    private $monitor;
    private $processor;
    private $video;
    private $os;
    private $ram;
    private $hdisk;
    private $warranty;

    //МЕТОДЫ КЛАССА
    
    //конструктор и деструктор
    function __construct($id, $name, $type, $price, $descript, 
                        $monitor, $processor, $video, $os, $ram, $hdisk, $warranty) {
        parent:: __construct($id, $name, $type, $price, $descript);
        $this->monitor   = $monitor;  
        $this->processor = $processor; 
        $this->video     = $video; 
        $this->os        = $os; 
        $this->ram       = $ram; 
        $this->hdisk     = $hdisk; 
        $this->warranty  = $warranty; 
    }
    
    function __destruct() {
        echo "Объект {$this->name} подкласса Computer удален"."<br>";
        parent:: __destruct(); //можно выполнить дополнительные действия в деструкторе родительского класса
    }
    
    //сеттеры и геттеры
    public function getProtection() {
        return $this->hdisk;
    }
    
    public function setProtection($hdisk) {
        $this->hdisk = $hdisk;
    }
    
    public function productDisplay() { //перегрузка родительского метода
        parent:: productDisplay();
        echo 'Технические характеристики подробнее:<br>';
        echo 'Монитор: '.$this->monitor.'<br>';
        echo 'Процессор: '.$this->processor.'<br>';
        echo 'Видеокарта: '.$this->video.'<br>';
        echo 'Оперативная память: '.$this->ram.'<br>';
        echo 'Жесткий диск: '.$this->hdisk.'<br>';
        echo 'Операционная система: '.$this->os.'<br>';
    }
    
    public function computerWarranty() {
        //описание гарантии свое для каждого компьютера
        echo 'Гарантийное обслуживание: '.$this->warranty.'<br>';
    }
}