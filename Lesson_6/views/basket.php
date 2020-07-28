<h2>Корзина</h2>
<? if (isset($basket)):
    foreach ($basket as $item): ?>
        <div id="<?= $item['basket_id'] ?>">
            <p><strong><?= $item['name'] ?>. </strong>
                Стоимость: <?= $item['price'] ?> рублей
                <button data-id="<?= $item['basket_id'] ?>" class="delete">удалить</button>
            </p>
        </div>
    <? endforeach ?>
    Всего: <span id="total"><?= $total_price ?></span> рублей.
<? else: ?>
    <p>Корзина пуста</p>
<? endif ?>

<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/delete/', {
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
                    document.getElementById('total').innerText = answer.total;
                    document.getElementById(id).remove();
                }
            )();
        })
    });
</script>