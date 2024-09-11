<?php
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/detalleventa.php";

class DetalleventaController {
    // Mostrar toda la tabla
    public function index() {
        $detalleventa = new DetalleVenta();
        $detalleventas = $detalleventa->getAll();
        return $detalleventas;
    }

    // Mostrar un apartado específico
    public function show($id) {
        $detalleventa = new DetalleVenta();
        $detalleventaData = $detalleventa->getById($id);
        return $detalleventaData;
    }

    // Crear un nuevo campo
    public function store($data) {
        $detalleventa = new DetalleVenta();
        $detalleventa->venta_id = $data['venta_id'];
        $detalleventa->producto_id = $data['producto_id'];
        $detalleventa->cantidad = $data['cantidad'];
        $detalleventa->precio = $data['precio'];
        $detalleventa_id = $detalleventa->create();
        return $detalleventa_id;
    }

    // Actualizar un campo
    public function update($id, $data) {
        $detalleventa = new DetalleVenta();
        $detalleventa->venta_id = $data['venta_id'];
        $detalleventa->producto_id = $data['producto_id'];
        $detalleventa->cantidad = $data['cantidad'];
        $detalleventa->precio = $data['precio'];
        return $detalleventa->update();
    }

    // Eliminar un campo
    public function destroy($id) {
        $detalleventa = new DetalleVenta();
        return $detalleventa->delete($id);
    }
}
?>
