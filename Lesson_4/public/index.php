<?php
//TODO сделать путь абсолютным
include '../config/config.php';

use app\model\{Product, Users};
use app\engine\Autoload;

/**
 * @var Product $product
 */

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    Die("Контроллер не существует!");
}


//$product = new Product("Одежда", "Брендовая", 2);
//$product->save();

//$user = new Users("user", "4454");
//$user->save();

//$product = new Product();
//$product->delete();

//$product = Product::getOne(4);
//$product->price = 34;
//$product->save();

//var_dump($product);
//var_dump(get_class_methods($product));

//$product->delete();

//$users = new Users();
//var_dump($users->getAll());
