<?php
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/clientes.php";

class ClientesController {
    // Mostrar todos los clientes
    public function index() {
        $cliente = new Clientes();
        $clientes = $cliente->getAll();
        return $clientes;
    }

    // Mostrar un cliente específico
    public function show($id) {
        $cliente = new Clientes();
        $clienteData = $cliente->getById($id);
        return $clienteData;
    }

    // Crear un nuevo cliente
    public function store($data) {
        $cliente = new Clientes();
        $cliente->nombre = $data['nombre'];
        $cliente->email = $data['email'];
        $cliente->telefono = $data['telefono'];
        $cliente_id = $cliente->create();
        return $cliente_id;
    }

    // Actualizar un cliente
    public function update($id, $data) {
        $cliente = new Clientes();
        $cliente->id = $id;
        $cliente->nombre = $data['nombre'];
        $cliente->email = $data['email'];
        $cliente->telefono = $data['telefono'];
        return $cliente->update();
    }

    // Eliminar un cliente
    public function destroy($id) {
        $cliente = new Clientes();
        return $cliente->delete($id);
    }

        // Obtener todos los empleados para el reporte
        public function reporte() {
            $cliente = new Clientes();
            return $cliente->getAll(); // Función que trae todos los empleados desde el modelo
        }
}
?>
