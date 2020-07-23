<?php
//TODO сделать путь абсолютным
include '../config/config.php';

use app\model\{Product, Users};
use app\engine\Autoload;
use app\engine\Render;

/**
 * @var Product $product
 */

include "../engine/Autoload.php";

//TODO зарегистрируйте автозагрузчик composer

spl_autoload_register([new Autoload(), 'loadClass']);


$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = $url[1] ?: 'product';
$actionName = $url[2];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    Die("Контроллер не существует!");
}

die();

//$product = new Product("Одежда", "Брендовая", 2);
//$product->save();

//$user = new Users("user", "4454");
//$user->save();

//$product = new Product();
//$product->delete();

$product = Product::getOne(3);
$product->price = 100;
$product->save();

//var_dump($product);
//var_dump(get_class_methods($product));

//$product->delete();

//$users = new Users();
//var_dump($users->getAll());

