<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Tienda de Artesanías</title>
    <link rel="stylesheet" href="../estilos/generales.css">
    <link rel="stylesheet" href="../estilos/contacto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../recursos/Sumaq.png" alt="Logo Sumaq">
        </div>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="catalogo.php">Catálogo de Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link active" href="contacto.php">Contacto</a></li>
                    </ul>
                </div>
                <form class="d-flex" action="busqueda.php" method="get">
                    <input class="form-control me-2" type="text" placeholder="Buscar productos..." name="q">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <section class="contact-section">
            <div class="container text-center py-5">
                <h1 class="section-title">Contáctanos</h1>
                <p class="section-description">
                    ¿Tienes alguna pregunta o comentario? Estamos aquí para ayudarte. Llena el formulario a continuación y nos pondremos en contacto contigo.
                </p>
                <form class="contact-form mx-auto">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" class="form-control" placeholder="Tu nombre completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" id="email" class="form-control" placeholder="tuemail@ejemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea id="message" class="form-control" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </form>
            </div>
        </section>
    </main>
    <footer class="text-center mt-4">
        <p>&copy; 2024 Tienda de Artesanías Sumaq. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
