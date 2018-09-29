<?php

class WeightProduct extends Products {
    
    //(properties)свойства класса
    private $amount;
    private $unit;

    //МЕТОДЫ КЛАССА
    
    //конструктор и деструктор
    function __construct($id, $name, $type, $price, $descript, $amount, $unit) {
        parent:: __construct($id, $name, $type, $price, $descript);
        $this->setAmount($amount);
        $this->setUnit($unit);
    }
    
    function __destruct() {
        echo "Объект {$this->getName()} подкласса WeightProduct удален"."<br>";
        parent:: __destruct(); //можно выполнить дополнительные действия в деструкторе родительского класса
    }
    
    //сеттеры и геттеры
    public function getAmount() {
        return $this->amount;
    }
    
    public function setAmount($amount) {
        $this->amount = $amount;
    }
    
    public function getUnit() {
        return $this->unit;
    }
    
    public function setUnit($unit) {
        $this->unit = $unit;
    }
    
    public function productDisplay() { //перегрузка родительского метода
        parent:: productDisplay();
        echo 'Характеристики подробнее:<br>';
        echo 'единица измерения: '.$this->unit.'<br>';
        echo 'количество: '.$this->amount.'<br>';
    }
    
    public function productWarranty() {
        //описание гарантии свое для каждого компьютера
        echo 'Товар возврату и обмену не подлежит!<br>';
    }
    
     //Переопределение абстрактных методов родительского абстрактного класса
    protected function getFinalCost() { 
        return $this->getPrice() * $this->getAmount();
    } 
    
    protected function getPriceTag() { 
        $org = Organization::getInstance()->getOrgName(); 
        
        $text_tag = "<br><hr align=left width=300 size=2 color=#BC02FF />".'ЦЕННИК:<br>'.$org. 
        '<br>'.'Наименование: '.$this->getName().'<br>'.
        'Цена за '.$this->unit.' (руб): '.$this->getPrice().'<br>'.
        "<hr align=left width=300 size=2 color=#BC02FF /><br>";
        return $text_tag;
    } 
    
    protected function getReceipt() { 
        $org = Organization::getInstance()->getOrgName(); 
        
        $text_receipt = "<br><hr align=left width=300 size=2 color=#FF5702 />".'ЧЕК:<br>'.$org. 
        '<br>'.$this->getName().' (весовой/мерный товар)<br>'.
        '<br>Количество:'.$this->getAmount().' '.$this->getUnit().'<br>'.    
        'Сумма к оплате (руб): '.$this->getFinalCost().'<br>'.
        "<hr align=left width=300 size=2 color=#FF5702 /><br>";
        return $text_receipt;
    } 
}