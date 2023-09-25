<?php
// Requiere el archivo de configuración y conexión a la base de datos
require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");

// Función para verificar si el correo ya existe


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);
   
    
$result = $mysqli->query("INSERT INTO usuarios(correo, contrasena) VALUES ('$correo', '$hash')");
if($result) {
    header("location: /creation.php");
} else {
    echo "error al registrar";

};

$hash = password_hash($contrasena, PASSWORD_DEFAULT);

 }
    

       
