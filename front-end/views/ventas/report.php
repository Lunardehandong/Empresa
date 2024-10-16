<?php
// Incluir el controlador de ventas
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/ventas_controlador.php";

// Obtener todos los ventas
$ventaController = new VentasController();
$ventas = $ventaController->reporte();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de ventas</title>
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
        <h1>Reporte de ventas</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Cliente ID</th>
                    <th>Empleado ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta) : ?>
                    <tr>
                        <td><?php echo $venta['id']; ?></td>
                        <td><?php echo $venta['fecha']; ?></td>
                        <td><?php echo $venta['total']; ?></td>
                        <td><?php echo $venta['clientes_id']; ?></td>
                        <td><?php echo $venta['empleado_id']; ?></td>
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
