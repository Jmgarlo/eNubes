<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel XYZ - Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('styles.css') ?>">
</head>
<body>

<!-- Header -->
<header>
    <!-- Navbar container with black background -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">

            <!-- First row: Login/Register and Change Language -->
            <div class="d-flex justify-content-end w-100 mb-2">
                <a href="/register" class="me-3 text-light">Registro/Iniciar Sesión</a>
                <a href="/cambiar-idioma" class="text-light">Cambiar Idioma</a>
            </div>

            <!-- Second row: Navigation options and Reserve button -->
            <div class="d-flex justify-content-between w-100">
                <div class="d-flex">
                    <a href="#" class="me-3 text-light">Opción1</a>
                    <a href="#" class="me-3 text-light">Opción2</a>
                    <a href="#" class="me-3 text-light">Opción3</a>
                    <a href="#" class="me-3 text-light">Opción4</a>
                    <a href="#" class="me-3 text-light">Opción5</a>
                    <a href="#" class="text-light">Opción6</a>
                </div>

                <div>
                    <a href="#" id="reservarBtn" class="btn btn-primary">Reservar</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Main Content -->
<main>
    <!-- Image/Video Section -->
    <div class="main-image">
        <!-- Placeholder for video or image -->
    </div>

    <!-- Address and Map -->
    <div class="text-center my-4">
        <h3>Dirección del Hotel XYZ</h3>
        <p>Calle Falsa 123, Madrid, España</p>
        <a href="#" id="show-map" class="btn btn-secondary">Mostrar en el mapa</a>
    </div>

    <!-- Hotel Description -->
    <div class="description text-center">
        <h3>Descripción del Hotel</h3>
        <p>El Hotel XYZ es un hotel de lujo con vistas al mar y servicios de primera clase para una estancia inolvidable.</p>
    </div>

    <!-- Offers Section -->
    <div class="offers text-center">
        <h3>Ofertas Especiales</h3>
        <p>Descuento del 20% para estancias de más de 3 noches.</p>
    </div>

    <!-- Best Rated Rooms Section -->
    <div class="best-rooms text-center">
        <h3>Habitaciones Mejor Valoradas</h3>
        <!-- Placeholder for best-rated rooms, you can add Bootstrap cards or any other style here -->
        <div class="row">
            <div class="col-md-4">Habitación 1</div>
            <div class="col-md-4">Habitación 2</div>
            <div class="col-md-4">Habitación 3</div>
        </div>
    </div>

    <!-- Suites and Hotel Images -->
    <div class="hotel-images text-center">
        <h3>Fotos de nuestras suites y áreas</h3>
        <div class="row">
            <div class="col-md-4">Suite 1</div>
            <div class="col-md-4">Suite 2</div>
            <div class="col-md-4">Suite 3</div>
        </div>
    </div>

    <!-- Amenities Section -->
    <div class="amenities text-center">
        <h3>Comodidades del Hotel</h3>
        <div class="row">
            <div class="col-md-3">Gimnasio</div>
            <div class="col-md-3">Spa</div>
            <div class="col-md-3">Masajes</div>
            <div class="col-md-3">Piscina</div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="footer">
    <div class="row">
        <!-- Column 1: Acerca de -->
        <div class="col-md-3">
            <h5>Acerca de</h5>
            <ul>
                <li><a href="#">Op1Col1</a></li>
                <li><a href="#">Op2Col1</a></li>
                <li><a href="#">Op3Col1</a></li>
                <li><a href="#">Op4Col1</a></li>
                <li><a href="#">Op5Col1</a></li>
            </ul>
        </div>
        <!-- Column 2: Reservas -->
        <div class="col-md-3">
            <h5>Reservas</h5>
            <ul>
                <li><a href="#">Op1Col2</a></li>
                <li><a href="#">Op2Col2</a></li>
                <li><a href="#">Op3Col2</a></li>
                <li><a href="#">Op4Col2</a></li>
                <li><a href="#">Op5Col2</a></li>
            </ul>
        </div>
        <!-- Column 3: Soporte -->
        <div class="col-md-3">
            <h5>Soporte</h5>
            <ul>
                <li><a href="#">Op1Col3</a></li>
                <li><a href="#">Op2Col3</a></li>
                <li><a href="#">Op3Col3</a></li>
                <li><a href="#">Op4Col3</a></li>
                <li><a href="#">Op5Col3</a></li>
            </ul>
        </div>
        <!-- Column 4: Conectar -->
        <div class="col-md-3">
            <h5>Conectar</h5>
            <ul>
                <li><a href="#">Op1Col4</a></li>
                <li><a href="#">Op2Col4</a></li>
                <li><a href="#">Op3Col4</a></li>
                <li><a href="#">Op4Col4</a></li>
                <li><a href="#">Op5Col4</a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div class="copyright">
    <p>©2024 Información exclusiva de eNubes. Todos los derechos reservados.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/index.js"></script>
</body>
</html>
