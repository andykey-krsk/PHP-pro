<h2>Корзина</h2>
<? if (isset($basket)):
    $total_price = 0;
    $count = 1;
    foreach ($basket as $item): ?>
        <div id="item<?= $item['basket_id'] ?>">
            <p><?= $count++ ?>. <strong><?= $item['name'] ?>. </strong>
                Стоимость: <?= $item['price'] ?>. Колличество: <?= $item['quantyti'] ?>.
                <a href="/basket/delete/?id=<?= $item['basket_id'] ?>">[удалить]</a>
            </p>
        </div>
        <? $total_price += (float)$item['price'] * (int)$item['quantyti'];
    endforeach ?>
    Всего: <?= $total_price ?> рублей.
<? else: ?>
    <p>Корзина пуста</p>
<? endif ?>

<script>
    //TODO отобразить сумму товаров в корзине
    //TODO реализовать удаление из корзины асинхпронно
    //.remove()
</script>
