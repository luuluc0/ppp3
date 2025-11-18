<?php
session_start();
require_once("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Trayectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tray-card {
            border-radius: 10px;
            padding: 15px;
            background: #f7f7f7;
            margin-bottom: 15px;
        }
        .tray-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4">

    <?php if (!isset($_SESSION['logueado'])): ?>
        <div class="text-end mb-3">
            <a href="login.php" class="btn btn-primary">Iniciar Sesión</a>
            <a class="btn btn-light" href="../index.php">INICIO</a>
        </div>
    <?php else: ?>
        <div class="text-center mb-4">
            <a href="agregar.php" class="btn btn-success">Agregar</a>
            <a href="editar.php" class="btn btn-warning">Editar</a>
            <a href="eliminar.php" class="btn btn-danger">Eliminar</a>
            <a href="logaut.php" class="btn btn-secondary">Cerrar Sesión</a>
        </div>
    <?php endif; ?>

    <h3 class="text-center mb-3">Lista de Trayectos</h3>

    <?php
    $consulta = $conexion->query("SELECT * FROM trayectos ORDER BY id ASC");
    if ($consulta->num_rows == 0):
        echo "<p class='text-center text-muted'>No hay trayectos cargados.</p>";
    else:
        while ($fila = $consulta->fetch_assoc()):
    ?>
    <div class="tray-card">
        <?php if (isset($_SESSION['logueado'])): ?>
            <p><strong>ID:</strong> <?= $fila['id'] ?></p>
        <?php endif; ?>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($fila['nombre']) ?></p>
        <p><strong>Día:</strong> <?= htmlspecialchars($fila['dia']) ?></p>
        <p><strong>Horario:</strong> <?= htmlspecialchars($fila['hora']) ?></p>
        <p><?= htmlspecialchars($fila['descripcion']) ?></p>
        <?php if (!empty($fila['img'])): ?>
            <img src="<?= htmlspecialchars($fila['img']) ?>" alt="Imagen del trayecto">
        <?php endif; ?>
    </div>
    <?php
        endwhile;
    endif;
    ?>

</div>

</body>
</html>
