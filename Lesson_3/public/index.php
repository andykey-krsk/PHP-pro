<?php
//TODO сделать путь абсолютным
include '../config/config.php';

use app\model\{Product, Users};
use app\engine\Autoload;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product("Одежда", "Брендовая", 2);
$product->insert();
//$product->delete();

//TODO* сделайте чтобы getOne возвращал объект с данными и с МЕТОДАМИ для его обработки
//var_dump($product->getOne(2));

var_dump($product);

//$users = new Users();
//var_dump($users->getAll());
