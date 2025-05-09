<?php
session_start();
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
<div class="container"></div>
    <div class="row-sm-12 row-md-12 row-lg-12 titulo">
        <h1>Tareas</h1>
    </div>
     <div class="row-sm-12 row-md-12 row-lg-12 text">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <?php
                $conexion=mysqli_connect("localhost","root","","basereto") or
                die("Problemas con la conexión");
                $usuario_id =$_SESSION['usuario_id'];
                $registros=mysqli_query($conexion, "select * from usuarios as us inner join tareas as tat where tat.usuario_id='$usuario_id'") or
                die("Problemas en el select:".mysqli_error($conexion)); 
                $impresos=0;
                while ($reg=mysqli_fetch_array($registros))
                {
                $impresos++;
                echo "Codigo usuario:".$reg['usuario_id']."<br>";
                echo "Fecha de creación:".$reg['fecha_creacion']."<br>";
                echo "Titulo:".$reg['titulo']."<br>";
                echo "Descripcion:".$reg['descripcion']."<br>";
                echo "<form action='nueva_tarea.php' method='post'>
                        <input type='submit' value='Marcar como completada'>
                    </form>";
                echo "<br>";
                echo "<form action='nueva_tarea.php' method='post'>
                        <input type='submit' value='Editar'>
                    </form>";
                echo "<br>";
                echo "<form action='nueva_tarea.php' method='post'>
                        <input type='submit' value='Eliminar tarea'>
                    </form>";                        
                echo "<hr>";
                }
                mysqli_close($conexion);
            ?>   
        </div>
    </div>
    <div class="row-sm-12 row-md-12 row-lg-12 titulo">
        <form action="nueva_tarea.php" method="post">
                <input type="submit" value="Nueva tarea">
        </form>     
    </div>
</div>
</body>
</html>