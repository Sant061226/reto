<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="ret.css">
    <title>Reto</title>
</head>
<body>
<div class="container"></div>
    <div class="row">
        <div class="col formulario">
            <form action="reto.php" method="post">
                <h3>Iniciar Sesión</h3>
                <hr>
                Correo<br>
                <input type="mail" name="correo"><br>
                Contraseña<br>
                <input type="password" name="contrasena"><br><br>
                <input type="submit" value="Ingresar">
                <hr>
            </form>
            <form action="registro.php" method="post">
                ¿No tiene una cuenta?<br>
                <input type="submit" value="Registrarse">
            </form>
        </div>
    </div>
</div>
</body>
</html>