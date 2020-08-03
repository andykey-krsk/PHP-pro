<?php


namespace app\model\repositories;


use app\engine\App;
use app\engine\Db;
use app\model\entities\Basket;
use app\model\Repository;

class BasketRepository extends Repository
{
    //TODO или реализуйте getSummBasket
    public function getSummBasket($session) {
        $sql = "SELECT SUM(p.price) as summ FROM basket b, products p WHERE b.product_id=p.id AND session_id = :session";
        return App::call()->db->queryOne($sql, ['session' => $session])['summ'];
    }


    public function getBasket($session) {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price FROM basket b, products p WHERE b.product_id=p.id AND session_id = :session";
        return App::call()->db->queryAll($sql, ['session' => $session]);
    }


    public function getEntityClass() {
        return Basket::class;
    }


    public function getTableName()
    {
        return "basket";
    }

}