<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/basedatos/db_config.php";

class Usuarios {
    private $conn;
    private $table = 'usuarios'; // Nombre de la tabla

    public $id;
    public $nombre;
    public $correo;
    public $password;

    public function __construct() {
        $dbConfig = new DBConfig();
        $this->conn = $dbConfig->getConection();
    }

    // Método para buscar usuario por correo
    public function buscarPorCorreo($correo) {
        // Preparar la consulta SQL
        $query = "SELECT * FROM " . $this->table . " WHERE correo = :correo LIMIT 1";

        // Preparar la sentencia
        $stmt = $this->conn->prepare($query);

        // Enlazar el parámetro del correo
        $stmt->bindParam(':correo', $correo);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retornar el usuario si se encontró
        return $usuario;
    }
}
?>
