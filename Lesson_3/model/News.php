<?php


namespace app\model;


class News extends Model
{
    public $id;
    public $category;
    public $prev;
    public $text;

    public function getTableName()
    {
        return 'news';
    }
}