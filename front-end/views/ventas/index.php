<?php
// Incluir el controlador de ventas
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/ventas_controlador.php";

// Obtener todas las ventas
$ventasController = new VentasController();
$ventas = $ventasController->index();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ventas</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
    <h1>Ventas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Cliente ID</th>
                <th>Empleado ID</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventas as $venta) : ?>
                <tr>
                    <td><?php echo $venta['id']; ?></td>
                    <td><?php echo $venta['fecha']; ?></td>
                    <td><?php echo $venta['total']; ?></td>
                    <td><?php echo $venta['clientes_id']; ?></td>
                    <td><?php echo $venta['empleado_id']; ?></td>
                    <td>
                        <a href="show.php?id=<?php echo $venta['id']; ?>">Ver</a>
                        <a href="edit.php?id=<?php echo $venta['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $venta['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
