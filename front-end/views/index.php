<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/usuarios_controlador.php";

// Comprobar si se envían las credenciales a través del método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $usuariosController = new Usuarios();
    $usuario = $usuariosController->buscarPorCorreo($correo);

    if ($usuario && password_verify($password, $usuario['password'])) {
        // Guardar la información del usuario en la sesión
        $_SESSION['id'] = $usuario['id']; // Usar 'id' directamente
        $_SESSION['nombre'] = $usuario['nombre'];

        // Redirigir al dashboard después de iniciar sesión
        header("Location: /empresa/front-end/views/");
        exit;
    } else {
        // Si las credenciales son incorrectas, redirigir con un mensaje de error
        header("Location: /empresa/front-end/views/login.php?error=Credenciales incorrectas");
        exit;
    }
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['id'])) {
    // Si no está autenticado, redirigir al login
    header("Location: /empresa/front-end/views/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
</head>
<body>
    <h1>Paso 2: Contenido de la Página</h1>
    <p>Bienvenido, <?php echo $_SESSION['nombre']; ?>!</p>
    <p>Aquí debe haber contenido.</p>
</body>
</html>
