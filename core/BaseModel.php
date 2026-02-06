<?php



namespace Core;

use PDO;
use App\Database;

abstract class BaseModel
{


    public static function getPdoConnection(): PDO
    {
        return Database::getInstance([
            "host" => "localhost",
            "dbname" => "drophut",
            "username" => "root",
            "password" => ""
        ])->getConnection();
    }


    public static function create(string $tableName, array $attributes): object|null
    {
        $columns = array_keys($attributes);
        $values = array_values($attributes);
        $columnsSql = '';
        $placeholders = '';
        foreach ($columns as $column) {
            if ($column === $columns[count($columns) - 1]) {
                $columnsSql .= "`$column`";
                $placeholders .= '?';
            } else {
                $columnsSql .= "`$column`,";
                $placeholders .= '?,';
            }
        }

        $sql = "INSERT INTO $tableName ($columnsSql) VALUES ($placeholders)";

        $stmt = self::getPdoConnection()->prepare($sql);
        $success = $stmt->execute($values);

        if ($success) {
            $attributes['id'] = self::getPdoConnection()->lastInsertId();
            $model = new static();

            foreach ($attributes as $key => $value) {
                $model->$key = $value;
            }
            return $model;
        }
        return null;
    }

    //return array of objects 
    public static function where(string $tableName, string $column, string $operator, string $value): array
    {
        $sql = "SELECT * FROM $tableName where $column $operator '$value'";

        $stmt = self::getPdoConnection()->query($sql);
        $rows = $stmt->fetchAll(self::getPdoConnection()::FETCH_ASSOC);
        $elements = [];


        foreach ($rows as $row) {
            $model = new static();
            foreach ($row as $key => $val) {
                $model->$key = $val;
            }
            $elements[] = $model;
        }
        return $elements;
    }
    public static function all(string $tableName)
    {
        $sql = "SELECT * FROM $tableName";
        $stmt = self::getPdoConnection()->query($sql);
        $rows = $stmt->fetchAll(self::getPdoConnection()::FETCH_ASSOC);
        $elements = [];
        foreach ($rows as $row) {
            $model = new static();
            foreach ($row as $key => $val) {
                $model->$key = $val;
            }
            $elements[] = $model;
        }
        return $elements;
    }
    public static function destroy(string $tableName, string $column, string $operator, string $value)
    {
        $sql = "DELETE FROM $tableName WHERE $column $operator ?";
        $stmt = self::getPdoConnection()->prepare($sql);
        $success = $stmt->execute([$value]);
        return $success;
    }

}
