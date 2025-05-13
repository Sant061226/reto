<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "basereto") or die("Problemas con la conexión");
$usuario_id = $_SESSION['usuario_id'] ?? null;
if (!$usuario_id) {
    die("Error: No hay usuario autenticado.");
}
$tarea_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$tarea_id) {
    die("Error: ID de tarea no válido.");
}
$consulta = mysqli_query($conexion, "SELECT * FROM tareas WHERE id='$tarea_id' AND usuario_id='$usuario_id'");
if (mysqli_num_rows($consulta) == 0) {
    die("Error: No puedes eliminar esta tarea.");
}
$query = "DELETE FROM tareas WHERE id='$tarea_id' AND usuario_id='$usuario_id'";
if (mysqli_query($conexion, $query)) {
    echo "Tarea eliminada correctamente.";
    header("Location: tareas.php");
    exit();
} else {
    echo "Error al eliminar la tarea: " . mysqli_error($conexion);
}
mysqli_close($conexion);
?>