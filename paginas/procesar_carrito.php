<?php
session_start();

// Verificar si el usuario está intentando finalizar la compra
if (isset($_POST['finalizar_compra'])) {
    // Vaciar el carrito después de finalizar la compra
    $_SESSION['carrito'] = [];
    echo json_encode(['status' => 'success', 'message' => 'Compra finalizada y carrito vacío']);
    exit;
}

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Leer datos del producto enviado por AJAX
$id_producto = $_POST['id_producto'] ?? null;
$nombre = $_POST['nombre'] ?? null;
$precio = $_POST['precio'] ?? null;

if ($id_producto && $nombre && $precio) {
    // Verificar si el producto ya está en el carrito
    $existe = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id_producto'] == $id_producto) {
            $item['cantidad']++;
            $existe = true;
            break;
        }
    }

    // Si no existe, agregarlo
    if (!$existe) {
        $_SESSION['carrito'][] = [
            'id_producto' => $id_producto,
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => 1,
        ];
    }

    echo json_encode(['status' => 'success', 'message' => 'Producto añadido al carrito']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Datos del producto inválidos']);
}
