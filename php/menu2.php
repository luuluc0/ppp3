<?php
session_start();
require_once("conexion.php");

if (!$conexion) {
    die("Error: no se pudo conectar a la base de datos.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trayectos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos2.css">
</head>
<body class="fondoo" style="color: white;">

<div class="container cuadrado1 mt-4">
    <div class="row mb-3">
        <div class="col-8"></div>
        <div class="col-4 text-end">
            <a href="../index.php" class="btn btn-light mb-1">INICIO</a>
            <a href="menu.php" class="btn btn-light mb-1">ADMIN</a>
        </div>
    </div>

    <h1 class="text-center mb-4">Trayectos</h1>

    <div class="row">
        <?php
        $consulta = $conexion->query("SELECT * FROM trayectos ORDER BY id ASC");

        if (!$consulta) {
            echo "<p>Error al cargar trayectos.</p>";
        } elseif ($consulta->num_rows == 0) {
            echo "<p class='text-center'>No hay trayectos cargados.</p>";
        } else {
            while ($fila = $consulta->fetch_assoc()):
        ?>
        <div class="col-md-6 mb-4">
            <div class="cuabrado3 p-3 pp">
                <h4><?= htmlspecialchars($fila['nombre']) ?></h4>
                <p><strong>Día:</strong> <?= htmlspecialchars($fila['dia']) ?></p>
                <p><strong>Horario:</strong> <?= htmlspecialchars($fila['hora']) ?></p>
                <p><?= htmlspecialchars($fila['descripcion']) ?></p>
                <?php if (!empty($fila['img'])): ?>
                    <img src="<?= htmlspecialchars($fila['img']) ?>" alt="Imagen del trayecto" class="img-fluid rounded mt-2 ">
                <?php endif; ?>
            </div>
        </div>
        <?php
            endwhile;
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
