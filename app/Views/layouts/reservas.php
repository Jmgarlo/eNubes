<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Hotel eNubes</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap-5.3.3-dist/bootstrap.min.css">
    <link rel="stylesheet" href="/css/reservas.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Hotel eNubes</a>
            <div class="ml-auto">
                <a href="/perfil" class="btn btn-link"><?= session()->get('nombre') ?></a>
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