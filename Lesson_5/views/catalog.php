<h2>Каталог</h2>

<? foreach ($catalog as $item): ?>
    <h2><a href="/product/card/?id=<?=$item['id']?>"><?=$item['name']?></a></h2>
    <p><?=$item['description']?></p>
    <p>Цена: <?=$item['price']?></p>
    <hr>
<? endforeach;?>

<a href="/product/catalog/?page=<?=$page?>">Далее</a>