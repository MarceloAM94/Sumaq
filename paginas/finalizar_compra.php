<?php
session_start();

// Verificar si el carrito está vacío
if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) {
    header('Location: index.php'); // Redirigir si el carrito está vacío
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar_compra'])) {
    // Aquí procesas la compra (puedes guardar los datos en la base de datos, realizar la validación de la tarjeta, etc.)
    // En este ejemplo, simplemente vaciamos el carrito después de la compra

    // Vaciar el carrito
    unset($_SESSION['carrito']);
    
    // Responder con éxito
    echo json_encode(['status' => 'success', 'message' => 'Compra realizada con éxito.']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="../estilos/generales.css">
    <link rel="stylesheet" href="../estilos/finalizar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../recursos/Sumaq.png">
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="catalogo.php">Catálogo de Productos</a></li>
                            <li class="nav-item"><a class="nav-link" href="ofertas.php">Ofertas</a></li>
                            <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                        </ul>
                    </div>
                    <form class="d-flex" action="busqueda.php" method="get">
                        <input class="form-control me-2" type="text" placeholder="Buscar productos..." name="q">
                        <button class="btn btn-outline-light" type="submit">Buscar</button>
                    </form>
                </div>
            </nav>            
    </header>
    <h1>Finalizar Compra</h1>
    
    <!-- Formulario de compra -->
    <form id="form-compra" action="finalizar_compra.php" method="POST">
        <input type="hidden" name="finalizar_compra" value="1">
        
        <h3>Datos de Facturación</h3>
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>
        
        <h3>Datos de Pago</h3>
        <label for="tarjeta">Número de Tarjeta:</label>
        <input type="text" id="tarjeta" name="tarjeta" required><br><br>
        
        <label for="fecha_expiracion">Fecha de Expiración:</label>
        <input type="month" id="fecha_expiracion" name="fecha_expiracion" required><br><br>
        
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>
        
        <button type="submit" id="finalizar-compra-btn">Finalizar Compra</button>
    </form>

    <!-- Mensaje de carga -->
    <div id="loading-message" style="display: none;">Procesando compra, por favor espere...</div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtén el formulario y el botón
            const form = document.getElementById("form-compra");
            const finalizarBtn = document.getElementById("finalizar-compra-btn");
            const loadingMessage = document.getElementById("loading-message");

            // Función para finalizar la compra
            form.addEventListener("submit", function(e) {
                e.preventDefault(); // Evitar el envío tradicional del formulario

                // Mostrar mensaje de carga
                loadingMessage.style.display = "block";

                // Crear un objeto FormData con los datos del formulario
                const formData = new FormData(form);

                // Enviar los datos al servidor usando fetch
                fetch("finalizar_compra.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        alert(data.message); // Mensaje de éxito
                        window.location.href = "confirmacion_compra.php"; // Redirigir a página de confirmación
                    } else {
                        alert(data.message); // Mensaje de error
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Ocurrió un error al procesar la compra.");
                })
                .finally(() => {
                    // Ocultar mensaje de carga
                    loadingMessage.style.display = "none";
                });
            });
        });
    </script>
</body>
</html>
