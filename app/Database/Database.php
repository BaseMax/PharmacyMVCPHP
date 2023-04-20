<?php

namespace App\Database;

use App\Config\Config;
use PDO;

class Database
{
    protected PDO $db;

    protected static string $DeleteQuery = "DELETE FROM {table} WHERE id = {id}";
    protected static string $InsertQuery = "INSERT INTO {table} ({columns}) VALUES ({values})";
    protected static string $UpdateQuery = "UPDATE {table} {sets} WHERE id = {id}";
    protected static string $GetQuery = "SELECT * FROM {table}";

    public function __construct()
    {
        $config = Config::get();

        $this->db = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", $config["DB_USER"], $config["DB_PASSWORD"]);
    }

    public function Delete(string $table, int $id): bool
    {
        return true;
    }

    public function Insert(string $table, array $columns, array $values): bool
    {
        return true;
    }

    public function Update(string $table, array $columns, array $values): bool
    {
        return true;
    }

    public function get(string $table, int|null $id = null)
    {
        $where = "";

        if ($id) $where .= " WHERE id = $id";

        $sql = $this->setTable(self::$GetQuery, $table) . $where;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function setTable(string $sql, string $table): string
    {
        return str_replace("{table}", $table, $sql);
    }

    protected function setId(string $sql, int $id): string
    {
        return str_replace("{id}", $id, $sql);
    }
}
