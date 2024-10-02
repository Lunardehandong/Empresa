<?php
// Incluir el controlador de cliente
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/cliente_controlador.php";

// Obtener todas los cliente
$clienteController = new ClientesController();
$clientes = $clienteController->index();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
     <!-- Aquí va el contenido -->
        <h1>Clientes</h1>

        <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                    <td>
                            <a href="show.php?id=<?php echo $cliente['id']; ?>" class="btn btn-view">Ver</a>
                            <a href="edit.php?id=<?php echo $cliente['id']; ?>" class="btn btn-edit">Editar</a>
                                                   <!-- Formulario para eliminar los clientes -->
                                                   <form action="delete.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
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
