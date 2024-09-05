<?php

include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/basedatos/db_config.php";

class DetalleVenta {
    private $conn;
    private $table = 'detalleventa'; // Nombre de la tabla

    public $id;
    public $venta_id;
    public $producto_id;
    public $cantidad;
    public $precio;

    public function __construct() {
        $dbConfig = new DBConfig();
        $this->conn = $dbConfig->getConection();
    }

    // Obtener todos los detalles de venta
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un detalle de venta por su ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (venta_id, producto_id, cantidad, precio) VALUES (:venta_id, :producto_id, :cantidad, :precio)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':venta_id', $this->venta_id);
        $stmt->bindParam(':producto_id', $this->producto_id);
        $stmt->bindParam(':cantidad', $this->cantidad);
        $stmt->bindParam(':precio', $this->precio);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    // Actualizar un detalle de venta
    public function update() {
        $query = "UPDATE " . $this->table . " SET venta_id = :venta_id, producto_id = :producto_id, cantidad = :cantidad, precio = :precio WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':venta_id', $this->venta_id);
        $stmt->bindParam(':producto_id', $this->producto_id);
        $stmt->bindParam(':cantidad', $this->cantidad);
        $stmt->bindParam(':precio', $this->precio);

        return $stmt->execute();
    }

    // Eliminar un detalle de venta
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
