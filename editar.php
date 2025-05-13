<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "basereto") or die("Problemas con la conexión");
$usuario_id = $_SESSION['usuario_id'];
$registros = mysqli_query($conexion, "SELECT * FROM tareas WHERE usuario_id='$usuario_id'") or die("Problemas en el select: " . mysqli_error($conexion));
$reg = mysqli_fetch_array($registros);
$titulo = mysqli_real_escape_string($conexion, $reg['titulo']);
$descripcion = mysqli_real_escape_string($conexion, $reg['descripcion']);
mysqli_close($conexion);
?>
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
            <form action="editar1.php" method="post">
                <h3>Edición de tarea</h3>
                <hr>
                Titulo<br>
                <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>
                <label for="descripcion">Descripción</label><br>
                <textarea name="descripcion" rows="4" cols="50" required><?php
                echo $descripcion;
                ?></textarea><br><br>
                <input type="submit" value="Guardar">
                <hr>
            </form>
        </div>
    </div>
</div>
</body>
</html>