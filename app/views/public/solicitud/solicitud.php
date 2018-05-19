<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="ie-edge">
    <title>Solicitud</title>

    <link rel="stylesheet" href="../../../../web/css/materialize.min.css">
    <link rel='stylesheet' href='../../../../web/css/letra.css'>
    <link rel="stylesheet" href="../../../../web/css/material_icons.css">
    <link rel="stylesheet" href="../../../../web/css/style.css">
    

</head>
<body>
<!--Progress circle-->
<div class="progressc">
  <div class="circle1">
    <span class="label">1</span>
    <span class="title">Personal</span>
  </div>
  <span class="bar1"></span>
  <div class="circle2">
    <span class="label">2</span>
    <span class="title">Familiar</span>
  </div>
  <span class="bar2"></span>
  <div class="circle3">
    <span class="label">3</span>
    <span class="title">Gastos</span>
  </div>
</div>

<!--Slider Form-->
<div class="containers slider-one-active ">

  <div class="slider-ctr z-depth-4">
    <div class="slider">

      <!--FORMULARIOS SLIDER 1-->
      <form class="slider-form slider-one">
        <h2>Datos del estudiante</h2>
          
        <?php
        include_once 'datos_estudiantes.php';
        ?>

        <a class="waves-effect waves-light btn blue first" id="margen_one">Siguiente</a>
      </form>

        <!--FORMULARIOS SLIDER 2-->
        <form class="slider-form slider-two" >
          <h2>Datos del grupo familiar del estudiante</h2>

          <?php
          include_once 'datos_familia.php';
          ?>

          <a class="waves-effect waves-light btn blue regresaruno" id="margen_second">Regresar</a>
          <a class="waves-effect waves-light btn blue second" id="margen_second">Siguiente</a>
        </form>

        <!--FORMULARIOS SLIDER 3-->
        <form class="slider-form slider-three ">
          <h2>Gastos mensuales</h2>
          <?php
          include_once 'gastos_mensuales.php';
          ?>
          <a class="waves-effect waves-light btn blue regresardos" id="margen_three">Regresar</a>
          <a class="waves-effect waves-light btn blue three next" id="margen_three">Finalizar</a>
        </form>
      </div>
  </div>
</div>


    <script type="text/javascript" src="../../../../web/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../../../web/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../../../web/js/public_solicitud.js"></script>
    <script type="text/javascript" src="../../../../web/js/sweetalert.min.js"></script>
  </body>
</html>