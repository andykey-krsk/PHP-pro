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