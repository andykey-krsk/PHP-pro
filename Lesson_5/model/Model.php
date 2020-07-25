<?php

namespace app\model;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    public function __set($name, $value)
    {
        //TODO_ проверить существует ли такое свойство
        if ($this->__isset($name)){
            $this->props[$name] = true;
            $this->$name = $value;
        } else {
            $this->error = "Ошибка, {$name} не существует";
        }
    }

    public function __get($name)
    {
        //TODO_ проверить существует ли такое свойство
        if ($this->__isset($name)){
            return $this->$name;
        } else {
            $this->error = "Ошибка, {$name} не существует";
        }
    }

    public function __isset($name)
    {
        // TODO_: Implement __isset() method.
        if (isset($this->$name)){
            return true;
        } else {
            return false;
        }
    }
}