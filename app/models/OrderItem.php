<?php

namespace App\Models;

use Core\BaseModel;
use PDO;

class OrderItem extends BaseModel
{
    protected string $table = 'order_items';

    public function create(array $data): bool
    {
        $sql = "INSERT INTO order_items
                (order_id, product_id, quantity, price)
                VALUES (:order_id, :product_id, :quantity, :price)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'order_id'   => $data['order_id'],
            'product_id'=> $data['product_id'],
            'quantity'  => $data['quantity'],
            'price'     => $data['price'],
        ]);
    }

    public function getByOrder(int $orderId): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM order_items WHERE order_id = :order_id"
        );
        $stmt->execute(['order_id' => $orderId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
