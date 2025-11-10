<?php
// Incluimos el archivo de conexión. La variable $mysqli queda disponible.
require 'conexion_mysqli.php'; 

$alumnos = [];
$mensaje = '';

// Consulta SQL clave: Usamos INNER JOIN para combinar ambas tablas.
// NOTA: Usamos alias (a y c) para simplificar la consulta.
$sql = "
    SELECT 
        a.legajo_alumno,
        a.nombre,
        a.apellido,
        c.nombre_curso,
        c.anio_curso,
        c.turno
    FROM 
        alumnos a 
    INNER JOIN 
        cursos c ON a.id_curso_fk = c.id_curso
    ORDER BY 
        c.anio_curso, c.nombre_curso, a.apellido
";

// Como esta consulta es solo de lectura (SELECT) y no contiene variables externas,
// podemos usar la función query() de forma directa.
$resultado = $mysqli->query($sql);

if ($resultado) {
    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Almacenar todos los resultados en un array
        while ($fila = $resultado->fetch_assoc()) {
            $alumnos[] = $fila;
        }
    } else {
        $mensaje = "<p style='color: orange;'>No hay alumnos registrados o no se encontraron cursos relacionados.</p>";
    }
    
    $resultado->free(); // Liberar el conjunto de resultados

} else {
    // Manejo de error si la consulta SQL falló
    $mensaje = "<p style='color: red;'>Error en la consulta SQL: " . $mysqli->error . "</p>";
}

// Cerrar la conexión
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos por Curso</title>
    <style>
        table { width: 80%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Listado de Alumnos y Cursos Asignados</h1>

    <?php echo $mensaje; ?>

    <?php if (!empty($alumnos)): ?>
        <table>
            <thead>
                <tr>
                    <th>Legajo</th>
                    <th>Nombre y Apellido</th>
                    <th>Curso</th>
                    <th>Año</th>
                    <th>Turno</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnos as $alumno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($alumno['legajo_alumno']); ?></td>
                        <td><?php echo htmlspecialchars($alumno['apellido'] . ', ' . $alumno['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($alumno['nombre_curso']); ?></td>
                        <td><?php echo htmlspecialchars($alumno['anio_curso']); ?>º</td>
                        <td><?php echo htmlspecialchars($alumno['turno']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    
    <hr>
    <p>
        <a href="cargar_alumno_mysqli.php">Cargar Nuevo Alumno</a> | 
        <a href="cargar_curso_mysqli.php">Cargar Nuevo Curso</a>
    </p>

</body>
</html>