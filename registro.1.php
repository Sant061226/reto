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
    function vericlav($contrasena, $contrasena1) {
        if ($contrasena !== $contrasena1) {
            echo "Las claves ingresadas son distintas. Por favor, inténtelo de nuevo.";
        } else {
            // Conexión a la base de datos
            $conn = new mysqli('Localhost', "root", "", "basereto");
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            // Hashear la contraseña
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, 
            contrasena) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $correo, $hash);
            if ($stmt->execute()) {
            echo "Usuario registrado con éxito.";
            } else {
            echo "Error: " . $stmt->error;
            }
            $stmt->close();
            }
        }
    }
    $contrasena = $_REQUEST['contrasena'];
    $contrasena1 = $_REQUEST['contrasena1'];
    vericlav($contrasena, $contrasena1);
?>
<br>
<a href="index.php">Regresar</a>
</body>
</html>
