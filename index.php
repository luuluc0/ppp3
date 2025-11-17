<?php
session_start();
require_once("php/conexion.php"); // Carga seguraa

if (!$conexion) {
  die("Error: no se pudo conectar a la base de datos.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CFP N°61 - La Criolla</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS personalizado -->
  <link rel="stylesheet" href="css/stiles.css">
</head>
<body>

<!-- SECCIÓN INICIO -->
<section id="inicio">
  <img src="img/fondo1.png" alt="Fondo" class="fondo">
  <div class="container text-center">
    <div class="row align-items-center">
      <div class="col-1"></div>
      <div class="col-10">
        <img src="img/fondo2.png" alt="Fondo" class="fondo2">

        <div class="row">
          <div class="col-6">
            <div class="izquierda">
              <div class="nombre-box p-3 mb-3">
                <h2 class="text-white mb-1">CFP N°61</h2>
                <p class="descripcion text-white-50 mb-0">Centro de Formación Profesional N°61 La Criolla.</p>
              </div>
              <div class="redes d-flex gap-3">
                <!-- redes -->
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="derecha d-flex flex-column gap-3">
              <a class="btn btn-light boton-personalizado w-100" href="#pg2">Quienes somos.</a>
              <a class="btn btn-light boton-personalizado w-100" href="php/menu.php">Información sobre trayectos.</a>
              <a class="btn btn-light boton-personalizado w-100" href="#pg4">Dirección.</a>
            </div>
          </div>
        </div>

      </div>
      <div class="col-1"></div>
    </div>
  </div>
</section>

<!-- SECCIÓN QUIÉNES SOMOS -->
<section id="pg2" class="text-center py-5">
  <img src="img/fondo1.png" alt="Fondo" class="fondo">

  <div class="containes">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10 cuabrado1">
        <h2>¿Te gustaría saber quiénes somos?</h2>
      </div>
      <div class="col-1"></div>
    </div>

    <div class="row">
      <div class="col-4 cuabrado2">
        <p class="P">
          Somos un Centro de Formación Profesional N°61, una institución educativa
          que brinda cursos de formación profesional y capacitación laboral para
          lograr una rápida inserción en el mercado socioproductivo local y regional.
        </p>
      </div>

      <div class="col-1"></div>

      <div class="col-6 cuabrado3">
        <p>hola</p>
      </div>
    </div>

    <div class="row">
      <div class="col-10"></div>
      <div class="col-2">
        <a class="btn btn-light boton-personalizado w-100" href="#inicio">INICIO.</a>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN TRAYECTOS - PHP FUNCIONAL -->
<section id="pg3" class="text-center py-5">
  <img src="img/fondo1.png" alt="Fondo" class="fondo">

  <div class="containe">
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
        <a class="btn btn-light boton-personalizado w-100" href="#inicio">INICIO.</a>
      </div>
    </div>
  </div>
</section>

<!-- SECCIÓN DIRECCIÓN -->
<section id="pg4" class="text-center py-5">
  <img src="img/fondo1.png" alt="Fondo" class="fondo">

  <div class="containe">
    <div class="row">

      <div class="col-1"></div>

      <div class="col-4 cuabrado1">
        <div class="formulario-container">
          <div class="form_contenedor">

            <h2 class="form_titulo">Contáctanos</h2>

            <form class="form_cuerpo" action="#" method="post">
              <div class="form_grupo">
                <label class="form_label" for="nombre">Nombre</label>
                <input class="form_input" type="text" id="nombre" placeholder="Tu nombre completo" required>
              </div>

              <div class="form_grupo">
                <label class="form_label" for="email">Correo electrónico</label>
                <input class="form_input" type="email" id="email" placeholder="tu@correo.com" required>
              </div>

              <div class="form_grupo">
                <label class="form_label" for="telefono">Teléfono</label>
                <input class="form_input" type="tel" id="telefono" placeholder="Ej: +54 11 5555-5555">
              </div>

              <button class="form_boton" type="submit">Enviar</button>
            </form>

          </div>
        </div>
      </div>

      <div class="col-1"></div>

      <div class="col-5 cuabrado3">
        <p>Nos encontramos en:</p>

        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.6283533038!2d-58.016541525346476!3d-31.39680959530345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95ade806df2c0001%3A0xb612154d3d91aaab!2sAlberdi%20233%2C%20E3202%20Concordia%2C%20Entre%20R%C3%ADos!5e0!3m2!1sen!2sar!4v1754331153754!5m2!1sen!2sar"
          width="350" height="350" style="border:10px;" allowfullscreen loading="lazy"></iframe>
      </div>

      <div class="col-1"></div>

    </div>

    <div class="row mt-3">
      <div class="col-10"></div>
      <div class="col-2">
        <a class="btn btn-light boton-personalizado w-100" href="#inicio">INICIO.</a>
      </div>
    </div>

  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
