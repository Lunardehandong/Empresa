<?php
// Incluir el controlador de empleados
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/empleados_controlador.php";

// Obtener todas los empleados
$empleadosController = new EmpleadosController();
$empleados = $empleadosController->index();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
    <h1>Empleados</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado) : ?>
                <tr>
                    <td><?php echo $empleado['id']; ?></td>
                    <td><?php echo $empleado['nombre']; ?></td>
                    <td><?php echo $empleado['email']; ?></td>
                    <td><?php echo $empleado['telefono']; ?></td>
                    <td><?php echo $empleado['cargo']; ?></td>
                    <td>
                        <a href="show.php?id=<?php echo $empleado['id']; ?>">Ver</a>
                        <a href="edit.php?id=<?php echo $empleado['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $empleado['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
