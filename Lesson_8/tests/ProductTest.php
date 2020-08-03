<?php

use app\model\entities\Product;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    public function testProduct() {
        $name = "Чай";
        $product = new Product($name);
        $this->assertEquals($name, $product->name);

      // if (strpos(Product::class, "app\\") === 0) {}
       // if (array_slice(explode(get_class(new Product()),1,1)===["model"])) {}

    }
}