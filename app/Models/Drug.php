<?php

namespace App\Models;

use App\Database\Database;

class Drug extends Model
{
    protected $tableName = "drugs";

    public function __construct()
    {
    }

    public static function get(int|null $id = null)
    {
        $database = new Database();

        return $database->Get(self::$tableName, $id);
    }

    public static function create(array $columns, array $values): array
    {
        $database = new Database();

        return $database->Insert(self::$tableName, $columns, $values);
    }

    public static function delete(int $id): bool
    {
        $database = new Database();

        return $database->Delete(self::$tableName, $id);
    }

    public static function update(int $id, array $columns, array $values)
    {
        $database = new Database();

        return $database->Update(self::$tableName, $id, $columns, $values);
    }
}
