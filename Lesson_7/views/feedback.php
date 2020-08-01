<? if (isset($feedback)):
    foreach ($feedback as $item): ?>
        <p><strong><?= $item['name'] ?></strong>
            <a href="/feedback/delete/?id=<?= $item['id'] ?>">[удалить]</a>
            <a href="/feedback/edit/?id=<?= $item['id'] ?>">[править]</a>
        </p>
        <p><?= $item['feedback'] ?></p>
    <? endforeach;
else:?>
    <p>Пока нет отзывов</p>
<? endif ?>

<br>
<hr>
<br>
<?php
if (!isset($feedback_form)) {
    $button = "ОТПРАВИТЬ";
} else {
    $button = "ИЗМЕНИТЬ";
}
?>

<h3>Добавить отзыв</h3>
<form action="/feedback/save" method="post">
    <input type="text" placeholder="Имя" name="feedback_name"
           value="<?= $feedback_form->name ?>"><br>
    <textarea name="feedback_text" placeholder="Напишите отзыв" width="159px"
              height="120px"><?= $feedback_form->feedback ?></textarea><br>
    <input type="hidden" name="feedback_id" value="<?= $feedback_form->id ?>">
    <button type="submit" name="feedback"><?= $button ?></button>
</form>