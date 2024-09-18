<?php
// Incluir el controlador de productos
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/productos_controlador.php";

// Obtener todas los productos
$productosController = new ProductosController();
$productos = $productosController->index();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
    <h1>Productos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoria_id</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td><?php echo $producto['categoria_id']; ?></td>
                    <td>
                        <a href="show.php?id=<?php echo $producto['id']; ?>">Ver</a>
                        <a href="edit.php?id=<?php echo $producto['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
