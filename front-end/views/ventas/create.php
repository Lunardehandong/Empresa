<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/ventas_controlador.php";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ventaController = new VentasController();
    $ventaController->store($_POST);
    header("Location: index.php"); // Redirigir después de crear
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Venta</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Crear Nueva Venta</h1>
    <form action="create.php" method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required>

        <br>
        
        <label for="total">Total:</label>
        <input type="number" step="0.01" name="total" required>
        
        <label for="clientes_id">ID Cliente:</label>
        <input type="number" name="clientes_id" required>
        
        <label for="empleado_id">ID Empleado:</label>
        <input type="number" name="empleado_id" required>

        <br>

        <input type="submit" value="Crear Venta" class="btn">
        
    </form>
</div>
</body>
</html>
