<?php

namespace App\Models;

use Core\BaseModel;
use PDO;

class Order extends BaseModel
{
    protected string $table = 'orders';

    public function create(array $data): bool
    {
        $sql = "INSERT INTO orders 
                (user_id, payment_id, total_price, status) 
                VALUES (:user_id, :payment_id, :total_price, :status)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'user_id'     => $data['user_id'],
            'payment_id'  => $data['payment_id'],
            'total_price' => $data['total_price'],
            'status'      => $data['status'],
        ]);
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM orders WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
