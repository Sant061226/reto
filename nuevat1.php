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
$conexion=mysqli_connect("localhost","root","","basereto") or
die("Problemas con la conexión");
$registros=mysqli_query($conexion,"select
id
from usuarios") or
die("Problemas en el select:".mysqli_error($conexion));
if ($reg=mysqli_fetch_array($registros))
{
mysqli_query($conexion,"insert into tareas (usuario_id,titulo,descripcion)
values
('$reg[id]','$_REQUEST[titulo]',
'$_REQUEST[descripcion]')")
or die("Problemas en el select".mysqli_error($conexion));
mysqli_close($conexion);
echo "Tarea creada.";
}
else
{
    echo "Error al crear.";
}
?>
</body>
</html>