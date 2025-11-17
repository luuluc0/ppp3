<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Trayecto</title>
</head>
<body>

<h2>Eliminar Trayecto</h2>

<form method="POST">
    <input type="number" name="id" placeholder="ID a eliminar" required><br><br>
    <button type="submit" name="eliminar">Eliminar</button>
    <a href="menu.php">Volver</a>
</form>

<?php
if (isset($_POST["eliminar"])) {

    $id = $_POST["id"];

    $sql = "DELETE FROM trayectos WHERE id=$id";

    if ($conexion->query($sql)) {
        echo "<p>Eliminado correctamente.</p>";
    } else {
        echo "<p>Error: " . $conexion->error . "</p>";
    }
}
?>

</body>
</html>
