<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/productos_controlador.php";

$productoController = new ProductosController();
$producto = $productoController->show($_GET['id']);

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productoController->update($_GET['id'], $_POST);
    header("Location: index.php"); // Redirigir después de editar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Editar Producto</h1>
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?php echo $producto['precio']; ?>" required>
        
        <label for="stock">Stock:</label>
        <input type="number" step="0.01" name="stock" value="<?php echo $producto['stock']; ?>" required>
        
        <label for="categoria_id">Categoria ID:</label>
        <input type="number" name="categoria_id" value="<?php echo $producto['categoria_id']; ?>" required>

        <input type="submit" value="Actualizar producto" class="btn">
    </form>
</div>
</body>
</html>
