<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    
    <!-- Formulario de Registro -->
    <form action="/register" method="post">
        <?= csrf_field() ?>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="password_confirm">Confirmar contraseña:</label>
        <input type="password" id="password_confirm" name="password_confirm" required><br>

        <button type="submit">Registrarse</button>
    </form>

    <!-- Opción para redirigir a la página de inicio de sesión -->
    <p>¿Ya tienes una cuenta? <a href="/login">Inicia sesión aquí</a>.</p>

</body>
</html>
