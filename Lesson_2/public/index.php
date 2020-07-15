<?php
use app\autoload\Autoload;
use app\model\{Product,Users, Basket, Feedback, News, Orders};
use app\engine\Db;

use app\model\example\{Digital, Material, Measured};

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$db = new Db();

$product = new Product($db);
echo $product->getOne(2);
echo "<br>";

$basket = new Basket($db);
echo $basket->getOne(33);
echo "<br>";

$feedback = new Feedback($db);
echo $feedback->getOne(3);
echo "<br>";

$users = new Users($db);
echo $users->getOne(4);
echo "<br>";

$orders = new Orders($db);
echo $orders->getOne(55);
echo "<br>";

$news = new News($db);
echo $news->getOne(78);
echo "<br>";


$digital = new Digital('Game', 100, 40,1);
$digital->render();
echo "<br>";

$material = new Material('Game', 100, 40,1);
$material->render();
echo "<br>";

$measured = new Measured('Гвозди', 100, 40,11);
$measured->render();
echo "<br>";


//echo $product->getAll();

//$users = new Users(new Db());
//echo $users->getOne(1);
//$db = new Db();

//var_dump($product);
//var_dump($db);