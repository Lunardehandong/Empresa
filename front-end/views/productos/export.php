<?php
// Incluir FPDF
require($_SERVER['DOCUMENT_ROOT'] . '/empresa/vendor/setasign/fpdf/fpdf.php');

// Incluir el controlador de productos
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/productos_controlador.php";

// Obtener todos los productos
$productoController = new ProductosController();
$productos = $productoController->reporte();

// Crear un nuevo documento PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título del reporte
$pdf->Cell(190, 10, 'Reporte de productos', 1, 1, 'C');

// Encabezado de la tabla
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(50, 10, 'Precio', 1);
$pdf->Cell(40, 10, 'Stock', 1);
$pdf->Cell(40, 10, 'Categoria ID', 1);
$pdf->Ln(); // Salto de línea

// Agregar datos de los productos
foreach ($productos as $producto) {
    $pdf->Cell(20, 10, $producto['id'], 1);
    $pdf->Cell(40, 10, $producto['nombre'], 1);
    $pdf->Cell(50, 10, $producto['precio'], 1);
    $pdf->Cell(40, 10, $producto['stock'], 1);
    $pdf->Cell(40, 10, $producto['categoria_id'], 1);
    $pdf->Ln();
}

// Enviar el PDF al navegador o descargar
$pdf->Output('D', 'reporte_productos.pdf'); // D = Descargar, I = Mostrar en el navegador
?>
