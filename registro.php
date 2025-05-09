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
            <form action="registro.1.php" method="post">
                <h3>Crear cuenta</h3>
                <hr>
                Nombre<br>
                <input type="text" name="nombre" require><br>
                Correo<br>
                <input type="mail" name="correo" require><br>
                Contraseña<br>
                <input type="password" name="contrasena"><br>
                Confirmar contraseña<br>
                <input type="password" name="contrasena1"><br><br>
                <input type="submit" value="Crear cuenta">
                <hr>
            </form>
        </div>
    </div>
</div>
</body>
</html>