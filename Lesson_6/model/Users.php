<?php

namespace app\model;

class Users extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false
    ];

    public function __construct($login = null, $pass = null, $hash = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
    }

    public function makeHashAuth()
    {
        $this->hash = uniqid(rand(), true);
        $this->save();
        setcookie("hash", $this->hash, time() + 3600, '/');
    }

    public static function isAuth()
    {
        if (isset($_COOKIE["hash"])) {
            $user = Users::getOneWhere('hash', $_COOKIE["hash"]);
            if (!empty($user->login)) {
                $_SESSION['login'] = $user->login;
            }
        }
        return isset($_SESSION['login']) ? true : false;
        //return isset($_SESSION['login']);
    }

    public static function isAdmin()
    {
        return $_SESSION['login'] === 'admin';
    }

    public static function getName()
    {
        //return $_SESSION['login'];
        return isset($_SESSION['login']) ? $_SESSION['login'] : "Guest";
    }

    public static function auth($login, $pass)
    {
        $user = Users::getOneWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }
    }

    public static function getTableName()
    {
        return 'users';
    }
}