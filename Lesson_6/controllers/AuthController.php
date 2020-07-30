<?php


namespace app\controllers;

use app\model\Users;
use app\engine\Request;

class AuthController extends Controller
{
    public function actionLogin() {

        //TODO_ переписать получение данных через Request
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        $save = (new Request())->getParams()['save'];
        $user = Users::getOneWhere('login', $login);
        if ($user->auth($login, $pass)) {
            if ($save){
                $user->makeHashAuth();
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die("Не верный логин-пароль.");
        }
    }

    public function actionLogout() {
        session_destroy();
        setcookie("hash", "", time() - 3600, '/');
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}