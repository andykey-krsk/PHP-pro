<? if (!$auth) : ?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="admin" value="admin">
        <input type="password" name="pass" placeholder="123" value="123">
        Запомнить? <input type="checkbox" name="save">
        <input type="submit" name="send">
    </form>
    <a href="/auth/registration/">Зарегистрироваться</a><br><br>
<? else: ?>
    Добро пожаловать <?= $username ?>!  <a href="/auth/logout/">Выход</a><br><br>
<? endif ?>

<a href="/">Главная</a>
<a href="/product/catalog">Каталог</a>
<a href="/feedback">Отзывы</a>
<a href="/about">О нас</a>
<a href="/basket">Корзина (<span id="count"><?=$count ?></span>)</a><br>