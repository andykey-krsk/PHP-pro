<?php

namespace app\model\entities;

use app\model\Model;

class Basket extends Model
{
    protected $id;
    protected $session;
    protected $product;
    protected $price;

    protected $props = [
        'session' => false,
        'product' => false,
        'price' => false
    ];

    public function __construct($session = null, $product = null, $price = null)
    {
        $this->session = $session;
        $this->product = $product;
        $this->price = $price;
    }
}