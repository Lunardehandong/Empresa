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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
        <h1>Lista de Productos</h1>
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
                            <a href="show.php?id=<?php echo $producto['id']; ?>" class="btn btn-view">Ver</a>
                            <a href="edit.php?id=<?php echo $producto['id']; ?>" class="btn btn-edit">Editar</a>

                        <!-- Formulario para eliminar los productos -->
                            <form action="delete.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
    </div>
</body>
</html>
