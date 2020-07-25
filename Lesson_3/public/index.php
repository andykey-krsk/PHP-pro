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
var_dump($product->getOne(2));
var_dump($product->getObject(3));

//var_dump($product);

//$users = new Users();
//var_dump($users->getAll());