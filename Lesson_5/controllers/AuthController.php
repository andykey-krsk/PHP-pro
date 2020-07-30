<?php


namespace app\controllers;


use app\model\Users;

class AuthController extends Controller
{
    public function actionLogin() {

        //TODO переписать получение данных через Request

        $login = $_POST['login'];
        $pass = $_POST['pass'];

        if (Users::auth($login, $pass)) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die("Не верный логин-пароль.");
        }
    }

    public function actionLogout() {
        session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

}