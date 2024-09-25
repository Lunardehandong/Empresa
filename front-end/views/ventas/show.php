<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/ventas_controlador.php";

$ventaController = new VentasController();
$venta = $ventaController->show($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Venta</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Detalles de la Venta</h1>
    <p><strong>ID:</strong> <?php echo $venta['id']; ?></p>
    <p><strong>Fecha:</strong> <?php echo $venta['fecha']; ?></p>
    <p><strong>Total:</strong> <?php echo $venta['total']; ?></p>
    <p><strong>Cliente ID:</strong> <?php echo $venta['clientes_id']; ?></p>
    <p><strong>Empleado ID:</strong> <?php echo $venta['empleado_id']; ?></p>
    <a href="index.php" class="btn">Volver a la lista</a>
</div>
</body>
</html>
