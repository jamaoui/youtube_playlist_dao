<?php

namespace app\models;
use PDO;

class Model
{
    protected $id;
    protected static $db;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return PDO
     */
    public static function database()
    {
        if (is_null(static::$db)) {
            static::$db = new PDO('mysql:dbname=dao;host=localhost', "root", "");
        }
        return static::$db;
    }
}