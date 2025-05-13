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
<div class="container">
    <div class="row">
        <div class="col formulario">
            <form action="nuevat1.php" method="post">
                <h3>Nueva tarea</h3>
                <hr>
                Titulo<br>
                <input type="text" name="titulo"><br>
                <label for="descripcion">Descripción</label><br>
                <textarea name="descripcion" rows="4" cols="50" required></textarea><br><br>
                <input type="submit" value="Crear">
                <hr>
            </form>
        </div>
    </div>
</div>
</body>
</html>