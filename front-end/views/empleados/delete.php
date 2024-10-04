<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/empleados_controlador.php";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empleadoController = new EmpleadosController();
    $empleadoController->destroy($_POST['id']);
    header("Location: index.php"); // Redirigir de vuelta a la lista de empleados
}
?>