<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/empleados_controlador.php";

$empleadoController = new EmpleadosController();
$empleado = $empleadoController->show($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de los empleados</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Detalles de los empleados</h1>
    <p><strong>ID:</strong> <?php echo $empleado['id']; ?></p>
    <p><strong>Nombre:</strong> <?php echo $empleado['nombre']; ?></p>
    <p><strong>Email:</strong> <?php echo $empleado['email']; ?></p>
    <p><strong>Telefono:</strong> <?php echo $empleado['telefono']; ?></p>
    <p><strong>Cargo:</strong> <?php echo $empleado['cargo']; ?></p>
    <a href="index.php" class="btn">Volver a la lista</a>
</div>
</body>
</html>
