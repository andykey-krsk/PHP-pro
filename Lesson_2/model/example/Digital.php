<?php

namespace app\model\example;

class Digital extends Product
{
    public $quantity;

    function __construct($name = null, $price = null, $markup = 40, $quantity = null)
    {
        parent::__construct($name, $price, $markup);
        $this->quantity = $quantity;
    }

    public function getTotal()
    {
        return $this->quantity * $this->getFinalPrice();
    }

    function render()
    {
        echo "Название: $this->name <br>";
        echo "Цена за единицу: " . $this->getFinalPrice() . "<br>";
        echo "Количество: $this->quantity <br>";
        echo "Доход: " . $this->profit * $this->quantity . " <br>";
        echo "Общая стоимость: " . $this->getTotal() . "<br>";
    }
}