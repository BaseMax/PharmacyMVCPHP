<?php

namespace App\Models;

use App\Database\Database;

class User extends Model
{
    protected static $tableName = "users";

    public function __construct()
    {
    }

    public static function create()
    {
    }

    public static function get(int|null $id = null)
    {
        $database = new Database();
        return $database->get(self::$tableName, $id);
    }
}
