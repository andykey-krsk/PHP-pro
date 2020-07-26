<?= $_SESSION['authError']?>
<br>
<h2>Регистрация пользователя</h2>

<form action="" method="post">
    <input type="text" name="name" placeholder="Имя"><br><br>
    <input type="text" name="login" placeholder="Логин"><br><br>
    <input type="password" name="pass" placeholder="Пароль"><br><br>
    <input type="password" name="pass_ver" placeholder="Повторить пароль"><br><br>
    <input type="submit" name="registration">
</form>