<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "basereto") or die("Problemas con la conexión");
$tatid = intval($_GET['id']);
$nuev = intval($_GET['status']);
mysqli_query($conexion, "update tareas set completada = '$nuev' where id = '$tatid'") or 
die("Error al actualizar: " . mysqli_error($conexion));
mysqli_close($conexion);
header("Location: tareas.php");
exit();
?>
