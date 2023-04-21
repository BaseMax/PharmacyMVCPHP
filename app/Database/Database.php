<?php

namespace App\Database;

use PDO;
use App\Config\Config;

class Database
{
    protected PDO $db;

    protected static string $DeleteQuery = "DELETE FROM {table} WHERE `id` = {id};";
    protected static string $InsertQuery = "INSERT INTO {table} ({columns}) VALUES ({values});";
    protected static string $UpdateQuery = "UPDATE {table} SET {sets} WHERE `id` = {id};";
    protected static string $GetQuery = "SELECT * FROM {table};";
    protected static string $CehckQuery = "SELECT * FROM {table} WHERE `email` = {email} AND `password` = {password};";

    public function __construct()
    {
        $config = Config::get();

        $this->db = new PDO("mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']}", $config["DB_USER"], $config["DB_PASSWORD"]);
    }

    public function Delete(string $table, int $id): bool
    {
        $sql = $this->setTable(self::$DeleteQuery, $table);
        $sql = $this->setId($sql, $id);

        $stmt = $this->db->prepare($sql);

        if ($stmt->execute()) return true;
        else return false;
    }

    public function Insert(string $table, array $columns, array $values)
    {
        $sql = $this->setTable(self::$InsertQuery, $table);
        $sql = $this->setColumns($sql, $columns);
        $sql = $this->setValues($sql, $values);

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $this->get($table, $this->db->lastInsertId());
    }

    public function Update(string $table, int $id, array $columns, array $values)
    {
        $sql = $this->setTable(self::$UpdateQuery, $table);
        $sql = $this->setId($sql, $id);
        $sql = $this->setParams($sql, array_combine($columns, $values));

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $this->get($table, $id);
    }

    public function Get(string $table, int|null $id = null)
    {
        if ($id !== null) $where = " WHERE `id` = $id";
        else $where = "";

        $sql = $this->setTable(self::$GetQuery, $table) . $where;
        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Check(string $email, string $password, string $table): bool
    {
        $sql = $this->setTable(self::$CehckQuery, $table);
        $sql = $this->setEmail($sql, $email);
        $sql = $this->setPassword($sql, $password);

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        if (count($stmt->fetchAll(PDO::FETCH_ASSOC)) !== 0) return true;
        else return false;
    }

    protected function setTable(string $sql, string $table): string
    {
        return str_replace("{table}", $table, $sql);
    }

    protected function setId(string $sql, int $id): string
    {
        return str_replace("{id}", $id, $sql);
    }

    protected function setColumns(string $sql, array $columns): string
    {
        $implode = '`' . implode('`, `', $columns) . '`';

        return str_replace("{columns}", $implode, $sql);
    }

    protected function setValues(string $sql, array $values): string
    {
        $implode = "'" . implode("', '", $values) . "'";

        return str_replace("{values}", $implode, $sql);
    }

    protected function setParams(string $sql, array $data): string
    {
        $update_values = '';

        foreach ($data as $key => $value)
            $update_values .= "$key='$value', ";

        $update_values = rtrim($update_values, ', ');

        return str_replace("{sets}", $update_values, $sql);
    }

    protected function setEmail(string $sql, string $email): string
    {
        return str_replace("{email}", "'"  . $email . "'", $sql);
    }

    protected function setPassword(string $sql, string $password): string
    {
        return str_replace("{password}", "'"  . $password . "'", $sql);
    }
}
