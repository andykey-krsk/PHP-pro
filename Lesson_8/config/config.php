<?php
//define('DS', DIRECTORY_SEPARATOR);
//define('ROOT_DIR', dirname(__DIR__));
//define("CONTROLLER_NAMESPACE", "app\\controllers\\");
//define("TEMPLATE_DIR", dirname(__DIR__) . "/views/");
use app\engine\Db;
use app\model\repositories\BasketRepository;
use app\model\repositories\UserRepository;
use app\engine\Request;
use app\model\repositories\ProductRepository;

return [
    'root_dir' =>  dirname(__DIR__),
    'templates_dir' => dirname(__DIR__) . "/views/",
    'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => 'root',
            'database' => 'shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        //TODO По хорошему сделать для репозиториев отедьное простое хранилищебез reflection
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'usersRepository' => [
            'class' => UserRepository::class
        ]

    ]

];