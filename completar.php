<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "basereto") or die("Problemas con la conexión");
$tar_id = intval($_GET['id']);
$estanuev = intval($_GET['status']);
mysqli_query($conexion, "update tareas set 1 = '$estanuev' where id = '$tar_id'") or 
die("Error al actualizar: " . mysqli_error($conexion));
mysqli_close($conexion);
echo "Estado actualizado correctamente";
?>
