<?php


namespace app\model;


class Orders extends Model
{
    public $id;
    public $name;
    public $phone;
    public $adres;
    public $session_id;

    public function getTableName()
    {
        return 'orders';
    }
}