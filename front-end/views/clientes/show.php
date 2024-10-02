<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/cliente_controlador.php";

$clienteController = new ClientesController();
$cliente = $clienteController->show($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de los clientes</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Detalles de los clientes</h1>
    <p><strong>ID:</strong> <?php echo $cliente['id']; ?></p>
    <p><strong>Nombre:</strong> <?php echo $cliente['nombre']; ?></p>
    <p><strong>Email:</strong> <?php echo $cliente['email']; ?></p>
    <p><strong>Telefono:</strong> <?php echo $cliente['telefono']; ?></p>
    <a href="index.php" class="btn">Volver a la lista</a>
</div>
</body>
</html>
