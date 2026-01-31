<?php



namespace Core;

use PDO;

abstract class BaseModel
{




    public static function create(PDO $pdo, $tableName, array $attributes)
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

        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute($values);

        if ($success) {
            return true;
        }
        return false;
    }


    

}
