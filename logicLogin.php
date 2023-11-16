<?php
if (!isset($_COOKIE['cantIntentos'])) {
    $verifExpiry = time() + (1 * 60 * 60); // Calcula la fecha y hora de expiración en 1 hora
    setcookie('cantIntentos', 1, $verifExpiry, '/');
    inicioSesion();
} else {
    if($_COOKIE['cantIntentos'] <= 3){
        inicioSesion();
    }else{
        echo "Ha realizado demasiados intentos.";
    }
}

function inicioSesion()
{
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "loginBD";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $intentos = isset($_COOKIE['cantIntentos']) ? $_COOKIE['cantIntentos'] : 0;

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if ($result !== false) {
            echo "Inicio de sesión exitoso";
            $verifExpiry = time() + (1 * 60 * 60); // Calcula la fecha y hora de expiración en 1 hora
            setcookie('cantIntentos', 0, $verifExpiry, '/');
        } else {
            if ($intentos <= 3) {
                echo "Nombre de usuario o contraseña incorrectos";
                $verifExpiry = time() + (1 * 60 * 60); // Calcula la fecha y hora de expiración en 1 hora
                setcookie('cantIntentos', $intentos + 1, $verifExpiry, '/');
            } else {
                echo "Ha realizado demasiados intentos.";
            }
        }

    }

}
?>