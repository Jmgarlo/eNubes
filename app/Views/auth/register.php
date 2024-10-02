<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>

<h1>Registro</h1>

<form id="registerForm">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control">
        <div class="error-message" id="nombre-error"></div>
    </div>
    <div class="form-group">
        <label for="apellido1">Primer apellido</label>
        <input type="text" id="apellido1" name="apellido1" class="form-control">
        <div class="error-message" id="apellido1-error"></div>
    </div>
    <div class="form-group">
        <label for="apellido2">Segundo apellido</label>
        <input type="text" id="apellido2" name="apellido2" class="form-control">
        <div class="error-message" id="apellido2-error"></div>
    </div>
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
    <div class="form-group">
        <label for="confirm_password">Confirmar Contraseña</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placerholder="Repita su contraseña">
        <div class="error-message" id="confirm-password-error"></div>
    </div>
    <button type="submit" class="btn btn-primary">Registrarse</button>
    <div id="registerMessage"></div>
</form>

<p>¿Ya tienes una cuenta? <a href="/login">Inicia sesión aquí</a>.</p>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script src="/js/registro.js"></script>
<?= $this->endSection() ?>
