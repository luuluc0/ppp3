<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Trayecto</title>
</head>
<body>

<h2>Agregar Trayecto</h2>

<form action="" method="POST">
    <input type="text" name="nombre" placeholder="Nombre del trayecto" required><br><br>

    <input type="text" name="dia" placeholder="Día (ej: Lunes a viernes)" required><br><br>

    <input type="text" name="hora" placeholder="Horario (ej: 18:00 a 21:00)" required><br><br>

    <textarea name="descripcion" placeholder="Descripción" required></textarea><br><br>

<label for="img">URL de la imagen:</label><br>
<input type="text" id="img" name="img" placeholder="http://ejemplo.com/imagen.jpg"><br><br>


    <button type="submit" name="agregar">Agregar</button>
    <a href="menu.php">Volver al menú</a>
</form>

<?php
if (isset($_POST["agregar"])) {

    $nombre = $_POST["nombre"];
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $descripcion = $_POST["descripcion"];
     $img = trim($_POST['img']); // URL de la imagen
     

    $sql = "INSERT INTO trayectos (nombre, dia, hora, descripcion, img)
            VALUES ('$nombre', '$dia', '$hora', '$descripcion','$img')";

    if ($conexion->query($sql)) {
        echo "<p>Trayecto agregado correctamente.</p>";
    } else {
        echo "<p>Error: " . $conexion->error . "</p>";
    }
}
?>

</body>
</html>
