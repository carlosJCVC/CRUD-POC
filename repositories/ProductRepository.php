<?php
require_once 'models/Product.php';

class ProductRepository {
    private $conn;

    private static $instance = null;

    private function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public static function getInstance(mysqli $conn) {
        if (self::$instance === null) {
            self::$instance = new self($conn);
        }
        return self::$instance;
    }

    public function getAll() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        $products = [];

        while ($row = $result->fetch_assoc()) {
            $product = new Product();
            $product->id = $row['id'];
            $product->name = $row['name'];
            $product->description = $row['description'];
            $product->price = $row['price'];
            $products[] = $product;
        }

        return $products;
    }

    public function getById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $product = new Product();
        $product->id = $row['id'];
        $product->name = $row['name'];
        $product->description = $row['description'];
        $product->price = $row['price'];

        return $product;
    }

    public function create(array $productData) {
        $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssd', $productData['name'], $productData['description'], $productData['price']);
        $stmt->execute();
    }

    public function update($id, array $productData) {
        $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssdi', $productData['name'], $productData['description'], $productData['price'], $id);
        $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>