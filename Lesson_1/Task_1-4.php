<?php

/*1. Придумать класс, который описывает любую сущность
из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
2. Описать свойства класса из п.1 (состояние).
3. Описать поведение класса из п.1 (методы).*/

class Product
{
    public $articul;
    public $name;
    public $price;
    public $category;
    public $availability;

    function __construct($name, $category, $price = null, $availability = false, $articul = null)
    {
        $this->articul = $articul;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->availability = $availability;
    }

    function setArticul()
    {
        //Как присвоить уникальный артикул пока не придумал
        is_null($this->articul) ? $this->articul = rand(0, 100000) : $this->articul;
    }

    function getPrice()
    {
        return (is_null($this->price) ? 'N/A' : $this->price);
    }

    function setPrice($newPrice)
    {
        $this->price = $newPrice;
    }
}

/*4. Придумать наследников класса из п.1. Чем они будут отличаться?*/

class Book extends Product
{
    private $author;
    private $volume;

    function __construct($name, $author, $volume, $category, $price = null, $availability = false, $articul = null)
    {
        parent::__construct($name, $category, $price, $availability, $articul);
        $this->author = $author;
        $this->volume = $volume;
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getVolume()
    {
        return $this->volume;
    }
}

$book1 = new Book ('Книга о здоровой пище', 'Иванов', 400, 'Книги');
$book1->setArticul();

echo "Артикул: {$book1->articul}. {$book1->getAuthor()}. {$book1->name}, объем {$book1->getVolume()} страниц. Цена - {$book1->getPrice()} рублей <br>";
echo "В продаже: " . ($book1->availability ? 'есть' : 'нет');
echo "<br><br>";

$book1->setPrice(450);
echo "Артикул: {$book1->articul}. {$book1->getAuthor()}. {$book1->name}, объем {$book1->getVolume()} страниц. Цена - {$book1->getPrice()} рублей <br>";
echo "В продаже: " . ($book1->availability ? 'есть' : 'нет');
echo "<br><br>";

$book1->availability = true;
echo "Артикул: {$book1->articul}. {$book1->getAuthor()}. {$book1->name}, объем {$book1->getVolume()} страниц. Цена - {$book1->getPrice()} рублей <br>";
echo "В продаже: " . ($book1->availability ? 'есть' : 'нет');
