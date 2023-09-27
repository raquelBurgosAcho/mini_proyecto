<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,600;1,400&family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div id="brand-container">
                   <img class="imagen" src="/img/dev.jpg" alt="Logo de devchallenges">
                    <p>Login</p>

                
                <form class="form" action="/handle_db/iniciar.php"  method="post" id="signup-form">
                    <label>
                        <i class='bx bx-envelope'></i>
                        <input type="email" id="email" name="correo" placeholder="Email" class="input">
                    </label>
                    <label>
                        <i class='bx bx-lock-alt'></i>
                        <input type="text" id="password" name="contrasena" placeholder="Password" class="input">
                    </label>
                    <div id="start-coding-btn" class="mt-4">
                        <input name="btningresar" class="button" type="submit" value="iniciar seccion">
                    </div>
                </form>
                <h5 id="parrafo">or continue with these social profiles</h5>
                <div class="icons">
                    <i class='bx bxl-google'></i>
                    <i class='bx bxl-facebook-circle'></i>
                    <i class='bx bxl-twitter'></i>
                    <i class='bx bxl-github'></i>
                </div>
                <p class="modif"> Don’t have an account yet? <a class="directorio" href="/creation.php">Register</a> </p>
            </div>
        </div>
    </div>
    <script src="style.js"></script>
</body>
</html>