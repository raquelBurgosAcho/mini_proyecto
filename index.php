<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css"> <!-- You can link your CSS file here -->
    <title>Registration Page</title>
</head>
<body>
    <div class="login-register-body">
        <div class="head">
            <h1 class="logo">devchallenges</h1>
            <div class="perfil">
                <h2>Xanthe Neal</h2>
            </div>
        </div>
        <div class="body">
            <div class="body-rigth">
                <button id="backButton" class="button-back"><i class='bx bx-chevron-left'></i>Back</button>
                <div class="form-edit">
                    
                    <h2 class="titles">Change Info</h2>
                    <h3 class="titles">Changes  will be reflected to every services </h3>
                    
                    <h4 class="error-message" id="errorRegister"></h4>
                    <form id="formRegister"   class="login-register-div" action="/handle_db/register.php" enctype="multipart/form-data"  method="post">
                        <div class="profil">
                            <h5>CHANGE PHOTO</h5>
                            <label for="image">sube una imagen;</label>
                            <input type="file" name="image" id="image" class="input-data">
                            <button type="submit">subir una imagen</button>
                            
                        </div>
                            <h5>Name</h5>
                            <input type="text" placeholder="Nombre" name="nombre" id="name" class="input-data">
                            <h5>Bio</h5>
                            <input type="bio" placeholder="Biografia" name="bio" id="bio" class="input-data-2">
                            <h5>Phone</h5>
                            <input type="tel" placeholder="telefono" name="telefono" id="phone" class="input-data">
                            <h5>Email</h5>
                            <input type="text" placeholder="correo" name="correo" id="email" class="input-data">
                            <h5>Password</h5>
                            <input type="password" placeholder="Contrasena" name="contrasena" id="password" class="input-data">
                        <button type="submit" class="button">Save</button>
                    </form>
                </div>
                <div class="footer">
                    <h4>created by <strong>username</strong></h4>
                    <h4>devChallenges.io</h4>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Obtén el formulario y el botón de guardar
        const form = document.getElementById("formRegister");
        const saveButton = form.querySelector("button[type=submit]");


    </script>
</body>
</html>
