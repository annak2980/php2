<?php

include_once ("singleton.php");

include_once ("abstract_product.class.php");

include_once ("digital_product.class.php");
include_once ("piece_product.class.php");
include_once ("weight_product.class.php");

$our_firm = Organization::getInstance(); //организация у нас одна, поэтому используем pattern Singletone
$our_firm->printOrgData();

echo '<br>предлагает следующие товары:<br><br>';

$program1 = new DigitalProduct("1", "1C:Enterprise", "programs", "10000", "Программа для бухгалтерского и управленческого учета", 
                        "Аппаратная (HASP)","установка 1С:Платформы и Конфигурации базы данных");
$program1->productDisplay();
$program1->setupProgram();
$program1->printPriceTag();
$program1->printReceipt();

echo "<br>".'Магические методы'."<br>";
echo $program1->get_nothing;
$program1->set_nothing = "test_getter";
$program1->call_nothing("param1","param2","param3");

$netbook1 = new PieceProduct("2", "ноутбук Asus", "computers", "80000", "15.6 LED / 1920x1080 FHD / TFT IPS / Intel® Core™ i5 / 3300 Mhz / NVIDIA GeForce GTX 1050 / 16 Gb / 1000 Gb / Windows 10 Home 64-bit / 2.3 кг / White (Белый)", "15.6 LED / макс. разрешение 1920x1080 FHD / TFT IPS", "производитель Intel® Core™ i5 / частота 3300 Mhz", "NVIDIA GeForce GTX 1050 8 Gb", "лицензионная Windows 10 Home 64-bit", "16 Gb", "1000 Gb", "1,5 года");
echo "<br><br>";
$netbook1->productDisplay();
$netbook1->computerWarranty();
$netbook1->printPriceTag();
$netbook1->printReceipt();

echo "<br><br>";
$conductor1 = new WeightProduct("3", "UTP-connector", "conductors", "100", "сетевой провод", "80","м.");
$conductor1->productDisplay();
$conductor1->productWarranty();
$conductor1->printPriceTag();
$conductor1->printReceipt();

echo "<br><br>";
DatabaseConnection::getInstance()->printConnectionData(); //Обращение напрямую к функции класса Singletone - единственного соеденения с БД