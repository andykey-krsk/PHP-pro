<?if ($auth):?>
    Добро пожаловать <?=$username?> <a href="/auth/logout/"> [Выход]</a>
<?else:?>
<form action="/auth/login/" method="post">
    <input type="text" name="login" placeholder="Логин">
    <input type="text" name="pass" placeholder="Пароль">
    Save? <input type='checkbox' name='save'>
    <input type="submit" name="submit" value="Войти">
</form>
<?endif;?><br>
<a href="/">Главная</a>
<a href="/product/catalog">Каталог</a>
<a href="/basket">Корзина (<span id="count"><?=$count?></span>)</a><br>