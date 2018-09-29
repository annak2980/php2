<?php

class DigitalProduct extends Products {
    
    //(properties)свойства класса
    private $protection;
    private $setup;

    //МЕТОДЫ КЛАССА
    
    //конструктор и деструктор
    function __construct($id, $name, $type, $price, $descript, $protection, $setup) {
        parent:: __construct($id, $name, $type, $price, $descript);
        $this->setProtection($protection);
        $this->setSetup($setup); 
    }
    
    function __destruct() {
        echo "Объект {$this->getName()} подкласса DigitalProduct удален"."<br>";
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
    
    //Прочие методы 
    public function productDisplay() { //перегрузка родительского метода
        parent:: productDisplay();
        echo 'Тип защиты: '.$this->protection,'<br>';
    }
    
    public function setupProgram() {
        //описание процесса установки свое для каждой программы
        echo 'Установка программного продукта '.$this->getName().' включает в себя:<br>'.$this->setup.'<br>';
    }
    
    //Переопределение абстрактных методов родительского абстрактного класса
    protected function getFinalCost() { 
        return $this->getPrice();
    } 
    
    protected function getPriceTag() { 
        $org = Organization::getInstance()->getOrgName(); //обращаемся напрямую к Singleton-классу Organization без создания объекта
        
        $text_tag = "<br><hr align=left width=300 size=2 color=#FFD002 />".'ЦЕННИК:<br>'.$org. 
        '<br>'.'Наименование: '.$this->getName().'<br>'.
        'Цена лицензии (руб): '.$this->getPrice().'<br>'.
        "<hr align=left width=300 size=2 color=#FFD002 /><br>";
        return $text_tag;
    } 
    
    protected function getReceipt() { 
        $org = Organization::getInstance()->getOrgName(); 
        
        $text_receipt = "<br><hr align=left width=300 size=2 color=#FF5702 />".'ЧЕК:<br>'.$org. 
        '<br>'.$this->getName().' (лицензия использования программного продукта)<br>'.
        'Сумма к оплате (руб): '.$this->getFinalCost().'<br>'.
        "<hr align=left width=300 size=2 color=#FF5702 /><br>";
        return $text_receipt;
    } 
}