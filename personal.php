<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Personal Info</title>
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
                        <button id="editButton" type="submit" class="button-edit">Edit</button>
                    </div>
                    <div class="profil-personal-edit">
                        <h5>Photo</h5>
                        <img src="profile-photo.jpg" alt="Profile Photo"> <!-- Aquí puedes usar la ruta a la foto de perfil -->
                    </div>
                    <div class="profil-personal">
                        <h5>Name</h5>
                        <span id="name"></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Bio</h5>
                        <span id="bio"></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Phone</h5>
                        <span id="phone"></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Email</h5>
                        <span id="email"></span>
                    </div>
                    <div class="profil-personal">
                        <h5>Password</h5>
                        <span id="password"></span>
                    </div>
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
