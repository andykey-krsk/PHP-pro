<?php


namespace app\model;


use app\engine\Db;
use app\interfaces\IModel;

abstract class Repository implements IModel
{
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return Db::getInstance()->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getLimit($page) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?";
        return Db::getInstance()->queryLimit($sql, $page);
    }

    public function getOneWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$field}`=:value";
        return Db::getInstance()->queryObject($sql, ["value" => $value], $this->getEntityClass());
    }

    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$field}`=:value";
        return Db::getInstance()->queryOne($sql, ["value" => $value])['count'];
    }

    public function getSummWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT sum(price) as summ FROM {$tableName} WHERE `{$field}`=:value";
        return Db::getInstance()->queryOne($sql, ["value" => $value])['summ'];
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert(Model $entity) {
        $params = [];
        $columns = [];
        foreach ($entity->props as $key => $value) {
            $params[":{$key}"] = $entity->$key;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $entity->id = Db::getInstance()->lastInsertId();
    }

    public function update(Model $entity) {
        $params = [];
        $colums = [];
        foreach ($entity->props as $key => $value) {
            if (!$value) continue;
            $params[":{$key}"] = $entity->$key;
            $colums[] .= "`" . $key . "` = :" . $key;
            $entity->props[$key] = false;
        }
        $colums = implode(", ", $colums);
        $params[':id'] = $entity->id;
        $tableName = $this->getTableName();
        $sql = "UPDATE `{$tableName}` SET {$colums} WHERE `id` = :id";
        Db::getInstance()->execute($sql, $params);
    }

    public function save(Model $entity) {
        if (is_null($entity->id))
            $this->insert($entity);
        else
            $this->update($entity);
    }

    public function delete(Model $entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $entity->id])->rowCount();
    }

    abstract public function getTableName();
    abstract public function getEntityClass();
}