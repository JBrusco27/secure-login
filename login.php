<?php if (!isset($_COOKIE['logExp'])): ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>    
        <script src="login.js" defer></script>
    </head>
    <body>
        <form action="logicLogin.php" method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="iniciar">
        </form>
    </body>
    </html>
<?php else: echo "inicio de sesion exitoso"; ?>    

<?php endif; ?>