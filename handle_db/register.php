<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);
    $nombre = $_POST["nombre"];
    

    // Establecer una conexión a la base de datos (suponiendo que has incluido la configuración de tu base de datos)
    require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");
    

    // Insertar datos en la base de datos (suponiendo la estructura de tu tabla de base de datos)
    $query = "INSERT INTO usuarios (correo, contrasena, nombre) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sss", $correo, $hash, $nombre);

    if ($stmt->execute()) {
        // Los datos se insertaron correctamente
        header("Location: /personal.php");
        exit;
    } else {
        // Manejar el error de la base de datos
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
