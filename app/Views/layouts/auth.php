<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap-5.3.3-dist/bootstrap.min.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Hotel eNubes</a>
            <div class="ml-auto">
                <select class="language-select" id="languageSelect">
                    <option value="es">Español</option>
                    <option value="en">English</option>
                </select>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="auth-container">
        <!-- Form Section (Left) -->
        <div class="auth-form-section">
            <div class="auth-form-container">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

        <!-- Image Section (Right) -->
        <div class="auth-image-section"></div>
    </div>

    <script src="/js/bootstrap-5.3.3-dist/bootstrap.min.js"></script>
    <script src="/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="/js/utiles.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
<html>