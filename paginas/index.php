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
                            <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
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

    <!-- Banner Principal -->
    <section class="banner">
        <div class="banner-contenido">
            <img src="../recursos/BannerSumaq.png" alt="Banner" class="bannersito">
        </div>
    </section>

    <!-- Productos Destacados -->
    <section class="productos-destacados container">
        <h3>Productos Destacados</h3>
        <div class="productos-grid">
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "sumaq_artesanias");

            // Comprobar la conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Consulta para obtener los 4 productos con mayor precio
            $sql = "SELECT id_producto, nombre, descripcion, precio, imagen_url 
            FROM productos 
            ORDER BY precio DESC 
            LIMIT 4";
            $resultado = $conexion->query($sql);

            // Verificar si hay productos y mostrarlos
            if ($resultado->num_rows > 0) {
                while ($producto = $resultado->fetch_assoc()) {
                    echo '<div class="producto">';
                    echo '<img src="' . htmlspecialchars($producto["imagen_url"]) . '" alt="' . htmlspecialchars($producto["nombre"]) . '">';
                    echo '<h4>' . htmlspecialchars($producto["nombre"]) . '</h4>';
                    echo '<p><strong>S/ ' . number_format($producto["precio"], 2) . '</strong></p>'; // Formato de moneda
                    echo '<form class="form-agregar-carrito" method="post">';
                    echo '<input type="hidden" name="id_producto" value="' . htmlspecialchars($producto["id_producto"]) . '">';
                    echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($producto["nombre"]) . '">';
                    echo '<input type="hidden" name="precio" value="' . number_format($producto["precio"], 2) . '">'; // Formato para envío
                    echo '<button class="botones" type="button">Añadir al Carrito</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay productos destacados disponibles.</p>";
            }
            // Cerrar conexión
            $conexion->close();
            ?>
        </div>
    </section>

    <!-- Ofertas Especiales / Nuevos Productos -->
    <section class="ofertas container">
        <h3>Ofertas Especiales</h3>
        <div class="productos-grid">
            <?php
            // Conexión a la base de datos para ofertas (si los productos en oferta están en la misma tabla)
            $conexion = new mysqli("localhost", "root", "", "sumaq_artesanias");

            // Consulta para productos en oferta (usando los primeros cuatro productos como ejemplo)
            $sql_ofertas = "SELECT id_producto, nombre, precio, imagen_url FROM productos ORDER BY id_producto ASC LIMIT 4";
            $resultado_ofertas = $conexion->query($sql_ofertas);

            if ($resultado_ofertas->num_rows > 0) {
                while ($producto = $resultado_ofertas->fetch_assoc()) {
                    $precio_descuento = $producto["precio"] * 0.7; // Aplicar descuento del 30%
                    echo '<div class="producto">';
                    echo '<img src="' . htmlspecialchars($producto["imagen_url"]) . '" alt="' . htmlspecialchars($producto["nombre"]) . '">';
                    echo '<h4>' . htmlspecialchars($producto["nombre"]) . '</h4>';
                    echo '<p><del>S/ ' . number_format($producto["precio"], 2) . '</del> S/ ' . number_format($precio_descuento, 2) . '</p>'; // Formato de precios
                    echo '<form class="form-agregar-carrito" method="post">';
                    echo '<input type="hidden" name="id_producto" value="' . htmlspecialchars($producto["id_producto"]) . '">';
                    echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($producto["nombre"]) . '">';
                    echo '<input type="hidden" name="precio" value="' . number_format($precio_descuento, 2) . '">'; // Formato para envío
                    echo '<button class="botones" type="button">Añadir al Carrito</button>';
                    echo '</form>';
                    echo '</div>';
                }                
            } else {
                echo "<p>No hay ofertas disponibles.</p>";
            }

            $conexion->close();
            ?>
        </div>
    </section>

    <!-- Globo flotante del carrito -->
    <div id="carrito-flotante">
        <a href="carrito.php">
            <img src="../recursos/carrito-de-compras.png" alt="Carrito" class="icono-carrito">
        </a>
    </div>

    <!-- Pie de Página -->
    <footer>
        <p>Contacto: contacto@tiendatech.com | Tel: +1 234 567 890</p>
        <div class="redes-sociales">
            <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Instagram</a>
        </div>
        <div class="enlaces-adicionales">
            <a href="terminos.html">Términos y Condiciones</a> |
            <a href="privacidad.html">Política de Privacidad</a>
        </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Obtener todos los botones de añadir al carrito
            const botonesCarrito = document.querySelectorAll(".form-agregar-carrito .botones");

            // Función para actualizar el carrito en el servidor
            const actualizarCarrito = () => {
                fetch("procesar_carrito.php", {
                    method: "POST",
                    body: new URLSearchParams({ 'obtener_carrito': '1' })
                })
                .then(response => response.json())
                .then(data => {
                    // Actualiza el carrito flotante o cualquier otro lugar donde se muestre
                    const carritoFlotante = document.getElementById("carrito-flotante");
                    carritoFlotante.innerHTML = `Carrito (${data.carrito.length})`;
                });
            };

            // Evento para añadir productos al carrito
            botonesCarrito.forEach(boton => {
                boton.addEventListener("click", (e) => {
                    const form = e.target.closest(".form-agregar-carrito");
                    const formData = new FormData(form);

                    fetch("procesar_carrito.php", {
                        method: "POST",
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            alert(data.message);
                            // Actualizar el carrito después de añadir el producto
                            actualizarCarrito();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Ocurrió un error al agregar el producto al carrito.");
                    });
                });
            });

            // Actualiza el carrito al cargar la página
            actualizarCarrito();
        });
    </script>
</body>
</html>
