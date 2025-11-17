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
              <a class="btn btn-light boton-personalizado w-100" href="php/menu2.php">Información sobre trayectos.</a>
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
      <div class="col-1"></div>
      <div class="col-3 cuabrado2">
        <p class="P">
          Somos un Centro de Formación Profesional N°61, una institución educativa
          que brinda cursos de formación profesional y capacitación laboral para
          lograr una rápida inserción en el mercado socioproductivo local y regional.
        </p>
      </div>

      <div class="col-1"></div>

      <div class="col-6 cuabrado3">
    <div style="position: center; width: 100%; height: 0; padding-top: 56.2500%;
 padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
  <iframe loading="lazy" style="position: absolute; width: 100%; height: 0%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
    src="https://www.canva.com/design/DAG46grx_N8/cbzTbuwMkYO0JXyAk6LvLQ/view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
  </iframe>
</div>
<a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAG46grx_N8&#x2F;cbzTbuwMkYO0JXyAk6LvLQ&#x2F;view?utm_content=DAG46grx_N8&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link" target="_blank" rel="noopener"></a> 
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
