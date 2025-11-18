<?php
session_start();
require_once("conexion.php"); // conexión a la DB

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recolectar datos
    $nombre = trim($_POST['nombre']);
    $dia = trim($_POST['dia']);
    $hora = trim($_POST['hora']);
    $descripcion = trim($_POST['descripcion']);

    // 2. Procesar imagen
    if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
        $archivoTmp = $_FILES['img']['tmp_name'];
        $nombreArchivo = basename($_FILES['img']['name']);
        $tipoArchivo = mime_content_type($archivoTmp);

        // Solo permitir JPEG
        if ($tipoArchivo === 'image/jpeg') {
            $rutaDestino = 'uploads/' . $nombreArchivo; // carpeta uploads/
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
    } else {
        $img = null; // si no suben imagen
    }

    // 3. Insertar en DB
    if (empty($mensaje)) {
        $sql = "INSERT INTO trayectos (nombre, dia, hora, descripcion, img) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssss", $nombre, $dia, $hora, $descripcion, $img);
            if ($stmt->execute()) {
                $mensaje = "<p style='color:green;'>Trayecto agregado correctamente.</p>";
            } else {
                $mensaje = "<p style='color:red;'>Error al guardar en DB: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            $mensaje = "<p style='color:red;'>Error en la preparación de la consulta: " . $conexion->error . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Trayecto</title>
</head>
<body>
<h2>Agregar Trayecto</h2>
<?php echo $mensaje; ?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre del trayecto" required><br><br>
    <input type="text" name="dia" placeholder="Día (ej: Lunes a viernes)" required><br><br>
    <input type="text" name="hora" placeholder="Horario (ej: 18:00 a 21:00)" required><br><br>
    <textarea name="descripcion" placeholder="Descripción" required></textarea><br><br>
    <label for="img">Subir imagen (JPEG):</label><br>
    <input type="file" name="img" accept="image/jpeg"><br><br>
    <button type="submit">Agregar</button>
    <a href="menu.php">Volver al menú</a>
</form>
</body>
</html>