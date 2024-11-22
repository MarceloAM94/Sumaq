<?php
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "sumaq_artesanias");
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta para categorías
    $sql_categorias = "SELECT id_categoria, nombre FROM categorias";
    $resultado_categorias = $conexion->query($sql_categorias);

    // Consulta para productos (por categoría si se selecciona)
    $categoria_id = isset($_GET['categoria_id']) ? (int) $_GET['categoria_id'] : null;
    $sql_productos = "SELECT id_producto, nombre, precio, imagen_url FROM productos";
    if ($categoria_id) {
        $sql_productos .= " WHERE categoria_id = $categoria_id";
    }
    $resultado_productos = $conexion->query($sql_productos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Accesorios y Componentes de Computadoras</title>
    <link rel="stylesheet" href="../estilos/generales.css">
    <link rel="stylesheet" href="../estilos/catalogo.css">
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
                                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                                <li class="nav-item"><a class="nav-link active" href="catalogo.php">Catálogo de Productos</a></li>
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
        <!-- Main -->
        <main class="container">
            <h1>Catálogo de Productos</h1>
            
            <!-- ComboBox de Categorías -->
            <form method="get" class="filtro-categorias">
                <label for="categoria_id">Filtrar por categoría:</label>
                <select name="categoria_id" id="categoria_id" onchange="this.form.submit()">
                    <option value="">Todas las categorías</option>
                    <?php while ($categoria = $resultado_categorias->fetch_assoc()): ?>
                        <option value="<?php echo $categoria['id_categoria']; ?>" <?php echo ($categoria_id == $categoria['id_categoria']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($categoria['nombre']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </form>

            <!-- Productos -->
            <div class="productos-grid">
                <?php if ($resultado_productos && $resultado_productos->num_rows > 0): ?>
                    <?php while ($producto = $resultado_productos->fetch_assoc()): ?>
                        <div class="producto-card">
                            <img src="<?php echo htmlspecialchars($producto['imagen_url']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                            <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                            <p>Precio: S/ <?php echo number_format($producto['precio'], 2); ?></p>
                            <div class="card-buttons">
                                <!-- Botón con manejo AJAX -->
                                <form class="form-agregar-carrito">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                    <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>">
                                    <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                                    <button type="button" class="btn-agregar" onclick="agregarAlCarrito(this)">Añadir al Carrito</button>
                                </form>
                                <a href="detalle_producto.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn-detalle">Ver Detalles</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No hay productos disponibles.</p>
                <?php endif; ?>
            </div>
        </main>

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
        function agregarAlCarrito(button) {
            // Obtener el formulario asociado al botón
            const form = button.closest(".form-agregar-carrito");
            const formData = new FormData(form);

            // Enviar los datos con fetch
            fetch("procesar_carrito.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message); // Mensaje de éxito
                } else {
                    alert(data.message); // Mensaje de error
                }
            })
            .catch(error => {
                console.error("Error al procesar el carrito:", error);
                alert("Ocurrió un error al añadir el producto al carrito.");
            });
        }
        </script>
    </body>
</html>