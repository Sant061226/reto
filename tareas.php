<?php
session_start();
$conexion=mysqli_connect("localhost","root","","basereto") or
die("Problemas con la conexión");
if (!isset($_SESSION['usuario_id'])) {
    die("Error, debe iniciar sesión para ver las tareas");
}
else {
    $usuario_id =$_SESSION['usuario_id'];
    $registros=mysqli_query($conexion, "select * from usuarios as us inner join tareas as tat on us.id=tat.usuario_id where tat.usuario_id='$usuario_id'") or
die("Problemas en el select:".mysqli_error($conexion)); 
}
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
<div class="container-fluid"></div>
    <div class="row-sm-12 row-md-12 row-lg-12 titulo">
        <h1>Tareas</h1>
    </div>
    <div class="row text">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Código usuario</th>
                        <th>Código tarea</th>
                        <th>Fecha de creación</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Completar</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($reg = mysqli_fetch_array($registros)) {
                        echo "<tr>";
                        echo "<td>" . $reg['usuario_id'] . "</td>";
                        echo "<td>" . $reg['id'] . "</td>";
                        echo "<td>" . $reg['fecha_creacion'] . "</td>";
                        echo "<td>" . $reg['titulo'] . "</td>";
                        echo "<td>" . $reg['descripcion'] . "</td>";
                        echo "<td>";
                            if ($reg['completada'] == 1) {
                                echo "<a href='completar.php?id=" . $reg['id'] . "&status=0'>Marcar como pendiente</a>";
                            } 
                            else {
                                echo "<a href='completar.php?id=" . $reg['id'] . "&status=1'>Completar</a>";
                            }
                        echo "</td>";
                        echo "<td>
                                <a href='editar.php?id=" . $reg['id'] . "'>Editar</a>
                            </td>";
                        echo "<td>
                                <a href='eliminar.php?id=" . $reg['id'] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar esta tarea?\");'>Eliminar</a>
                            </td>";
                        echo "</tr>";
                    }
                    mysqli_close($conexion);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row-sm-12 row-md-12 row-lg-12 titulo">
        <form action="nueva_tarea.php" method="post">
            <input type="submit" value="Nueva tarea">
        </form>     
    </div>
    <div class="row-sm-12 row-md-12 row-lg-12 titulo">
    <form action="cerrar.php" method="post">
        <input type="submit" value="Cerrar sesión">
    </form>   
    </div>
</div>
</body>
</html>
