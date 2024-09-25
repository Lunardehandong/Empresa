<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/ventas_controlador.php";

$ventaController = new VentasController();
$venta = $ventaController->show($_GET['id']);

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ventaController->update($_GET['id'], $_POST);
    header("Location: index.php"); // Redirigir después de editar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venta</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Editar Venta</h1>
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $venta['fecha']; ?>" required>
        
        <label for="total">Total:</label>
        <input type="number" step="0.01" name="total" value="<?php echo $venta['total']; ?>" required>
        
        <label for="clientes_id">ID Cliente:</label>
        <input type="number" name="clientes_id" value="<?php echo $venta['clientes_id']; ?>" required>
        
        <label for="empleado_id">ID Empleado:</label>
        <input type="number" name="empleado_id" value="<?php echo $venta['empleado_id']; ?>" required>

        <input type="submit" value="Actualizar Venta" class="btn">
    </form>
</div>
</body>
</html>
