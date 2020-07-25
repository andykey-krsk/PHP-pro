<?php

namespace app\model;

use app\traits\TSingletone;

class Feedback extends DbModel
{
    protected $id;
    protected $name;
    protected $feedback;

    protected $props = [
        'name' => false,
        'feedback' => false,
    ];

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }

    public static function getTableName()
    {
        return 'feedback';
    }
}