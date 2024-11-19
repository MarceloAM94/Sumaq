<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Accesorios y Componentes de Computadoras</title>
    <link rel="stylesheet" href="../estilos/generales.css">
    <link rel="stylesheet" href="../estilos/estilos_home.css">
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
<?php
// Página de confirmación de compra
echo "<h1>Gracias por tu compra</h1>";
echo "<p>Tu compra ha sido procesada exitosamente.</p>";
?>
