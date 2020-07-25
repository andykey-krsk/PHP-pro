<?php

namespace app\model;

use app\traits\TSingletone;
use app\engine\Db;

class Basket extends DbModel
{
    protected $id;
    protected $product;
    protected $price;
    protected $quantyti;
    protected $session;

    protected $props = [
        'product' => false,
        'price' => false,
        'quantyti' => false,
        'session' => false,
    ];

    public function __construct($product = null, $price = null, $quantyti = null)
    {
        $this->product = $product;
        $this->price = $price;
        $this->quantyti = $quantyti;
        $this->session = session_id();
    }

    public static function getTableName()
    {
        return 'basket';
    }

    public static function getBasket($session_id)
    {
        $sql ="SELECT basket.id as basket_id, basket.product, basket.quantyti, basket.price, basket.session,
                  products.id, products.name 
           FROM basket, products
           WHERE basket.product = products.id AND basket.session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session_id]);
    }

    public static function getCount($session_id)
    {
        //c суммой пока не получилось
        $tableName = static::getTableName();
        $sql = "SELECT product_quantyti FROM {$tableName} WHERE session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }
}