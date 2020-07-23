<?php


namespace app\model;


use app\interfaces\IModel;

abstract class Model implements IModel
{
    public function __set($name, $value)
    {
        //TODO проверить существует ли такое свойство
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        //TODO проверить существует ли такое свойство
        return $this->$name;
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
    }


}