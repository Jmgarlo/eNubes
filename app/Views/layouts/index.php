<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel eNubes - Madrid</title>
    <link rel="stylesheet" href="/css/bootstrap-5.3.3-dist/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: white;">Hotel eNubes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#rooms" ">Habitaciones</a>
                </li>
                <?php if (session()->get('logged_in')): ?>
                    <li class=" nav-item">
                            <span class="nav-link">Bienvenido, <?= session()->get('nombre') ?></span>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login" style="color: white;">Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="footer">
        <div class="row">
            <div class="col-md-3">
                <h5>Conectar</h5>
                <ul>
                    <li><a href="#">Linkedin</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <p>©2024 Información exclusiva de eNubes. Todos los derechos reservados.</p>
    </div>

    <script src="/js/bootstrap-5.3.3-dist/bootstrap.min.js"></script>
    <script src="/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="/js/utiles.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>