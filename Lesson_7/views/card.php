<?php
/** @var \app\model\Product $product */
?>
<h2><?=$product->name?></h2>
<p><?=$product->description?></p>
<p>Цена: <?=$product->price?></p>
<button data-id="<?= $product->id ?>" class="buy">Купить</button>

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