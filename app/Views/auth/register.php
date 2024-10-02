<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?>Registro - Hotel eNubes<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-form-section d-flex justify-content-center align-items-center vh-100">
    <div class="register-container">
        <h1 class="form-title">CREAR USUARIO</h1>

        <form id="registerForm" class="register-form">
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                <div class="error-message" id="nombre-error"></div>
            </div>

            <div class="form-group">
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                <div class="error-message" id="apellido-error"></div>
            </div>

            <div class="form-group">
                <input type="text" id="pais" name="pais" class="form-control" placeholder="País" required>
                <div class="error-message" id="pais-error"></div>
            </div>

            <div class="form-group">
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Número de teléfono - 000000000" pattern="[0-9]{9}" required>
                <div class="error-message" id="telefono-error"></div>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email - ejemplo@correo.com" required>
                <div class="error-message" id="email-error"></div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="submitBtn">Siguiente</button>
            </div>

            <div id="success-message" style="display: none; color: green;">
                Registrado con éxito, le hemos enviado un link a su correo para que pueda generar una contraseña.
            </div>
        </form>

        <p>¿Ya tienes una cuenta? <a href="/login">Inicia sesión aquí</a>.</p>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="/js/registro.js"></script>
<?= $this->endSection() ?>