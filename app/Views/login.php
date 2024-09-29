<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Formulario de Inicio de Sesión</h1>
    
    <!-- Formulario de Inicio de Sesión -->
    <form action="/login" method="post">
        <?= csrf_field() ?>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <!-- Opción para redirigir a la página de registro -->
    <p>¿No tienes una cuenta? <a href="/register">Regístrate aquí</a>.</p>

</body>
</html>
