<?php

include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/basedatos/db_config.php";

Class Productos{
    private $conn;
    private $table = 'productos'; // Nombre de la tablas


    public $id;
    public $nombre;
    public $precio;
    public $stock;
    public $categoria_id;


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

    public function create() {
        $query = "INSERT INTO " . $this->table . " (nombre, precio, stock, categoria_id) VALUES (:nombre, :precio, :stock, :categoria_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':categoria_id', $this->categoria_id);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    // Actualizar una venta
    public function update() {
        $query = "UPDATE " . $this->table . " SET nombre = :nombre, precio = :precio, stock = :stock, categoria_id=:categoria_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':categoria_id', $this->categoria_id);

        return $stmt->execute();
    }

    // Eliminar una venta
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}