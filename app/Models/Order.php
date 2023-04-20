<?php

namespace App\Models;

use App\Database\Database;

class Order extends Model
{
    protected $tableName = "orders";

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
