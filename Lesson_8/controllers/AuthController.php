<?php


namespace app\controllers;


use app\engine\App;


class AuthController extends Controller
{
    public function actionLogin() {

        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];

        if (App::call()->usersRepository->auth($login, $pass)) {
            if (isset(App::call()->request->getParams()['save'])) {
                App::call()->usersRepository->updateHash();
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die("Не верный логин-пароль.");
        }
    }

    public function actionLogout() {
        //TODO переписать через компонет App Session
        session_destroy();
        setcookie('hash', '', time()-3600, '/');
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }

}