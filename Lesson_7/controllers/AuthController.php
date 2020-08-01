<?php

namespace app\controllers;

use app\engine\Request;
use app\model\repositories\UserRepository;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        $save = (new Request())->getParams()['save'];
        if ((new UserRepository())->auth($login, $pass)) {
            if ($save) {
                $user = (new UserRepository())->getOneWhere('login',$login);
                $user->hash = uniqid(rand(), true);
                (new UserRepository())->save($user);
                setcookie("hash", $user->hash, time() + 3600, '/');
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die("Не верный логин-пароль.");
        }
    }

    public function actionLogout()
    {
        session_destroy();
        setcookie("hash", "", time() - 3600, '/');
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}