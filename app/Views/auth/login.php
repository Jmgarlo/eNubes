<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?>Iniciar Sesión - Hotel eNubes<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-form-section d-flex justify-content-center align-items-center vh-100">
    <div class="login-container">
        <h1 class="form-title">INICIAR SESIÓN</h1>

        <form id="loginForm" class="login-form">
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email - ejemplo@correo.com" required>
                <div class="error-message" id="email-error"></div>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                <div class="error-message" id="password-error"></div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="submitBtn">Iniciar Sesión</button>
            </div>

            <div id="success-message" style="display: none; color: green;">
                Sesión iniciada con éxito. Redirigiendo...
            </div>
        </form>

        <p>¿No tienes una cuenta? <a href="/register">Regístrate aquí</a>.</p>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="/js/login.js"></script>
<?= $this->endSection() ?>
