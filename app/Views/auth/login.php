<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>

<h1>Iniciar Sesión</h1>

<form id="loginForm">
    <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" class="form-control">
        <div class="error-message" id="email-error"></div>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" placerholder="Escriba su contraseña">
        <div class="error-message" id="password-error"></div>
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    <div id="loginMessage"></div>
</form>

<p>¿No tienes una cuenta? <a href="/register">Regístrate aquí</a>.</p>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script src="/js/login.js"></script>
<?= $this->endSection() ?>
