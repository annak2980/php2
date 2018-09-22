<?php

echo '1-3 задание'."<br>";

include_once ("product.class.php");

$product = new Products("1", "ноутбук Lenovo", "computers", "40000", "15.6 LED / 1920x1080 FHD / TFT IPS / Intel® Core™ i5 / 2500 Mhz / NVIDIA GeForce GTX 1050 /8 Gb / 1000 Gb / Windows 10 Home 64-bit / 2.4 кг / Onyx Black (Черный)");

echo "<br>".'1 способ вывода объекта var_dump():'."<br>";
var_dump($product);

echo "<br><br>".'2 способ вывода объекта echo + геттеры:'."<br>";
echo "Код товара: ".$product->getId()."<br>";
echo "Наименование: ".$product->getName()."<br>";
echo "Тип товара: ".$product->getType()."<br>";
echo "Цена (руб): ".$product->getPrice()."<br>";
echo "Описание: ".$product->getDesc()."<br>";

echo "<br>".'3 способ вывода объекта - метод объекта Display():'."<br>";
$product->productDisplay();


echo "<br><br>".'4 задание'."<br><br>";

include_once ("program.class.php");

$program1 = new Program("2", "1C:Enterprise", "programs", "10000", "Программа для бухгалтерского и управленческого учета", 
                        "Аппаратная (HASP)","установка 1С:Платформы и Конфигурации базы данных");
$program1->productDisplay();
$program1->setupProgram();

include_once ("computer.class.php");

$netbook1 = new Computer("3", "ноутбук Asus", "computers", "80000", "15.6 LED / 1920x1080 FHD / TFT IPS / Intel® Core™ i5 / 3300 Mhz / NVIDIA GeForce GTX 1050 / 16 Gb / 1000 Gb / Windows 10 Home 64-bit / 2.3 кг / White (Белый)", "15.6 LED / макс. разрешение 1920x1080 FHD / TFT IPS", "производитель Intel® Core™ i5 / частота 3300 Mhz", "NVIDIA GeForce GTX 1050 8 Gb", "лицензионная Windows 10 Home 64-bit", "16 Gb", "1000 Gb", "1,5 года");
echo "<br><br>";
$netbook1->productDisplay();
$netbook1->computerWarranty();


echo "<br><br>".'5 задание'."<br>";

class A {
    public function foo() {
        static $x = 0;
        echo ++$x."<br>";
    }
}
$a1 = new A();
$a2 = new A();
echo '1 шаг:';
$a1->foo();
echo '2 шаг:';
$a2->foo();
echo '3 шаг:';
$a1->foo();
echo '4 шаг:';
$a2->foo();

//Результат: статическая переменная $x относится к классу А. 
//При каждом вызове ф-ции из объекта данного класса $x увеличивает свое значение
//1 шаг:1
//2 шаг:2
//3 шаг:3
//4 шаг:4


echo "<br>".'6 задание'."<br>";

class A1 {
    public function foo() {
        static $x = 0;
        echo ++$x."<br>";
    }
}
class B1 extends A1 {
}
$a1 = new A1();
$b1 = new B1();
echo '1 шаг:';
$a1->foo();
echo '2 шаг:';
$b1->foo();
echo '3 шаг:';
$a1->foo(); 
echo '4 шаг:';
$b1->foo();

//Результат: В1 - отдельный независимый класс, который при описании наследует методы класса А1 
//класс А1 и подкласс В1 получает каждый свою статическую переменную $x
//переменные $x занимают разные участки памяти и независимо друг от друга
//увеличивают свое значение при вызове фунции для классов А1 В1 
//1 шаг:1
//2 шаг:1
//3 шаг:2
//4 шаг:2

echo "<br>".'7 задание'."<br>";

class A2 {
    public function foo() {
        static $x = 0;
        echo ++$x."<br>";
}
}
class B2 extends A2 {
}
$a2 = new A2; //Если в конструктор не передаются параметры, то скобки можно не ставить.
$b2 = new B2;
echo '1 шаг:';
$a2->foo(); 
echo '2 шаг:';
$b2->foo();
echo '3 шаг:';
$a2->foo(); 
echo '4 шаг:';
$b2->foo(); 

//Результат: такой же, как и в 6 задании
//
//1 шаг:1
//2 шаг:1
//3 шаг:2
//4 шаг:2