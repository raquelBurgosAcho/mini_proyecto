<?php
session_start();

// Inicializa las variables para evitar errores de "Undefined variable"
$correo = "";
$nombre = "";
$bio = "";
$telefono = "";
$targetFile = "";

if (isset($_SESSION["correo"])) {
    

    // El usuario ha iniciado sesión, puedes acceder a los datos de la sesión
    $correo = $_SESSION["correo"];

    // Obtén los datos del usuario desde la base de datos
    require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");
    $query = "SELECT nombre, bio, telefono, imagen FROM usuarios WHERE correo = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->bind_result($nombre, $bio, $telefono, $imagen);
    $stmt->fetch();
    $stmt->close();


} 

if (isset($_POST["logoutButton"])) {
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión actual

    $targetFile = "";
    header("Location: /login.php"); // Redirige al usuario a la página de inicio de sesión
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Asegúrate de definir las variables antes de usarlas
    $correo = isset($_POST["correo"]) ? $_POST["correo"] : $correo;
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : $nombre;
    $bio = isset($_POST["bio"]) ? $_POST["bio"] : $bio;
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : $telefono;
    $imagen = isset($_FILES["imagen"]) ? $_FILES["imagen"] : null;
    $contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
    $directorio_imagenes = "imagenes";

    // Verifica si se ha enviado una imagen válida
    if ($imagen && $imagen["error"] == 0) {
        // Obtiene el nombre del archivo de imagen cargado
        $nombreArchivo = basename($imagen["name"]);

        // Comprueba si la imagen es válida
        $imageFileType = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowedExtensions)) {
            // Mueve el archivo al directorio de destino
            $targetFile = $directorio_imagenes . $nombreArchivo;
            if (!move_uploaded_file($imagen["tmp_name"], $targetFile)) {
                echo "Error al subir la imagen.";
                exit;
            }
        } else {
            echo "Solo se permiten archivos de imagen (jpg, jpeg, png, gif).";
            exit;
        }
    } 

    // Establece una conexión a la base de datos (suponiendo que has incluido la configuración de tu base de datos)
    require_once($_SERVER["DOCUMENT_ROOT"] . "/configuracion/data.php");

    // Actualiza los datos del usuario en la base de datos (solo los campos que se desean cambiar)
    $update_query = "UPDATE usuarios SET nombre = ?, telefono = ?, bio = ?, imagen = ?, contrasena = ? WHERE correo = ?";
    $update_stmt = $mysqli->prepare($update_query);
    $update_stmt->bind_param("ssssss", $nombre, $telefono, $bio, $imagen, $contrasena_hash, $correo);

    if ($update_stmt->execute()) {
        // Actualización exitosa, puedes mostrar un mensaje de éxito si es necesario
        echo "Datos actualizados con éxito.";
        $targetFile = $imagen;
        // Actualiza las variables de sesión con los nuevos datos   
        $_SESSION["correo"] = $correo;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["bio"] = $bio;
        $_SESSION["telefono"] = $telefono;
       
        
    } else {
        // Manejar el error de la base de datos
        echo "Error al actualizar datos de usuario: " . mysqli_error($mysqli);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css"> <!-- You can link your CSS file here -->
    <title>Personal Info</title>
</head>
<body>
    <div class="login-register-body">
        <div class="head">
            <img class="imagen" src="/img/dev.jpg" alt="Logo de devchallenges">
            <div class="perfil">
                <h2>Xanthe Neal</h2>
            </div>
        </div>
        <div class="body">
            <div class="body-title">
                <h1>Personal info</h1>
                <h2>Basic info, like your name and photo</h2>
            </div>
            <div class="body-right">
            <div class="form-personal">
                    <h4 class="error-message" id="errorRegister"></h4>
                    <div class="profil-personal-edit">
                    <div class="personal-title">
                    <h2 class="titles">Profile</h2>
                  <h3 class="titles">Some info may be visible to other people</h3>
            </div>
            <nav class="user-navigation">
        <hr class="separator">
        <class="user-options">
            <div class="profile-box">
                <div class="profile-image">
                <img src="<?php echo $targetFile; ?>" alt="User Image" id="profile-image" style="max-width: 50px; max-height: 50px;">
                </div>
                <a href="/portafolio.php" class="profile-link">My Profile</a>
            </div>
            <div class="group-chat">
                <div class="group-icon">
                    <img class="group-avatar" src="/img/grupo.png" alt="Icono de grupo">
                </div>
                Group chat
            </div>
            
    <div class="logout-button">
        <button class="logout-btn" type="submit" name="logoutButton">
            <img   class="imagenlogout"  src="/img/cerrar-sesion.png" alt="Icono de cierre">
            <span>Logout</span>
        </button>
    </div>
</form>
    </nav>
      <button id="editButton" type="submit" name="btnEditar" class="button-edit">Edit</button>
                    </div>
                    <div class="profil-personal-edit">
                        <h5>Photo</h5>
                        <img src="/mini_proyecto/handle_db/<?php echo $targetFile; ?>" alt="User Image" id="profile-image" style="max-width: 50px; max-height: 50px;">


                    </div>
                    <div class="profil-personal">
                        <h5>Name</h5>
                        <span id="name"><?php echo $nombre; ?></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Bio</h5>
                        <span id="bio"><?php echo $bio; ?></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Phone</h5>
                        <span><?php echo $telefono; ?></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Email</h5>
                        <span><?php echo $correo; ?></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Password</h5>
                        <span><?php echo "********"; // Mostrar asteriscos en lugar de la contraseña real ?></span>
                    </div>
                <div class="footer">
                    <h4>created by <strong>username</strong></h4>
                    <h4>devChallenges.io</h4>
                </div>
            </div>
        </div>
    </div>
    <script>
          document.getElementById("editButton").addEventListener("click", function() {
    window.location.href = "/index.php"; // Reemplaza "pagina_anterior.html" con la URL de la primera página.
});

    </script>
</body>
</html>

