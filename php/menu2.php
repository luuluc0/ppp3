<?php
session_start();
require_once("conexion.php"); // Carga seguraa

if (!$conexion) {
  die("Error: no se pudo conectar a la base de datos.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos2.css">
 
</head>
<body class="fondoo">
    



  <div class="container cuadrado1">
    <div class="row">
      <div class="col-12">
 
        <?php
        $consulta = $conexion->query("SELECT * FROM trayectos ORDER BY id ASC");

        if (!$consulta) {
          echo "<p>Error al cargar trayectos.</p>";
        } else {
          if ($consulta->num_rows == 0) {
            echo "<p>No hay trayectos cargados.</p>";
          } else {
            while ($fila = $consulta->fetch_assoc()) {
              echo '<div class="cuabrado3 mb-3 p-3">';
              echo "<h4>" . htmlspecialchars($fila['nombre']) . "</h4>";
              echo "<p><strong>Día:</strong> " . htmlspecialchars($fila['dia']) . "</p>";
              echo "<p><strong>Horario:</strong> " . htmlspecialchars($fila['hora']) . "</p>";
              echo "<p>" . htmlspecialchars($fila['descripcion']) . "</p>";
              echo '</div>';
            }
          }
        }
        ?>

      </div>
    </div>

    <div class="row mt-3">
      <div class="col-10"></div>
      <div class="col-2">
      <a class="btn btn-light boton-personalizado w-100" href="../index.php">INICIO.</a>
       <a class="btn btn-light boton-personalizado w-100" href="./menu.php">admin.</a>
      
    </div>
    </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>