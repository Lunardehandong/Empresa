<?php
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/categoria.php";

class CategoriaController  {
    // Mostrar todas las categorias
    public function index() {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    // Mostrar un categoria específico
    public function show($id) {
        $categoria = new Categoria();
        $categoriaData = $categoria->getById($id);
        return $categoriaData;
    }

    // Crear un nuevo categoria
    public function store($data) {
        $categoria = new Categoria();
        $categoria->nombre = $data['nombre'];
        $categoria_id = $categoria->create();
        return $categoria_id;
    }

    // Actualizar un categoria
    public function update($id, $data) {
        $categoria = new Categoria();
        $categoria->id = $id;
        $categoria->nombre = $data['nombre'];
        return $categoria->update();
    }

    // Eliminar un categoria
    public function destroy($id) {
        $categoria = new Categoria();
        return $categoria->delete($id);
    }
}
?>
