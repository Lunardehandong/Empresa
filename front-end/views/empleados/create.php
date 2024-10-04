<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/empleados_controlador.php";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empleadoController = new EmpleadosController();
    $empleadoController->store($_POST);
    header("Location: index.php"); // Redirigir después de crear
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo empleado</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Crear Nuevo empleado</h1>
    <form action="create.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <br>
        
        <label for="email">Email:</label>
        <input type="text" step="0.01" name="email" required>
        
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" required>

        <br>

        <label for="cargo">Cargo:</label>
        <input type="text" name="cargo" required>

        <br>

        <input type="submit" value="Crear empleado" class="btn">
        
    </form>
</div>
</body>
</html>
