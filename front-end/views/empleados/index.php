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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
        <h1>Lista de Empleados</h1>
        <!-- Aquí va el contenido -->
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
                            <a href="show.php?id=<?php echo $empleado['id']; ?>" class="btn btn-view">Ver</a>
                            <a href="edit.php?id=<?php echo $empleado['id']; ?>" class="btn btn-edit">Editar</a>
                             <!-- Formulario para eliminar los clientes -->
                            <form action="delete.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
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
