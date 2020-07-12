<?php
//use app\model\{Product, Users};
//use app\engine\Db;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

//TODO придумайте способ не создавать несколько раз Db()

$product = new Product(new Db());
echo $product->getOne(2);
//echo $product->getAll();


//$users = new Users(new Db());
//echo $users->getOne(1);
//$db = new Db();

var_dump($product);
//var_dump($db);