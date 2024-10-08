<?php
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/ventas.php";

class VentasController {
    // Mostrar todos las ventas
    public function index() {
        $venta = new Ventas();
        $ventas = $venta->getAll();
        return $ventas;
    }

    // Mostrar una venta específico
    public function show($id) {
        $venta = new Ventas();
        $ventaData = $venta->getById($id);
        return $ventaData;
    }

    // Crear un nueva ventas
    public function store($data) {
        $venta = new Ventas();
        $venta->fecha = $data['fecha'];
        $venta->total = $data['total'];
        $venta->clientes_id = $data['clientes_id'];
        $venta->empleado_id = $data['empleado_id'];
        $venta_id = $venta->create();
        return $venta_id;
    }

    // Actualizar una ventas
    public function update($id, $data) {
        $venta = new Ventas();
        $venta->id = $id;
        $venta->fecha = $data['fecha'];
        $venta->total = $data['total'];
        $venta->clientes_id = $data['clientes_id'];
        $venta->empleado_id = $data['empleado_id'];
        return $venta->update();
    }

    // Eliminar una venta
    public function destroy($id) {
        $venta = new Ventas();
        return $venta->delete($id);
    }

        // Obtener todos los empleados para el reporte
        public function reporte() {
            $venta = new Ventas();
            return $venta->getAll(); // Función que trae todos los empleados desde el modelo
        }
}
?>
