<?php

namespace app\model;

class Product extends Model
{
    public $id;
    public $image;
    public $name;
    public $description;
    protected $price;

    public function getTableName() {
        return 'goods';
    }
}