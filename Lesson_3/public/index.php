<?php
//TODO_ сделать путь абсолютным
define("ROOT", dirname(__DIR__));

include ROOT . "/config/config.php";

use app\model\{Product, Users};
use app\engine\Autoload;

include ROOT . "/engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product("Одежда", "Брендовая", 2);
//$product->insert();
//var_dump($product);

//$product->delete();
//$product->description = "Секонд хенд";
//$product->price = 1;
//$product->update();
//var_dump($product);
//TODO* сделайте чтобы getOne возвращал объект с данными и с МЕТОДАМИ для его обработки
var_dump($product->getOne(2));
var_dump($product->getObject(3));

//var_dump($product);

//$users = new Users();
//var_dump($users->getAll());