<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");

if (isset($_POST["btningresar"])) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    // Hash de la contraseña
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios (correo, contrasena) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $correo, $hash);

    if ($stmt->execute()) {
        // Los datos se insertaron correctamente
        header("Location: register.php");
        exit;
    } else {
        // Manejar el error de la base de datos
        echo '<div class="alert">Error al insertar en la base de datos: ' . $stmt->error . '</div>';
    }
} else {
    echo '<div class="alert">ACCESO DENEGADO</div>';
}
?>
