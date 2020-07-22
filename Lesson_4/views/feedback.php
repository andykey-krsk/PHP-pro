<? if (isset($feedback)):
    foreach ($feedback as $item): ?>
        <p><strong><?= $item['name'] ?></strong>
            <a href="?c=feedback&a=delete&id=<?= $item['id'] ?>">[удалить]</a>
            <a href="?c=feedback&a=edit&id=<?= $item['id'] ?>">[править]</a>
        </p>
        <p><?= $item['feedback'] ?></p>
    <? endforeach;
else:?>
    <p>Пока нет отзывов</p>
<? endif ?>

<br>
<hr>
<br>

<h3>Добавить отзыв</h3>
<form action="?c=feedback&a=add" method="post">
    <input type="text" placeholder="Имя" name="name" value=""><br>
    <textarea name="text" placeholder="Напишите отзыв" width="159px"
              height="120px"></textarea><br>
    <input type="hidden" name="id" value="">
    <button type="submit" name="feedback">ОК</button>
</form>
