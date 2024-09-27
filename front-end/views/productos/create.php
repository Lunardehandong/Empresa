<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/productos_controlador.php";

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productoController = new ProductosController();
    $productoController->store($_POST);
    header("Location: index.php"); // Redirigir después de crear
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo producto</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Crear Nuevo producto</h1>
    <form action="create.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <br>
        
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" required>
        
        <label for="stock">Stock:</label>
        <input type="number" name="stock" required>
        
        <label for="categoria_id">Categoria ID:</label>
        <input type="number" name="categoria_id" required>

        <br>

        <input type="submit" value="Crear producto" class="btn">
        
    </form>
</div>
</body>
</html>
