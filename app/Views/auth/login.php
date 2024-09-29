<?= $this->extend('layouts/index') ?>
<!-- Extiende la plantilla principal -->
<?= $this->section('content') ?>
<!-- Inicia la sección de contenido -->
<h1>Inicio de Sesión</h1>

<!-- Formulario de Inicio de Sesión -->
<form action="/login" id="loginForm" method="post">
  <?= csrf_field() ?>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required /><br />

  <label for="password">Contraseña:</label>
  <input type="password" id="password" name="password" required /><br />

  <button type="submit">Iniciar Sesión</button>
</form>

<!-- Opción para redirigir a la página de registro -->
<p>¿No tienes una cuenta? <a href="/register">Regístrate aquí</a>.</p>

<?= $this->endSection() ?>
<!-- Finaliza la sección de contenido -->
