<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/productos_controlador.php";

$productoController = new ProductosController();
$producto = $productoController->show($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de los productos</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Detalles de los productos</h1>
    <p><strong>ID:</strong> <?php echo $producto['id']; ?></p>
    <p><strong>Nombre:</strong> <?php echo $producto['nombre']; ?></p>
    <p><strong>Precio:</strong> <?php echo $producto['precio']; ?></p>
    <p><strong>Stock:</strong> <?php echo $producto['stock']; ?></p>
    <p><strong>Categoria ID:</strong> <?php echo $producto['categoria_id']; ?></p>
    <a href="index.php" class="btn">Volver a la lista</a>
</div>
</body>
</html>
