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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Lista de Ventas</h1>

        <table>
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
                            <a href="show.php?id=<?php echo $venta['id']; ?>" class="btn btn-view">Ver</a>
                            <a href="edit.php?id=<?php echo $venta['id']; ?>" class="btn btn-edit">Editar</a>
                            
                            <!-- Formulario para eliminar la venta -->
                            <form action="delete.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $venta['id']; ?>">
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
