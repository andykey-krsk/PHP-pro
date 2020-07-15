<?php

namespace app\model\example;

class Material extends Digital
{
    public $length;
    public $width;
    public $height;

    function __construct($name = null, $price = null, $markup = 40, $quantity = null, $height = null, $width = null, $length = null)
    {
        parent::__construct($name, $price * 2, $markup, $quantity);
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }
}