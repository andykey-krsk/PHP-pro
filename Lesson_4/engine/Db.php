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

    private function query($sql, $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    private function queryLimit($sql, $page)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->bindValue(':page', $page, \PDO::PARAM_INT);
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
        return $statement->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }
}