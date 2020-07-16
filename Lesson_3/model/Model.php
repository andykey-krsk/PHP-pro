<?php

namespace app\model;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public function getObject($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $column_name = "";
        $values = "";
        foreach ($this as $key => $value) {
            //TODO_ исключить id при форминовании строки запроса
            if ($key != 'id') {
                var_dump($key, $value);
                $column_name .= "`{$key}`, ";
                $values .= "'{$value}', ";
            }
        }
        $column_name = rtrim($column_name, ", ");
        $values = rtrim($values, ", ");

        //TODO_ собрать валидный запрос к БД по $key и $value и выполнить его
        $sql = "INSERT INTO {$this->getTableName()} ({$column_name}) VALUES ({$values})";

        Db::getInstance()->execute($sql);
        //TODO_ не забудьте получить id вставленной записи
        $this->id = Db::getInstance()->lastInsertId();
    }

    abstract public function getTableName();
}