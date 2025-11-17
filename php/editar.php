<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Trayecto</title>
</head>
<body>

<h2>Editar Trayecto</h2>

<form method="POST">
    <input type="number" name="id" placeholder="ID del trayecto a editar" required><br><br>

    <input type="text" name="nombre" placeholder="Nuevo nombre" required><br><br>

    <input type="text" name="dia" placeholder="Nuevo día" required><br><br>

    <input type="text" name="hora" placeholder="Nuevo horario" required><br><br>

    <textarea name="descripcion" placeholder="Nueva descripción" required></textarea><br><br>

    <button type="submit" name="editar">Actualizar</button>
    <a href="menu.php">Volver</a>
</form>

<?php
if (isset($_POST["editar"])) {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $dia = $_POST["dia"];
    $hora = $_POST["hora"];
    $descripcion = $_POST["descripcion"];

    $sql = "UPDATE trayectos SET 
                nombre='$nombre',
                dia='$dia',
                hora='$hora',
                descripcion='$descripcion'
            WHERE id=$id";

    if ($conexion->query($sql)) {
        echo "<p>Actualizado correctamente.</p>";
    } else {
        echo "<p>Error: " . $conexion->error . "</p>";
    }
}
?>

</body>
</html>
