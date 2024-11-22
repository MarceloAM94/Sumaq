<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - Tienda de Artesanías</title>
    <link rel="stylesheet" href="../estilos/generales.css">
    <link rel="stylesheet" href="../estilos/nosotros.css">
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
                        <li class="nav-item"><a class="nav-link active" href="nosotros.php">Nosotros</a></li>
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
    <main>
        <section class="about-us">
            <div class="container text-center py-5">
                <h1 class="section-title">Acerca de Nosotros</h1>
                <p class="section-description">
                    En <strong>Sumaq</strong>, celebramos la belleza y la tradición de las artesanías peruanas. Desde piezas únicas hechas a mano hasta productos con historia, buscamos conectar a nuestros clientes con el arte y la cultura de nuestros artesanos.
                </p>
            </div>
        </section>
        <section class="mission-vision">
            <div class="container d-flex justify-content-between py-5">
                <div class="mission">
                    <h2>Nuestra Misión</h2>
                    <p>
                        Promover y preservar las tradiciones artesanales del Perú, ofreciendo productos únicos y sostenibles que reflejan el espíritu y la creatividad de nuestros artesanos.
                    </p>
                </div>
                <div class="vision">
                    <h2>Nuestra Visión</h2>
                    <p>
                        Convertirnos en la tienda líder de artesanías peruanas a nivel nacional e internacional, destacando por nuestra calidad, autenticidad y compromiso con los artesanos locales.
                    </p>
                </div>
            </div>
        </section>
        <section class="team">
            <div class="container text-center py-5">
                <h2>Conoce a Nuestro Equipo</h2>
                <div class="d-flex justify-content-center">
                    <div class="team-card text-center">
                        <img src="../recursos/marcelo.jpg" alt="María Pérez" class="team-img">
                        <h3>Marcelo Amaya</h3>
                        <p>Fundador</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="text-center mt-4">
        <p>&copy; 2024 Tienda de Artesanías Sumaq. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
