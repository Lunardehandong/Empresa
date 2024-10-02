<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/cliente_controlador.php";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clienteController = new ClientesController();
    $clienteController->store($_POST);
    header("Location: index.php"); // Redirigir después de crear
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo cliente</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Crear Nuevo cliente</h1>
    <form action="create.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <br>
        
        <label for="email">Email:</label>
        <input type="text" step="0.01" name="email" required>
        
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" required>

        <br>

        <input type="submit" value="Crear cliente" class="btn">
        
    </form>
</div>
</body>
</html>
