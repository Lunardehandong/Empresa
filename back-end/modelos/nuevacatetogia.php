<?php
require_once '../modelos/categoria.php';

$categoria = new Categoria();

// Crear una nueva categoría
//$categoria->nombre = 'Nueva Categoría';
//$categoria->create();

// Obtener todas las categorías
//$categorias = $categoria->getAll();
//print_r($categorias);

// Obtener una categoría por ID
//$categoria = $categoria->getById(1);
//print_r($categoria);

// Actualizar una categoría
$categoria->id = 1;
$categoria->nombre = 'Categoría Actualizada';
$categoria->update();