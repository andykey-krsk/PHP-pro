<?php
use app\autoload\Autoload;
use app\model\{Product,Users, Basket, Feedback, News, Orders};
use app\engine\Db;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

//TODO придумайте способ не создавать несколько раз Db()

$product = new Product(new Db());
echo $product->getOne(2);
echo "<br>";

$basket = new Basket(new Db());
echo $basket->getOne(6);
//echo $product->getAll();


//$users = new Users(new Db());
//echo $users->getOne(1);
//$db = new Db();

//var_dump($product);
//var_dump($db);