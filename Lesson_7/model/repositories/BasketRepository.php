<?php

namespace app\model\repositories;

use app\engine\Db;
use app\model\entities\Basket;
use app\model\Repository;

class BasketRepository extends Repository
{
    public function getSummBasket($session)
    {
        $sql = "SELECT SUM(price) as summ FROM basket WHERE session = :session";
        return Db::getInstance()->queryOne($sql, ['session' => $session])['summ'];
    }

    public function getBasket($session) {
        $sql ="SELECT basket.id as basket_id, basket.product, basket.quantyti, basket.price, basket.session,
                  products.id, products.name 
           FROM basket, products
           WHERE basket.product = products.id AND basket.session = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }

    public function getEntityClass() {
        return Basket::class;
    }

    public function getTableName()
    {
        return "basket";
    }
}