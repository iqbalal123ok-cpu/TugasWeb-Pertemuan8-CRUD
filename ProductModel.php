<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';

class ProductModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(): array
    {
        $sql = 'SELECT p.id, p.name, p.price, p.stock,
                       c.name AS category_name,
                       s.name AS supplier_name
                FROM products p
                JOIN categories c ON c.id = p.category_id
                JOIN suppliers  s ON s.id = p.supplier_id
                ORDER BY p.id DESC';
        return $this->db->query($sql)->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(array $d): void
    {
        $stmt = $this->db->prepare(
            'INSERT INTO products (name, category_id, supplier_id, price, stock)
             VALUES (:name, :category_id, :supplier_id, :price, :stock)'
        );
        $stmt->execute([
            ':name'        => $d['name'],
            ':category_id' => $d['category_id'],
            ':supplier_id' => $d['supplier_id'],
            ':price'       => $d['price'],
            ':stock'       => $d['stock'],
        ]);
    }

    public function update(int $id, array $d): void
    {
        $stmt = $this->db->prepare(
            'UPDATE products
             SET name = :name, category_id = :category_id, supplier_id = :supplier_id,
                 price = :price, stock = :stock
             WHERE id = :id'
        );
        $stmt->execute([
            ':name'        => $d['name'],
            ':category_id' => $d['category_id'],
            ':supplier_id' => $d['supplier_id'],
            ':price'       => $d['price'],
            ':stock'       => $d['stock'],
            ':id'          => $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

    public function categories(): array
    {
        return $this->db->query('SELECT id, name FROM categories ORDER BY name')->fetchAll();
    }

    public function suppliers(): array
    {
        return $this->db->query('SELECT id, name FROM suppliers ORDER BY name')->fetchAll();
    }
}
