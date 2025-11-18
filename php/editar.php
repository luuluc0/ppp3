<?php
session_start();
require_once("conexion.php"); // conexión a la DB

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = trim($_POST['nombre']);
    $dia = trim($_POST['dia']);
    $hora = trim($_POST['hora']);
    $descripcion = trim($_POST['descripcion']);

    // Procesar imagen si se sube
    $img = null;
    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
        $archivoTmp = $_FILES['img']['tmp_name'];
        $nombreArchivo = basename($_FILES['img']['name']);
        $tipoArchivo = mime_content_type($archivoTmp);

        if ($tipoArchivo === 'image/jpeg') {
            $rutaDestino = 'uploads/' . $nombreArchivo;
            if (!file_exists('uploads')) {
                mkdir('uploads', 0755, true);
            }
            if (move_uploaded_file($archivoTmp, $rutaDestino)) {
                $img = $rutaDestino;
            } else {
                $mensaje = "<p style='color:red;'>Error al mover la imagen.</p>";
            }
        } else {
            $mensaje = "<p style='color:red;'>Solo se permiten imágenes JPEG.</p>";
        }
    }

    if (empty($mensaje)) {
        if ($img) {
            // Actualizar con nueva imagen
            $sql = "UPDATE trayectos SET nombre=?, dia=?, hora=?, descripcion=?, img=? WHERE id=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sssssi", $nombre, $dia, $hora, $descripcion, $img, $id);
        } else {
            // Actualizar sin cambiar la imagen
            $sql = "UPDATE trayectos SET nombre=?, dia=?, hora=?, descripcion=? WHERE id=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ssssi", $nombre, $dia, $hora, $descripcion, $id);
        }

        if ($stmt->execute()) {
            $mensaje = "<p style='color:green;'>Trayecto actualizado correctamente.</p>";
        } else {
            $mensaje = "<p style='color:red;'>Error al actualizar: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Trayecto</title>
</head>
<body>
<h2>Editar Trayecto</h2>
<?php echo $mensaje; ?>
<form method="POST" enctype="multipart/form-data">
    <input type="number" name="id" placeholder="ID del trayecto a editar" required><br><br>
    <input type="text" name="nombre" placeholder="Nuevo nombre" required><br><br>
    <input type="text" name="dia" placeholder="Nuevo día" required><br><br>
    <input type="text" name="hora" placeholder="Nuevo horario" required><br><br>
    <textarea name="descripcion" placeholder="Nueva descripción" required></textarea><br><br>
    <label for="img">Subir nueva imagen (JPEG, opcional):</label><br>
    <input type="file" name="img" accept="image/jpeg"><br><br>
    <button type="submit">Actualizar</button>
    <a href="menu.php">Volver</a>
</form>
</body>
</html>