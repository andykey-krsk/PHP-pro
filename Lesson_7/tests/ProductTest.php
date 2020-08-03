<?php

use app\model\entities\Product;

class ProductTest extends \PHPUnit\Framework\TestCase
{
    protected $fixture;

    /**
     * @dataProvider providerProduct
     */

    public function testProduct($a, $b, $c)
    {
        $product = new Product($a, $b, $c);
        $this->assertEquals($a, $product->name);
        $this->assertEquals($b, $product->description);
        $this->assertEquals($c, $product->price);
        $this->assertIsArray($product->props);
    }

    public function testProductClass()
    {
        $str = Product::class;
        $arr = explode("\\", $str);

        $this->assertEquals("app", $arr[0]);
        $this->assertEquals("model", $arr[1]);
        $this->assertEquals("entities", $arr[2]);
        $this->assertEquals("Product", $arr[3]);
    }
    //как исполдьзовать ифы не понял и объяснения ни где не нашел
    // if (strpos(Product::class, "app\\") === 0) {
    //}
    //if (array_slice(explode(get_class(new Product()), 1, 1) === ["model"])) {
    //}

    public function providerProduct()
    {
        return array(
            array("sldf; sdfsdfjalsdkf asd'fasdkf", "fsdfsdf sdfsd sdfg dfg df324 234q234 234234 23", rr),
            array("Пицца", "Пепперони", 55),
            array("Брендовая", "Брендовая", 100)
        );
    }

    protected function setUp(): void
    {
        $this->fixture = new Product();
    }

    protected function tearDown(): void
    {
        $this->fixture = NULL;
    }
}