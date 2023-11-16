<?php
    $conn = new mysqli('localhost', 'root', '', 'loginBD');
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) echo "Inicio de sesión exitoso";
    else echo "Nombre de usuario o contraseña incorrectos";
    
    $conn->close();
?>
