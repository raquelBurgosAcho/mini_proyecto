<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");


if (isset($_POST["btningresar"])) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Verifica si el correo existe en la base de datos
    $query = "SELECT contrasena FROM usuarios WHERE correo = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($contrasena_hash);
        $stmt->fetch();

        // Verifica si la contraseña es correcta
        if (password_verify($contrasena, $contrasena_hash)) {
            // Inicio de sesión exitoso, redirige a la página deseada
            session_start();
        $_SESSION["correo"] = $correo;
        $_SESSION["nombre"] = $nombre; // Almacena el nombre en la sesión
        $_SESSION["bio"] = $bio; // Almacena la bio en la sesión
        $_SESSION["telefono"] = $telefono; // Almacena el teléfono en la sesión
        header("Location: register.php");
            header("Location: register.php");
            exit;
        } else {
            echo '<div class="alert">Contraseña incorrecta.</div>';
        }
    } else {
        echo '<div class="alert">El correo no está registrado.</div>';
    }
}
?>
