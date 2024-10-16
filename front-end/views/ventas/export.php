<?php
// Incluir FPDF
require($_SERVER['DOCUMENT_ROOT'] . '/empresa/vendor/setasign/fpdf/fpdf.php');

// Incluir el controlador de ventas
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/ventas_controlador.php";

// Obtener todos los ventas
$ventaController = new VentasController();
$ventas = $ventaController->reporte();

// Crear un nuevo documento PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título del reporte
$pdf->Cell(190, 10, 'Reporte de ventas', 1, 1, 'C');

// Encabezado de la tabla
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Fecha', 1);
$pdf->Cell(50, 10, 'Total', 1);
$pdf->Cell(40, 10, 'Cliente ID', 1);
$pdf->Cell(40, 10, 'Empleado ID', 1);
$pdf->Ln(); // Salto de línea

// Agregar datos de los ventas
foreach ($ventas as $venta) {
    $pdf->Cell(20, 10, $venta['id'], 1);
    $pdf->Cell(40, 10, $venta['fecha'], 1);
    $pdf->Cell(50, 10, $venta['total'], 1);
    $pdf->Cell(40, 10, $venta['clientes_id'], 1);
    $pdf->Cell(40, 10, $venta['empleado_id'], 1);
    $pdf->Ln();
}

// Enviar el PDF al navegador o descargar
$pdf->Output('D', 'reporte_ventas.pdf'); // D = Descargar, I = Mostrar en el navegador
?>
