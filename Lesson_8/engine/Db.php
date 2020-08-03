<?php

namespace app\engine;

class Db
{
    private $config;

    private $connection = null;

    public function __construct($driver, $host, $login, $password, $database, $charset = "utf8")
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }

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
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryLimit($sql, $page)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->bindValue(1, $page, \PDO::PARAM_INT);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll();
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
        return $this->connection->lastInsertId();
    }

    public function execute($sql, $params) {
        return $this->query($sql, $params);
    }

    public function queryOne($sql, $params = [])
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryObject($sql, $params, $class) {

        $statement = $this->query($sql, $params);
        $statement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        $obj = $statement->fetch();
        if (!$obj) {
            throw new \Exception("Продукт не найден!", 404);
        }
        return $obj;
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
}