<?php
// Incluir FPDF
require($_SERVER['DOCUMENT_ROOT'] . '/empresa/vendor/setasign/fpdf/fpdf.php');

// Incluir el controlador de empleados
include_once $_SERVER['DOCUMENT_ROOT'] . "/empresa/back-end/controladores/empleados_controlador.php";

// Obtener todos los empleados
$empleadoController = new EmpleadosController();
$empleados = $empleadoController->reporte();

// Crear un nuevo documento PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título del reporte
$pdf->Cell(190, 10, 'Reporte de Empleados', 1, 1, 'C');

// Encabezado de la tabla
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Cell(40, 10, 'Telefono', 1);
$pdf->Cell(40, 10, 'Cargo', 1);
$pdf->Ln(); // Salto de línea

// Agregar datos de los empleados
foreach ($empleados as $empleado) {
    $pdf->Cell(20, 10, $empleado['id'], 1);
    $pdf->Cell(40, 10, $empleado['nombre'], 1);
    $pdf->Cell(50, 10, $empleado['email'], 1);
    $pdf->Cell(40, 10, $empleado['telefono'], 1);
    $pdf->Cell(40, 10, $empleado['cargo'], 1);
    $pdf->Ln();
}

// Enviar el PDF al navegador o descargar
$pdf->Output('D', 'reporte_empleados.pdf'); // D = Descargar, I = Mostrar en el navegador
?>
