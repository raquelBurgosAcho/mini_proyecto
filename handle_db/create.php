<?php
// Requiere el archivo de configuración y conexión a la base de datos
require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");

// Función para verificar si el correo ya existe
function correoExiste($mysqli, $correo) {
    $query = "SELECT correo FROM usuarios WHERE correo = '$correo'";
    $result = $mysqli->query($query);
    return $result->num_rows > 0;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);
   
    if (correoExiste($mysqli, $correo)) {
        header("Location: register.php");
        exit(); // Asegúrate de salir del script después de la redirección.
    } else {
        $result = $mysqli->query("INSERT INTO usuarios(correo, contrasena) VALUES ('$correo', '$hash')");
        if($result) {
            header("Location: /login.php");
        } else {
            echo "Error al registrar.";
        }
    }
}






    

       
