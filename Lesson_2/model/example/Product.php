<?php

namespace app\model\example;

abstract class Product
{
    public $name;
    public $price;
    public $markup; //процент наценки
    public $profit; //прибыль
    public $FinalPrice;

    function __construct($name = null, $price = null, $markup = 40)
    {
        $this->name = $name;
        $this->price = $price;
        $this->markup = $markup;
        $this->profit = $this->getProfit();
        $this->FinalPrice = $this->getFinalPrice();
    }

    public function setPrice($newPrice)
    {
        $this->price = $newPrice;
        $this->FinalPrice = $this->getFinalPrice();
    }

    function setMarkup($newMarkup)
    {
        $this->markup = $newMarkup;
        $this->FinalPrice = $this->getFinalPrice();
    }

    public function getFinalPrice()
    {
        return $this->price + $this->getProfit();
    }

    public function getProfit()
    {
        return $this->price * $this->markup/100;
    }
}