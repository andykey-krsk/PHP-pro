<?php

namespace app\engine;

use app\traits\TSingletone;

class Db
{
    use TSingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '12345',
        'database' => 'shop',
        'charset' => 'utf8'
    ];

    private $connection = null;

    private function getConnection()
    {
        if (is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->prepareDSNString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    //sql = "SELECT * FROM products WHERE id = :id"
    //params = ['id' => 1]
    private function query($sql, $params)
    {
        //var_dump($sql, $params);
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryObject($sql, $params, $class)
    {
        //TODO сделайте, чтобы PDO возвращал объект класса $class используя setAttribute
        $this->getConnection()->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        return $this->query($sql, $params)->fetch();
    }

    //params = ['limit1'=>1, 'limit2'=>2]
    private function queryLimit($sql, $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->bindValue(':limit1', 1, \PDO::PARAM_INT);
        $pdoStatement->bindValue(':limit2', 1, \PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement;
    }

    private function prepareDSNString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    public function lastInsertId() {
        //TODO_ верните последний id операции
        return $this->getConnection()->lastInsertId();
    }

    public function execute($sql, $params = []) {
        return $this->query($sql, $params);
    }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
}