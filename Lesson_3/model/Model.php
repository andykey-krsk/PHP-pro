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
        //TODO вернуть объект с данными и с методами
       // return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert() {

        foreach ($this as $key => $value) {
            //TODO исключить id при форминовании строки запроса
            var_dump($key, $value);
        }

    //TODO собрать валидный запрос к БД по $key и $value и выполнить его
        $sql = "INSERT INTO {$this->getTableName()} () VALUES ()";

        var_dump($sql);
       // Db::getInstance()->execute($sql);
        //TODO не забудьте получить id вставленной записи
       // $this->id = ;

    }

    abstract public function getTableName();
}