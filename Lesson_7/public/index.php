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

include ROOT . "/vendor/Autoload.php";

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
} catch (\Exception $e) {
    var_dump($e);
}