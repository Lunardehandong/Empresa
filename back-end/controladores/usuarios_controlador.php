

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/modelos/usuarios.php"; // Incluir el modelo de usuarios

// Comprobar si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $password = $_POST['password']; // Usar "password" aquí

    // Crear una instancia del modelo Usuarios
    $usuariosModel = new Usuarios();

    // Buscar el usuario por correo
    $usuario = $usuariosModel->buscarPorCorreo($correo);

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['password'])) { // Verificar "password"
        // Guardar la información del usuario en la sesión
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];

        // Redirigir a la página de inicio o dashboard
        header("Location: /empresa/front-end/views/");
        exit;
    } else {
        // Redirigir con un mensaje de error
        header("Location: /empresa/front-end/views/login.php?error=Credenciales incorrectas");
        exit;
    }
}
?>
