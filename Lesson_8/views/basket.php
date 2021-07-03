<h2>Корзина</h2>

<? if (!empty($products)): ?>
    <? foreach ($products as $item): ?>
        <div id="<?= $item['id_basket'] ?>">
            <h2><?= $item['name'] ?></h2>
            <p>Описание: <?= $item['description'] ?></p>
            <p>Цена:<?= $item['price'] ?></p>
            <button data-id="<?= $item['id_basket'] ?>" class="delete">Удалить</button>
        </div>
    <? endforeach; ?>
<? else: ?>
    Корзина пуста
<? endif; ?>
Итого: <?=$summ?>
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
                    if (answer.errors === 0) {
                        document.getElementById('count').innerText = answer.count;
                        document.getElementById(answer.id).remove();
                    } else {
                        alert("Ошибка удаления");
                    }

                }
            )();
        })
    });

</script>
