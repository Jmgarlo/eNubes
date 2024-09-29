<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel eNubes - Página Principal</title>
    <link rel="stylesheet" href="/css/bootstrap-5.3.3-dist/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<!-- Header -->
<header>
    <!-- Navbar container with black background -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">

            <!-- First row: Login/Register and Change Language -->
            <div class="d-flex justify-content-end w-100 mb-2">
                <a href="/register" id="registroInicio" class="me-3 text-light">Registro/Iniciar Sesión</a>
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
    <?= $this->renderSection('content') ?> <!-- Sección para contenido específico de cada vista -->
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

<script src="/js/bootstrap-5.3.3-dist/bootstrap.min.js"></script>
<script src="/js/jquery/jquery-3.7.1.min.js"></script>
<script src="/js/index.js"></script>
</body>
</html>
