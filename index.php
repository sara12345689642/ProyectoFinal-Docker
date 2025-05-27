<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <title>Login por roles</title>
</head>

<body>
    <div class="wrapper">
        <div class="title">Iniciar Sesión</div>
        <form action="inicioSesion\inicioSesion.php" method="POST">
            <div class="field">
                <input type="text" required name="username" placeholder="Nombre de Usuario">
            </div>
            <div class="field">
                <input type="password" required name="password" placeholder="Contraseña">
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Recordar</label>
                </div>
                <div class="pass-link">
                    <a href="#">¿Se te olvidó tu contraseña?</a>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="Ingresar">
            </div>
            <div class="signup-link">
                <a href="registrarse.php">¿No tienes una cuenta?</a>
            </div>
        </form>
    </div>
</body>

</html>