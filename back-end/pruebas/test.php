<?php
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/clientes.php";
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/categoria.php";
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/productos.php";
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/empleados.php";
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/ventas.php";
include_once $_SERVER['DOCUMENT_ROOT']."/empresa/back-end/modelos/detalleventa.php";

// Insertar un nuevo cliente
$cliente = new Clientes();
$cliente->nombre = 'Juan Pérez';
$cliente->email = 'juan.perez@example.com';
$cliente->telefono = '555-1234';
$cliente_id = $cliente->create();
echo "Cliente insertado con ID: " . $cliente_id . "<br>";

// Insertar una nueva categoría
$categoria = new Categoria();
$categoria->nombre = 'Electronics';
$categoria_id = $categoria->create();
echo "Categoría insertada con ID: " . $categoria_id . "<br>";

// Insertar un nuevo producto
$producto = new Productos();
$producto->nombre = 'Laptop';
$producto->precio = 1200.00;
$producto->stock = 1500;
$producto->categoria_id = $categoria_id;
$producto_id = $producto->create();
echo "Producto insertado con ID: " . $producto_id . "<br>";

// Insertar un nuevo empleado
$empleado = new Empleados();
$empleado->nombre = 'Ana Gómez';
$empleado->email = 'ana.gomez@example.com';
$empleado->telefono = '555-5678';
$empleado->cargo = 'subjefe';
$empleado_id = $empleado->create();
echo "Empleado insertado con ID: " . $empleado_id . "<br>";

// Insertar una nueva venta
$venta = new Ventas();
$venta->fecha = '2024-09-05';
$venta->total = 1200.00;
$venta->clientes_id = $cliente_id;
$venta->empleado_id = $empleado_id;
$venta_id = $venta->create();
echo "Venta insertada con ID: " . $venta_id . "<br>";

// Insertar un detalle de venta
$detalleVenta = new DetalleVenta();
$detalleVenta->venta_id = $venta_id; // Debe coincidir con el ID de la venta creada
$detalleVenta->producto_id = $producto_id; // Debe coincidir con el ID del producto creado
$detalleVenta->cantidad = 1; // Ejemplo de cantidad
$detalleVenta->precio = 1200.00; // Debe coincidir con el precio del producto
$detalle_id = $detalleVenta->create();
echo "Detalle de venta insertado con ID: " . $detalle_id . "<br>";
?>
?>

