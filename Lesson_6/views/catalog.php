<h2>Каталог</h2>

<? foreach ($catalog as $item): ?>
    <form action="/basket/buy" method="post">
        <h2><a href="/product/card/?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h2>
        <p><?= $item['description'] ?></p>
        <p>Цена: <?= $item['price'] ?></p>
        <input type="hidden" name="product_price" value="<?= $item['price'] ?>">
        <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
        <input type="hidden" name="page" value="<?= $_SERVER['REQUEST_URI'] ?>">
        <button type="submit" name="buy">Купить</button>
        <!--<button data-id="<?/*= $item['id'] */?>" class="buy">Купить</button>-->
    </form>
    <hr>
<? endforeach;?>

<a href="/product/catalog/?page=<?= $page ?>">Далее</a>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/buy/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )();
        })
    });

</script>