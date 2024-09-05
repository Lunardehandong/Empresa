<?php

include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/basedatos/db_config.php";

Class Clientes{
    private $conn;
    private $table = 'clientes'; // Nombre de la tablas


    public $id;
    public $nombre;
    public $email;
    public $telefono;

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
        $query = "INSERT INTO " . $this->table . " (nombre, email, telefono) VALUES (:nombre, :email, :telefono)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId(); // Devuelve el ID insertado
        }
        return false;
    }

    // Actualizar una venta
    public function update() {
        $query = "UPDATE " . $this->table . " SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefono', $this->telefono);

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