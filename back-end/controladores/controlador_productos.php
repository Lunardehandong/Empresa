<?php
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/productos.php";

class ProductosController {
    // Mostrar todos los productos
    public function index() {
        $producto = new Productos();
        $productos = $producto->getAll();
        return $productos;
    }

    // Mostrar un producto específico
    public function show($id) {
        $producto = new Productos();
        $productoData = $producto->getById($id);
        return $productoData;
    }

    // Crear un nuevo producto
    public function store($data) {
        $producto = new Productos();
        $producto->nombre = $data['nombre'];
        $producto->precio = $data['precio'];
        $producto->stock = $data['stock'];
        $producto->categoria_id = $data['categoria_id'];
        $producto_id = $producto->create();
        return $producto_id;
    }

    // Actualizar un producto
    public function update($id, $data) {
        $producto = new Productos();
        $producto->id = $id;
        $producto->nombre = $data['nombre'];
        $producto->precio = $data['precio'];
        $producto->stock = $data['stock'];
        $producto->categoria_id = $data['categoria_id'];
        return $producto->update();
    }

    // Eliminar un producto
    public function destroy($id) {
        $producto = new Productos();
        return $producto->delete($id);
    }
}
?>
