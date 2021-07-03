<?php

namespace app\model;

use app\engine\App;
use app\engine\Db;
use app\interfaces\IModel;

abstract class Repository implements IModel
{
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";

        return App::call()->db->queryObject($sql, ['id' => $id], $this->getEntityClass());
    }

    public function getLimit($page) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT ?";
        return App::call()->db->queryLimit($sql, $page);
    }

    public function getOneWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `{$field}`=:value";
        return App::call()->db->queryObject($sql, ["value" => $value], $this->getEntityClass());
    }

    //TODO сделайте аналогичный метод getSummWhere
    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$field}`=:value";
        return App::call()->db->queryOne($sql, ["value" => $value])['count'];
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
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

        App::call()->db->execute($sql, $params);

        $entity->id = App::call()->db->lastInsertId();
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
        App::call()->db->execute($sql, $params);
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
        return App::call()->db->execute($sql, ['id' => $entity->id])->rowCount();
    }

    abstract public function getTableName();
    abstract public function getEntityClass();
}