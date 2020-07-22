<?php

namespace app\model;

use app\interfaces\IModel;
use app\engine\Db;

abstract class DbModel extends Model
{

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }

    public static function getLimit($page)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, :page";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if ($key == "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    //TODO_ сделать UPDATE в идеале, запрос должен содержать только изменившиеся поля
    public function update()
    {
        $params = [];
        $updateString = [];
        $params[":id"] = $this->id;
        foreach ($this as $key => $value) {
            //if ($key == "id") $params[":{$key}"] = $value;
            if ($this->params["{$key}"]){
                $params[":{$key}"] = $value;
                $updateString[] = "`{$key}`=:{$key}";
            }
        }

        $updateString = implode(", ", $updateString);
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET {$updateString} WHERE id=:id";
        Db::getInstance()->execute($sql, $params);

        //можно еще сделать проверку на удачное завершение операции
        // и только потом менять маркеры в исходное состояние
        foreach ($params as $key=>$value){
            $key =ltrim($key,":");
            $this->params["{$key}"] = false;
        }
    }

    public function save()
    {
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    public static function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id])->rowCount();
    }

    abstract public static function getTableName();
}