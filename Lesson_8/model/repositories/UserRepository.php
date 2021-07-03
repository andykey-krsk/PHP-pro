<?php


namespace app\model\repositories;


use app\model\Repository;
use app\model\entities\Users;
use app\engine\App;

class UserRepository extends Repository
{
    public function isAuth() {
        if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE['hash'];
            $sql = "SELECT * FROM `users` WHERE `hash` = :hash";
            $user = App::call()->db->queryOne($sql, ['hash'=>$hash])['login'];

            if (!empty($user)) {
                $_SESSION['login'] = $user;
            }
        }


        return isset($_SESSION['login']);
    }

    public function isAdmin() {
        return $_SESSION['login'] === 'admin';
    }

    public function getName() {
        return $_SESSION['login'];
    }

    public function auth($login, $pass) {
        $user = static::getOneWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }
    }
    public function updateHash() {
        $hash = uniqid(rand(), true);
        $id = $_SESSION['id'];
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET `hash`= :hash WHERE `users`.`id` = :id";

        App::call()->db->execute($sql, [
            'hash' => $hash,
            'id' => $id
        ]);



        setcookie('hash', $hash, time() + 36000, '/');
    }


    public function getEntityClass() {
        return Users::class;
    }

    public function getTableName() {
        return 'users';
    }
}