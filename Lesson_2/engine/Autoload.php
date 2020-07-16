<?php

namespace app\autoload;

class Autoload
{
    public function loadClass($className) {
        $className = str_replace('app\\','',$className);
        $className = str_replace('\\','/',$className);
        var_dump($className); //не убирал для наглядности
        $fileName = "../{$className}.php";
            if (file_exists($fileName)) {
                include $fileName;
            }
        }
}