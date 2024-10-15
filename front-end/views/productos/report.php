<?php
// Incluir el controlador de productos
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/productos_controlador.php";

// Obtener todos los productos
$productoController = new ProductosController();
$productos = $productoController->reporte();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Productos</title>
    <link rel="stylesheet" href="/empresa/front-end/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        .btn-download {
            background-color: #4CAF50; /* Color de fondo */
            color: white; /* Color de texto */
            padding: 10px 20px; /* Relleno */
            text-align: center; /* Alineación del texto */
            text-decoration: none; /* Sin subrayado */
            display: inline-block; /* Hacer que el enlace se comporte como botón */
            font-size: 16px; /* Tamaño de fuente */
            border-radius: 5px; /* Bordes redondeados */
            transition-duration: 0.4s; /* Suavidad en hover */
        }

        .btn-download:hover {
            background-color: #45a049; /* Cambio de color en hover */
        }

        .btn-container {
            text-align: center; /* Centrar contenido */
            margin-top: 20px; /* Separar del contenido superior */
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2c3e50;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Reporte de productos</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoria ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['categoria_id']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Contenedor del botón -->
        <div class="btn-container">
            <a href="export.php" class="btn-download">Exportar a PDF</a>
        </div>
    </div>
</body>
</html>
