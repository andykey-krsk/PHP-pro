<?php
/** @var \app\model\Product $product */
?>
<form action="/basket/buy" method="post">
    <h2><?= $product->name ?></h2>
    <p><?= $product->description ?></p>
    <p>Цена: <?= $product->price ?></p>
    <input type="hidden" name="product_price" value="<?= $product->price ?>">
    <input type="hidden" name="product_id" value="<?= $product->id ?>">
    <button type="submit" name="buy">Купить</button>
</form>