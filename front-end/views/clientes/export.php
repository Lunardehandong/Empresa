<?php
// Incluir FPDF
require($_SERVER['DOCUMENT_ROOT'] . '/empresa/vendor/setasign/fpdf/fpdf.php');

// Incluir el controlador de clientes
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/cliente_controlador.php";

// Obtener todos los clientes
$clienteController = new ClientesController();
$clientes = $clienteController->reporte();

// Crear un nuevo documento PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título del reporte
$pdf->Cell(190, 10, 'Reporte de clientes', 1, 1, 'C');
$pdf->Ln(); // Salto de línea

// Encabezado de la tabla
$pdf->SetFont('Arial', 'B', 10); // Ajustar el tamaño de la fuente para el encabezado
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(50, 10, 'Nombre', 1); // Aumenté el tamaño de la celda para el nombre
$pdf->Cell(60, 10, 'Email', 1);  // Aumenté el tamaño de la celda para el email
$pdf->Cell(40, 10, 'Telefono', 1);
$pdf->Ln(); // Salto de línea

// Agregar datos de los clientes
$pdf->SetFont('Arial', '', 10); // Cambiar el estilo de la fuente para el contenido
foreach ($clientes as $cliente) {
    $pdf->Cell(20, 10, $cliente['id'], 1);
    $pdf->Cell(50, 10, substr($cliente['nombre'], 0, 30), 1); // Truncar el nombre si es muy largo
    $pdf->Cell(60, 10, substr($cliente['email'], 0, 30), 1);  // Truncar el email si es muy largo
    $pdf->Cell(40, 10, $cliente['telefono'], 1);
    $pdf->Ln(); // Salto de línea
}

// Enviar el PDF al navegador o descargar
$pdf->Output('D', 'reporte_clientes.pdf'); // D = Descargar, I = Mostrar en el navegador
?>