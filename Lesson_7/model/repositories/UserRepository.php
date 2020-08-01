<?php

namespace app\model\repositories;

use app\model\Repository;
use app\model\entities\Users;

class UserRepository extends Repository
{
    public function isAuth() {
        if (isset($_COOKIE["hash"])) {
            $user =(new UserRepository())->getOneWhere('hash', $_COOKIE["hash"]);
            if (!empty($user->login)) {
                $_SESSION['login'] = $user->login;
            }
        }
        return isset($_SESSION['login']) ? true : false;
    }

    public function isAdmin() {
        return $_SESSION['login'] === 'admin';
    }

    public function getName() {
        return isset($_SESSION['login']) ? $_SESSION['login'] : "Guest";
    }

    public function auth($login, $pass) {
        $user = (new UserRepository())->getOneWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }
    }

    public function getEntityClass() {
        return Users::class;
    }

    public function getTableName() {
        return 'users';
    }
}