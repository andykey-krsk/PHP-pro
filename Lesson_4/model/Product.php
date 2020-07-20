<?php

namespace app\model;

use app\traits\TSingletone;

class Product extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;


    // оптимизация update
    /*protected $params = [
        'name' => false,
        'description' => false,
        'price' => false
    ];*/

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public static function getTableName() {
        return 'products';
    }
}