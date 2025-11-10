<?php
require 'conexion_mysqli.php'; // Incluye el archivo de conexión

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Recolección de datos
    $nombre = trim($_POST['nombre_curso']);
    $anio   = (int)$_POST['anio_curso'];
    $turno  = $_POST['turno'];

    if (!empty($nombre) && $anio > 0 && !empty($turno)) {
        // 2. Definir la consulta con placeholders (?)
        $sql = "INSERT INTO cursos (nombre_curso, anio_curso, turno) VALUES (?, ?, ?)";

        // 3. Preparar la consulta
        $stmt = $mysqli->prepare($sql);
        
        // Comprobar si la preparación fue exitosa
        if ($stmt === false) {
             $mensaje = "<p style='color: red;'>Error en la preparación de la consulta: " . $mysqli->error . "</p>";
        } else {
            // 4. Asignar (bind) los parámetros a los placeholders
            // 'sii' -> Indica el tipo de dato de cada parámetro: s=string, i=integer
            $stmt->bind_param("sii", $nombre, $anio, $turno);

            // 5. Ejecutar la consulta
            if ($stmt->execute()) {
                $mensaje = "<p style='color: green;'>¡Curso '$nombre' agregado con éxito!</p>";
            } else {
                $mensaje = "<p style='color: red;'>Error al agregar el curso: " . $stmt->error . "</p>";
            }

            // 6. Cerrar el statement
            $stmt->close();
        }
    } else {
        $mensaje = "<p style='color: orange;'>Por favor, complete todos los campos.</p>";
    }
}
// 7. Cierra la conexión después de usarla (buena práctica)
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Curso (MySQLi)</title>
</head>
<body>

    <h1>Cargar Nuevo Curso (MySQLi)</h1>
    <?php echo $mensaje; ?>

    <form method="POST">
        <label for="nombre_curso">Nombre del Curso:</label><br>
        <input type="text" id="nombre_curso" name="nombre_curso" required><br><br>

        <label for="anio_curso">Año (1-6):</label><br>
        <input type="number" id="anio_curso" name="anio_curso" min="1" max="6" required><br><br>

        <label for="turno">Turno:</label><br>
        <select id="turno" name="turno" required>
            <option value="">Seleccione un turno</option>
            <option value="Mañana">Mañana</option>
            <option value="Tarde">Tarde</option>
            <option value="Noche">Noche</option>
        </select><br><br>

        <button type="submit">Guardar Curso</button>
    </form>
    
    <hr>
    <p><a href="cargar_alumno_mysqli.php">Ir a Cargar Alumno</a></p>

</body>
</html>