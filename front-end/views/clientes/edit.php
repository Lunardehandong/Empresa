<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/cliente_controlador.php";

$clienteController = new ClientesController();
$cliente = $clienteController->show($_GET['id']);

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clienteController->update($_GET['id'], $_POST);
    header("Location: index.php"); // Redirigir después de editar
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
</head>
<body>
<div class="container">
    <h1>Editar cliente</h1>
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $cliente['email']; ?>" required>
        
        <label for="telefono">Telefono:</label>
        <input type="text" step="0.01" name="telefono" value="<?php echo $cliente['telefono']; ?>" required>

        <input type="submit" value="Actualizar cliente" class="btn">
    </form>
</div>
</body>
</html>
