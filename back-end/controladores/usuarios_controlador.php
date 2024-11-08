<?php
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

    // Verificar si el usuario existe
    if ($usuario) {
        // Comparar la contraseña directamente (no encriptada)
        if ($password === $usuario['password']) { // Comparación directa
            // Guardar la información del usuario en la sesión
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];

            // Redirigir a la página de inicio o dashboard
            header("Location: /empresa/front-end/views/");
            exit;
        } else {
            // Contraseña incorrecta
            header("Location: /empresa/front-end/views/login.php?error=Password incorrectas");
            exit;
        }
    } else {
        // Usuario no encontrado
        header("Location: /empresa/front-end/views/login.php?error=Usuario incorrecto");
        exit;
    }
}
?>
