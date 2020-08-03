<?php
session_start(); //TODO завернуть в компонент

use app\engine\App;

$config = include realpath('../config/config.php');

include realpath("../vendor/Autoload.php");


try {

    App::call()->run($config);

} catch (\PDOException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e);
}
