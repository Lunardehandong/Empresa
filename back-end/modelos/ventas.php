<?php

include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/basedatos/db_config.php";

class Ventas {
    private $conn;
    private $table = 'ventas'; // Nombre de la tabla

    public $id;
    public $fecha;
    public $total;
    public $clientes_id;
    public $empleado_id;

    public function __construct() {
        $dbConfig = new DBConfig();
        $this->conn = $dbConfig->getConection();
    }

    // Obtener todas las ventas
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una venta por su ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear una nueva venta
    public function create() {
        $query = "INSERT INTO " . $this->table . " (fecha, total, clientes_id, empleado_id) VALUES (:fecha, :total, :clientes_id, :empleado_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':total', $this->total);
        $stmt->bindParam(':clientes_id', $this->clientes_id);
        $stmt->bindParam(':empleado_id', $this->empleado_id);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId(); // Devuelve el ID insertado
        }
        return false;
    }

    // Actualizar una venta
    public function update() {
        $query = "UPDATE " . $this->table . " SET fecha = :fecha, total = :total, clientes_id = :clientes_id, empleado_id = :empleado_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':fecha', $this->fecha);
        $stmt->bindParam(':total', $this->total);
        $stmt->bindParam(':clientes_id', $this->clientes_id);
        $stmt->bindParam(':empleado_id', $this->empleado_id);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId(); // Devuelve el ID insertado
        }
        return false;
    }

    // Eliminar una venta
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>
