<?php

namespace App\Models;

use Core\BaseModel;
use PDO;

class Payment extends BaseModel
{
    protected string $table = 'payments';

    public function create(array $data): int
    {
        $sql = "INSERT INTO payments
                (payment_method, payment_state)
                VALUES (:method, :state)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'method' => $data['payment_method'],
            'state'  => $data['payment_state'],
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM payments WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
