<?php

namespace app\model\example;

class Measured extends Product
{
    public $weight;
    public $discount;

    function __construct($name = null, $price = null, $markup = 40, $weight = null)
    {
        parent::__construct($name, $price, $markup);
        $this->weight = $weight;
        $this->profit = $this->getProfit();
        $this->discount = 0;
    }

    public function setWeight($newWeight)
    {
        $this->weight = $newWeight;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getTotal()
    {
        switch ($this->weight) {
            case $this->weight <= 1:
                $result = $this->FinalPrice * $this->weight * 1;
                $this->discount = 0;
                break;
            case ($this->weight > 1) && ($this->weight < 5):
                $result = $this->FinalPrice * $this->weight * 0.95;
                $this->discount = 5;
                break;
            case ($this->weight > 5) && ($this->weight <= 10):
                $result = $this->FinalPrice * $this->weight * 0.9;
                $this->discount = 10;
                break;
            case $this->weight > 10:
                $result = $this->FinalPrice * $this->weight * 0.85;
                $this->discount = 15;
                break;
            default:
                $result = $this->FinalPrice * $this->weight * 1;
                $this->discount = 0;
        }
        return $result;
    }

    function render()
    {
        $this->getTotal();
        echo "Название: $this->name <br>";
        echo "Цена за единицу: " . $this->getTotal()/$this->weight . "<br>";
        echo "Вес: $this->weight <br>";
        echo "Скидка: " . $this->discount . " %<br>";
        echo "Доход: " . ($this->getTotal()/$this->weight - $this->price) * $this->weight . " <br>";
        echo "Общая стоимость: " . $this->getTotal() . "<br>";
    }
}