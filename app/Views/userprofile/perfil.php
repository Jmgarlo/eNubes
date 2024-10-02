<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="<?= base_url('styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Perfil de <?= session()->get('nombre'); ?></h1>
        <p>Email: <?= session()->get('email'); ?></p>
        <a href="/logout" class="btn btn-danger">Cerrar Sesión</a>
    </div>
</body>
</html>