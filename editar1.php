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
<?php
$conexion = mysqli_connect("localhost", "root", "", "basereto") 
or die("Problemas con la conexión");
$registros = mysqli_query($conexion, "SELECT id FROM tareas") 
or die("Problemas en el select:".mysqli_error($conexion));
if ($reg = mysqli_fetch_array($registros)) {
    $id = $reg['id'];
} else {
    die("Error: No se encontró una tarea con ese ID.");
}
$titulo = mysqli_real_escape_string($conexion, $_REQUEST['titulo']);
$descripcion = mysqli_real_escape_string($conexion, $_REQUEST['descripcion']);
if (!empty($titulo) && !empty($descripcion)) {
    $query = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = '$id'";
    if (mysqli_query($conexion, $query)) {
        echo "Tarea modificada correctamente.";
    } else {
        echo "Error al modificar la tarea: ";
    }
} else {
    echo "Los campos no pueden estar vacíos.";
}
mysqli_close($conexion);
?>
<br>
<a href="tareas.php">Ir al inicio</a>
</body>
</html>