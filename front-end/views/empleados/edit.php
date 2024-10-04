<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/empleados_controlador.php";

$empleadoController = new EmpleadosController();
$empleado = $empleadoController->show($_GET['id']);

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empleadoController->update($_GET['id'], $_POST);
    header("Location: index.php"); // Redirigir después de editar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar empleado</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Editar empleado</h1>
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $empleado['nombre']; ?>" required>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $empleado['email']; ?>" required>
        
        <label for="telefono">Telefono:</label>
        <input type="text" step="0.01" name="telefono" value="<?php echo $empleado['telefono']; ?>" required>

        <label for="cargo">cargo:</label>
        <input type="text" name="cargo" value="<?php echo $empleado['cargo']; ?>" required>

        <input type="submit" value="Actualizar empleado" class="btn">
    </form>
</div>
</body>
</html>
