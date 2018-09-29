<?php

class PieceProduct extends Products {
    
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
        $this->setMonitor($monitor);  
        $this->setProcessor($processor);
        $this->setVideo($video);
        $this->setOs($os);
        $this->setRam($ram);
        $this->setHdisk($hdisk); 
        $this->setWarranty($warranty);
    }
    
    function __destruct() {
        echo "Объект {$this->getName()} подкласса PieceProduct удален"."<br>";
        parent:: __destruct(); //можно выполнить дополнительные действия в деструкторе родительского класса
    }
    
    //сеттеры и геттеры
    public function getMonitor() {
        return $this->monitor;
    }
    
    public function setMonitor($monitor) {
        $this->monitor = $monitor;
    }
    
    public function getProcessor() {
        return $this->processor;
    }
    
    public function setProcessor($processor) {
        $this->processor = $processor;
    }
    
    public function getVideo() {
        return $this->video;
    }
    
    public function setVideo($video) {
        $this->video = $video;
    }
    
    public function getOs() {
        return $this->os;
    }
    
    public function setOs($os) {
        $this->os = $os;
    }
    
    public function getRam() {
        return $this->ram;
    }
    
    public function setRam($ram) {
        $this->ram = $ram;
    }
    
    public function getHdisk() {
        return $this->hdisk;
    }
    
    public function setHdisk($hdisk) {
        $this->hdisk = $hdisk;
    }
    
    public function getWarranty() {
        return $this->warranty;
    }
    
    public function setWarranty($warranty) {
        $this->warranty = $warranty;
    }
    
    //Прочие методы
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
    
    //Переопределение абстрактных методов родительского абстрактного класса
    protected function getFinalCost() { 
        return $this->getPrice();
    } 
    
    protected function getPriceTag() { 
        $text_tag = "<br><hr align=left width=300 size=2 color=#36E052 />".'ЦЕННИК:<br>'.
        Organization::getInstance()->getOrgName(). //обращаемся напрямую к Singleton-классу Organization без создания объекта
        'Наименование: '.$this->getName().'<br>'.
        'Цена за шт. (руб): '.$this->getPrice().'<br>'.
        "<hr align=left width=300 size=2 color=#36E052 /><br>";
        return $text_tag;
    } 
    
    protected function getReceipt() { 
        $text_receipt = "<br><hr align=left width=300 size=2 color=#FF5702 />".'ЧЕК:<br>'.
        Organization::getInstance()->getOrgName().
        $this->getName().' Количество: 1 шт.<br>'.
        'Сумма к оплате (руб): '.$this->getFinalCost().'<br>'.
        "<hr align=left width=300 size=2 color=#FF5702 /><br>";
        return $text_receipt;
    } 
}