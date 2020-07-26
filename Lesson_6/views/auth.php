<? if (!$auth) : ?>
    <form action="" method="post">
        <input type="text" name="login" placeholder="admin" value="admin">
        <input type="password" name="pass" placeholder="123" value="123">
        Запомнить? <input type="checkbox" name="save">
        <input type="submit" name="send">
    </form>
    <a href="/registration/">Зарегистрироваться</a><br><br>
<? else: ?>
    Добро пожаловать! <?= $user ?> <a href="?logout">Выход</a><br><br>
<? endif ?>