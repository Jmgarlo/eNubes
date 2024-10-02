<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel eNubes - Madrid</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap-5.3.3-dist/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class="container">
        <a class="navbar-brand" href="/" style="color: white;">Hotel eNubes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: white;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/habitaciones" style="color: white;">
                        <i class="fas fa-search"></i>
                        Buscar reservas
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php if (session()->get('logged_in')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/perfil" style="color: white;">Bienvenido, <?= session()->get('nombre') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout" style="color: white;">[Cerrar sesión]</a>
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

    <?= $this->renderSection('footer') ?>

    <script src="/js/bootstrap-5.3.3-dist/bootstrap.min.js"></script>
    <script src="/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="/js/utiles.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>