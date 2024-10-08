<?php
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/empleados.php";

class EmpleadosController {
    // Mostrar todos los empleados
    public function index() {
        $empleado = new Empleados();
        $empleados = $empleado->getAll();
        return $empleados;
    }

    // Mostrar un empleado específico
    public function show($id) {
        $empleado = new Empleados();
        $empleadoData = $empleado->getById($id);
        return $empleadoData;
    }

    // Crear un nuevo empleado
    public function store($data) {
        $empleado = new Empleados();
        $empleado->nombre = $data['nombre'];
        $empleado->email = $data['email'];
        $empleado->telefono = $data['telefono'];
        $empleado->cargo = $data['cargo'];
        $empleado_id = $empleado->create();
        return $empleado_id;
    }

    // Actualizar un empleado
    public function update($id, $data) {
        $empleado = new Empleados();
        $empleado->id = $id;
        $empleado->nombre = $data['nombre'];
        $empleado->email = $data['email'];
        $empleado->telefono = $data['telefono'];
        $empleado->cargo = $data['cargo'];
        return $empleado->update();
    }

    // Eliminar un empleado
    public function destroy($id) {
        $empleado = new Empleados();
        return $empleado->delete($id);
    }

    // Obtener todos los empleados para el reporte
    public function reporte() {
        $empleado = new Empleados();
        return $empleado->getAll(); // Función que trae todos los empleados desde el modelo
    }





}
?>
