<?php
define("ROOT", dirname(__DIR__));
include ROOT . "/config/config.php";

use app\model\{Product, Users};
use app\engine\Autoload;
use app\engine\Render;
//use app\engine\TwigRender;
use app\engine\Request;
use app\engine\Sessions;

/**
 * @var Product $product
 */

//include "../engine/Autoload.php";

include "../vendor/Autoload.php";


spl_autoload_register([new Autoload(), 'loadClass']);

try {

    (new Sessions())->sessionStart();

    $request = new Request();

    $controllerName = $request->getControllerName() ?: 'product';
    $actionName = $request->getActionName();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        //TODO киньте исключение
        Die("Контроллер не существует!");
    }
} catch (\PDOException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e);
}
die();

//$product = new Product("Одежда", "Брендовая", 2);
//$product->save();

//$user = new Users("user", "4454");
//$user->save();

//$product = Product::getOne(3);
//$product->delete();

$product = Product::getOne(3);
$product->price = 100;
$product->save();

//var_dump($product);
//var_dump(get_class_methods($product));

//$product->delete();

//$users = new Users();
//var_dump($users->getAll());

