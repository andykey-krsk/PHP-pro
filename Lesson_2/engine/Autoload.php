<?php


class Autoload
{
    //TODO Убрать массив и цикл, и СРАЗУ загружать класс по его имени
    //TODO Убрать app, развернуть слеши, и добавить .php
    private $path = [
        'model',
        'engine',
        'interfaces'
    ];

    public function loadClass($className) {
        //var_dump($className);
        foreach ($this->path as $path) {
            $fileName = "../{$path}/{$className}.php";
            if (file_exists($fileName)) {
                include $fileName;
                break;
            }
        }


    }
}