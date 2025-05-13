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
session_start();
$conexion = mysqli_connect("localhost", "root", "", "basereto") or die("Problemas con la conexión");
$usuario_id = $_SESSION['usuario_id'] ?? null;
if (!$usuario_id) {
    die("Error: No hay usuario autenticado.");
}
$titulo = isset($_REQUEST['titulo']) ? mysqli_real_escape_string($conexion, $_REQUEST['titulo']) : '';
$descripcion = isset($_REQUEST['descripcion']) ? mysqli_real_escape_string($conexion, $_REQUEST['descripcion']) : '';
if (!empty($titulo) && !empty($descripcion)) {
    $stmt = $conexion->prepare("INSERT INTO tareas (usuario_id, titulo, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $usuario_id, $titulo, $descripcion);
    if ($stmt->execute()) {
        echo "Tarea creada correctamente.";
        header("Location: tareas.php"); 
        exit();
    } else {
        echo "Error al crear la tarea: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Los campos no pueden estar vacíos.";
}
mysqli_close($conexion);
?>
<br>
<a href="tareas.php">Ir al inicio</a>
</body>
</html>